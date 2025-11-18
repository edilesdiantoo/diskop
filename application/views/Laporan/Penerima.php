<div class="row">
    <form id="upload_form" action="" method="post" class="col-lg-12" enctype="multipart/form-data">
        <!-- <form id="" action="<?= base_url() ?>LaporanController/PrintPenerima" class="col-lg-12" method="post" enctype="multipart/form-data"> -->
        <div class="col-lg-12 grid-margin stretch-card">
            <select class="form-control mr-3" id="kab" name="kab" required>
                <option value="">Pilih KAB. </option>

                <?php
                $kab = $this->session->userdata('kab');
                $level = $this->session->userdata('level_user');
                if ($level != 1) {
                    foreach ($GetKab as $key) {
                        if ($kab == $key->id) {
                            echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                        }
                    }
                } else {
                    foreach ($GetKab as $key) {
                        echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
                    }
                } ?>
            </select>
            <select class="form-control  mr-3" id="kec" name="kec" required>
                <option value="">Pilih KEC.</option>
            </select>
            <select class="form-control  mr-3" id="kel" name="kel" required>
                <option value="">Pilih KEL</option>
            </select>
            <select class="form-control mr-2" id="status" name="status" required>
                <option value="">PILIH STATUS</option>
                <?php
                echo '<option value="3">Tidak Memenuhi Syarat</option>';
                echo '<option value="0">Tidak Layak</option>';
                echo '<option value="1">Calon Penerima</option>';
                ?>
                <!-- <?php if ($level != '3') {
                            echo '<option value="1">Setuju Kab</option>';
                            echo '<option value="0">Tolak Kab</option>';
                        } else {
                            echo '<option value="1">Setuju Prov</option>';
                            echo '<option value="0">Tolak Prov</option>';
                        }
                        ?> -->
            </select>
            <!-- <select class="form-control mr-2" id="format" name="format" required>
                <option value="">PILIH FORMAT LAPORAN</option>
                <option value="1">PDF</option>
                <option value="2">EXCEL</option>
            </select> -->
            <input type="hidden" value="" id="searchData" name="searchData">
            <input type="hidden" value="" id="printData" name="printData">
            <input type="hidden" value="<?= $this->session->userdata('level_user') ?>" id="level_user" name="level_user">
            <button type="submit" id="search" class="btn btn-outline-primary mr-1">Search</button>
            <button type="submit" id="print" class="btn btn-outline-warning mr-1">Print</button>
        </div>
    </form>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pelaku Usaha</h4>
                <p class="card-description">
                    Semua data pelaku usaha
                </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Urut</th>
                                    <th>nama</th>
                                    <th>Jenis Kelamin</th>
                                    <!-- <th>Alamat Identitas</th> -->
                                    <th>No.Hp</th>
                                    <th>Nama Usaha</th>
                                    <th>NIB/SKU/IUMK</th>
                                    <!-- <th>Alamat Usaha</th> -->
                                    <th>Sektor Usaha</th>
                                    <th>Jenis Usaha</th>
                                    <th>Status</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody id="perwilayahdata">
                                <tr>
                                    <th colspan="10" class="text-center">SELECT DATA ANDA!</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if (document.getElementById("level_user").value == 1) {
        $(document).ready(function() {
            $('#kab').change(function() {
                const kab = $("#kab").val();
                // alert(kab);
                $.ajax({
                    url: '<?= site_url() ?>LaporanController/getKec/' + kab,
                    type: 'POST',
                    success: function(data) {
                        // console.log(data);
                        $('#kec').html(data);
                    }
                })
            });
        });
    } else {
        $(document).ready(function() {
            $('#kab').ready(function() {
                const kab = $("#kab").val();
                // alert(kab);
                $.ajax({
                    url: '<?= site_url() ?>LaporanController/getKec/' + kab,
                    type: 'POST',
                    success: function(data) {
                        // console.log(data);
                        $('#kec').html(data);
                    }
                })
            });
        });
    }
    $('#kec').change(function() {
        const kec = $("#kec").val();
        // alert(kec);
        $.ajax({
            url: '<?= site_url() ?>LaporanController/getKel/' + kec,
            type: 'POST',
            success: function(data) {
                // console.log(data);
                $('#kel').html(data);
            }
        })
    });

    // $('.perwilayah').change(function() {
    //     const kab = $("#kab").val();
    //     const kec = $("#kec").val();
    //     const kel = $("#kel").val();
    //     const status = $("#status").val();
    //     alert(status);
    //     $.ajax({
    //         url: '<?= site_url() ?>LaporanController/Perwilayah',
    //         type: 'POST',
    //         data: {
    //             kab: kab,
    //             kec: kec,
    //             kel: kel,
    //             status: status,
    //         },
    //         success: function(data) {
    //             console.log(data);
    //             // alert
    //             $('#perwilayahdata').html(data);
    //         }
    //     })
    // });

    $(document).ready(function() {
        $("#search").click(function() {
            $('#searchData').val(1);
            $('#printData').val('');
            $('#upload_form').on('submit', function(event) {
                event.preventDefault();
                // alert('dd')
                $.ajax({
                    url: "<?= site_url() ?>LaporanController/Perwilayah",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'html',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        // console.log(data);
                        $('#perwilayahdata').html(data);
                    }
                })
            });

        });

        $("#print").click(function() {
            $("#upload_form").get(0).reset;
            $("#upload_form").attr('action', '<?= base_url() ?>LaporanController/Perwilayah');
            $('#printData').val(1);
            $('#searchData').val('');
        });
    });
</script>