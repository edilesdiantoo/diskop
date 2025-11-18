<?php foreach ($getKec as $key) {
    if ($getPegawaiEdit->kec == $key->id) {
        echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
    } else {
        echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
    }
}
