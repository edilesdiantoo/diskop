<form class="pt-5 pl-5 pr-5" id="upload_form_edit" method="post" enctype="multipart/form-data">
    <div class="col-12 mb-4">
        <h3 class="font-weight-bold">Form input data pegawai</h3>
        <h6 class="font-weight-normal mb-0">Isi dengan data yang benar sesuai form yang tertera dibawah ini</h6>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Informasi pribadi</h4>
                <div class="form-group">
                    <label for="exampleInputName1">Nama Lenkap</label>
                    <input type="text" name="nama" class="form-control" value="<?= $getPegawaiEdit->nama ?>">
                    <input type="hidden" name="id_pegawai" id="id_pegawai" class="form-control" value="<?= $getPegawaiEdit->id_pegawai ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">NIP</label>
                    <input type="text" name="nip" class="form-control" value="<?= $getPegawaiEdit->nip ?>">
                </div>
                <div class="form-group">
                    <label for="prov">Jabatan</label>
                    <select class="form-control" id="id_jabatan" name="id_jabatan">
                        <option value="">-Pilih-</option>
                        <?php foreach ($getJabatan as $key) {
                            if ($getPegawaiEdit->id_jabatan == $key->id_jabatan) {
                                echo "<option value='" . $key->id_jabatan . "' selected>" . $key->jabatan . "</option>";
                            } else {
                                echo "<option value='" . $key->id_jabatan . "'>" . $key->jabatan . "</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="prov">Level</label>
                    <select class="form-control" id="id_level_user" name="id_level_user">
                        <option value="">-Pilih-</option>
                        <?php foreach ($getLevelUser as $key) {
                            if ($getPegawaiEdit->level_user == $key->id_level_user) {
                                echo "<option value='" . $key->id_level_user . "' selected>" . $key->level . "</option>";
                            } else {
                                echo "<option value='" . $key->id_level_user . "'>" . $key->level . "</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Password</label>
                    <input type="password" name="password" id="password-edit" class="form-control">
                    <span id="password-error-edit" style="color: red; display: none;">Password harus mengandung huruf besar, huruf kecil, angka, dan simbol khusus.</span>
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Jenis Kelamin</label>
                    <select class="form-control" id="exampleSelectGender" name="jk">
                        <option value="1" <?php if ($getPegawaiEdit->jk == 1) {
                                                echo "selected";
                                            } ?>>Laki-laki</option>
                        <option value="0" <?php if ($getPegawaiEdit->jk == 0) {
                                                echo "selected";
                                            } ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Tangal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" value="<?= $getPegawaiEdit->tgl_lahir ?>">
                </div>
                <div class="form-group">
                    <label for="prov">Provinsi</label>
                    <select class="form-control" id="prov" name="prov">
                        <option value="">-Pilih-</option>
                        <?php

                        foreach ($getProv as $key) {
                            if ($getPegawaiEdit->prov == $key->id) {
                                echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                            } else {
                                echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="prov">Kabupaten</label>
                    <select class="form-control" id="kab" name="kab">
                        <option value="">-Pilih-</option>

                        <?php foreach ($getKab as $key) {
                            if ($getPegawaiEdit->kab == $key->id) {
                                echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                            } else {
                                echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="prov">Kecamatan</label>
                    <select class="form-control" id="kec" name="kec">
                        <option value="">-Pilih-</option>
                        <?php foreach ($getKec as $key) {
                            if ($getPegawaiEdit->kec == $key->id) {
                                echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                            } else {
                                echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="prov">Kelurahan</label>
                    <select class="form-control" id="kel" name="kel">
                        <option value="">-Pilih-</option>
                        <?php foreach ($getKel as $key) {
                            if ($getPegawaiEdit->kel == $key->id) {
                                echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                            } else {
                                echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Alamat</label>
                    <textarea class="form-control" rows="4" name="alamat"><?= $getPegawaiEdit->nama ?></textarea>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light" id="close" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- </div> -->

<div class="col-12 grid-margin stretch-card">
    <div class="card">
    </div>
</div>

<script src="<?= base_url(); ?>assets/js/file-upload.js"></script>

<script>
    $('#prov').change(function() {
        const prov = $("#prov").val();
        const id_pegawai = $("#id_pegawai").val();
        // alert(prov);
        $.ajax({
            url: '<?= site_url() ?>MasterController/getKab',
            type: 'POST',
            data: {
                prov: prov,
                id_pegawai: id_pegawai
            },
            success: function(data) {
                // console.log(data);
                $('#kab').html(data);
            }
        })
    });

    $('#kab').change(function() {
        const kab = $("#kab").val();
        const id_pegawai = $("#id_pegawai").val();
        // alert(kab);
        $.ajax({
            url: '<?= site_url() ?>MasterController/getKec',
            type: 'POST',
            data: {
                kab: kab,
                id_pegawai: id_pegawai
            },
            success: function(data) {
                // console.log(data);
                $('#kec').html(data);
            }
        })
    });

    $('#kec').change(function() {
        const kec = $("#kec").val();
        const id_pegawai = $("#id_pegawai").val();
        // alert(kab);
        $.ajax({
            url: '<?= site_url() ?>MasterController/getKel',
            type: 'POST',
            data: {
                kec: kec,
                id_pegawai: id_pegawai
            },
            success: function(data) {
                // console.log(data);
                $('#kel').html(data);
            }
        })
    });

    $(document).ready(function() {
        $('#upload_form_edit').on('submit', function(event) {
            event.preventDefault(); // Mencegah form submit biasa

//             // Ambil nilai password dari input
//             var password = document.getElementById("password-edit").value;
            
//             // Regex untuk validasi password
//             var passwordRegex = $$\text{/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d\mathbf{@$!\%*?&#}]\mathbf{\{8,\}}$$
// /}$$;

//             // Validasi password
//             if (!passwordRegex.test(password)) {
//                 // Menampilkan pesan error jika password tidak sesuai
//                 document.getElementById("password-error-edit").style.display = "block";
               
//                 return; // Hentikan proses lebih lanjut jika password tidak valid
//             } else {
//                 document.getElementById("password-error-edit").style.display = "none";
//             }

            // Jika password valid, lanjutkan dengan pengiriman data menggunakan AJAX
            $.ajax({
                url: "<?= site_url() ?>MasterController/SimpanPengawaiEdit", // URL ke controller PHP
                method: "POST",
                data: new FormData(this), // Mengirimkan data form
                dataType: 'JSON', // Mengharapkan data dalam format JSON
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data.true);
                    
                    // Cek apakah edit berhasil atau tidak
                    if (data == true) {
                        // Jika berhasil
                        Swal.fire({
                            title: 'DATA BERHASIL DIEDIT',
                            text: "Silahkan dicek kembali kelengkapan data anda.",
                            icon: "success",
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        }).then(function() {
                            $('#close').click();  // Menutup modal atau form
                            ShowPengawai(); // Menampilkan daftar pegawai setelah sukses
                        });
                    } else {
                        // Jika gagal
                        Swal.fire({
                            title: 'DATA GAGAL DIEDIT',
                            text: "Silahkan cek kembali kelengkapan data anda.",
                            icon: "error",
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        }).then(function() {
                            $('#close').click();  // Menutup modal atau form
                            ShowPengawai(); // Menampilkan daftar pegawai setelah gagal
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani jika terjadi error saat AJAX request
                    console.error("AJAX Error: " + error);
                    Swal.fire({
                        title: 'Terjadi Kesalahan',
                        text: 'Gagal menghubungi server, coba lagi.',
                        icon: 'error'
                    });
                }
            });
        });
    });
</script>