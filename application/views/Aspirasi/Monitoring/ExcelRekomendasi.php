<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        .num {
            mso-number-format: number;
        }

        .text {
            mso-number-format: "\@";
            /*force text*/
        }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data aspirasi.xls");
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
        return $y . " TAHUN";
        // return $y . " tahun " . $m . " bulan " . $d . " hari";
    }
    ?>

    <body>
        <div><u>DAFTAR CALON PENERIMA BANTUAN MODAL KERJA BAGI USAHA MIKRO, KECIL, DAN MENENGAH KABUPATEN / KOTA SE-PROVINSI JAMBI TAHUN 2025</u></div><br>

        <table border="1">
            <thead>
                <tr>
                    <th class="text-center" width="" rowspan="2">No`</th>
                    <th class="text-center" width="" rowspan="2">NIK</th>
                    <th class="text-center" width="" rowspan="2">NO. KK</th>
                    <th class="text-center" width="" rowspan="2">NAMA <br> SESUAI KTP</th>
                    <th class="text-center" width="" rowspan="2">REKOMENDASI DARI</th>
                    <th class="text-center" width="" rowspan="2">TGL LAHIR</th>
                    <th class="text-center" width="" rowspan="2">UMUR</th>
                    <th class="text-center" width="" rowspan="2">JENIS KELAMIN</th>
                    <th class="text-center" width="" colspan="4">ALAMAT SESUAI KTP</th>
                    <th class="text-center" width="" rowspan="2">SEKTOR USAHA</th>
                    <th class="text-center" width="" rowspan="2">JENIS USAHA</th>
                    <th class="text-center" width="" rowspan="2">KAB/KOTA<br>USAHA</th>
                    <th class="text-center" width="" rowspan="2">KEC<br>USAHA</th>
                    <th class="text-center" width="" rowspan="2">KEL<br>USAHA</th>
                    <th class="text-center" width="" rowspan="2">ALAMAT USAHA</th>
                    <th class="text-center" width="" rowspan="2">NIB / SKU / IUMK</th>
                    <th class="text-center" width="" rowspan="2">NO. TELP/HP</th>
                    <th class="text-center" width="" rowspan="2">JENIS BANTUAN YANG DIAJUKAN</th>
                    <th class="text-center" width="" rowspan="2">NAMA IBU</th>
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
                foreach ($getpdfRekomendasi as $key) { ?>
                    <?php if ($key->kk3 || $key->kk2) {
                        $penerima = 'style="background-color: red; text-decoration: line-through;"';
                    } else {
                        $penerima = '';
                    } ?>
                    <tr <?= $penerima ?>>
                        <td><?= $no++; ?> </td>
                        <td class="text"><?= $key->nik ?></td>
                        <td class="text"><?= $key->kk ?></td>
                        <?php if ($key->kk3 || $key->kk2) { ?>
                            <td>
                                <span style=""><?= strtoupper($key->nama_lengkap) ?></span>
                            </td>
                        <?php } else { ?>
                            <td>
                                <?= strtoupper($key->nama_lengkap) ?>
                            </td>
                        <?php } ?>
                        <td><?= strtoupper($key->rekomendasi_dari) ?></td>
                        <td><?= date('d-m-Y', strtotime($key->tgl_lahir)) ?></td>
                        <td>
                            <!-- <?= $key->tgl_lahir; ?> -->
                            <?php if (date('Y', strtotime($key->tgl_lahir)) == date('Y')) {
                                echo "-";
                            } else {
                                echo hitung_umur($key->tgl_lahir);
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($key->jk == 1) {
                                echo "LAKI-LAKI";
                            } else {
                                echo "PEREMPUAN";
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
                        <td><?= $key->kec_usaha_name ?></td>
                        <td><?= $key->kel_usaha_name ?></td>
                        <td><?= $key->alamat_usaha ?></td>
                        <td class="text"><?= $key->nib_sku_iumk ?></td>
                        <td class="text"><?= $key->hp ?></td>
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
        <table border="">
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
</body>