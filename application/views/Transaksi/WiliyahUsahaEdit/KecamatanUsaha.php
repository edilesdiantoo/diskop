<select class="form-select" name="kec_usaha" id="kec_usaha" required>
    <option value="">-Kecamatan-</option>
    <?php foreach ($getKec as $key) {
        if ($getPelakuUsahaEditWilayahUsaha->kec_usaha == $key->id) {
            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
        } else {
            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
        }
    } ?>
</select>