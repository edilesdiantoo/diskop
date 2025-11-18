<option value="">Pilih KEC.</option>
<?php foreach ($getKec as $key) {
    echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
}
