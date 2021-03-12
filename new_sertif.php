<?php
require_once __DIR__ . '/vendor/autoload.php';

use Fpdf\Fpdf;

function dbConnect()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'gkm';
    $connect = mysqli_connect($host, $user, $pass, $db);

    if (!$connect) {
        die('Ngga konek');
    }

    return $connect;
}


function generate($data)
{
    $seri = $_GET['no'];
    if ($seri > 9) {
        $seri = '0' . $_GET['no'];
    } else {
        $seri = '00' . $_GET['no'];
    }
    $noSertifikat = "/SERT-FIK/AMIKOM/I/2020";
    $page = new FPDF();
    $pageHalfWidth = ($page->GetPageWidth() / 2);


    foreach ($data as $peserta) {
        // Link
        $link = $seri . '-2020';

        $qr = "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chld=H|0&chl=" . $link;
        $page->AddPage();

        // Set background
        $page->Image('./asset/bg.png', 0, 0, -300);
        $page->SetFont('Times');




        // $page->Cell(0, 8, 'NIK : ' . $peserta[2], 0, 2, 'C');
        // Juara dan Kategori

        $page->SetXY(-$pageHalfWidth, -92);
        $page->MultiCell($pageHalfWidth, 8, "Yogyakarta, 21 November 2020\nDekan Fakultas Ekonomi dan Sosial\nUNIVERSITAS AMIKOM YOGYAKARTA", 0, 'C');

        $page->Ln(15);
        $page->SetX(-$pageHalfWidth);
        $page->SetFont('', 'BU', 12);
        $page->Cell($pageHalfWidth, 17, "Emha Taufiq Luthfi, S.T,. M.Kom", 0, 3, 'C');
        $page->SetFont('', '', 12);
        $page->Cell($pageHalfWidth, -5, "NIK. 190302125", 0, 3, 'C');
        $page->SetY($page->GetPageHeight() - 50);




        // Increment 
        ++$seri;
    }

    $page->output();
}


function getCertificateData($db, $id = -1)
{
    $data = [];
    $sql = "SELECT no, nama, nik, kategori FROM panitiadosen";

    if ($id != -1) {
        $nomor = intval($id);
        $sql .= " WHERE no = $nomor";
    }

    $query = mysqli_query($db, $sql);

    while ($r = mysqli_fetch_array($query)) {
        array_push($data, $r);
    }

    return $data;
}

// Cek parameter "no=xx"
if (isset($_GET['no'])) {
    $peserta = getCertificateData(dbConnect(), $_GET['no']);
    generate($peserta);
} else {
    die("Harus masukin Nomor Sertifikat (?no=XX)");
}
