<?php if ($jenis_bantuan == '1') { // --- TABEL BANTUAN GEROBAK ---?>
    <thead>
        <tr>
            <th>No</th>
            <th>Rekomendasi</th>
            <th>Jumlah Aspirasi</th>
            <th>Gerobak Makanan</th>
            <th>Gerobak Bakso</th>
            <th>Gerobak Minuman</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
    foreach ($getByYearsKab as $key) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $key->rekomendasi_dari ?></td>
                <td><?= $key->total_pelaku_usaha ?></td>
                <td><?= $key->gerobak_makanan ?></td>
                <td><?= $key->gerobak_bakso ?></td>
                <td><?= $key->gerobak_minuman ?></td>
            </tr>
            <input type="hidden" class="kec" value="<?= $key->total_pelaku_usaha ?>">
            <input type="hidden" class="gerobak_makanan" value="<?= $key->gerobak_makanan ?>">
            <input type="hidden" class="gerobak_bakso" value="<?= $key->gerobak_bakso ?>">
            <input type="hidden" class="gerobak_minuman" value="<?= $key->gerobak_minuman ?>">
        <?php } ?>
        <tr>
            <th style="text-align: right;" colspan="2">Total</th>
            <th id="sumKec"></th>
            <th id="gerobak_makanan"></th>
            <th id="gerobak_bakso"></th>
            <th id="gerobak_minuman"></th>
        </tr>
    </tbody>

<?php } elseif ($tahun == 2023) { // --- TABEL BANTUAN MODAL 2023 ---?>
    <thead>
        <tr>
            <th>No</th>
            <th>Rekomendasi</th>
            <th>Jumlah Aspirasi</th>
            <th>Milenial 20JT</th>
            <th>Milenial 10JT</th>
            <th>MAK-MAK 10JT</th>
            <th>MAK-MAK 5JT</th>
            <th>WP 10JT</th>
            <th>WP 5JT</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
    foreach ($getByYearsKab as $key) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $key->rekomendasi_dari ?></td>
                <td><?= $key->total_pelaku_usaha ?></td>
                <td><?= $key->mil_20 ?></td>
                <td><?= $key->mil_10 ?></td>
                <td><?= $key->mak_10 ?></td>
                <td><?= $key->mak_5 ?></td>
                <td><?= $key->wp_10 ?></td>
                <td><?= $key->wp_5 ?></td>
            </tr>
            <input type="hidden" class="kec" value="<?= $key->total_pelaku_usaha ?>">
            <input type="hidden" class="mil_20" value="<?= $key->mil_20 ?>">
            <input type="hidden" class="mil_10" value="<?= $key->mil_10 ?>">
            <input type="hidden" class="mak_10" value="<?= $key->mak_10 ?>">
            <input type="hidden" class="mak_5" value="<?= $key->mak_5 ?>">
            <input type="hidden" class="wp_10" value="<?= $key->wp_10 ?>">
            <input type="hidden" class="wp_5" value="<?= $key->wp_5 ?>">
        <?php } ?>
        <tr>
            <th style="text-align: right;" colspan="2">Total</th>
            <th id="sumKec"></th>
            <th id="mil_20"></th>
            <th id="mil_10"></th>
            <th id="mak_10"></th>
            <th id="mak_5"></th>
            <th id="wp_10"></th>
            <th id="wp_5"></th>
        </tr>
    </tbody>

<?php } else { // --- TABEL BANTUAN MODAL 2024 KE ATAS ---?>
    <thead>
        <tr>
            <th>No</th>
            <th>Rekomendasi</th>
            <th>Jumlah Aspirasi</th>
            <th>Milenial 5JT</th>
            <th>MAK-MAK 5JT</th>
            <th>WP 5JT</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
    foreach ($getByYearsKab as $key) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $key->rekomendasi_dari ?></td>
                <td><?= $key->total_pelaku_usaha ?></td>
                <td><?= $key->mil_5 ?></td>
                <td><?= $key->mak_5 ?></td>
                <td><?= $key->wp_5 ?></td>
            </tr>
            <input type="hidden" class="kec" value="<?= $key->total_pelaku_usaha ?>">
            <input type="hidden" class="mil_5" value="<?= $key->mil_5 ?>">
            <input type="hidden" class="mak_5" value="<?= $key->mak_5 ?>">
            <input type="hidden" class="wp_5" value="<?= $key->wp_5 ?>">
        <?php } ?>
        <tr>
            <th style="text-align: right;" colspan="2">Total</th>
            <th id="sumKec"></th>
            <th id="mil_5"></th>
            <th id="mak_5"></th>
            <th id="wp_5"></th>
        </tr>
    </tbody>
<?php } ?>

<!-- FOOTER TOTAL ASPIRASI (Berlaku untuk semua jenis tabel) -->
<tfoot>
    <tr>
        <th colspan="10" style="text-align: right; background-color: #DCDCDC;">Total Aspirasi : <span id="totCalonPenrima"></span></th>
    </tr>
</tfoot>

<!-- JAVASCRIPT GLOBAL (Hanya perlu ditulis 1 kali di bawah) -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Fungsi helper yang menyederhanakan perhitungan total per kolom
        function calculateSum(className, targetElement) {
            var total = 0;
            document.querySelectorAll(className).forEach(function(el) {
                total += Number(el.value);
            });
            if (document.getElementById(targetElement)) {
                document.getElementById(targetElement).innerHTML = total;
            }
            return total;
        }

        // Hitung total aspirasi per kecamatan/rekomendasi
        calculateSum('.kec', 'sumKec');

        var totalAspirasi = 0;

        // Deteksi secara otomatis class mana yang ada di tabel, lalu jumlahkan
        if (document.querySelector('.mil_20')) totalAspirasi += calculateSum('.mil_20', 'mil_20');
        if (document.querySelector('.mil_10')) totalAspirasi += calculateSum('.mil_10', 'mil_10');
        if (document.querySelector('.mak_10')) totalAspirasi += calculateSum('.mak_10', 'mak_10');
        if (document.querySelector('.wp_10')) totalAspirasi += calculateSum('.wp_10', 'wp_10');
        
        if (document.querySelector('.mil_5')) totalAspirasi += calculateSum('.mil_5', 'mil_5');
        if (document.querySelector('.mak_5')) totalAspirasi += calculateSum('.mak_5', 'mak_5');
        if (document.querySelector('.wp_5')) totalAspirasi += calculateSum('.wp_5', 'wp_5');

        if (document.querySelector('.gerobak_makanan')) totalAspirasi += calculateSum('.gerobak_makanan', 'gerobak_makanan');
        if (document.querySelector('.gerobak_bakso')) totalAspirasi += calculateSum('.gerobak_bakso', 'gerobak_bakso');
        if (document.querySelector('.gerobak_minuman')) totalAspirasi += calculateSum('.gerobak_minuman', 'gerobak_minuman');

        // Cetak Grand Total ke elemen tfoot
        document.getElementById('totCalonPenrima').innerHTML = totalAspirasi;
    });
</script>