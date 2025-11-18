<select class="form-select" name="kec_usaha" id="kec_usaha" required>
    <option value="">-Kecamatan-</option>
    <?php foreach ($getKec as $key) {
        echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
    } ?>
</select>