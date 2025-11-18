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
                            <input type="text" id="kk" class="form-control" placeholder="" aria-label="seach" aria-describedby="basic-addon1">
                            <!-- <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span> -->
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
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
                                    <tr>
                                        <td style="text-align: center;" colspan="9"> Belum ada data</td>
                                    </tr>
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
    const words = ["1234567890"];
    let i = 0;
    let timer;

    function typingEffect() {
        let word = words[i].split("");
        var loopTyping = function() {
            if (word.length > 0) {
                let elem = document.getElementById('kk');
                elem.setAttribute('placeholder', elem.getAttribute('placeholder') + word.shift());
            } else {
                deletingEffect();
                return false;
            };
            timer = setTimeout(loopTyping, 400);
        };
        loopTyping();
    };

    function deletingEffect() {
        let word = words[i].split("");
        var loopDeleting = function() {
            if (word.length > 0) {
                word.pop();
                document.getElementById('kk').setAttribute('placeholder', word.join(""));
            } else {
                if (words.length > (i + 1)) {
                    i++;
                } else {
                    i = 0;
                };
                typingEffect();
                return false;
            };
            timer = setTimeout(loopDeleting, 200);
        };
        loopDeleting();
    };

    typingEffect();
    // $(document).ready(function() {
    //     $('#kk').on('input', function() {
    //         const kk = $("#kk").val();
    //         // alert(search);
    //         $.ajax({
    //             url: '<?= site_url() ?>TransaksiController/searchPenerimad/' + kk,
    //             type: 'POST',
    //             // dataType: 'html',
    //             success: function(data) {
    //                 // console.log(data);
    //                 $('#pelakuUsahaSearch').html(data);
    //             }
    //         })

    //     });
    // });

    function setInputFilter(textbox, inputFilter, errMsg) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
            textbox.addEventListener(event, function(e) {
                if (inputFilter(this.value)) {
                    // Accepted value
                    if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                        this.classList.remove("input-error");
                        this.setCustomValidity("");
                    }
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    // Rejected value - restore the previous one
                    this.classList.add("input-error");
                    this.setCustomValidity(errMsg);
                    this.reportValidity();
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    // Rejected value - nothing to restore
                    this.value = "";
                }
            });
        });
    }

    setInputFilter(document.getElementById("kk"), function(value) {
        return /^-?\d*$/.test(value);
    }, "Hanya Angka!!!");
</script>