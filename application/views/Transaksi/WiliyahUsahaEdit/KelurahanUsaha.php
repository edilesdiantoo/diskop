<select class="form-select" name="kel_usaha" id="kel_usaha" required>
    <option value="">-Kelurahan-</option>
    <?php foreach ($getKel as $key) {
        if ($getPelakuUsahaEditWilayahUsaha->kel_usaha == $key->id) {
            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
        } else {
            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
        }
    } ?>
</select>