<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SINETAP</title> <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

  * {
    font-family: 'Poppins', sans-serif;
    font-size: .8rem;
  }

  .bg-color {
    background-color: #f1f6fb;
    background-repeat: no-repeat;
    background-size: auto;
  }

  .btn-costum-primary {
    --bs-btn-font-size: .8rem;
    --bs-btn-font-weight: 400;
    --bs-btn-color: #ffffff;
    --bs-btn-bg: #27374b;
    --bs-btn-border-color: #27374b;
    --bs-btn-border-radius: 1.5rem;
    --bs-btn-hover-color: #ffffff;
    --bs-btn-hover-bg: #27374b;
    --bs-btn-hover-border-color: #2b3e54;
    --bs-btn-focus-shadow-rgb: white;
    --bs-btn-active-color: white;
    --bs-btn-active-bg: #2b3e54;
    --bs-btn-active-border-color: none;
    --bs-btn-padding-y: .5rem;
    --bs-btn-padding-x: 1.5rem;
  }

  .btn-costum-outline-primary {
    --bs-btn-font-size: .8rem;
    --bs-btn-font-weight: 400;
    --bs-btn-color: #27374b;
    --bs-btn-bg: transparent;
    --bs-btn-border-color: #27374b;
    --bs-btn-border-radius: 1.5rem;
    --bs-btn-hover-color: #ffffff;
    --bs-btn-hover-bg: #27374b;
    --bs-btn-hover-border-color: none;
    --bs-btn-focus-shadow-rgb: white;
    --bs-btn-active-color: white;
    --bs-btn-active-bg: #2b3e54;
    --bs-btn-active-border-color: none;
    --bs-btn-padding-y: .5rem;
    --bs-btn-padding-x: 1.5rem;
  }

  .form-control,
  .form-select {
    font-size: .8rem;
    background-color: #fff;
    background-image: none;
    border: 1px solid #fff;
    border-radius: 1.5rem;
    color: #555;
    display: block;
    height: 34px;
    line-height: 1.42857;
    padding: 6px 12px;
    width: 100%;
  }

  .progressbar {
    counter-reset: step;
    padding: 0;
    text-align: center;
  }

  .progressbar li {
    list-style-type: none;
    width: 20%;
    float: left;
    position: relative;
    text-align: center;
    color: #e6e6e6;
  }

  .progressbar li:before {
    width: 15px;
    height: 15px;
    content: '';
    line-height: 30px;
    border: 2px solid #e6e6e6;
    background-color: #e6e6e6;
    display: block;
    text-align: center;
    margin: auto auto 5px auto;
    border-radius: 50%;
    transition: all .8s;
    z-index: 2;
    position: relative;
  }

  .progressbar li:after {
    width: 100%;
    height: 2px;
    content: '';
    position: absolute;
    background-color: #e6e6e6;
    top: 7px;
    left: -50%;
    transition: all .8s;
  }

  .progressbar li:first-child:after {
    content: none;
  }

  .progressbar li.active:before {
    border-color: #00cc00;
    background-color: #00cc00;
    transition: all .8s;
    color: red;
  }

  .progressbar li.active:after {
    background-color: #00cc00;
    transition: all .8s;
  }

  .progressbar li.active {
    color: #7d7d7d;
  }
</style>

