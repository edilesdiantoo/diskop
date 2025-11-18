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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukti Pengajuan</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        body {
            background: url(assets/images/banner-edi7.png);
            background-repeat: no-repeat;
            background-size: 100% 100vh;
            font-size: 1.5rem;
            color: #0a5c68;
            font-weight: bolder;
            font-family: 'Poppins', sans-serif;
        }

        .text {
            position: absolute;
            top: 29rem;
            left: 30vw;
        }

        .tabel {
            width: 100%;
            line-height: 26px;
        }

        .td1 {
            width: 50%;
        }

        .td2 {
            width: 15%;
        }
    </style>
</head>

<body>
    <div class="bg-one">
        <div style="position: relative;">
            <div class="text">
                <table class="tabel">
                    <tr>
                        <td class="td1">NOMOR URUT</td>
                        <td class="td2">:</td>
                        <td>001</td>
                    </tr>
                    <tr>
                        <td>NAMA</td>
                        <td class="titik">:</td>
                        <td>JHON DOE</td>
                    </tr>
                    <tr>
                        <td>KATEGORI</td>
                        <td class="titik">:</td>
                        <td>UNCATEGORIES</td>
                    </tr>
                    <tr>
                        <td>KABUPATEN</td>
                        <td class="titik">:</td>
                        <td>JAMBI</td>
                    </tr>
                    <tr>
                        <td>KECAMATAN</td>
                        <td class="titik">:</td>
                        <td>KOTA BARU</td>
                    </tr>
                </table>
            </div>
        </div>
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
$dompdf->stream("Laporan.pdf", array("Attachment" => false));
?>