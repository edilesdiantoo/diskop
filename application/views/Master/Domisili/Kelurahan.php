    <?php foreach ($getKel as $key) {
        if ($getPegawaiEdit->kel == $key->id) {
            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
        } else {
            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
        }
    } ?>