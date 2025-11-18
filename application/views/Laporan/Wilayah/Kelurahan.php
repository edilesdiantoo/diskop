<option value="">Pilih KEL.</option>
<?php foreach ($getKel as $key) {
    echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
} ?>