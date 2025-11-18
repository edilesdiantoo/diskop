<select class="form-select" name="kec" id="kec" required>
    <option value="">-Kecamatan-</option>
    <?php foreach ($getKec as $key) {
        echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
    } ?>
</select>