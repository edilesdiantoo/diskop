
    <?php foreach ($getKab as $key) {
        if ($getPegawaiEdit->kab == $key->id) {
            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
        } else {
            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
        }
    } ?>