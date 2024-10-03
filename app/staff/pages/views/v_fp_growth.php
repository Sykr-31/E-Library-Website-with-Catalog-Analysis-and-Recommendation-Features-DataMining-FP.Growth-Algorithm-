<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Sistem Analisis FP-Growth
            <small id="currentDate">
                <script type="text/javascript">
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                </script>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">FP-Growth Association Rule</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="alert alert-secondary" style="color: #383d41; background-color: #e2e3e5; border-color: #d6d8db;">
            Selamat Datang <b><?= $_SESSION['fullname']; ?></b>, di Sistem Analisis FP-Growth.
        </div>
        <div class="row">
            <div class="col-xs-12">

                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <section id="new">

                            <!-- Card Atas -->
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="/perpustakaan/assets/images/landingpage/question.jpg" class="img-fluid card-img" alt="FP-Growth Definition">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-header" style="line-height: 1.8; margin-top: 19px;">
                                            <div class="card-header">
                                                <b>Algoritma FP-Growth (Frequent Pattern Growth) :</b>
                                            </div>
                                            <div class="card-body" style="line-height: 1.8;">
                                                <p class="card-text" style="text-align: justify;">
                                                    Algoritma FP-Growth adalah metode dalam data mining yang digunakan untuk menemukan pola berulang atau hubungan antar item dalam data transaksi. Metode ini lebih efisien dan cepat dibandingkan dengan algoritma lain, karena menggunakan struktur data FP-Tree (Frequent Pattern Tree) untuk menyimpan informasi item yang sering muncul bersama dalam transaksi.
                                                </p>
                                                <p class="card-text" style="text-align: justify;">
                                                    Algoritma FP-Growth pada perpustakaan sekolah dapat menganalisis data peminjaman buku oleh siswa. Misalnya, FP-Growth dapat menemukan pola peminjaman buku yang sering dipinjam bersamaan. Contohnya, siswa yang meminjam buku matematika sering juga meminjam buku fisika.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->

                            <!-- Card Bawah -->
                            <div class="card-container">
                                <div class="row" style="display: flex; align-items: center;">
                                    <div class="col-md-6">
                                        <h4 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Fitur yang tersedia :</h4>
                                    </div>
                                    <div class="col-md-6 text-right" style="display: flex; align-items: center; justify-content: flex-end; max-height: 50px;">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination" style="margin-bottom: 0;">
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="showCard('prev')">&laquo;</a></li>
                                                <li class="page-item"><a class="page-link btn btn-primary disabled" href="javascript:void(0);" id="currentPage">1</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);" onclick="showCard('next')">&raquo;</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                                <!-- card 1 -->
                                <div class="row" style="position: relative;">
                                    <div class="col-md-12">
                                        <div class="card border-light mb-3 card-content show" id="card1">
                                            <div class="text-center card-img-container">
                                                <img src="/perpustakaan/assets/images/landingpage/dataset.png" class="img-fluid card-img" alt="Dataset Image">
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <div class="card-header" style="line-height: 1.8;">
                                                    <b>Pembentukan Dataset Otomatis</b>
                                                </div>
                                                <div class="card-body" style="line-height: 1.8;">
                                                    <p class="card-text" style="text-align: justify;">
                                                        Dataset adalah kumpulan data yang disusun dalam format tabel. Misalnya, data peminjaman buku di perpustakaan yang mencatat informasi seperti judul buku dan nama peminjam.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- card 2 -->
                                        <div class="card border-light mb-3 card-content hide-right" id="card2">
                                            <div class="text-center card-img-container">
                                                <img src="/perpustakaan/assets/images/landingpage/frequent_itemset.png" class="img-fluid card-img" alt="Frequent Itemset Image">
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <div class="card-header" style="line-height: 1.8;">
                                                    <b>Perhitungan Frequent Itemset</b>
                                                </div>
                                                <div class="card-body" style="line-height: 1.8;">
                                                    <p class="card-text" style="text-align: justify;">
                                                        Frequent Itemset adalah kelompok item (barang atau objek) yang sering muncul bersama-sama dalam suatu dataset. Contohnya, dalam data transaksi di sebuah perpustakaan sekolah, frequent itemset bisa berupa kombinasi buku-buku yang sering dipinjam bersamaan oleh banyak siswa.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- card 3 -->
                                        <div class="card border-light mb-3 card-content hide-right" id="card3">
                                            <div class="text-center card-img-container">
                                                <img src="/perpustakaan/assets/images/landingpage/association.png" class="img-fluid card-img" alt="Association Rule Image">
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <div class="card-header" style="line-height: 1.8;">
                                                    <b>Perhitungan Association Rule</b>
                                                </div>
                                                <div class="card-body" style="line-height: 1.8;">
                                                    <p class="card-text" style="text-align: justify;">
                                                        Association Rule adalah aturan yang menunjukkan hubungan antara item-item dalam frequent itemset. Aturan ini membantu mengidentifikasi pola-pola dalam data. Misalnya, aturan asosiasi bisa menunjukkan bahwa jika seseorang meminjam buku A, maka ada kemungkinan besar mereka juga akan meminjam buku B.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- card 4 -->
                                        <div class="card border-light mb-3 card-content hide-right" id="card4">
                                            <div class="text-center card-img-container">
                                                <img src="/perpustakaan/assets/images/landingpage/association_by_teks.png" class="img-fluid card-img" alt="Association Rule Image">
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <div class="card-header" style="line-height: 1.8;">
                                                    <b>Pembentukan Association Rule Knowledge</b>
                                                </div>
                                                <div class="card-body" style="line-height: 1.8;">
                                                    <p class="card-text" style="text-align: justify;">
                                                        Association Rule Knowledge adalah pengetahuan yang diperoleh dari aturan asosiasi yang dapat dijelaskan dengan bahasa sederhana. Misalnya, Jika seseorang meminjam buku 'Pemrograman PHP', maka ada kemungkinan 70% mereka juga akan meminjam buku 'Pemrograman JavaScript'.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->

                        </section>
                        <button type="button" class="btn btn-primary btn-block" onclick="location.href='fp-growth-analisa'"><i class="fa fa-line-chart"></i> Lakukan Analisis</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<style>
    .card-container {
        position: relative;
        min-height: 465px;
        padding: 10px;
    }

    .card-content {
        transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        position: absolute;
        width: 100%;
        top: 0;
        left: 0;
    }

    .card-content.hide-left {
        transform: translateX(-100%);
        opacity: 0;
    }

    .card-content.hide-right {
        transform: translateX(100%);
        opacity: 0;
    }

    .card-content.show {
        transform: translateX(0);
        opacity: 1;
    }

    .pagination {
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
    }

    .pagination .page-item {
        margin: 0 2px;
    }

    .img-fluid {
        width: 100%;
        height: auto;
    }

    .card-img-container {
        width: 100%;
        height: 100%;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .card-img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .card-container {
            min-height: 400px;
        }

        .pagination {
            justify-content: center;
        }
    }
