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
          <li class="active">Alamat</li>
          <li class="active">Usaha</li>
          <li>Konfirmasi</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <form class="" id="upload_form" method="post" enctype="multipart/form-data" action="konfirmasi">
      <div class="row pt-4">
        <div class="col">
          <div class="mb-3">
            <input type="text" class="form-control" name="nama_usaha" placeholder="Nama usaha" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="nib_sku_iumk" placeholder="No. NIB/SKU/IUMK" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="alamat_usaha" placeholder="Alamat usaha" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="" value="<?= $getProvJambi->name ?>" placeholder="Provinsi">
            <input type="text" class="form-control" id="prov_usaha" hidden name="prov_usaha" value="<?= $getProvJambi->id ?>" placeholder="Provinsi">
            <!-- <select class="form-select" name="prov_usaha" id="prov_usaha" required>
              <option value="">-Pilih Provinsi-</option>
              <?php foreach ($getProv as $key) {
                echo "<option value='" . $key->id . "'>" . $key->name . "</option>";
              } ?>
            </select> -->
          </div>
          <div class="mb-3">
            <select class="form-select" name="kab_usaha" id="kab_usaha" required>
              <option value="">-Kabupaten-</option>
            </select>
          </div>
          <div class="mb-3">
            <select class="form-select" name="kec_usaha" id="kec_usaha" required>
              <option value="">-Kecamatan-</option>
            </select>
          </div>
          <div>
            <div class="mb-3">
              <select class="form-select" name="kel_usaha" id="kel_usaha" required>
                <option value="">-Kelurahan-</option>
              </select>
            </div>
            <!-- <div class="mb-3">
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
            </div> -->
            <div class="mb-3">
              <select class="form-select" id="sektor_usaha" name="sektor_usaha" required>
                <option value="">-Pilih Sektor Usaha-</option>
                <?php foreach ($get_sektor_usaha as $key) {
                  echo '<option value="' . $key->id_sektor_usaha . '">' . $key->nama . '</option>';
                } ?>
              </select>
            </div>
            <div class="mb-3" id="input_lainnya" style="display: none;">
              <input type="text" class="form-control" placeholder="Sektor Usaha Lainnya" name="lainnya" id="sektor_usaha_lainnya" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="jenis_usaha" placeholder="Jenis usaha" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="pendapatan_perbulan" placeholder="Pendapatan perbulan" required>
            </div>
            <div class="mb-3" id="lainnya">

            </div>
          </div>
        </div>
        <div class="row pb-4 pt-1">
          <div class="col">
            <div class="d-flex justify-content-between">
              <div><a href="input-alamat" id="Back" class="btn btn-costum-outline-primary">Sebelumnya</a></div>
              <div><button type="submit" id="Next" class="btn btn-costum-primary">Selanjutnya</button></div>
            </div>
          </div>
        </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
    android: windowSoftInputMode = "adjustResize"

    var progressBar = {
      Bar: $('#progress-bar'),
      Next: function() {
        $('#progress-bar li:not(.active):first').addClass('active');
      },
      Back: function() {
        $('#progress-bar li.active:last').removenClass('active');
      }
    }

    const sektorSelect = document.getElementById('sektor_usaha');
    const inputLainnya = document.getElementById('input_lainnya');

    sektorSelect.addEventListener('change', function() {
      if (this.value === '9') {
        inputLainnya.style.display = 'block';
        document.getElementById('sektor_usaha_lainnya').setAttribute('required', 'required');
      } else {
        inputLainnya.style.display = 'none';
        document.getElementById('sektor_usaha_lainnya').removeAttribute('required');
        document.getElementById('sektor_usaha_lainnya').value = ''; // reset nilai
      }
    });

    $(document).ready(function() {
      var no_kk = localStorage.getItem('kk');
      $('#kk').val(no_kk);
      if (no_kk) {
        // alert('kksk')
      } else {
        window.location.href = "<?= site_url() ?>TransaksiController/landing";
      }
    });

    $("#Next").on('click', function() {
      progressBar.Next();
    })
    $("#Back").on('click', function() {
      progressBar.Back();
    })

    $('#prov_usaha').ready(function() {
      const prov = $("#prov_usaha").val();
      // alert(prov);
      $.ajax({
        url: '<?= site_url() ?>TransaksiController/getKabUsaha/' + prov,
        type: 'POST',
        success: function(data) {
          // console.log(data);
          $('#kab_usaha').html(data);
        }
      })
    });

    $('#kab_usaha').change(function() {
      const kab = $("#kab_usaha").val();
      // alert(kab);
      $.ajax({
        url: '<?= site_url() ?>TransaksiController/getKecUsaha/' + kab,
        type: 'POST',
        success: function(data) {
          // console.log(data);
          $('#kec_usaha').html(data);
        }
      })
    });

    $('#kec_usaha').change(function() {
      const kec = $("#kec_usaha").val();
      // alert(kab);
      $.ajax({
        url: '<?= site_url() ?>TransaksiController/getKelUsaha/' + kec,
        type: 'POST',
        success: function(data) {
          // console.log(data);
          $('#kel_usaha').html(data);
        }
      })
    });

    // $('#sektor_usaha').change(function() {
    //   const sektor_usaha = $("#sektor_usaha").val();
    //   if (sektor_usaha == 9) {
    //     $('#lainnya').html('<textarea class="form-control" id="exampleFormControlTextarea1" name="lainnya" required placeholder="Isi sektor usaha lainnya disini..." rows="3"></textarea>');
    //   }

    //   // $.ajax({
    //   //   url: '<?= site_url() ?>TransaksiController/getKelUsaha/' + kec,
    //   //   type: 'POST',
    //   //   success: function(data) {
    //   //     // console.log(data);
    //   //     $('#kel_usaha').html(data);
    //   //   }
    //   // })
    // });
  </script>
</body>

</html>