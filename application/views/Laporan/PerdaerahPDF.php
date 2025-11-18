<?php
require 'dompdf5/autoload.inc.php';
ob_start();

use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\FontMetrics;

$options = new Options();
$options->set('isPhpEnabled', 'true');
$dompdf = new Dompdf($options);
define("DOMPDF_FONT_HEIGHT_RATIO", 0.75);
// ini_set('memory_limit', '55M');
ini_set("memory_limit", "800M");
ini_set("max_execution_time", "800");
?>
<html>

<head>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <style type="text/css">
        body {
            margin-left: 5px;
            margin-right: 5px;
        }

        .f-8 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8px;
            text-align: justify;
        }

        .f-9 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 9px;
            text-align: justify;
        }

        .f-10 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            text-align: justify;
        }

        .f-9 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            text-align: justify;
        }

        .f-12 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            text-align: justify;
        }

        .f-13 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            text-align: justify;
        }

        .f-14 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            text-align: justify;
        }

        .f-15 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            text-align: justify;
        }

        .f-16 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            text-align: justify;
        }

        hr {
            border: none;
            height: 1px;
            /* Set the hr color */
            color: #333;
            /* old IE */
            background-color: #333;
            /* Modern Browsers */
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .text-center {
            text-align: center;
        }

        .lh-15 {
            line-height: 15px;
        }

        .page_break {
            page-break-before: always;
        }

        p {
            margin: 0;
            padding: 0;
        }

        ol,
        li {
            padding-inline-start: 0;
            margin-inline-start: 0;
            margin-block-start: 0;
            margin-block-end: 0;
            margin: 0 0 0 14;
            padding: 0;
        }
    </style>
</head>
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function bulan_indo($bulan)
{
    if ($bulan == 01) {
        return 'Januari';
    } else if ($bulan == '02') {
        return 'Februari';
    } else if ($bulan == '03') {
        return 'Maret';
    } else if ($bulan == '04') {
        return 'April';
    } else if ($bulan == '05') {
        return 'Mei';
    } else if ($bulan == '06') {
        return 'Juni';
    } else if ($bulan == '07') {
        return 'Juli';
    } else if ($bulan == '08') {
        return 'Agustus';
    } else if ($bulan == '09') {
        return 'September';
    } else if ($bulan == '10') {
        return 'Oktober';
    } else if ($bulan == '11') {
        return 'November';
    } else if ($bulan == '12') {
        return 'Desember';
    }
}

function terbilang($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = "" . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = terbilang($nilai - 10) . " belas ";
    } else if ($nilai < 100) {
        $temp = terbilang($nilai / 10) . " puluh " . terbilang($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus " . terbilang($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = terbilang($nilai / 100) . " ratus " . terbilang($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . terbilang($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = terbilang($nilai / 1000) . " ribu " . terbilang($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = terbilang($nilai / 1000000) . " juta " . terbilang($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = terbilang($nilai / 1000000000) . " milyar " . terbilang(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = terbilang($nilai / 1000000000000) . " trilyun " . terbilang(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function hitung_umur($tanggal_lahir)
{
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) {
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    return $y . " tahun";
    // return $y . " tahun " . $m . " bulan " . $d . " hari";
}

?>

<?php
date_default_timezone_set("Asia/Jakarta");

// $no_lptp        = "LPTP - " . @$getDataLptpEdit[0]->id_sbp . " KBC.050202/" . date('Y', strtotime(@$getDataLptpEdit[0]->tgl_lptp));
// $no_surat_kppbc = 'PRIN - ' . @$getDataLptpEdit[0]->no_surat_k_kppbc . '/<br>' . ' KBC.050202/' . date('Y', strtotime(@$getDataLptpEdit[0]->tgl_no_surat_k_kppbc));
// $no_sbp         = 'SBP - ' . @$getDataLptpEdit[0]->id_sbp . '/' . ' KBC.050202/' . date('Y', strtotime(@$getDataLptpEdit[0]->tahun));

$daftar_hari = array(
    'Sunday'    => 'Minggu',
    'Monday'    => 'Senin',
    'Tuesday'   => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday'  => 'Kamis',
    'Friday'    => 'Jumat',
    'Saturday'  => 'Sabtu'
);
// $date     = @$getDataLptpEdit[0]->tgl_lptp;
// $namahari = date('l', strtotime($date));

?>

<body>

    <!-- <table style="width: 100%;" border="1">
        <tr>
            <td style="width: 5%;" style="vertical-align: top;">
            </td>
            <td style="width: 70%;">
                <div class="f-10">
                    <div style="">
                        <div style="text-align: left; font-weight: bold;" class="f-17">MESS JAMBI</div> -->
    <!-- <div style="text-align: center;font-weight: bold;" class="f-14 lh-15">DI JAKARTA</div> -->
    <!-- <div style="text-align: left;" class="f-9">
        Jalan Cidurian No. 15 - 17, Cikini - Jakarta Pusat 10330<br>
        Telp. : 021-31922405, 3922638 Fax. : 021-31935635<br>
    </div>
    </div>
    </div>
    </td>
    <td>&nbsp;</td>
    </tr>
    </table>
    <hr>
    <br> -->
    <div style="text-align: center; font-weight: bold;" class="f-13 lh-15"><u>DAFTAR CALON PENERIMA BANTUAN MODAL KERJA BAGI USAHA MIKRO, KECIL, DAN MENENGAH KABUPATEN / KOTA SE-PROVINSI JAMBI TAHUN <?= $tahunPengajuan ?></u></div><br>

    <table class="f-9" style="width: 100%; border-collapse: collapse;" border="1px">
        <thead class="mb-2">
            <tr>
                <th class="text-center" width="" rowspan="2">No`</th>
                <th class="text-center" width="" rowspan="2">NIK</th>
                <th class="text-center" width="" rowspan="2">NO. KK</th>
                <th class="text-center" width="" rowspan="2">NAMA <br> SESUAI KTP</th>
                <th class="text-center" width="" rowspan="2">TGL LAHIR</th>
                <th class="text-center" width="" rowspan="2">UMUR</th>
                <th class="text-center" width="" rowspan="2">JENIS KELAMIN</th>
                <th class="text-center" width="" colspan="4">ALAMAT SESUAI KTP</th>
                <th class="text-center" width="" rowspan="2">SEKTOR USAHA</th>
                <th class="text-center" width="" rowspan="2">JENIS USAHA</th>
                <th class="text-center" width="" rowspan="2">KAB/KOTA<br>USAHA</th>
                <th class="text-center" width="" rowspan="2">ALAMAT USAHA</th>
                <th class="text-center" width="" rowspan="2">NIB / SKU / IUMK</th>
                <th class="text-center" width="" rowspan="2">NO. TELP/HP</th>
                <th class="text-center" width="" rowspan="2">JENIS BANTUAN YANG DIAJUKAN</th>
                <th class="text-center" width="" rowspan="2">IBU KANDUNG</th>
                <th class="text-center" width="" rowspan="2">KETERANGAN</th>
            </tr>
            <tr>
                <th class="text-center">PROVINSI</th>
                <th class="text-center">KAB/KOTA</th>
                <th class="text-center">KECAMATAN</th>
                <th class="text-center">DESA/KEL/RW</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($getdataAdminKab as $key) { ?>
                <tr>
                    <td><?= $no++; ?> </td>
                    <td><?= $key->nik ?></td>
                    <td><?= $key->kk ?></td>
                    <td><?= strtoupper($key->nama_lengkap) ?></td>
                    <td><?= date('d-m-y', strtotime($key->tgl_lahir)) ?></td>
                    <td><?= hitung_umur($key->tgl_lahir); ?></td>

                    <td>
                        <?php
                        if ($key->jk == 1) {
                            echo "Laki-laki";
                        } else {
                            echo "Perempuan";
                        }
                        ?>
                    </td>
                    <td><?= $key->prov ?></td>
                    <td><?= $key->kab ?></td>
                    <td><?= $key->kec ?></td>
                    <td><?= $key->kel ?></td>
                    <td><?= $key->sektor_name ?></td>
                    <td><?= $key->jenis_usaha ?></td>
                    <td><?= $key->kab_usaha_name ?></td>
                    <td><?= $key->alamat_usaha ?></td>
                    <td><?= $key->nib_sku_iumk ?></td>
                    <td><?= $key->hp ?></td>
                    <td><?= $key->nama ?></td>
                    <td><?= strtoupper($key->nama_ibu) ?></td>
                    <td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <table class="f-9" style="width: 100%;" border="">
        <tbody>
            <tr>
                <td class="text-center" style="width: 20%;">
                    <div></div>
                    <div></div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div></div>
                </td>
                <td style="width: 20%;"></td>
                <td class="text-center" style="width: 40%;">
                    <div>&nbsp;</div>
                    <div></div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div></div>
                </td>
                <td class="text-left" style="width: 40%;">
                    <div>Jambi, <?= date('d-M-Y') ?></div>
                    <div>KEPALA DINAS</div>
                    <div>(KAB/KOTA YANG MEMBIDANGI KOPERASI)</div>
                    <div>cap & stempel</div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div>NAMA KEPALA DINAS</div>
                    <div>123</div>
                    <div>PEMBINA MADYA</div>
                </td>
            </tr>
        </tbody>
    </table>
</body>


</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A1', 'landscape');
// $dompdf->setPaper(array(0, 0, 1009, 612));
// Render the HTML as PDF
$dompdf->render();
$dompdf->stream("Laporan_sinetap.pdf", array("Attachment" => false));
?>