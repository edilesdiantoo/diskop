<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    <title>DUMIKASE DINAS KOPERASI, UMKM PROV JAMBI</title> <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    .modal-confirm {
        color: #636363;
        width: 325px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }

    .modal-confirm .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #ef513a;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-confirm .icon-box i {
        font-size: 56px;
        position: relative;
        top: 4px;
    }

    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #ef513a;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        background: #da2c12;
        outline: none;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }

    .iawal::placeholder {
        padding-left: 7px;
        font-size: 12px;
        color: #cccccc;
    }

    .iawal {
        border: 0;
        border-radius: 25px;
    }

    @media (max-width: 480px) {
        .bg-image {
            background: url(<?= base_url() ?>assets/images/banner-bg2.jpg);
            background-repeat: no-repeat;
            background-size: 100% 100vh;
        }

        .card.bg-white.mx-auto {
            width: 100% !important;
        }

        .diskoplogo {
            width: 60px;
            height: 60px;
        }

        .diskoptextinfo {
            font-size: 0.7rem;
        }
    }

    /* Media Query for low resolution  Tablets, Ipads */
    @media (min-width: 481px) and (max-width: 767px) {
        .bg-image {
            background: url(<?= base_url() ?>assets/images/banner-bg7.png);
            background-repeat: no-repeat;
            background-size: 100% 100vh;
        }

        .diskoplogo {
            width: 80px;
            height: 80px;
        }

        .diskoptextinfo {
            font-size: 1.2rem;
        }
    }

    /* Media Query for Tablets Ipads portrait mode */
    @media (min-width: 768px) and (max-width: 1024px) {
        .bg-image {
            background: url(<?= base_url() ?>assets/images/banner-bg7.png);
            background-repeat: no-repeat;
            background-size: 100% 100vh;
        }

        .diskoplogo {
            width: 80px;
            height: 80px;
        }

        .diskoptextinfo {
            font-size: 1.2rem;
        }
    }

    /* Media Query for Laptops and Desktops */
    @media (min-width: 1025px) and (max-width: 1280px) {
        .bg-image {
            background: url(<?= base_url() ?>assets/images/banner-bg7.png);
            background-repeat: no-repeat;
            background-size: 100% 100vh;
        }

        .diskoplogo {
            width: 80px;
            height: 80px;
        }

        .diskoptextinfo {
            font-size: 1.2rem;
        }
    }

    /* Media Query for Large screens */
    @media (min-width: 1281px) {
        .bg-image {
            background: url(<?= base_url() ?>assets/images/banner-bg7.png);
            background-repeat: no-repeat;
            background-size: 100% 100vh;
        }

        .diskoplogo {
            width: 80px;
            height: 80px;
        }

        .diskoptextinfo {
            font-size: 1.2rem;
        }
    }
</style>

<body class="bg-image">
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="<?= base_url(); ?>assets/images/logo-prov.png" class="diskoplogo">
                    <div class="ps-3 text-white">
                        <div class="fs-6">DINAS KOPERASI DAN UKM</div>
                        <div class="fw-semibold fs-5">PROVINSI JAMBI</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col">
                <div class="fs-4 fw-bold text-white text-center">PEMERINTAH PROVINSI JAMBI PROGRAM GUBERNUR JAMBI DUMISAKE TAHUN 2025</div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row pt-5">
                <div class="col-12">
                    <div class="text-white text-center diskoptextinfo">DINAS KOPERASI, UMKM PROVINSI JAMBI <br> (Bantuan Modal Kerja bgi UMKM Se-Provinsi Jambi)</div>
                </div>
            </div>
            <div class="row justify-content-center pt-3">
                <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7">
                    <input class="form-control iawal" id="no_kk" accept="number" name="no_kk" type="text" placeholder="" autocomplete="off">
                    <input name="" id="kktest" class="form-control" type="hidden" placeholder="Masukkan No KK">
                    <small id="alertKK" style="font-size: x-small; color: orange;"> <i style="color: red;"></i> </small><br>
                </div>
            </div>
            <div class="text-center pt-3">
                <a href="<?= base_url() ?>TransaksiController/Panduan" class="text-white"><i class="bi bi-box-arrow-up-left"></i>
                    <font style="text-decoration: underline;">Lampiran Dokumen Pendukung</font>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="fixed-bottom text-white text-center fw-lighter diskoptextinfo" style="padding-bottom: 25px !important;">
                Jalan Jendral Ahmad Yani No.11, Telanaipura, Kec. Telanaipura, Kota Jambi, Jambi 36361
            </div>
        </div>
    </div>

    <!-- <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title w-100">Sorry!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Your transaction has failed. Please go back and try again.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" data-dismiss="modal" id="hiddenmodal">OK</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body text-center" style="padding-top: 2.5rem !important; padding-bottom: 4.5rem !important;">
                    <div>
                        <h3 style="font-weight: semibold !important;">Notifikasi</h3>
                    </div>
                    <div style="padding-bottom: 1rem;"><i class="bi bi-bell-fill" style="color: #FF7F50; font-size: 5rem;"></i></div>
                    <div style="color: #bfbfbf; font-size: 12px;">Nomor kartu keluarga anda sudah terdaftar di sistem.</div>
                    <div style="padding-top: 2rem;"><button class="btn btn-primary" style="border: 0; border-radius: 25px; background-color: #FF7F50; font-size: 12px; padding: 7px 20px;" id="bukti_pengajuan">Bukti Pengajuan</button></div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body text-center" style="padding-top: 2.5rem !important; padding-bottom: 4.5rem !important;">
                    <div>
                        <h3 style="font-weight: semibold !important;">Notifikasi</h3>
                    </div>
                    <div style="padding-bottom: 1rem;"><i class="bi bi-bell-fill" style="color: #FF7F50; font-size: 5rem;"></i></div>
                    <div style="color: #bfbfbf; font-size: 12px;">Nomor kartu keluarga anda sudah terdaftar di sistem.</div>
                    <div style="padding-top: 2rem;"><button class="btn btn-primary" style="border: 0; border-radius: 25px; background-color: #FF7F50; font-size: 12px; padding: 7px 20px;" id="bukti_pengajuan">Bukti Pengajuan</button></div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/crypto-js.min.js') ?>"></script>
