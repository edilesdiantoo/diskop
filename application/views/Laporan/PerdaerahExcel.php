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
    header("Content-Disposition: attachment; filename=Data Pegawai.xls");
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

    <body>
        <div><u>DAFTAR
                <?php if ($status == 2) {
                    echo 'PENERIMA';
                } else {
                    echo 'TIDAK MENERIMA';
                } ?>

                BANTUAN MODAL KERJA BAGI USAHA MIKRO, KECIL, DAN MENENGAH KABUPATEN / KOTA SE-PROVINSI JAMBI TAHUN <?= $tahunPengajuan ?></u></div><br>

        <table border="1">
            <thead>
                <tr>
                    <th class="text-center" width="" rowspan="2">No`</th>
                    <th class="text-center" width="" rowspan="2">NIK</th>
                    <th class="text-center" width="" rowspan="2">NO. KK</th>
                    <th class="text-center" width="" rowspan="2">NAMA <br> SESUAI KTP</th>
                    <th class="text-center" width="" rowspan="2">TGL LAHIR</th>
                    <th class="text-center" width="" rowspan="2">UMUR</th>
                    <th class="text-center" width="" rowspan="2">JENIS KELAMIN</th>
                    <th class="text-center" width="" colspan="4">ALAMAT SESUAI KTP</th>
                    <th class="text-center" width="" colspan="4">DOMISILI USAHA</th>
                    <th class="text-center" width="" rowspan="2">ALAMAT USAHA</th>
                    <th class="text-center" width="" rowspan="2">SEKTOR USAHA</th>
                    <th class="text-center" width="" rowspan="2">JENIS USAHA</th>
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
                    <!-- USAHA -->
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
                        <td class="num">'<?= $key->nik ?></td>
                        <td class="num">'<?= $key->kk ?></td>
                        <td><?= strtoupper($key->nama_lengkap) ?></td>
                        <td><?= date('Y-m-d', strtotime($key->tgl_lahir)) ?></td>
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
                        <td><?= $key->name_usaha_prov ?></td>
                        <td><?= $key->name_usaha_kab ?></td>
                        <td><?= $key->name_usaha_kec ?></td>
                        <td><?= $key->name_usaha_kel ?></td>

                        <td><?= $key->alamat_usaha ?></td>
                        <td><?= $key->sektor_name ?></td>
                        <td><?= $key->jenis_usaha ?></td>
                        <td>'<?= $key->nib_sku_iumk ?></td>
                        <td class="num">'<?= $key->hp ?></td>
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