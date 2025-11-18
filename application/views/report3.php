<!DOCTYPE html>
<html>

<head>
    <base href="<?= base_url() ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukti Pengajuan</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        body {
            background: url('assets/images/diskop/banner-edi7.png') !important;
            background-repeat: no-repeat !important;
            background-size: 100% 100vh !important;
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
                        <td><?= $getPelakuUsahaData->kab ?></td>
                    </tr>
                    <tr>
                        <td>KECAMATAN</td>
                        <td class="titik">:</td>
                        <td><?= $getPelakuUsahaData->kec ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    window.print();
</script>