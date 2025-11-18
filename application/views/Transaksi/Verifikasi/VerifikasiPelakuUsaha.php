<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <!-- <a href="<?= base_url(); ?>TambahUser" class="btn btn-outline-primary mr-4">Tambah Data</a> -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pelaku Usaha</h4>
                <p class="card-description">
                    Semua data pelaku usaha
                </p>
                <div class="row">
                    <div class="col-12">
                        <div id="datatable"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!------------------------------------- tambah data ---------------------------------------->
<div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #f8f9fa">
            <form class="pt-5 pl-5 pr-5 tambah-VerifikasiPelakuUsaha" id="upload_form" method="post" enctype="multipart/form-data"></form>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg-edit" id="bd-example-modal-lg-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #f8f9fa">
            <form class="pt-5 pl-5 pr-5 edit-VerifikasiPelakuUsaha" id="upload_form_edit" method="post" enctype="multipart/form-data"></form>
        </div>
    </div>
</div>

<script>
    ShowVerifikasiPelakuUsaha()

    function ShowVerifikasiPelakuUsaha() {
        $.ajax({
            type: 'post',
            url: "<?= site_url() ?>VerifikasiController/ShowVerifikasiPelakuUsaha",
            success: function(data) {
                $('#datatable').html(data);
            }
        });
    }

    $(document).ready(function() {
        $("#bd-example-modal-lg").on("show.bs.modal", function(e) {
            $.ajax({
                type: "post",
                url: "<?= site_url() ?>VerifikasiController/TambahVerifikasiPelakuUsaha",
                success: function(data) {
                    $(".tambah-VerifikasiPelakuUsaha").html(data);
                },
            });
        });
        $("#bd-example-modal-lg").on("hidden.bs.modal", function(e) {
            $(".tambah-VerifikasiPelakuUsaha").html("");
        });
    });

    $(document).ready(function() {
        $('#upload_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?= site_url() ?>VerifikasiController/SimpanVerifikasiPelakuUsaha",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    if (data = true) {
                        Swal.fire({
                            title: 'DATA SARANA DAN PRASARANA BERHASIL DITAMBAHKAN',
                            text: "Silahkan dicek kembali kelengkapan data anda",
                            icon: "success",
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        }).then(function() {
                            // Redirect the user
                            $('#close').click();
                            ShowVerifikasiPelakuUsaha()
                        });
                    } else {
                        Swal.fire({
                            title: 'DATA SARANA DAN PRASARANA GAGAL DITAMBAHKAN',
                            text: "Silahkan dicek kembali kelengkapan data anda",
                            icon: "error",
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        }).then(function() {
                            // Redirect the user
                            $('#close').click();
                            ShowVerifikasiPelakuUsaha()
                        });
                    }
                }
            })
        });
    });

    $(document).ready(function() {
        $("#bd-example-modal-lg-edit").on("show.bs.modal", function(e) {
            var id_pegawai = $(e.relatedTarget).data('id');
            $.ajax({
                type: "post",
                url: "<?= site_url() ?>VerifikasiController/EditPegawai/" + id_pegawai,
                // data: {
                //     id_pegawai: id_pegawai
                // },
                success: function(data) {
                    $(".edit-VerifikasiPelakuUsaha").html(data);
                },
            });
        });
        $("#bd-example-modal-lg").on("hidden.bs.modal", function(e) {
            $(".edit-VerifikasiPelakuUsaha").html("");
        });
    });

    $(document).ready(function() {
        $('#upload_form_edit').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?= site_url() ?>VerifikasiController/SimpanVerifikasiPelakuUsahaEdit",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    Swal.fire({
                        title: 'DATA SARANA DAN PRASARANA BERHASIL DIEDIT',
                        text: "Silahkan dicek kembali kelengkapan data anda",
                        icon: "success",
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    }).then(function() {
                        // Redirect the user
                        $('#close').click();
                        ShowVerifikasiPelakuUsaha()
                    });
                }
            })
        });
    });

    function HapusPegawai(id) {
        $.ajax({
            type: "get",
            dataType: "json",
            url: "<?= site_url() ?>VerifikasiController/HapusPegawai/" + id,
            success: function(data) {
                Swal.fire({
                    title: 'DATA SARANA DAN PRASARANA BERHASIL DIHAPUS',
                    text: "Silahkan dicek kembali kelengkapan data anda",
                    icon: "success",
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                }).then(function() {
                    // Redirect the user
                    $('#close').click();
                    ShowVerifikasiPelakuUsaha()
                });
            },
        });
    }
</script>