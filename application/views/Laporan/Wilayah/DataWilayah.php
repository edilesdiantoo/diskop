<?php
if (empty($getdataAdminKab)) {
    echo '<tr>
    <th colspan="10" class="text-center">Data Tidak Ditemukan</th>
    </tr>';
} else {

    $no = 1;
    foreach ($getdataAdminKab as $key) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $key->no_urut ?></td>
            <td><?= $key->nama_lengkap ?></td>
            <td><?php
                if ($key->jk == 1) {
                    echo "Laki-laki";
                } else {
                    echo "Perempuan";
                }

                ?>
            </td>
            <td><?= $key->hp ?>ddd</td>
            <td><?= $key->nama_usaha ?></td>
            <td><?= $key->nib_sku_iumk ?></td>

            <td><?= $key->sektor_name ?></td>
            <td><?= substr($key->jenis_usaha, 0, 50) ?> [...]</td>
            <td>
                <?php
                if ($key->aksi == null) {
                    echo '<button type="button" class="btn btn-outline-danger btn-xs">Tidak Memenuhi Syarat</button>';
                } else if ($key->aksi == 0) {
                    echo '<button type="button" class="btn btn-outline-danger btn-xs">Tidak Layak</button>';
                } else if ($key->aksi == 1 && $key->aksi_akhir == 0) {
                    echo '<button type="button" class="btn btn-outline-success btn-xs">Memenuhi Syarat</button>';
                } else if ($key->aksi_akhir == 1) {
                    echo '<button type="button" class="btn btn-outline-success btn-xs">Calon Penerima</button>';
                }

                ?>
            </td>
        </tr>
<?php }
} ?>