<div class="table-responsive">
    <table id="" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Urut</th>
                <th>Rekomendasi</th>
                <th>Nama</th>
                <th>KK</th>
                <!-- <th>Jenis Kelamin</th> -->
                <!-- <th>Alamat Identitas</th> -->
                <th>No.Hp</th>
                <th>Nama Usaha</th>
                <!-- <th>NIB/SKU/IUMK</th> -->
                <!-- <th>Alamat Usaha</th> -->
                <!-- <th>Sektor Usaha</th> -->
                <th>Jenis Usaha</th>
                <th>Titik Koordinat</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="">
            <?php $no = 1;
            $level_user = $this->session->userdata('level_user');

            foreach ($getDataPelakUsaha as $key) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $key->no_urut ?></td>
                    <td><?= $key->rekomendasi_dari ?></td>
                    <?php if ($key->kk3 || $key->kk2) { ?>
                        <td style="text-decoration: line-through; color: red;">
                            <?= $key->nama_lengkap ?>
                        </td>
                    <?php } else { ?>
                        <td>
                            <?= $key->nama_lengkap ?>
                        </td>
                    <?php } ?>
                    <td><?= $key->kk ?></td>
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
                            echo "Calon Penerima <br>";
                        }

                        ?>
                    </td>

                    <td style="text-align: center;">
                        <?php
                        if ($key->aksi == 1 && $level_user == 1 || $level_user == 3) { ?>
                            <a href="<?= base_url('VerifikasiController/VerifikasiAkhir/' . $key->id_pelaku_usaha) ?>" type="button" class="btn btn-outline-warning">Detail</a><br>
                            <!-- <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/' . $key->id_pelaku_usaha . '/' . '1') ?>" type="button" class="btn btn-outline-success mt-1">Setuju</a><br> -->
                            <!-- <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/' . $key->id_pelaku_usaha . '/' . '0') ?>" type="button" class="btn btn-outline-danger mt-1">Tolak</a> -->
                        <?php } else { ?>
                            <!-- <a type="button">Maintenence</a> -->
                            <!-- <a href="<?= base_url('VerifikasiController/CekDataPelakuUsaha/' . $key->id_pelaku_usaha) ?>" type="button" class="btn btn-outline-info"> Prosses Verifikasi</a> -->
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>