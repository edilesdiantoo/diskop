<select class="form-select" name="kel_usaha" id="kel_usaha" required>
    <option value="">-Kelurahan-</option>
    <?php foreach ($getKel as $key) {
        echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
    } ?>
</select>