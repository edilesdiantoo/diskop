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
  <div class="container bg-white" style="padding-top: 3rem;">
    <div class="row pt-5 pb-3">
      <div class="col">
        <ul id="progress-bar" class="progressbar">
          <li class="active">Informasi</li>
          <li class="active">Profil</li>
          <li class="active">Alamat</li>
          <li>Usaha</li>
          <li>Lainya</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <form class="" id="upload_form" method="post" enctype="multipart/form-data" action="<?= site_url() ?>TransaksiController/input3">
      <div class="row pt-4">
        <div class="col">
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Alamat sesuai KTP khusus Provinsi Jambi" name="alamat" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="" name="prov" value="<?= $getProvJambi->id ?>" readonly placeholder="Provinsi">
            <input type="text" class="form-control" id="prov" hidden name="" value="<?= $getProvJambi->id ?>" readonly placeholder="Provinsi">
            <!-- <select class="form-select" name="prov" id="prov" required > -->
            <!-- <option value="">-Pilih Provinsi-</option> -->
            <!-- <?php foreach ($getProvJambi as $key) {
                    echo "<option value='" . $key->id . "' selected>" . $key->name . "</option>";
                  } ?>
            </select> -->
          </div>
          <div class="mb-3">
            <select class="form-select" name="kab" id="kab" required>
              <option value="">-Kabupaten-</option>
            </select>
          </div>
          <div class="mb-3">
            <select class="form-select" name="kec" id="kec" required>
              <option value="">-Kecamatan-</option>
            </select>
          </div>
          <div>
            <div>
              <select class="form-select" name="kel" id="kel" required>
                <option value="">-Kelurahan-</option>
              </select>
            </div>
          </div>
        </div>
        <input type="hidden" name="id_kategori_dumisake" id="id_kategori_dumisake" value="<?= $id_kategori_dumisake ?>">
        <input type="hidden" name="nama_lengkap" id="nama_lengkap" value="<?= $nama_lengkap ?>">
        <input type="hidden" name="nik" id="nik" value="<?= $nik ?>">
        <input type="hidden" name="kk" id="kk" value="<?= $kk ?>">
        <input type="hidden" name="jk" id="jk" value="<?= $jk ?>">
        <input type="hidden" name="tempat_lahir" id="tempat_lahir" value="<?= $tempat_lahir ?>">
        <input type="hidden" name="tgl_lahir" id="tgl_lahir" value="<?= $tgl_lahir ?>">
        <input type="hidden" name="hp" id="hp" value="<?= $hp ?>">
        <input type="hidden" name="pdd_terakhir" id="pdd_terakhir" value="<?= $pdd_terakhir ?>">
        <input type="hidden" name="nama_ibu" id="nama_ibu" value="<?= $nama_ibu ?>">
        <div class="row py-4">
          <div class="col">
            <div class="d-flex justify-content-between">
              <div><a href="<?= site_url() ?>TransaksiController/input" id="Back" class="btn btn-costum-outline-primary">Hal 1</a></div>
              <div><button id="Next" class="btn btn-costum-primary">Selanjutnya</button></div>
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
        $('#progress-bar li.active:last').removeClass('active');
      }
    }

    $("#Next").on('click', function() {
      progressBar.Next();
    })
    $("#Back").on('click', function() {
      progressBar.Back();
    })

    $('#prov').ready(function() {
      const prov = $("#prov").val();
      // alert(prov);
      $.ajax({
        url: '<?= site_url() ?>TransaksiController/getKab/' + prov,
        type: 'POST',
        success: function(data) {
          // console.log(data);
          $('#kab').html(data);
        }
      })
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

    $('#kab').change(function() {
      const kab = $("#kab").val();
      // alert(kab);
      $.ajax({
        url: '<?= site_url() ?>TransaksiController/getKec/' + kab,
        type: 'POST',
        success: function(data) {
          // console.log(data);
          $('#kec').html(data);
        }
      })
    });

    $('#kec').change(function() {
      const kec = $("#kec").val();
      // alert(kab);
      $.ajax({
        url: '<?= site_url() ?>TransaksiController/getKel/' + kec,
        type: 'POST',
        success: function(data) {
          // console.log(data);
          $('#kel').html(data);
        }
      })
    });
  </script>
</body>

</html>