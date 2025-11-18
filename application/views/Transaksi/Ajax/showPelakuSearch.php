<?php $no = 1;
$level_user = $this->session->userdata('level_user');

foreach ($getDataPelakUsaha as $key) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $key->no_urut ?></td>
        <td><?= $key->nama_lengkap ?></td>
        <td><?= $key->hp ?></td>
        <td><?= $key->nama_usaha ?></td>
        <td><?= $key->jenis_usaha ?></td>
        <td>
            <?php if ($key->titik_koordinat) {
                echo '<a target="_blank" href="https://maps.google.com/?q=' . $key->titik_koordinat . '">Lokasi Map</a>';
            } else {
                echo "Tidak Ada";
            }
            ?>

        </td>
        <td>
            <?php
            if ($key->aksi == null) {
                echo "Belum di Verifikasi <br>";
            } else if ($key->aksi == 0) {
                echo "Ditolak Kab <br>";
            } else if ($key->aksi == 1 && $key->aksi_akhir == 0) {
                echo "Setuju Kab <br>";
            } else if ($key->aksi_akhir == 1) {
                echo "<p style='color: red;'>Penerima Bantuan <br>";
            }

            ?>
        </td>

        <td style="text-align: center;">
            <?php
            if ($key->aksi == 1 && $level_user == 1 || $level_user == 3) { ?>
                <a href="<?= base_url('VerifikasiController/VerifikasiAkhir/' . $key->id_pelaku_usaha) ?>" type="button" class="btn btn-outline-warning">Detail</a><br>
                <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/' . $key->id_pelaku_usaha . '/' . '1') ?>" type="button" class="btn btn-outline-success mt-1">Setuju</a><br>
                <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/' . $key->id_pelaku_usaha . '/' . '0') ?>" type="button" class="btn btn-outline-danger mt-1">Tolak</a>
            <?php } else { ?>
                <?php
                $uri = $this->uri->segment('1');
                $uri2 = $this->uri->segment('2');
                ?>
                <?php if ($key->aksi_akhir != 1) { ?>
                    ddd
                    <a href="<?= base_url('VerifikasiController/CekDataPelakuUsaha/' . $key->id_pelaku_usaha . '/' . $uri . '/' . $uri2) ?>" type="button" class="btn btn-outline-info btn-xs"> Prosses Verifikasi</a>
                <?php } ?>
            <?php } ?>
        </td>
    </tr>
<?php } ?>