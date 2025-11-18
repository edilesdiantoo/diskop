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
?>
<html>

<head>

<body>
	<div><img src="picture/banner-edi10.png" style="width: 100%; height: auto;" alt=""></div>
	<div style="position: absolute; top: 68%; left: 55%; transform: translate(-50%, -50%);">
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
	<div class="pt-5" style="text-align: center;">
		<h2 style="font-weight: 900; -webkit-text-stroke: 15px black;">SEGERA ANTARKAN BUKTI TERDAFTAR + PROPOSAL LENGKAP KE DINAS KOPERASI YANG MEMBINDANGI KOPERASI & UMKM WILAYAH USAHA ANDA</h2>
	</div>
</body>


</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// $dompdf->setPaper(array(0, 0, 420, 595));
// Render the HTML as PDF
$dompdf->render();


// $canvas = $dompdf->getCanvas();
// Instantiate font metrics class 
// $fontMetrics = new FontMetrics($canvas, $options);
// Get height and width of page 
// $w = $canvas->get_width();
// $h = $canvas->get_height();
// Get font family file 
// $font = $fontMetrics->getFont('arial');
// Specify watermark text 
// if ($sti->status == "setuju") {
//     $text = "";
// } else {
//     $text = "BELUM DI VERIFIKASI";
// }
// Get height and width of text 
// $txtHeight = $fontMetrics->getFontHeight($font, 50);
// $textWidth = $fontMetrics->getTextWidth($text, $font, 50);
// Set text opacity 
// $canvas->set_opacity(.1,  "Multiply");
// $canvas->page_script('$pdf->set_opacity(.2, "Multiply");');
// Specify horizontal and vertical position 
// $x = (($w - $textWidth) / 2);
// $y = (($h - $txtHeight) / 2);
// Writes text at the specified x and y coordinates 
// $canvas->page_text($x + 25, $y + 150, $text, $font, 50,  $color = array(0, 0, 0), $wordSpace = 2, $charSpace = 2, $angle = -30);
$dompdf->stream("Bukti-pengajuan.pdf", array("Attachment" => false));
?>