<?php
include "../../../../config/koneksi.php";
include "Proses_ambil_data.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$minSupport = 0.2;
$minConfidence = 0.4;

ob_start();

class FPNode
{
    public $item;
    public $count;
    public $parent;
    public $children = [];

    public function __construct($item, $count = 1, $parent = null)
    {
        $this->item = $item;
        $this->count = $count;
        $this->parent = $parent;
    }

    public function addChild($childItem)
    {
        if (isset($this->children[$childItem])) {
            $this->children[$childItem]->count++;
        } else {
            $childNode = new FPNode($childItem, 1, $this);
            $this->children[$childItem] = $childNode;
        }
        return $this->children[$childItem];
    }
}

class FPTree
{
    public $root;
    public $headerTable = [];

    public function __construct()
    {
        $this->root = new FPNode(null);
    }

    public function addTransaction($transaction, $count = 1)
    {
        $currentNode = $this->root;
        foreach ($transaction as $item) {
            $currentNode = $currentNode->addChild($item);
            $currentNode->count += $count - 1;
        }
    }

    public function buildHeaderTable($transactions, $minSupport)
    {
        $itemCounts = [];
        foreach ($transactions as $transaction) {
            foreach ($transaction as $item) {
                if (!isset($itemCounts[$item])) {
                    $itemCounts[$item] = 0;
                }
                $itemCounts[$item]++;
            }
        }

        foreach ($itemCounts as $item => $count) {
            if ($count / count($transactions) >= $minSupport) {
                $this->headerTable[$item] = $count;
            }
        }

        arsort($this->headerTable);
    }
}

// Memanggil fungsi getTransactions untuk mengambil data transaksi dari tabel
list($transactions, $supports, $supportCounts, $bookTitles, $totalTransactions) = getTransactions($koneksi);

// Menghitung nilai support untuk setiap item
$validSupport = false;
foreach ($supports as $support) {
    if ($support >= $minSupport) {
        $validSupport = true;
        break;
    }
}