<script>
    function textLength(value) {
        var maxLength = 16;
        if (value.length > maxLength) return false;
        return true;
    }
    var oldValueKK = '';
    var alertKK = document.getElementById('alertKK');
    document.getElementById('no_kk').onkeyup = function() {
        var len = this.value.length;
        if (!textLength(this.value)) {
            this.value = oldValueKK;
            alertKK.innerHTML = 'max 16 karakter'
        } else if (!textLength(this.value) < 16) {
            // alert('berhasil')
            oldValueKK = this.value;
            document.getElementById("no_kk").setAttribute("style", "border: 1px solid #dc3545;");
            if (len <= 16) {
                $('#alertKK').text(16 - len + ' Karakter');
                $('#kktest').val(16 - len);
            }
        } else oldValueKK = this.value;
        var angka = document.getElementById('kktest').value
        if (parseInt(angka) == 0) {
            $(document).ready(function() {
                $('#no_kk').on('change', function(even) {
                    event.preventDefault();
                    const no_kk = $("#no_kk").val();
                    localStorage.setItem('kk', no_kk);
                    $.ajax({
                        url: '<?= site_url() ?>PelatihanController/cekNoKK/' + no_kk,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function(data) {
                            
                            if (data.cekNoKK != null) {
                                $('#myModal').modal('show');
                            } else {
                                // Redirect tanpa menampilkan no_kk di URL
                                window.location.href = "<?= site_url() ?>input-profil";
                            }
                        }
                    });
                });
            });
            document.getElementById("no_kk").setAttribute("style", "border: 1px solid #198754");
        }
    }

    const words = ["12345", "12345", "12345", "12345", "12345", "12345", "12345"];
    let i = 0;
    let timer;

    function typingEffect() {
        let word = words[i].split("");
        var loopTyping = function() {
            if (word.length > 0) {
                let elem = document.getElementById('no_kk');
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
                document.getElementById('no_kk').setAttribute('placeholder', word.join(""));
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

    $(document).ready(function() {
        $('#bukti_pengajuan').on('click', function(even) {
            // alert("kkd");
            const no_kk = $("#no_kk").val();
            window.location.href = "<?= site_url() ?>TransaksiController/bukti_pengajauan/" + no_kk;
        });
    });

    $("#hiddenmodal").on('click', function() {
        $('#myModal').modal('hide');
    })

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

    // setInputFilter(document.getElementById("max_dewasa_input" + number), function(value) {
    //     return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 2);
    // }, "Max Hanya 2 Orang Dewasa!!!");

    // setInputFilter(document.getElementById("max_anak_input" + number), function(value) {
    //     return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 1);
    // }, "Max Hanya 1 Orang Anak!!!");

    // setInputFilter(document.getElementById("nik"), function(value) {
    //     return /^-?\d*$/.test(value);
    // }, "Hanya Angka!!!");

    setInputFilter(document.getElementById("no_kk"), function(value) {
        return /^-?\d*$/.test(value);
    }, "Hanya Angka!!!");
</script>