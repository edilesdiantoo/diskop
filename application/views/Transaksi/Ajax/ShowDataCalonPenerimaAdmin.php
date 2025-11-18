<div class="table-responsive">
    <table id="" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Urut</th>
                <th>nama</th>
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
        <tbody>
            <?php $no = 1;
            $level_user = $this->session->userdata('level_user');

            foreach ($resultDataPenerimaAdmin as $key) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $key->no_urut ?></td>
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
                            echo '<a href="https://maps.google.com/?q=' . $key->titik_koordinat . '">Lokasi Map</a>';
                        } else {
                            echo "Tidak Ada";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($key->aksi_akhir == 1) {
                            echo "Calon Penerima <br>";
                        }

                        ?>
                    </td>

                    <td style="text-align: center;">
                        <?php if ($key->aksi_akhir == 1 && $level_user == 1 || $level_user == 3) { ?>
                            <a href="<?= base_url('VerifikasiController/VerifikasiAkhir/' . $key->id_pelaku_usaha) ?>" type="button" class="btn btn-outline-warning btn-xs">Detail</a><br>
                            <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/' . $key->id_pelaku_usaha . '/' . '1') ?>" type="button" class="btn btn-outline-success mt-1 btn-xs">Setuju</a><br>
                            <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/' . $key->id_pelaku_usaha . '/' . '0') ?>" type="button" class="btn btn-outline-danger mt-1 btn-xs">Tolak</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>