</style>

<script type="text/javascript">
    var currentCard = 1;
    var totalCards = 4; // Total number of cards

    function showCard(direction) {
        var currentElement = document.getElementById('card' + currentCard);
        currentElement.classList.remove('show');

        if (direction === 'next' && currentCard < totalCards) {
            currentElement.classList.add('hide-left');
            currentCard = currentCard + 1;
        } else if (direction === 'prev' && currentCard > 1) {
            currentElement.classList.add('hide-right');
            currentCard = currentCard - 1;
        }

        var nextElement = document.getElementById('card' + currentCard);
        nextElement.classList.remove('hide-left', 'hide-right');
        setTimeout(function() {
            nextElement.classList.add('show');
        }, 50);

        updatePaginationButtons();
    }

    function updatePaginationButtons() {
        var prevButton = document.querySelector('.pagination .page-item:first-child');
        var nextButton = document.querySelector('.pagination .page-item:last-child');
        var currentPage = document.getElementById('currentPage');

        // Enable both buttons by default
        prevButton.classList.remove('disabled');
        nextButton.classList.remove('disabled');

        // Disable prev button if currentCard is 1
        if (currentCard === 1) {
            prevButton.classList.add('disabled');
        }

        // Disable next button if currentCard is the last card
        if (currentCard === totalCards) {
            nextButton.classList.add('disabled');
        }

        // Update current page number and styling
        currentPage.textContent = currentCard;
        currentPage.classList.add('btn', 'btn-primary', 'disabled');
    }

    // Initialize buttons state on page load
    updatePaginationButtons();
</script>