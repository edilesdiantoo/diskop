<style>
    .table-wrapper {
        max-height: 150px;
        overflow: auto;
        display: inline-block;
    }

    .table-earnings {
        background: #F3F5F6;
    }
</style>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pegawai</h4>
                <p class="card-description">Semua data user</p>
                <div class="table-responsive">
                    <table id="order-listing" class="table table-earnings">
                        <thead>
                            <tr>
                                <th>No <?= $this->session->userdata('nama_lengkap') ?></th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>NIP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="show-Pengawai"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #f8f9fa">
            <form id="upload_form" method="post" enctype="multipart/form-data">
                <div class="col-12 mb-4">
                    <h3 class="font-weight-bold">Form input data pegawai</h3>
                    <h6 class="font-weight-normal mb-0">Isi dengan data yang benar sesuai form yang tertera dibawah ini</h6>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Informasi Pribadi</h4>

                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="id_jabatan">Jabatan</label>
                                <select class="form-control" id="id_jabatan" name="id_jabatan">
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($getJabatan as $key) { echo "<option value='" . $key->id_jabatan . "'>" . $key->jabatan . "</option>"; } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_level_user">Level</label>
                                <select class="form-control" id="id_level_user" name="id_level_user">
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($getLevelUser as $key) { echo "<option value='" . $key->id_level_user . "'>" . $key->level . "</option>"; } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                                <span id="password-error" style="color: red; display: none;">*Password harus mengandung huruf besar, huruf kecil, angka, dan simbol khusus.</span>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectGender">Jenis Kelamin</label>
                                <select class="form-control" id="exampleSelectGender" name="jk">
                                    <option value="1">Laki-laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir">
                            </div>

                            <div class="form-group">
                                <label for="prov-js">Provinsi</label>
                                <select class="form-control" id="prov-js" name="prov">
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($getProv as $key) { echo "<option value='" . $key->id . "'>" . $key->name . "</option>"; } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kab-js">Kabupaten</label>
                                <select class="form-control" id="kab-js" name="kab"><option value="">-Pilih-</option></select>
                            </div>

                            <div class="form-group">
                                <label for="kec-js">Kecamatan</label>
                                <select class="form-control" id="kec-js" name="kec"><option value="">-Pilih-</option></select>
                            </div>

                            <div class="form-group">
                                <label for="kel-js">Kelurahan</label>
                                <select class="form-control" id="kel-js" name="kel"><option value="">-Pilih-</option></select>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" rows="4" name="alamat"></textarea>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light" id="close" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk Melihat Domisili -->
<div class="modal fade bd-example-modal-lg-show" id="bd-example-modal-lg-show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="background-color: #f8f9fa">
            <div class="card-body">
                <h4 class="card-title">Domisili</h4>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="prov-dom">Prov</label>
                        <input type="text" name="prov" id="prov-dom" readonly class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="kab-dom">Kab</label>
                        <input type="text" name="kab" id="kab-dom" readonly class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="kec-dom">Kec</label>
                        <input type="text" name="kec" id="kec-dom" readonly class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="kel-dom">Kel</label>
                        <input type="text" name="kel" id="kel-dom" readonly class="form-control">
                    </div>
                    <div class="form-group col-12">
                        <label for="alamat-dom">Alamat</label>
                        <input type="text" name="alamat" id="alamat-dom" readonly class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".bd-example-modal-lg-show").on("show.bs.modal", function(e) {
            var prov = $(e.relatedTarget).data('prov');
            var kab = $(e.relatedTarget).data('kab');
            var kec = $(e.relatedTarget).data('kec');
            var kel = $(e.relatedTarget).data('kel');
            var alamat = $(e.relatedTarget).data('alamat');
            $("#prov").val(prov);
            $("#kab").val(kab);
            $("#kec").val(kec);
            $("#kel").val(kel);
            $("#alamat").val(alamat);
        });

        $("#bd-example-modal-lg-show").on("hidden.bs.modal", function(e) {
            $("#prov, #kab, #kec, #kel, #alamat").val("");
        });
    });

    ShowPengawai();

    function ShowPengawai() {
        $.ajax({
            type: 'post',
            url: "MasterController/ShowPengawai",
            success: function(data) {
                $('#show-Pengawai').html(data);
            }
        });
    }

    // Submit form untuk tambah data pegawai
    $('#upload_form').on('submit', function(event) {
        event.preventDefault(); // Mencegah form submit biasa

        $.ajax({
            url: "<?= site_url() ?>MasterController/SimpanPengawai",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                var title = data ? 'DATA BERHASIL DITAMBAHKAN' : 'DATA GAGAL DITAMBAHKAN';
                var text = data ? 'Silahkan cek kembali data anda.' : 'Silahkan cek kembali kelengkapan data anda.';
                var icon = data ? 'success' : 'error';

                Swal.fire({
                    title: title,
                    text: text,
                    icon: icon,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    $('#close').click();
                    ShowPengawai();
                });
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Terjadi Kesalahan',
                    text: 'Gagal menghubungi server, coba lagi.',
                    icon: 'error'
                });
            }
        });
    });

    function HapusPegawai(id) {
        Swal.fire({
            title: 'Apa Anda yakin?',
            text: "Data ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "<?= site_url() ?>MasterController/HapusPegawai/" + id,
                    success: function(data) {
                        Swal.fire({
                            title: 'Data Berhasil Dihapus',
                            text: "Silahkan cek kembali data anda.",
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            $('#bd-example-modal-lg').modal('hide');
                            ShowPengawai();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Terjadi Kesalahan',
                            text: 'Gagal menghapus data, coba lagi.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    }

    $('#prov-js').change(function() {
        const prov = $("#prov-js").val();
        $.ajax({
            url: '<?= site_url() ?>MasterController/getKab/' + prov,
            type: 'POST',
            success: function(data) {
                $('#kab-js').html(data);
            }
        })
    });

    $('#kab-js').change(function() {
        const kab = $("#kab-js").val();
        $.ajax({
            url: '<?= site_url() ?>MasterController/getKec/' + kab,
            type: 'POST',
            success: function(data) {
                $('#kec-js').html(data);
            }
        })
    });

    $('#kec-js').change(function() {
        const kec = $("#kec-js").val();
        $.ajax({
            url: '<?= site_url() ?>MasterController/getKel/' + kec,
            type: 'POST',
            success: function(data) {
                $('#kel-js').html(data);
            }
        })
    });
</script>
