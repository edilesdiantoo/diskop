<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <!-- <a href="<?= base_url(); ?>TambahUser" class="btn btn-outline-primary mr-4">Tambah Data</a> -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button> -->
    </div>
    <form id="upload_form" method="post" class="col-lg-12" enctype="multipart/form-data">
        <!-- <form id="" action="<?= base_url() ?>LaporanController/PrintPenerima" class="col-lg-12" method="post" enctype="multipart/form-data"> -->
        <div class="col-lg-12 grid-margin stretch-card">
            <select class="form-control mr-3" id="kab_usaha" name="kab_usaha" required>
                <option value="">Pilih KAB. </option>
                <?php
                foreach ($GetKab as $key) {
                    echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                } ?>
            </select>
        </div>
    </form>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Data Pelaku Usaha</h4>
                        <p class="card-description">
                            Semua data calon penerima
                        </p>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <!-- <input type="text" id="search" class="form-control" placeholder="Search" aria-label="seach" aria-describedby="basic-addon1"> -->
                            <!-- <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span> -->
                            <!-- <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-search"></i></button> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Kabupaten</th> -->
                                        <th>Kecamatan</th>
                                        <th>Jumlah Perkecamatan</th>
                                        <th>Milenial 5JT</th>
                                        <!-- <th>Milenial 20JT</th> -->
                                        <!-- <th>Milenial 10JT</th> -->
                                        <!-- <th>MAK-MAK 10JT</th> -->
                                        <th>MAK-MAK 5JT</th>
                                        <!-- <th>WP 10JT</th> -->
                                        <th>WP 5JT</th>
                                    </tr>
                                </thead>
                                <tbody id="adminProvinsi">
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $('#kab_usaha').change(function() {
        const kab_usaha = $("#kab_usaha").val();
        // alert(kec);
        $.ajax({
            url: '<?= site_url() ?>LaporanController/getCalonPenerimaAdmin2024/' + kab_usaha,
            type: 'POST',
            success: function(data) {
                // console.log(data);
                $('#adminProvinsi').html(data);
            }
        })
    });
    // 
</script>