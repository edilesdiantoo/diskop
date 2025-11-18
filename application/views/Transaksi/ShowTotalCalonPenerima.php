<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <!-- <a href="<?= base_url(); ?>TambahUser" class="btn btn-outline-primary mr-4">Tambah Data</a> -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button> -->
    </div>
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
                                        <!-- <th>Milenial 20jt</th> -->
                                        <!-- <th>Milenial 10JT</th> -->
                                        <!-- <th>MAK-MAK 10JT</th> -->
                                        <th>MAK-MAK 5JT</th>
                                        <!-- <th>WP 10JT</th> -->
                                        <th>WP 5JT</th>
                                    </tr>
                                </thead>
                                <tbody id="">
                                    <?php $no = 1;
                                    foreach ($TotalCalonPenerima as $key) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $key->kec_name ?></td>
                                            <td><?= $key->total_pelaku ?></td>
                                            <td><?= $key->mil_5 ?></td>
                                            <!-- <td><?= $key->mil_20 ?></td> -->
                                            <!-- <td><?= $key->mil_10 ?></td> -->
                                            <!-- <td><?= $key->mak_10 ?></td> -->
                                            <td><?= $key->mak_5 ?></td>
                                            <!-- <td><?= $key->wp_10 ?></td> -->
                                            <td><?= $key->wp_5 ?></td>
                                        </tr>
                                        <!-- <input type="text" class="kab" value="<?= $key->kab_usaha_total ?>"> -->
                                        <input type="hidden" class="kec" value="<?= $key->total_pelaku ?>">
                                        <input type="hidden" class="mil_5" value="<?= $key->mil_5 ?>">
                                        <!-- <input type="hidden" class="mil_20" value="<?= $key->mil_20 ?>"> -->
                                        <!-- <input type="hidden" class="mil_10" value="<?= $key->mil_10 ?>"> -->
                                        <!-- <input type="hidden" class="mak_10" value="<?= $key->mak_10 ?>"> -->
                                        <input type="hidden" class="mak_5" value="<?= $key->mak_5 ?>">
                                        <!-- <input type="hidden" class="wp_10" value="<?= $key->wp_10 ?>"> -->
                                        <input type="hidden" class="wp_5" value="<?= $key->wp_5 ?>">
                                    <?php } ?>
                                    <tr>
                                        <th style="text-align: right;" colspan="2">Total</th>
                                        <th id="sumKec"></th>
                                        <th id="mil_5"></th>
                                        <!-- <th id="mil_20"></th> -->
                                        <!-- <th id="mil_10"></th> -->
                                        <!-- <th id="mak_10"></th> -->
                                        <th id="mak_5"></th>
                                        <!-- <th id="wp_10"></th> -->
                                        <th id="wp_5"></th>
                                    </tr>
                                    <tr>
                                        <th colspan="8" style="text-align: right; background-color: #DCDCDC;">Total Calon Penerima :</th>
                                        <th colspan="2" style="text-align: left; background-color: #DCDCDC;" id="totCalonPenrima"></th>
                                    </tr>

                                    <input type="hidden" name="" id="mil_5_val">
                                    <!-- <input type="hidden" name="" id="mil_20_val"> -->
                                    <!-- <input type="hidden" name="" id="mil_10_val"> -->
                                    <!-- <input type="hidden" name="" id="mak_10_val"> -->
                                    <input type="hidden" name="" id="mak_5_val">
                                    <!-- <input type="hidden" name="" id="wp_10_val"> -->
                                    <input type="hidden" name="" id="wp_5_val">
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src=" https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // Kab
        var valueArrKec = [];
        document.querySelectorAll('.kec').forEach(function(el) {
            valueArrKec.push(el.value);
        });
        var jumStringKab = valueArrKec.map(Number);
        var resultAllKab = jumStringKab.reduce((a, b) => a + b, 0)
        document.getElementById('sumKec').innerHTML = resultAllKab;

        // // mil_20
        // var valueArrmil_20 = [];
        // document.querySelectorAll('.mil_20').forEach(function(el) {
        //     valueArrmil_20.push(el.value);
        // });
        // var jumStringmil_20 = valueArrmil_20.map(Number);
        // var resultAllmil_20 = jumStringmil_20.reduce((a, b) => a + b, 0)
        // document.getElementById('mil_20').innerHTML = resultAllmil_20;
        // $("#mil_20_val").val(resultAllmil_20);

        // mil_5
        var valueArrmil_5 = [];
        document.querySelectorAll('.mil_5').forEach(function(el) {
            valueArrmil_5.push(el.value);
        });
        var jumStringmil_5 = valueArrmil_5.map(Number);
        var resultAllmil_5 = jumStringmil_5.reduce((a, b) => a + b, 0)
        document.getElementById('mil_5').innerHTML = resultAllmil_5;
        $("#mil_5_val").val(resultAllmil_5);

        // // mil_10
        // var valueArrmil_10 = [];
        // document.querySelectorAll('.mil_10').forEach(function(el) {
        //     valueArrmil_10.push(el.value);
        // });
        // var jumStringmil_10 = valueArrmil_10.map(Number);
        // var resultAllmil_10 = jumStringmil_10.reduce((a, b) => a + b, 0)
        // document.getElementById('mil_10').innerHTML = resultAllmil_10;
        // $("#mil_10_val").val(resultAllmil_10);

        // // mak 10
        // var valueArrmak_10 = [];
        // document.querySelectorAll('.mak_10').forEach(function(el) {
        //     valueArrmak_10.push(el.value);
        // });
        // var jumStringmak_10 = valueArrmak_10.map(Number);
        // var resultAllmak_10 = jumStringmak_10.reduce((a, b) => a + b, 0)
        // document.getElementById('mak_10').innerHTML = resultAllmak_10;
        // $("#mak_10_val").val(resultAllmak_10);

        // mak 5
        var valueArrmak_5 = [];
        document.querySelectorAll('.mak_5').forEach(function(el) {
            valueArrmak_5.push(el.value);
        });
        var jumStringmak_5 = valueArrmak_5.map(Number);
        var resultAllmak_5 = jumStringmak_5.reduce((a, b) => a + b, 0)
        document.getElementById('mak_5').innerHTML = resultAllmak_5;
        $("#mak_5_val").val(resultAllmak_5);

        // // wp 10
        // var valueArrwp_10 = [];
        // document.querySelectorAll('.wp_10').forEach(function(el) {
        //     valueArrwp_10.push(el.value);
        // });
        // var jumStringwp_10 = valueArrwp_10.map(Number);
        // var resultAllwp_10 = jumStringwp_10.reduce((a, b) => a + b, 0)
        // document.getElementById('wp_10').innerHTML = resultAllwp_10;
        // $("#wp_10_val").val(resultAllwp_10);

        // wp 5
        var valueArrwp_5 = [];
        document.querySelectorAll('.wp_5').forEach(function(el) {
            valueArrwp_5.push(el.value);
        });
        var jumStringwp_5 = valueArrwp_5.map(Number);
        var resultAllwp_5 = jumStringwp_5.reduce((a, b) => a + b, 0)
        document.getElementById('wp_5').innerHTML = resultAllwp_5;
        $("#wp_5_val").val(resultAllwp_5);


        // calon penerima
        // var mil_20_val = $('#mil_20_val').val();
        var mil_5_val = $('#mil_5_val').val();
        // var mil_10_val = $('#mil_10_val').val();
        // var mak_10_val = $('#mak_10_val').val();
        var mak_5_val = $('#mak_5_val').val();
        // var wp_10_val = $('#wp_10_val').val();
        var wp_5_val = $('#wp_5_val').val();

        // var jumCalonPenerima = [parseInt(mil_20_val), parseInt(mil_10_val), parseInt(mak_10_val), parseInt(mak_5_val), parseInt(wp_10_val), parseInt(wp_5_val)].reduce((a, b) => a + b, 0);
        var jumCalonPenerima = [parseInt(mil_5_val), parseInt(mak_5_val), parseInt(wp_5_val)].reduce((a, b) => a + b, 0);
        // console.log(mil_20_val);
        document.getElementById('totCalonPenrima').innerHTML = jumCalonPenerima;

    });
</script>