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

        // Nomor Seri Kiri Atas
        $page->SetXY(5, 15);
        $page->Cell(10, 10, $seri . "-2020");
        $page->Ln(65);
        $page->SetFont('', 'B', 12);
        // Nomor
        $page->Cell(0, 8, "No: " . $seri . $noSertifikat, 0, 2, 'C');
        $page->SetFont('', '', 12);
        $page->Ln(5);
        // Diberikan Kepada
        $page->Cell(0, 5, 'Diberikan Kepada :', 0, 2, 'C');
        // Nama
        $page->SetFont('', 'B', 16);
        $page->Ln(5);
        $page->Cell(0, 10, strtoupper($peserta[1]), 0, 2, 'C');
        $page->SetFont('', '', 12);
        // $page->Cell(0, 8, 'NIK : ' . $peserta[2], 0, 2, 'C');
        // Juara dan Kategori
        $page->Ln(3);
        $page->Cell(0, 8, 'Atas partisipasinya sebagai', 0, 2, 'C');
        $page->SetFont('', 'B', 12);
        $page->Ln(5);
        $page->Cell(0, 8, 'JURI', 0, 2, 'C');
        $page->Cell(0, 8, strtoupper($peserta[3]), 0, 2, 'C');

        // kegiatan
        $page->SetFont('', '', 12);
        $page->Ln(5);
        $page->Cell(0, 8, 'Dalam Kegiatan', 0, 2, 'C');
        $page->SetFont('', 'B', 12);
        $page->Cell(0, 8, 'Gelar Karya Mahasiswa (GKM) 2020', 0, 2, 'C');
        $page->SetFont('', '', 12);
        $page->Cell(0, 8, 'Fakultas Ilmu Komputer', 0, 2, 'C');
        $page->Cell(0, 8, 'Universitas Amikom Yogyakarta', 0, 2, 'C');
        $page->Cell(0, 8, 'pada tanggal 2 s.d 11 Januari 2020', 0, 2, 'C');
        // TTD
        $page->Ln(15);
        $page->SetX(0);
        $page->Image('./asset/ilkom.jpg', 7, 202, -400);
        $page->MultiCell($pageHalfWidth, 8, "Mengetahui,\nDekan Fakultas Ilmu Komputer\nUNIVERSITAS AMIKOM YOGYAKARTA", 0, 'C');
        $page->SetX(0);
        $page->SetXY(0, -48);
        $page->SetFont('', 'BU', 12);
        $page->Cell($pageHalfWidth, 8, "Krisnawati, S.Si., M.T", 0, 3, 'C');
        $page->SetFont('', '', 12);
        $page->Cell($pageHalfWidth, 4, "NIK. 190302038", 0, 3, 'C');
        $page->SetXY(-$pageHalfWidth, -92);
        $page->Image('./asset/gkm.jpg', 130, 215, -600);
        $page->MultiCell($pageHalfWidth, 8, "Yogyakarta, 11 Januari 2020\nKetua GKM 2020\nUNIVERSITAS AMIKOM YOGYAKARTA", 0, 'C');
        $page->Ln(15);
        $page->SetX(-$pageHalfWidth);
        $page->SetFont('', 'BU', 12);
        $page->Cell($pageHalfWidth, 17, "Agus Purwanto, M.Kom", 0, 3, 'C');
        $page->SetFont('', '', 12);
        $page->Cell($pageHalfWidth, -5, "NIK. 190302229", 0, 3, 'C');
        $page->SetY($page->GetPageHeight() - 50);
        $page->Image($qr, $pageHalfWidth - 12, null, 25, 25, 'PNG');



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
