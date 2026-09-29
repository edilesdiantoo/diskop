<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Urut</th>
                <th>Rekomendasi</th>
                <th>Nama</th>
                <th>KK</th>
                <th>No.Hp</th>
                <th>Nama Usaha</th>
                <th>Jenis Usaha</th>
                <th>Titik Koordinat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $level_user = $this->session->userdata('level_user');
            $uri = $this->uri->segment('1');
            $uri2 = $this->uri->segment('2');
            
            // Perbaikan agar nomor urut lanjut di halaman berikutnya
            $no = isset($start) ? $start + 1 : 1; 
            ?>

            <?php foreach ($getDataPelakUsaha as $key) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $key->no_urut ?></td>
                <td><?= $key->rekomendasi_dari ?></td>

                <?php if ($key->kk3 || $key->kk2) : ?>
                <td style="text-decoration: line-through; color: red;">
                    <?= $key->nama_lengkap ?>
                </td>
                <?php else : ?>
                <td>
                    <?= $key->nama_lengkap ?>
                </td>
                <?php endif; ?>

                <td><?= $key->kk ?></td>
                <td><?= $key->hp ?></td>
                <td><?= $key->nama_usaha ?></td>
                <td><?= $key->jenis_usaha ?></td>

                <td>
                    <?php if ($key->titik_koordinat) : ?>
                    <a target="_blank" href="https://maps.google.com/?q=<?= $key->titik_koordinat ?>">Lokasi Map</a>
                    <?php else : ?>
                    Tidak Ada
                    <?php endif; ?>
                </td>

                <td style="text-align: center;">
                    <?php if (($key->aksi == 1 && $level_user == 1) || $level_user == 3) : ?>
                    <a href="<?= base_url('VerifikasiController/CekDataPelakuUsaha/'.$key->id_pelaku_usaha.'/'.$uri.'/'.$uri2) ?>" type="button" class="btn btn-outline-info btn-xs"> Edit</a>
                    <?php else : ?>
                    <?php if ($key->kk2) : ?>
                    <p style='color: red; margin: 0;'>Pernah Menerima Bantuan</p>
                    <?php else : ?>
                    <a href="<?= base_url('VerifikasiController/CekDataPelakuUsaha/'.$key->id_pelaku_usaha.'/'.$uri.'/'.$uri2) ?>" type="button" class="btn btn-outline-info btn-xs"> Edit</a>
                    <?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Bagian ini yang sebelumnya hilang, memunculkan pagination di bawah tabel -->
    <div class="mt-3">
        <?= isset($this->pagination) ? $this->pagination->create_links() : ''; ?>
    </div>
</div>