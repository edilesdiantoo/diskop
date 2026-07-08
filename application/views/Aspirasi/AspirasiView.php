<head>
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
                    <div class="col-12">
                        <h4 class="card-title">Data aspirasi</h4>
                        <p class="card-description">
                            Semua data aspirasi
                        </p>
                    </div>
                    <?php
                    $level_user = $this->session->userdata('level_user');
        $kab = $this->session->userdata('kab');
        if ($level_user != 1) {
            echo '<input type="hidden" id="kab_usaha" name="kab_usaha" value="'.$kab.'">';
        }

        ?>
                    <!-- Tahun Penerima (Selalu Tampil) -->
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <select class="form-control getTahunPenerima" id="tahun_penerima">
                                <option value="">-Tahun Penerima-</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                    </div>

                    <?php if ($level_user == 1) { ?>
                        <!-- Penerima Tahun Lalu -->
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <select class="form-control" id="penerima">
                                    <option value="">-Penerima Tahun Lalu-</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>

                        <!-- Pilih Kabupaten -->
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <select class="form-control level_satu" id="kab_usaha">
                                    <option value="">-Pilih Kab-</option>
                                    <?php
                        $getKab = $this->M_master->getKab(15)->result();
                        foreach ($getKab as $value) {
                            echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                        }
                        ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($level_user == 1 || $level_user == 3) { ?>
                        <!-- Pilih Kategori -->
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <select class="form-control level_satu" id="get_kategori">
                                    <option value="">-Pilih Kategori-</option>
                                    <?php
                        $kategories_dumisake = $this->M_transaksi->kategories_dumisake()->result();
                        foreach ($kategories_dumisake as $value) {
                            echo '<option value="'.$value->id_kategori_dumisake.'">'.$value->nama.'</option>';
                        }
                        ?>
                                </select>
                            </div>
                        </div>

                        <!-- Input Search -->
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <input type="text" id="search" class="form-control search" placeholder="Cari Nama..." aria-label="search" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    <?php } else { ?>
                        <!-- Input Search untuk level lain -->
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <input type="text" id="search" class="form-control search" placeholder="Cari Nama..." aria-label="search" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-12" id="pelakuUsahaSearch">
                        <div class="table-responsive">
                            <table id="" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Urut</th>
                                        <th>Rekomendasi</th>
                                        <th>Nama</th>
                                        <th>KK</th>
                                        <!-- <th>Jenis Kelamin</th> -->
                                        <!-- <th>Alamat Identitas</th> -->
                                        <th>No.Hp</th>
                                        <th>Nama Usaha</th>
                                        <!-- <th>NIB/SKU/IUMK</th> -->
                                        <!-- <th>Alamat Usaha</th> -->
                                        <!-- <th>Sektor Usaha</th> -->
                                        <th>Jenis Usaha</th>
                                        <th>Titik Koordinat</th>
                                        <!-- <th>Status</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="">
                                    <?php $no = 1;

        foreach ($getDataVerifikasiPelakuUsaha as $key) { ?>
                                        <tr>
                                            <td><?= ++$start; ?></td>
                                            <td><?= $key->no_urut ?></td>
                                            <td><?= $key->rekomendasi_dari ?></td>
                                            <td><?= $key->nama_lengkap ?></td>
                                            <td><?= $key->kk ?></td>
                                            <td><?= $key->hp ?></td>
                                            <td><?= $key->nama_usaha ?></td>
                                            <td><?= $key->jenis_usaha ?></td>
                                            <td>
                                                <?php if ($key->titik_koordinat) {
                                                    echo '<a href="https://maps.google.com/?q='.$key->titik_koordinat.'">Lokasi Map</a>';
                                                } else {
                                                    echo 'Tidak Ada';
                                                }
            ?>
                                            </td>
                                            

                                            <td style="text-align: center;">

                                                <?php
            if ($key->aksi == 1 && $level_user == 1 || $level_user == 3) { ?>
                                                    <a href="<?= base_url('VerifikasiController/VerifikasiAkhir/'.$key->id_pelaku_usaha) ?>" type="button" class="btn btn-outline-warning btn-xs">Detail</a><br>
                                                    <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/'.$key->id_pelaku_usaha.'/'.'1') ?>" type="button" class="btn btn-outline-success mt-1 btn-xs">Setuju</a><br>
                                                    <a href="<?= base_url('VerifikasiController/VerifikasiAkhirFinal/'.$key->id_pelaku_usaha.'/'.'0') ?>" type="button" class="btn btn-outline-danger mt-1 btn-xs">Tolak</a>
                                                    <?php } else {
                                                        if ($key->kk2) {
                                                            echo "<p style='color: red;'>Pernah Menerima Bantuan";
                                                        } else { ?>

                                                        <!-- <a type="button">Maintenence</a> -->
                                                        <?php
                                                            $uri = $this->uri->segment('1');
                                                            $uri2 = $this->uri->segment('2');
                                                            ?>
                                                        <a href="<?= base_url('VerifikasiController/CekDataPelakuUsaha/'.$key->id_pelaku_usaha.'/'.$uri.'/'.$uri2) ?>" type="button" class="btn btn-outline-info btn-xs"> Prosses Verifikasi</a>
                                                <?php }
                                                        } ?>
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
        $('.level_satu').on('input', function() {
            console.log('years');
            
            const get_kategori = $("#get_kategori").val();        // Get category selected
            const kab_usaha = $("#kab_usaha").val();              // Get kab_usaha selected
            const penerima = $("#penerima").val();                // Get penerima selected
            const tahun_penerima = $("#tahun_penerima").val();    // Get tahun_penerima from the input field
            console.log(kab_usaha);
            

            // Check if the year is selected, if not, show an alert and return
            if (tahun_penerima === "") {
                alert("Tahun Penerima harus diinput"); // Alert message if the year is not selected
                return; // Stop further execution
            }

            // Set the URL to the controller method (no need for conditional check)
            var url = '<?= site_url() ?>AspirasiController/getAspirasiByYears';

            // Send the data via AJAX to the controller
            $.ajax({
                url: url,                          // Always use the same URL
                type: 'POST',
                data: {
                    penerima: penerima,
                    kab_usaha: kab_usaha,
                    nama_search: $("#nama_search").val(),  // Assuming you have a field for nama_search
                    get_kategori: get_kategori,
                    tahun_penerima: tahun_penerima    // Pass the selected year
                },
                success: function(data) {
                    // On success, populate the results in the target div
                    $('#pelakuUsahaSearch').html(data);
                },
                error: function(xhr, status, error) {
                    // Handle any error that occurs during the AJAX request
                    console.error("Error: " + error);
                }
            });
        });


        $('.getTahunPenerima').on('change', function() {
            const tahun_penerima = $("#tahun_penerima").val(); // Ambil tahun yang dipilih

            $.ajax({
                url: 'AspirasiController/searchPelakuUsahaLevelUserByYear', // Ganti dengan URL controller yang sesuai
                type: 'POST',
                data: {
                    tahun_penerima: tahun_penerima,
                },
                success: function(data) {
                // console.log(data);
                    
                    $('#pelakuUsahaSearch').html(data); // Menampilkan hasil data yang diterima
                    // $("#tahun_penerima")[0].selectedIndex = 0; // Mengatur dropdown ke pilihan pertama
                    $("#get_kategori")[0].selectedIndex = 0; // Mengatur dropdown ke pilihan pertama
                    $("#search")[0].selectedIndex = 0; // Mengatur dropdown ke pilihan pertama
                    $("#kab_usaha")[0].selectedIndex = 0; // Mengatur dropdown ke pilihan pertama
                    $("#penerima")[0].selectedIndex = 0; // Mengatur dropdown ke pilihan pertama

                }
            });
        });

        $('.search').on('input', function() {
            const search = $("#search").val();
            const nama = search.replace(/ /g, "");
            const nama_search = nama.toLowerCase();

            // Get values of tahun_penerima and kab_usaha
            const tahun_penerima = $("#tahun_penerima").val();
            const kab_usaha = $("#kab_usaha").val();

            // Check if tahun_penerima and kab_usaha are not empty
            if (tahun_penerima === "") {
                alert("Tahun Penerima harus diinput");
                return; // Stop the AJAX request if tahun_penerima is empty
            }

            if (kab_usaha === "") {
                alert("Kabupaten Usaha harus diinput");
                return; // Stop the AJAX request if kab_usaha is empty
            }

            // Send the AJAX request if both are filled
            $.ajax({
                url: '<?= site_url() ?>AspirasiController/searchPelakuUsaha',
                type: 'POST',
                data: {
                    nama_search: nama_search,
                    tahun_penerima: tahun_penerima,
                    kab_usaha: kab_usaha
                },
                success: function(data) {
                    $('#pelakuUsahaSearch').html(data);
                }
            });
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