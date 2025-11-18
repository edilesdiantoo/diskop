<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<div class="row">
    <form id="upload_form" target="_blank" action="<?= base_url() ?>LaporanController/pdfRekomendasi" method="post" class="col-lg-12" enctype="multipart/form-data">
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
            <select class="form-control  mr-3" id="kec" name="kec">
                <option value="">Pilih KEC.</option>
            </select>
            <!-- <select class="form-control  mr-3" id="kel" name="kel">
                <option value="">Pilih KEL</option>
            </select> -->
            <div class="mr-3 col-lg-3">
                <input autocomplete="off" type="text" class="form-control" id="search-box2" placeholder="Input rekomendasi" />
                <input class="form-control" type="hidden" name="rekomendasi" id="rekomendasi">
                <div id="suggesstion-box2"></div>
            </div>


            <select class="form-control mr-2" id="status" name="status" required>
                <option value="">PILIH STATUS</option>
                <?php
                echo '<option value="1">Belum Verify Kabid</option>';
                echo '<option value="2">Calon Penerima Aspirasi</option>';
                // echo '<option value="3">Tidak Memenuhi Syarat</option>';
                echo '<option value="0">Tidak Layak</option>';
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
            <?php
            $level = $this->session->userdata('level_user');
            if ($level == '1') { ?>
                <select class="form-control mr-2" id="format" name="format" required>
                    <option value="">FORMAT LAPORAN</option>
                    <option value="1">PDF</option>
                    <option value="2">EXCEL</option>
                </select>
            <?php } ?>
            <input type="hidden" value="<?= $this->session->userdata('level_user') ?>" id="level_user" name="level_user">
            <button type="submit" id="print" class="btn btn-outline-warning mr-1">Print</button>
        </div>
    </form>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pelaku Usaha Aspirasi</h4>
                <p class="card-description">
                    Semua data pelaku usaha Aspirasi
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

    $("#search-box2").keyup(function() {
        const kab = $("#kab").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>LaporanController/getRekomendasi",
            data: {
                nama: $(this).val(),
                kab: kab,
                func: 'autocomplete2'
            },
            beforeSend: function() {
                $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                $("#suggesstion-box2").show();
                $("#suggesstion-box2").html(data);
                $("#search-box2").css("background", "#FFF");
            }
        });
    });

    function autocomplete2(rekomendasi) {
        $("#rekomendasi").val(rekomendasi);
        $("#search-box2").val(rekomendasi);
        $("#suggesstion-box2").hide();
    }
</script>