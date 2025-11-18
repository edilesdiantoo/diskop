<select class="form-select" name="kab_usaha" id="kab_usaha" required>
    <option value="">-Kabupaten-</option>
    <?php foreach ($getKab as $key) {
        if ($getPelakuUsahaEditWilayahUsaha->kab_usaha == $key->id) {
            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
        } else {
            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
        }
    } ?>
</select>