<body class="bg-color">
  <div class="container bg-white">
    <div class="row pt-5 pb-3">
      <div class="col">
        <ul id="progress-bar" class="progressbar">
          <li class="active">Informasi</li>
          <li class="active">Profil</li>
          <li>Alamat</li>
          <li>Usaha</li>
          <li>Lainya</li>
        </ul>
      </div>
    </div>
  </div>
  <form class="" id="upload_form" method="post" enctype="multipart/form-data" action="<?= site_url() ?>AspirasiController/input2">
    <div class="container">
      <div class="row pt-4">
        <div class="col">
          <div class="mb-3">
            <input type="hidden" name="id_kategori_dumisake" id="id_kategori_dumisake" value="<?= $id_kategori_dumisake ?>">
            <input type="text" class="form-control" placeholder="Nama lengkap" name="nama_lengkap" id="nama_lengkap">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nik" name="nik" id="nik" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="No. KK" name="kk" id="kk" required readonly>
          </div>
          <div class="mb-3">
            <!-- <input type="text" class="form-control" name="prov_usaha" placeholder="Provinsi"> -->
            <select class="form-select" name="jk" id="jk" required>
              <option value="">-Jenis Kelamin-</option>
              <option value="1">Laki-laki</option>
              <option value="0">Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Tempat lahir" name="tempat_lahir" id="tempat_lahir" required>
          </div>
          <div class="mb-3">
            <input type="date" class="form-control" style="text-align: left;" name="tgl_lahir" id="tgl_lahir" onchange="calculate_age()" placeholder="Tgl Lahir" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Umurshow" id="umurshow" name="umurshow" value="" readonly>
            <input type="hidden" class="form-control" placeholder="Umur" id="umur" name="umur" value="">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nomor telepon" name="hp" id="hp" required>
          </div>
          <div class="mb-3">
            <select class="form-select" name="sektor_usaha" id="sektor_usaha" required>
              <option value="">-Sektor Usaha-</option>
              <option value="kuliner">Kuliner</option>
              <option value="pashion">Pashion</option>
              <option value="otomotif">Otomotif</option>
              <option value="agribisnis">Agribisnis (Pertanian & Peternakan)</option>
              <option value="tourtrevel">Tour & Trevel</option>
              <option value="produk_kreatif">Produk Kreatif</option>
              <option value="kecantikan">Kecantikan</option>
              <option value="teknologi">Teknologi Internet (Konter, Pembuat Blog, Web, DLL)</option>
              <option value="lainnya">Lainnya</option>
            </select>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Pendidikan terakhir" name="pdd_terakhir" id="pdd_terakhir" required>
          </div>
          <div>
            <input type="text" class="form-control" placeholder="Nama ibu kandung" name="nama_ibu" id="nama_ibu" required>
          </div>
        </div>
      </div>
      <div class="row py-4">
        <div class="col">
          <div class="d-flex justify-content-between">
            <div><a href="<?= site_url() ?>AspirasiController/input" id="Back" class="btn btn-costum-outline-primary">Hal 1</a></div>
            <div><button type="submit" id="Next" class="btn btn-costum-primary">Selanjutnya</button></div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
    var progressBar = {
      Bar: $('#progress-bar'),
      Next: function() {
        $('#progress-bar li:not(.active):first').addClass('active');
      },
      Back: function() {
        $('#progress-bar li.active:last').removeClass('active');
      }
    }

    // A $( document ).ready() block.
    $(document).ready(function() {
      var no_kk = localStorage.getItem('kk');
      $('#kk').val(no_kk);

    });


    function calculate_age() {
      var tgl1 = new Date($("#tgl_lahir").val());
      var tgl2 = new Date();
      var timeDiff = Math.abs(tgl2.getTime() - tgl1.getTime());
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
      // document.getElementById("yourAge").innerHTML = Math.round(diffDays / 365) + " Tahun";
      // alert(Math.round(diffDays / 365))
      $('#umurshow').val(Math.round(diffDays / 365) + " Tahun");
      $('#umur').val(Math.round(diffDays / 365));

    }

    $("#Next").on('click', function() {
      progressBar.Next();
    })
    $("#Back").on('click', function() {
      progressBar.Back();
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

    setInputFilter(document.getElementById("nik"), function(value) {
      return /^-?\d*$/.test(value);
    }, "Hanya Angka!!!");

    setInputFilter(document.getElementById("kk"), function(value) {
      return /^-?\d*$/.test(value);
    }, "Hanya Angka!!!");
  </script>
</body>

</html>