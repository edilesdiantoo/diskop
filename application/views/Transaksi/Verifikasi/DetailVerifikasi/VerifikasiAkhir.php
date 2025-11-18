<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    .inputfile {
        background-color: white;
        border: 0;
        width: 100%;
        border-radius: 1.5rem;
    }

    input[type=file]::-webkit-file-upload-button {
        background-color: #708090;
        border: 0;
        padding: 10px 20px 15px 20px;
        color: white;
        border-bottom-left-radius: 1.5rem;
        border-top-left-radius: 1.5rem;
    }

    .inputdua {
        background-color: white;
        border: 0;
        width: 100%;
        border-radius: 1.5rem;
    }
</style>
<form id="upload_form" method="post" enctype="multipart/form-data">
    <div class="row pt-5 pl-5 pr-5">
        <div class="col-12 mb-4">
            <h3 class="font-weight-bold">Form Check dan Edit Data Pelaku Usaha</h3>
            <h6 class="font-weight-normal mb-0">Silahkan cek data hardcopy pelaku usaha berdasarkan data yang ada diaplikasi dengan teliti kelengkapannya</h6>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informasi Data Pelaku Usaha</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Kategori Usaha</label>
                                <select class="form-select" id="get_kategori" name="id_kategori_dumisake" onchange="kategoriUsaha()">
                                    <option value="" style="">-Pilih Kategori-</option>
                                    <?php
                                    $kategories_dumisake  = $this->M_transaksi->kategories_dumisake()->result();
                                    foreach ($kategories_dumisake as $key => $value) {
                                        if ($cekDataVerifikasiPelakuUsaha->id_kategori_dumisake == $value->id_kategori_dumisake) {
                                            echo '<option value="' . $value->id_kategori_dumisake . '" selected>' . $value->nama . '</option>';
                                        } else {
                                            echo '<option value="' . $value->id_kategori_dumisake . '">' . $value->nama . '</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <script>
                            kategoriUsaha()

                            function kategoriUsaha() {
                                const id_kategori_dumisake = $("#get_kategori").val();
                                $.ajax({
                                    type: "post",
                                    url: "<?= site_url() ?>TransaksiController/getKategoriDumisake",
                                    dataType: 'html',
                                    data: {
                                        id_kategori_dumisake: id_kategori_dumisake,
                                    },
                                    success: function(data) {
                                        $("#resultKategori").html(data);
                                    }
                                });
                            }
                        </script>
                        <div class="form-group">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="cardx" id="resultKategori">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?= $cekDataVerifikasiPelakuUsaha->nama_lengkap ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Nik</label>
                                <input type="text" name="nik" class="form-control" value="<?= $cekDataVerifikasiPelakuUsaha->nik ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">KK</label>
                                <input type="text" name="kk" id="no_kk" class="form-control" value="<?= $cekDataVerifikasiPelakuUsaha->kk ?>">
                                <div id="kk"></div>
                            </div>
                        </div>
                        <script>
                            $('#no_kk').on('click', function() {
                                const no_kk = $("#no_kk").val();
                                $.ajax({
                                    url: '<?= site_url() ?>TransaksiController/cekNoKK/' + no_kk,
                                    type: 'POST',
                                    dataType: 'JSON',
                                    success: function(data) {
                                        if (data.cekNoKK != null) {
                                            $('#kk').html('<small id="kk"><span style="color:red;">* NO KK SUDAH TERDAFTAR DISISTEM!</span></small>');
                                            // $("no_kk").prop('disabled', true);
                                        } else {
                                            $('#kk').html('<small id="kk"><span style="color:red;">*</span>No KK Belum terdaftar</small>');
                                        }
                                    }
                                })
                            });
                        </script>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="<?= $cekDataVerifikasiPelakuUsaha->tempat_lahir ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Provinsi</label>
                                <select class="form-control" id="prov" name="prov">
                                    <option value="">-Pilih-</option>
                                    <?php

                                    foreach ($getProv as $key) {
                                        if ($cekDataVerifikasiPelakuUsaha->id_prov == $key->id) {
                                            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                                        } else {
                                            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">Kabupaten</label>
                                <select class="form-control" id="kab" name="kab">
                                    <option value="">-Pilih-</option>

                                    <?php foreach ($getKab as $key) {
                                        if ($cekDataVerifikasiPelakuUsaha->id_kab == $key->id) {
                                            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                                        } else {
                                            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">Kecamatan</label>
                                <select class="form-control" id="kec" name="kec">
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($getKec as $key) {
                                        if ($cekDataVerifikasiPelakuUsaha->id_kec == $key->id) {
                                            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                                        } else {
                                            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Kelurahan</label>
                                <select class="form-control" id="kel" name="kel">
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($getKel as $key) {
                                        if ($cekDataVerifikasiPelakuUsaha->id_kel == $key->id) {
                                            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                                        } else {
                                            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                                        }
                                    } ?>
                                </select>

                            </div>
                        </div>
                        <script>
                            $('#prov').change(function() {
                                const prov = $("#prov").val();
                                const id_pegawai = $("#id_pegawai").val();
                                alert(prov);
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
                        </script>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Umur</label>
                                <input type="hidden" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $cekDataVerifikasiPelakuUsaha->tgl_lahir ?>">
                                <input type="text" name="umur" id="umur" class="form-control" value="">
                            </div>
                        </div>
                        <script>
                            calculate_age()

                            function calculate_age() {
                                var tgl1 = new Date($("#tgl_lahir").val());
                                var tgl2 = new Date();
                                var timeDiff = Math.abs(tgl2.getTime() - tgl1.getTime());
                                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                                // document.getElementById("yourAge").innerHTML = Math.round(diffDays / 365) + " Tahun";
                                // alert(Math.round(diffDays / 365))
                                $('#umur').val(Math.round(diffDays / 365) + " Tahun");
                                // $('#umur').val(Math.round(diffDays / 365));

                            }
                        </script>
                        <div class=" col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">No HP Aktif</label>
                                <input type="number" class="form-control" name="hp" value="<?= $cekDataVerifikasiPelakuUsaha->hp ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" name="pdd_terakhir" value="<?= $cekDataVerifikasiPelakuUsaha->pdd_terakhir ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Jenis Kelamin</label>
                                <select class="form-control" id="exampleSelectGender" name="jk">
                                    <?php if ($cekDataVerifikasiPelakuUsaha->jk == 1) {
                                        echo '<option value="1" selected>Laki-laki</option>';
                                        echo '<option value="0">Perempuan</option>';
                                    } else {
                                        echo '<option value="1">Laki-laki</option>';
                                        echo '<option value="0" selected>Perempuan</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">Nama Ibu Kandung</label>
                                <input type="text" class="form-control" name="nama_ibu" value="<?= $cekDataVerifikasiPelakuUsaha->nama_ibu ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">NIB/SKU/IUMK</label>
                                <input type="text" class="form-control" name="nib_sku_iumk" value="<?= $cekDataVerifikasiPelakuUsaha->nib_sku_iumk ?>">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="file-upload-default" name="foto_pegawai">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div> -->
                    <div class="form-group">
                        <label for="exampleTextarea1">Alamat</label>
                        <textarea class="form-control" rows="4" name="alamat"><?= $cekDataVerifikasiPelakuUsaha->alamat ?></textarea>
                        <small><span style="color:red;">*</span>Alamat sesuai KTP</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informasi Data Usaha</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Usaha</label>
                                <input type="text" class="form-control" name="nama_usaha" value="<?= $cekDataVerifikasiPelakuUsaha->nama_usaha ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Provinsi</label>
                                <select class="form-control" id="prov_usaha" name="prov_usaha">
                                    <option value="">-Pilih-</option>
                                    <?php

                                    foreach ($getProvUsaha as $key) {
                                        if ($cekDataVerifikasiPelakuUsaha->prov_usaha == $key->id) {
                                            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                                        } else {
                                            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">Kabupaten</label>
                                <select class="form-control" id="kab_usaha" name="kab_usaha">
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($getKabUsaha as $key) {
                                        if ($cekDataVerifikasiPelakuUsaha->kab_usaha == $key->id) {
                                            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                                        } else {
                                            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">Kecamatan</label>
                                <select class="form-control" id="kec_usaha" name="kec_usaha">
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($getKecUsaha as $key) {
                                        if ($cekDataVerifikasiPelakuUsaha->kec_usaha == $key->id) {
                                            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                                        } else {
                                            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">Kelurahan</label>
                                <select class="form-control" id="kel_usaha" name="kel_usaha">
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($getKelUsaha as $key) {
                                        if ($cekDataVerifikasiPelakuUsaha->kel_usaha == $key->id) {
                                            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                                        } else {
                                            echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <script>
                            $('#prov_usaha').change(function() {
                                const prov = $("#prov_usaha").val();
                                alert(prov);
                                $.ajax({
                                    url: '<?= site_url() ?>TransaksiController/getKabUsaha/' + prov,
                                    type: 'POST',
                                    success: function(data) {
                                        // console.log(data);
                                        $('#kab_usaha').html(data);
                                    }
                                })
                            });

                            $('#kab_usaha').change(function() {
                                const kab = $("#kab_usaha").val();
                                // alert(kab);
                                $.ajax({
                                    url: '<?= site_url() ?>TransaksiController/getKecUsaha/' + kab,
                                    type: 'POST',
                                    success: function(data) {
                                        // console.log(data);
                                        $('#kec_usaha').html(data);
                                    }
                                })
                            });

                            $('#kec_usaha').change(function() {
                                const kec = $("#kec_usaha").val();
                                // alert(kab);
                                $.ajax({
                                    url: '<?= site_url() ?>TransaksiController/getKelUsaha/' + kec,
                                    type: 'POST',
                                    success: function(data) {
                                        // console.log(data);
                                        $('#kel_usaha').html(data);
                                    }
                                })
                            });
                        </script>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Sektor Usaha</label>
                                <select class="form-select" name="sektor_usaha">
                                    <option value="">-Pilih Sektor Usaha-</option>
                                    <?php foreach ($get_sektor_usaha as $key) {
                                        if ($cekDataVerifikasiPelakuUsaha->sektor_usaha == $key->id_sektor_usaha) {
                                            echo '<option value="' . $key->id_sektor_usaha . '" selected>' . $key->nama . '</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Jenis Usaha</label>
                                <input type="text" class="form-control" name="jenis_usaha" value="<?= $cekDataVerifikasiPelakuUsaha->jenis_usaha ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword4">Pendapatan Perbulan</label>
                                <input type="text" class="form-control" name="pendapatan_perbulan" value="<?= $cekDataVerifikasiPelakuUsaha->pendapatan_perbulan ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputName1">Alamat Usaha</label>
                                <textarea class="form-control" rows="4" name="alamat_usaha"><?= $cekDataVerifikasiPelakuUsaha->alamat_usaha ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">AGREEMENT CHECKBOX</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail3">Foto Usaha</label> <br>
                                <!-- <a href="<?php echo base_url(); ?>uploads/KTP/<?php echo  $cekDataVerifikasiPelakuUsaha->file_ktp; ?>" target="_new" type="button" class="btn btn-info">View FC KTP</a> -->
                                <div class="input-group">
                                    <input type="hidden" name="foto_usaha_old" value="<?= $cekDataVerifikasiPelakuUsaha->foto_usaha ?>">
                                    <input type="file" class="form-control inputdua" name="foto_usaha" id="foto_usaha" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <a type="button" href="<?php echo base_url(); ?>uploads/fotoUsaha/<?php echo  $cekDataVerifikasiPelakuUsaha->foto_usaha; ?>" target="_new" class="btn btn-outline-secondary" style="background-color: #27374b; border: 0; padding: 2px 20px; color: white; border-bottom-right-radius: 1.5rem; border-top-right-radius: 1.5rem;" type="button" id="inputGroupFileAddon04">view Image</a>

                                </div>
                                <small id="error">

                                </small>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Bersedia bertanggung jawab penuh atas dana bantuan</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bersedia_bertanggung_jawab_1" <?php if ($cekDataVerifikasiPelakuUsaha->bersedia_bertanggung_jawab_1 == '1') {
                                                                                                                        echo "checked";
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?> value="1" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bersedia_bertanggung_jawab_1" value="0" <?php if ($cekDataVerifikasiPelakuUsaha->bersedia_bertanggung_jawab_1 == '0') {
                                                                                                                                echo "checked";
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?> id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bersedia bertanggung jawab membuat laporan pemanfaatan dana bantuan</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bersedia_bertanggung_jawab_2" value="1" <?php if ($cekDataVerifikasiPelakuUsaha->bersedia_bertanggung_jawab_1 == '1') {
                                                                                                                                echo "checked";
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?> id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bersedia_bertanggung_jawab_2" value="0" <?php if ($cekDataVerifikasiPelakuUsaha->bersedia_bertanggung_jawab_2 == '0') {
                                                                                                                                echo "checked";
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?> id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tidak memberikan uang ucapan terima kasih, uang jasa dan uang komisi kepada pihak lain</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tidak_komisi_jasa" value="1" id="flexRadioDefault1" <?php if ($cekDataVerifikasiPelakuUsaha->tidak_komisi_jasa == '1') {
                                                                                                                                            echo "checked";
                                                                                                                                        } else {
                                                                                                                                            echo "";
                                                                                                                                        } ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tidak_komisi_jasa" value="0" id="flexRadioDefault1" <?php if ($cekDataVerifikasiPelakuUsaha->tidak_komisi_jasa == '0') {
                                                                                                                                            echo "checked";
                                                                                                                                        } else {
                                                                                                                                            echo "";
                                                                                                                                        } ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">LOKASI</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Input Titik Koordinat Lokasi Usaha</label>
                                <input type="text" class="form-control" name="titik_koordinat" placeholder="Contoh : 4353414" value="<?= $cekDataVerifikasiPelakuUsaha->titik_koordinat ?>">
                                <input type="hidden" id="aksi" name="aksi_akhir" class="form-control" value="1">
                                <input type="hidden" id="id_pelaku_usaha" name="id_pelaku_usaha" class="form-control" value="<?= $cekDataVerifikasiPelakuUsaha->id_pelaku_usaha ?>">
                            </div>
                        </div>
                        <?php if ($cekDataVerifikasiPelakuUsaha->kategori_pelaku_usaha) { ?>
                            <div class="col-md-4">
                                <label class="form-label">Aspirasi</label>
                                <div class="form-group">
                                    <input type="text" name="rekomendasi_dari" value="<?= $cekDataVerifikasiPelakuUsaha->rekomendasi_dari ?>" class="form-control">
                                </div>
                            </div>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <!-- <button type="submit" id="1" name="approve" value="1" type="button" class="btn btn-success mb-2 aksi-status"><i class="fa fa-plus-square"></i> <span>Setujui</span></button> -->
                            <!-- <button type="submit" id="1" name="approve" value="1" type="button" class="btn btn-success mb-2 aksi-status"><i class="fa fa-plus-square"></i> <span>Simpan Edit</span></button> -->
                        </div>
                        <div class="col-md-6 col-6 text-right">
                            <!-- <button data-aksi="0" name="disapprove" value="0" type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus-square"></i> <span>Tolak</span></button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id='tesmodal' class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f8f9fa;">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Catatan Penolakan</h4>
                            <div class="form-group">
                                <!-- <label>Telah 1 (Satu) Tahun Dalam Pangkat Terakhir</label> -->
                                <div class="input-group col-xs-12">
                                    <textarea id='catatan' class="form-control" rows="4" name="catatan_penolakan_akhir"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 text-right">
                            <button id="1" name="1" value="1" class="btn btn-primary mb-2"><i class="fa fa-plus-square"></i> <span>Simpan</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#upload_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?= site_url() ?>VerifikasiController/SimpanVerifikasiAkhir",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // Swal.fire({
                    //     title: 'CHECK DAN EDIT DATA PELAKU USAHA BERHASIL DI SIMPAN!!!',
                    //     text: "Silahkan dicek kembali kelengkapan data anda",
                    //     icon: "success",
                    //     showClass: {
                    //         popup: 'animate__animated animate__fadeInDown'
                    //     },
                    //     hideClass: {
                    //         popup: 'animate__animated animate__fadeOutUp'
                    //     }
                    // }).then(function() {
                    //     // Redirect the user
                    //     // $('#close').click();
                    //     // ShowKPPenyesuaian()
                    // });
                }
            })
        });
        $('.bd-example-modal-lg').on('show.bs.modal', function(e) {
            var isian = $(e.relatedTarget).data('aksi');
            $('#aksi').val(isian);
        });

        $('.bd-example-modal-lg').on('hidden.bs.modal', function(e) {
            $('#aksi').val(1);
        });



    });
</script>
<script src="<?= base_url(); ?>assets/js/file-upload.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>