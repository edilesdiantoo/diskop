<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <!-- <a href="<?= base_url(); ?>TambahUser" class="btn btn-outline-primary mr-4">Tambah Data</a> -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Data Pelaku Usaha</h4>
                        <p class="card-description">
                            Semua data pelaku usaha
                        </p>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <input type="text" id="search" class="form-control" placeholder="" aria-label="search" aria-describedby="basic-addon1">
                            <!-- <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span> -->
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class=""></i>Nama</button>
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
                                        <th>Nomor Urut</th>
                                        <th>nama</th>
                                        <!-- <th>Jenis Kelamin</th> -->
                                        <!-- <th>Alamat Identitas</th> -->
                                        <th>No.Hp</th>
                                        <th>Nama Usaha</th>
                                        <!-- <th>NIB/SKU/IUMK</th> -->
                                        <!-- <th>Alamat Usaha</th> -->
                                        <!-- <th>Sektor Usaha</th> -->
                                        <th>Jenis Usaha</th>
                                        <th>Titik Koordinat</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pelakuUsahaSearch">
                                    <?php $no = 1;
                                    $level_user = $this->session->userdata('level_user');

                                    foreach ($showTidakLayak as $key) { ?>
                                        <tr>
                                            <td><?= ++$start; ?></td>
                                            <td><?= $key->no_urut ?></td>
                                            <td><?= $key->nama_lengkap ?></td>
                                            <td><?= $key->hp ?></td>
                                            <td><?= $key->nama_usaha ?></td>
                                            <td><?= $key->jenis_usaha ?></td>
                                            <td>
                                                <?php if ($key->titik_koordinat) {
                                                    echo '<a href="https://maps.google.com/?q=' . $key->titik_koordinat . '">Lokasi Map</a>';
                                                } else {
                                                    echo "Tidak Ada";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($key->aksi_akhir == 0) {
                                                    echo "Tidak Layak <br>";
                                                }

                                                ?>
                                            </td>

                                            <td style="text-align: center;">
                                                <?php if ($key->aksi_akhir == 0 && $level_user == 1) { ?>
                                                    <a href="<?= base_url('VerifikasiController/VerifikasiAkhir/' . $key->id_pelaku_usaha) ?>" type="button" class="btn btn-outline-warning btn-xs">Detail</a><br>
                                                    <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/' . $key->id_pelaku_usaha . '/' . '1') ?>" type="button" class="btn btn-outline-success mt-1 btn-xs">Setuju</a><br>
                                                    <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/' . $key->id_pelaku_usaha . '/' . '0') ?>" type="button" class="btn btn-outline-danger mt-1 btn-xs">Tolak</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="card-footer pb-0">
                                <?= $this->pagination->create_links(); ?>
                            </div>
                        </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    const words = ["bunga citra lestari", "0000123", "0004321"];
    let i = 0;
    let timer;

    function typingEffect() {
        let word = words[i].split("");
        var loopTyping = function() {
            if (word.length > 0) {
                let elem = document.getElementById('search');
                elem.setAttribute('placeholder', elem.getAttribute('placeholder') + word.shift());
            } else {
                deletingEffect();
                return false;
            };
            timer = setTimeout(loopTyping, 100);
        };
        loopTyping();
    };

    function deletingEffect() {
        let word = words[i].split("");
        var loopDeleting = function() {
            if (word.length > 0) {
                word.pop();
                document.getElementById('search').setAttribute('placeholder', word.join(""));
            } else {
                if (words.length > (i + 1)) {
                    i++;
                } else {
                    i = 0;
                };
                typingEffect();
                return false;
            };
            timer = setTimeout(loopDeleting, 100);
        };
        loopDeleting();
    };

    typingEffect();

    $(document).ready(function() {
        $('#search').on('input', function() {
            const search = $("#search").val();
            var nama = search.replace(/ /g, "");
            var nama_search = nama.toLowerCase()
            console.log(nama_search);
            // alert(search);
            $.ajax({
                url: '<?= site_url() ?>TransaksiController/searchPelakuUsaha/' + nama_search,
                type: 'POST',
                // dataType: 'html',
                success: function(data) {
                    // console.log(data);
                    $('#pelakuUsahaSearch').html(data);
                }
            })

        });
    });

    // function setInputFilter(textbox, inputFilter, errMsg) {
    //     ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
    //         textbox.addEventListener(event, function(e) {
    //             if (inputFilter(this.value)) {
    //                 // Accepted value
    //                 if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
    //                     this.classList.remove("input-error");
    //                     this.setCustomValidity("");
    //                 }
    //                 this.oldValue = this.value;
    //                 this.oldSelectionStart = this.selectionStart;
    //                 this.oldSelectionEnd = this.selectionEnd;
    //             } else if (this.hasOwnProperty("oldValue")) {
    //                 // Rejected value - restore the previous one
    //                 this.classList.add("input-error");
    //                 this.setCustomValidity(errMsg);
    //                 this.reportValidity();
    //                 this.value = this.oldValue;
    //                 this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
    //             } else {
    //                 // Rejected value - nothing to restore
    //                 this.value = "";
    //             }
    //         });
    //     });
    // }

    // // setInputFilter(document.getElementById("search"), function(value) {
    // //     return /^-?\d*$/.test(value);
    // // }, "NO URUT...!!!");
</script>