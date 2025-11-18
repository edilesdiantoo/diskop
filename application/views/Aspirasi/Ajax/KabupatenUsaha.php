<select class="form-select" name="kab_usaha" id="kab_usaha" required>
    <option value="">-Kabupaten-</option>
    <?php foreach ($getKab as $key) {
        echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
    } ?>
</select>