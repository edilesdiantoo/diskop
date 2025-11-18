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

  .card {
    border: 0;
  }

  .cardx {
    list-style-type: none;
    padding: 0;
  }
</style>

<body class="bg-color">
  <div class="container bg-white" style="padding-top: 3rem;">
    <div class="row pt-5 pb-3">
      <div class="col">
        <ul id="progress-bar" class="progressbar">
          <li class="active">Informasi</li>
          <li>Profil</li>
          <li>Alamat</li>
          <li>Usaha</li>
          <li>Lainya</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row pt-4">
      <div class="col">
        <div class="mb-3">
          <?php
          $kategories_dumisake  = $this->M_transaksi->kategories_dumisake()->result();
          ?>
          <select class="form-select" id="get_kategori" name="kategori_dumisake" required>
            <option value="" style="">-Pilih Kategori-</option>
            <?php foreach ($kategories_dumisake as $key => $value) {
              echo '<option value="' . $value->id_kategori_dumisake . '">' . $value->nama . '</option>';
            } ?>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <ul class="cardx" id="resultKategori">
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row py-4">
      <div class="col text-end">
        <div class="d-flex justify-content-end"><a type="button" id="Next" class="btn btn-costum-primary">Selanjutnya</a></div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="<?= base_url('assets/js/crypto-js.min.js') ?>"></script>
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
        // console.log(CryptoJS.MD5('<?= $kk_input ?>'));
      } else {
        window.location.href = "<?= site_url() ?>TransaksiController/landing";
      }

    });


    $("#Next").on('click', function() {
      progressBar.Next();
      const id_kategori_dumisake = $("#get_kategori").val();
      window.location.href = "<?= site_url() ?>TransaksiController/input1/" + id_kategori_dumisake;
    })
    $("#Back").on('click', function() {
      progressBar.Back();
    })

    $(document).ready(function() {
      $('#get_kategori').on('change', function() {
        const id_kategori_dumisake_get = $("#get_kategori").val();
        localStorage.setItem('id_kategori_dumsisake_get', id_kategori_dumisake_get);
        const id_kategori_dumisake = $("#get_kategori").val();
        $.ajax({
          type: "post",
          url: "<?= site_url() ?>TransaksiController/getKategoriDumisake",
          dataType: 'html',
          data: {
            id_kategori_dumisake: id_kategori_dumisake,
          },
          success: function(data) {
            $("#resultKategori").html(data);
          }
        });
      });
    });
  </script>
</body>

</html>