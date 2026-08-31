<?php
require 'dompdf5/autoload.inc.php';
ob_start();

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options;
$options->set('isPhpEnabled', 'true');
$dompdf = new Dompdf($options);
define('DOMPDF_FONT_HEIGHT_RATIO', 0.75);

// Menentukan teks jenis bantuan secara dinamis
$jenis_bantuan_val = $getPelakuUsahaData->jenis_bantuan ?? 0;
if ($jenis_bantuan_val == 1) {
    $teks_bantuan = 'BANTUAN GEROBAK BAGI UMKM';
} elseif ($jenis_bantuan_val == 2) {
    $teks_bantuan = 'BANTUAN GEROBAK LISTRIK BAGI UMKM';
} else {
    $teks_bantuan = 'BANTUAN MODAL KERJA BAGI UMKM';
}

// Menentukan tahun pendaftaran
$tahun_pendaftaran = date('Y', strtotime($getPelakuUsahaData->tgl_input ?? date('Y')));
?>
<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
	<!-- Teks Header Atas (Ekstra Tebal & Rapat) -->
<div style="position: absolute; top: 8px; left: 0px; width: 100%; text-align: center; z-index: 2;">
    <!-- SELAMAT Ekstra Gendut -->
    <div style="font-family: 'DejaVu Sans', Helvetica, Arial, sans-serif; font-size: 34px; font-weight: 900; color: #1c5236; -webkit-text-stroke: 2px #1c5236; letter-spacing: 1.5px; line-height: 0.9; margin: 0; padding: 0;">
        <b>SELAMAT</b>
    </div>
    
    <!-- Teks Penjelas Ekstra Tebal -->
    <div style="font-family: 'DejaVu Sans', Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 900; color: #1c5236; -webkit-text-stroke: 1.4px #1c5236; letter-spacing: 1px; line-height: 1; margin: 0; padding: 0;">
        <b>DATA ANDA SUDAH BERHASIL TERSIMPAN SEBAGAI</b>
    </div>
    <div style="font-family: 'DejaVu Sans', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 900; color: #002B66; -webkit-text-stroke: 1.5px #002B66; letter-spacing: 0.5px; line-height: 1; margin: 0; padding: 0;">
        <b><?= $status_judul ?></b>
    </div>
</div>

	
    <!-- Banner Gambar Background -->
    <div>
        <img src="picture/banner-edi12.png" style="width: 100%; height: auto;" alt="">
    </div>

    <!-- Tabel Data Calon Penerima -->
    <div style="position: absolute; top: 65%; left: 55%; transform: translate(-50%, -50%);">
        <table width="100%">
            <tr>
                <td class="td1">NOMOR URUT</td>
                <td class="td2">:</td>
                <td><?= $getPelakuUsahaData->no_urut ?></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td class="titik">:</td>
                <td><?= $getPelakuUsahaData->nama_lengkap ?></td>
            </tr>
            <tr>
                <td>KATEGORI</td>
                <td class="titik">:</td>
                <td><?= $getPelakuUsahaData->nama ?></td>
            </tr>
            <tr>
                <td>KABUPATEN</td>
                <td class="titik">:</td>
                <td><?= $getPelakuUsahaData->kab_usaha ?></td>
            </tr>
            <tr>
                <td>KECAMATAN</td>
                <td class="titik">:</td>
                <td><?= $getPelakuUsahaData->kec_usaha ?></td>
            </tr>
        </table>
    </div>

    <!-- Footer Peringatan Dinamis -->
    <div style="position: absolute; bottom: 130px; left: 0px; width: 100%; text-align: center; z-index: 2;">
        <h3 style="font-size: 16px; font-weight: 900; color: #000; margin: 0; padding: 0 50px; letter-spacing: 0.5px;">
            <?= $footer_pesan ?>
        </h3>
    </div>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

$dompdf->stream('Bukti-pengajuan.pdf', ['Attachment' => false]);
?>