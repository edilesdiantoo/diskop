<?php $No = 1;
foreach ($getPegawai as $key) { ?>
    <tr>
        <td><?= $No++; ?></td>
        <td><?= $key->nama ?></td>
        <td><?= $key->jk = (1) ? 'Laki-laki' : 'Perempuan'; ?></td>
        <td class="">
            <a type="button" data-prov="<?= $key->prov_name; ?>" data-kab="<?= $key->kab_name; ?>" data-kec="<?= $key->kec_name; ?>" data-kel="<?= $key->kel_name; ?>" data-alamat="<?= $key->alamat; ?>" data-toggle="modal" data-target=".bd-example-modal-lg-show" title="Show Domisili"><i class="mdi mdi-eye"></i></a>
        </td>
        <td><?= $key->nip ?></td>
        <td>
            <a type="button" data-toggle="modal" data-id="<?= $key->id_pegawai; ?>" data-target=".bd-example-modal-lg-edit"><i class="mdi mdi-pencil"></i></a>
            <a type="button" id="<?= $key->id_pegawai ?>" onclick="HapusPegawai(this.id)"><i class="mdi mdi-delete"></i></a>
        </td>
    </tr>
<?php } ?>