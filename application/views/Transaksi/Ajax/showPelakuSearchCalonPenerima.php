<?php $no = 1;
$level_user = $this->session->userdata('level_user');

foreach ($showCalonPenerimaSearch as $key) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $key->no_urut ?></td>
        <td><?= $key->nama_lengkap ?></td>
        <td><?= $key->hp ?></td>
        <td><?= $key->nama_usaha ?></td>
        <td><?= $key->jenis_usaha ?></td>
        <td>
            <?php if ($key->titik_koordinat) {
                echo '<a href="https://maps.google.com/?q=' . $key->titik_koordinat . '">Lokasi Map</a>';
            } else {
                echo "Tidak Ada";
            }
            ?>
        </td>
        <td></td>
        <td>
            <?php
            if ($key->aksi_akhir == 1) {
                echo "Calon Penerima <br>";
            }

            ?>
        </td>

        <td style="text-align: center;">
            <?php if ($key->aksi_akhir == 1 && $level_user == 1 || $level_user == 3) {
                if ($key->aksi_akhir != 1) { ?>
                    <a href="<?= base_url('VerifikasiController/VerifikasiAkhir/' . $key->id_pelaku_usaha) ?>" type="button" class="btn btn-outline-warning btn-xs">Detail</a><br>
                    <!-- <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/' . $key->id_pelaku_usaha . '/' . '1') ?>" type="button" class="btn btn-outline-success mt-1 btn-xs">Setuju</a><br> -->
                    <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/' . $key->id_pelaku_usaha . '/' . '0') ?>" type="button" class="btn btn-outline-danger mt-1 btn-xs">Tolak</a>
            <?php }
            } ?>
        </td>
    </tr>
<?php } ?>