if (!$validSupport) {
    $_SESSION['gagal'] = "Hasil pencarian nilai support yang dimasukan tidak ada atau terlalu tinggi !";
    header("location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

// Membuat dan mengisi FP-Tree
$fpTree = new FPTree();
$fpTree->buildHeaderTable($transactions, $minSupport);

foreach ($transactions as $transaction) {
    $sortedTransaction = [];
    foreach ($fpTree->headerTable as $item => $count) {
        if (in_array($item, $transaction)) {
            $sortedTransaction[] = $item;
        }
    }
    $fpTree->addTransaction($sortedTransaction);
}

// Fungsi untuk membentuk Conditional Pattern Base
function getConditionalPatternBase($item, $fpTree)
{
    $cpb = [];

    // Cari node yang berisi item dalam FP-Tree
    $nodes = [];
    findNodesWithItem($fpTree->root, $item, $nodes);

    // Bentuk CPB dari node-node yang ditemukan
    foreach ($nodes as $node) {
        $path = [];
        $current = $node->parent;
        while ($current->item !== null) {
            $path[] = $current->item;
            $current = $current->parent;
        }
        $path = array_reverse($path);
        $cpb[] = ['path' => $path, 'count' => $node->count];
    }

    return $cpb;
}

// Fungsi untuk mencari node yang berisi item dalam FP-Tree
function findNodesWithItem($node, $item, &$nodes)
{
    if ($node->item === $item) {
        $nodes[] = $node;
    }
    foreach ($node->children as $child) {
        findNodesWithItem($child, $item, $nodes);
    }
}

// Fungsi untuk membentuk Conditional FP-Tree
function buildConditionalFPTree($cpb, $minSupport)
{
    $conditionalFPTree = new FPTree();
    // Tambahkan setiap jalur dari CPB ke Conditional FP-Tree
    foreach ($cpb as $entry) {
        $path = $entry['path'];
        $count = $entry['count'];
        $conditionalFPTree->addTransaction($path, $count);
    }

    // Filter header table dengan minimum support
    $conditionalFPTree->buildHeaderTable(array_map(function ($entry) {
        return $entry['path'];
    }, $cpb), $minSupport);

    return $conditionalFPTree;
}

// Fungsi untuk menghitung support untuk frequent itemsets
function calculateSupport($itemset, $transactions)
{
    $count = 0;
    foreach ($transactions as $transaction) {
        if (count(array_intersect($itemset, $transaction)) === count($itemset)) {
            $count++;
        }
    }
    return $count / count($transactions);
}

// Fungsi untuk menghasilkan frequent itemsets dari conditional FP-Tree
function mineFPTree($tree, $suffix, $minSupport, &$frequentItemsets, $transactions)
{
    foreach (array_keys($tree->headerTable) as $item) {
        $newSuffix = array_merge([$item], $suffix);
        $support = calculateSupport($newSuffix, $transactions);
        if ($support >= $minSupport) {
            $frequentItemsets[] = ['itemset' => $newSuffix, 'support' => $support];
        }

        $cpb = getConditionalPatternBase($item, $tree);
        $conditionalFPTree = buildConditionalFPTree($cpb, $minSupport);

        if (!empty($conditionalFPTree->headerTable)) {
            mineFPTree($conditionalFPTree, $newSuffix, $minSupport, $frequentItemsets, $transactions);
        }
    }
}

// Membentuk frequent itemsets dari FP-Tree utama
$frequentItemsets = [];
mineFPTree($fpTree, [], $minSupport, $frequentItemsets, $transactions);

// Fungsi untuk membentuk association rules dari frequent itemsets
function generateAssociationRules($frequentItemsets, $minConfidence, $transactions)
{
    $rules = [];
    foreach ($frequentItemsets as $itemset) {
        $items = $itemset['itemset'];
        $support = $itemset['support'];
        $len = count($items);

        if ($len > 1) {
            for ($i = 1; $i < (1 << $len); $i++) {
                $antecedent = [];
                $consequent = [];
                for ($j = 0; $j < $len; $j++) {
                    if ($i & (1 << $j)) {
                        $antecedent[] = $items[$j];
                    } else {
                        $consequent[] = $items[$j];
                    }
                }

                if (!empty($antecedent) && !empty($consequent)) {
                    $antecedentSupport = calculateSupport($antecedent, $transactions);
                    $consequentSupport = calculateSupport($consequent, $transactions);
                    $confidence = $support / $antecedentSupport;
                    if ($confidence >= $minConfidence) {
                        $rules[] = [
                            'antecedent' => $antecedent,
                            'consequent' => $consequent,
                            'antecedent_support' => $antecedentSupport,
                            'consequent_support' => $consequentSupport,
                            'confidence' => $confidence
                        ];
                    }
                }
            }
        }
    }
    return $rules;
}

// Menghasilkan association rules
$associationRules = generateAssociationRules($frequentItemsets, $minConfidence, $transactions);

// Mengurutkan association rules berdasarkan confidence secara descending
usort($associationRules, function ($a, $b) {
    return $b['confidence'] <=> $a['confidence'];
});

// Menghapus data lama dari tabel association_rule_user
$koneksi->query("DELETE FROM association_rule_user");

$stmt = $koneksi->prepare("INSERT INTO association_rule_user (antecedent, consequent, antecedent_support, consequent_support, confidence) VALUES (?, ?, ?, ?, ?)");

foreach ($associationRules as $rule) {
    $antecedent = implode(', ', $rule['antecedent']);
    $consequent = implode(', ', $rule['consequent']);
    $antecedent_support = $rule['antecedent_support'];
    $consequent_support = $rule['consequent_support'];
    $confidence = $rule['confidence'];

    $stmt->bind_param("ssddd", $antecedent, $consequent, $antecedent_support, $consequent_support, $confidence);
    $stmt->execute();
}

$stmt->close();
$koneksi->close();

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
