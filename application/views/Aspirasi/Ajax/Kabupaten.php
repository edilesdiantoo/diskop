<select class="form-select" name="kab" id="kab" required>
    <option value="">-Kabupaten-</option>
    <?php foreach ($getKab as $key) {
        echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
    } ?>
</select>