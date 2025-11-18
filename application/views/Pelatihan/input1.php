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
    display: flex;
    justify-content: center; /* 🔹 Pusatkan secara horizontal */
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 0rem; /* Jarak antar item (opsional) */
    
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
  <div class="container bg-white" style="padding-top: 3rem;">
    <div class="row pt-5 pb-3">
      <div class="col">
        <ul id="progress-bar" class="progressbar">
          <!-- <li class="active">Informasi</li> -->
          <li class="active">Profil</li>
          <li>Alamat</li>
          <li>Usaha</li>
          <li>Konfirmasi</li>
        </ul>
      </div>
    </div>
  </div>
  <form class="" id="upload_form" method="post" enctype="multipart/form-data" action="input-alamat">
    <div class="container">
      <div class="row pt-4">
        <div class="col">
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nama lengkap" value="<?= isset($nama_lengkap) ? htmlspecialchars($nama_lengkap) : '' ?>" name="nama_lengkap" id="nama_lengkap">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nik" name="nik" id="nik" value="<?= isset($nik) ? htmlspecialchars($nik) : '' ?>" required autocomplete="off">
            <input name="" id="niktest" class="form-control" type="hidden" placeholder="Masukkan No KK">
            <small id="alertNIK" class="" style="font-size: x-small; color: orange;"> <i style="color: red;"></i></small><br>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="No. KK" name="" id="kk" required readonly>
          </div>
          <div class="mb-3">
            <select class="form-select" name="jk" id="jk" required>
              <option value="">-Jenis Kelamin-</option>
              <option value="1" <?= (isset($jk) && $jk == '1') ? 'selected' : '' ?>>Laki-laki</option>
              <option value="0" <?= (isset($jk) && $jk == '0') ? 'selected' : '' ?>>Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Tempat lahir" name="tempat_lahir" id="tempat_lahir" value="<?= isset($tempat_lahir) ? htmlspecialchars($tempat_lahir) : '' ?>" required>
          </div>
          <div class="mb-3">
            <input type="date" class="form-control" style="text-align: left;" name="tgl_lahir" id="tgl_lahir" value="<?= isset($tgl_lahir) ? htmlspecialchars($tgl_lahir) : '' ?>" onchange="calculate_age()" placeholder="Tgl Lahir" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Umur" id="umurshow" name="umurshow" value="" readonly>
            <input type="hidden" class="form-control" placeholder="Umur" id="umur" name="umur" value="">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nomor telepon" name="hp" id="hp" value="<?= isset($hp) ? htmlspecialchars($hp) : '' ?>" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Pendidikan terakhir" name="pdd_terakhir" id="pdd_terakhir" value="<?= isset($pdd_terakhir) ? htmlspecialchars($pdd_terakhir) : '' ?>" required>
          </div>
          <div>
            <input type="text" class="form-control" placeholder="Nama ibu kandung" name="nama_ibu" id="nama_ibu" value="<?= isset($nama_ibu) ? htmlspecialchars($nama_ibu) : '' ?>" required>
          </div>
        </div>
      </div>
      <div class="row py-4">
        <div class="col">
          <div class="d-flex justify-content-between">
            <div><a href="input-pelatihan" id="Back" class="btn btn-costum-outline-primary">Sebelumnya</a></div>
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

    $(document).ready(function() {
      var no_kk = localStorage.getItem('kk');
      $('#kk').val(no_kk);
      if (no_kk) {
      } else {
        window.location.href = "<?= site_url() ?>PelatihanController/landing";
      }

    });

    // A $( document ).ready() block.
    $(document).ready(function() {
      var no_kk = localStorage.getItem('kk');
      $('#kk').val(no_kk);

    });

    $(document).ready(function() {
      // Panggil fungsi untuk menghitung umur saat halaman pertama kali dimuat
      calculateNIK();

      // Fungsi untuk menghitung dan validasi NIK
      function calculateNIK() {
        var nikValue = $("#nik").val(); // Ambil nilai dari input NIK

        // Cek apakah tgl lahir kosong
        if (!nikValue) {
          $('#alertNIK').text('');  // Kosongkan kolom alert jika nik kosong
          $('#nik').css('border', '1px solid #dc3545');  // Border merah jika nik kosong
          $('#Next').hide();  // Sembunyikan tombol "Next" jika NIK kosong
          return; // Stop fungsi jika NIK kosong
        }

        // Jika NIK lebih dari 16 karakter, batalkan input
        if (nikValue.length > 16) {
          nikValue = nikValue.slice(0, 16); // Potong NIK menjadi 16 karakter
          $("#nik").val(nikValue); // Update input NIK dengan nilai yang sudah dipotong
          $('#alertNIK').text('NIK tidak boleh lebih dari 16 karakter');
        }

        // Jika NIK sudah ada isinya, lanjutkan pemeriksaan panjang NIK
        if (nikValue.length === 16) {
          $('#alertNIK').text(''); // Kosongkan alert jika NIK sudah valid
          $('#nik').css('border', '1px solid #198754');  // Border hijau jika valid
          $('#Next').show();  // Tampilkan tombol "Next" jika NIK sudah 16 karakter
        } else {
          $('#Next').hide();  // Sembunyikan tombol "Next" jika NIK belum 16 karakter
          $('#nik').css('border', '1px solid #dc3545');  // Border merah jika NIK kurang dari 16 karakter
          $('#alertNIK').text(16 - nikValue.length + ' Karakter tersisa');  // Tampilkan sisa karakter
        }
      }

      // Event handler untuk perubahan NIK
      $("#nik").on('keyup', function() {
        calculateNIK(); // Panggil validasi NIK setiap kali input NIK berubah
      });
    });

    
    $(document).ready(function() {
      // Panggil fungsi untuk menghitung umur saat halaman pertama kali dimuat
      calculate_age();

      // Fungsi untuk menghitung umur berdasarkan tanggal lahir
      function calculate_age() {
        var tgl_lahir = $("#tgl_lahir").val(); // Ambil nilai dari input tanggal lahir

        // Cek apakah tgl_lahir kosong
        if (!tgl_lahir) {
          $('#umurshow').val('');  // Kosongkan kolom umur jika tgl lahir kosong
          $('#umur').val('');
          return; // Jika tgl lahir kosong, stop fungsi
        }

        // Jika tgl_lahir ada, lanjutkan perhitungan umur
        var tgl1 = new Date(tgl_lahir);
        var tgl2 = new Date();
        
        // Hitung selisih waktu antara tanggal lahir dan tanggal sekarang
        var timeDiff = Math.abs(tgl2.getTime() - tgl1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Convert ke hari
        
        // Hitung umur berdasarkan selisih hari dibagi 365
        var umur = Math.round(diffDays / 365); // Perkiraan umur dalam tahun
        
        // Tampilkan umur dalam field umurshow dan umur
        $('#umurshow').val(umur + " Tahun");  // Menampilkan umur dalam format tahun
        $('#umur').val(umur);  // Menyimpan umur dalam form hidden (atau field lain)
      }

      // Event handler untuk perubahan tanggal lahir
      $("#tgl_lahir").on('change', function() {
        calculate_age();  // Panggil perhitungan umur saat tanggal lahir diubah
      });
    });

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

    setInputFilter(document.getElementById("hp"), function(value) {
      return /^-?\d*$/.test(value);
    }, "Hanya Angka!!!");
  </script>
</body>

</html>