<?php

require_once '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
    include_once "../../config/koneksi.php";
    include_once "../../config/konversi.php";
    include '../res/kartu_anggota/NamaAnggota.php';
    $content = ob_get_clean();

    $customSize = array(105, 73);
    $html2pdf = new Html2Pdf('L', $customSize, 'en');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output('KartuAnggotaPerpustakaan.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
