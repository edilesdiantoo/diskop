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
          <li class="active">Domisili</li>
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
            <input type="text" class="form-control" name="nama_usaha" placeholder="Nama usaha" value="<?= isset($nama_usaha) ? htmlspecialchars($nama_usaha) : '' ?>" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="nib_sku_iumk" placeholder="No. NIB/SKU/IUMK" value="<?= isset($nib_sku_iumk) ? htmlspecialchars($nib_sku_iumk) : '' ?>" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="alamat_usaha" placeholder="Alamat usaha" value="<?= isset($alamat_usaha) ? htmlspecialchars($alamat_usaha) : '' ?>" required>
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
                      // Cek apakah id_sektor_usaha sesuai dengan session yang ada
                      $selected = ($key->id_sektor_usaha == $this->session->userdata('sektor_usaha')) ? 'selected' : '';
                      echo '<option value="' . $key->id_sektor_usaha . '" ' . $selected . '>' . $key->nama . '</option>';
                  } ?>
              </select>
            </div>
            <div class="mb-3" id="input_lainnya" style="display: none;">
              <input type="text" class="form-control" placeholder="Sektor Usaha Lainnya" name="lainnya" id="sektor_usaha_lainnya" value="<?= isset($lainnya) ? htmlspecialchars($lainnya) : '' ?>" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="jenis_usaha" placeholder="Jenis usaha" value="<?= isset($jenis_usaha) ? htmlspecialchars($jenis_usaha) : '' ?>" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="pendapatan_perbulan" placeholder="Pendapatan perbulan" value="<?= isset($pendapatan_perbulan) ? htmlspecialchars($pendapatan_perbulan) : '' ?>" required>
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
    const sektorUsahaLainnya = document.getElementById('sektor_usaha_lainnya');

    // Fungsi untuk memeriksa apakah sektor_usaha sudah diatur ke '9' (Lainnya)
    function checkSektorUsaha() {
      if (sektorSelect.value === '9') {
        inputLainnya.style.display = 'block'; // Menampilkan input lainnya
        sektorUsahaLainnya.setAttribute('required', 'required'); // Menambahkan required
      } else {
        inputLainnya.style.display = 'none'; // Menyembunyikan input lainnya
        sektorUsahaLainnya.removeAttribute('required'); // Menghapus required
        sektorUsahaLainnya.value = ''; // Reset nilai input lainnya
      }
    }

    // Event listener untuk perubahan nilai sektor_usaha
    sektorSelect.addEventListener('change', function() {
      checkSektorUsaha(); // Panggil fungsi untuk cek kondisi setiap kali user memilih
    });

    // Panggil fungsi checkSektorUsaha saat halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', function() {
      checkSektorUsaha(); // Pastikan kondisi di-check saat halaman dimuat
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

    $(document).ready(function() {
      // Jika provinsi sudah dipilih saat halaman dimuat, ambil data kabupaten
      const prov_usaha = $("#prov_usaha").val();      
      if (prov_usaha) {
          getKabupaten(prov_usaha);
      }

      const kec_usaha = parseInt("<?= @$kab_usaha ?>");
      if (kec_usaha && !isNaN(kec_usaha)) {
          getKecamatan(kec_usaha);
      }

      const kel_usaha = parseInt("<?= @$kec_usaha ?>");
      if (kel_usaha && !isNaN(kel_usaha)) {
          getKelurahan(kel_usaha);
      }

      // Ketika provinsi dipilih, ambil kabupaten
      $('#prov_usaha').change(function() {
          const prov = $(this).val();
          if (prov_usaha) {
              getKabupaten(prov_usaha);
          }
      });

      // Ketika kabupaten dipilih, ambil kecamatan
      $('#kab_usaha').change(function() {    
          const kab_usaha = $(this).val();        
          if (kab_usaha) {
              getKecamatan(kab_usaha);
          }
      });

      // Ketika kecamatan dipilih, ambil kelurahan
      $('#kec_usaha').change(function() {
          const kec_usaha = $(this).val();
          if (kec_usaha) {
              getKelurahan(kec_usaha);
          }
      });    

      // Fungsi untuk mendapatkan kabupaten berdasarkan provinsi
      function getKabupaten(prov_usaha) {
        $.ajax({
            url: '<?= site_url("PelatihanController/getKab/") ?>' + prov_usaha,
            type: 'POST',
            dataType: 'json', // Mendapatkan data dalam format JSON
            success: function(data) {
                // Kosongkan dropdown kabupaten sebelum mengisinya dengan data baru
                $('#kab_usaha').html('<option value="">-Kabupaten-</option>'); 
                
                // Tambahkan opsi ke dropdown untuk setiap kabupaten
                $.each(data, function(index, kab_usaha) {
                    var selected = '';
                    // Tentukan apakah kelurahan ini sesuai dengan session yang ada
                    if (kab_usaha.id == "<?= $this->session->userdata('kab_usaha'); ?>") {
                        selected = 'selected="selected"';
                    }
                    $('#kab_usaha').append('<option value="' + kab_usaha.id + '" ' + selected + '>' + kab_usaha.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: ", status, error); // Menangani error jika ada masalah dalam AJAX
            }
        });
      }

      // Fungsi untuk mendapatkan kecamatan berdasarkan kabupaten
      function getKecamatan(kab_usaha) {
        $.ajax({
          url: '<?= site_url("PelatihanController/getKec/") ?>' + kab_usaha,
          type: 'POST',
          dataType: 'json', // Mendapatkan data dalam format JSON
          success: function(data) {
              // Kosongkan dropdown sebelum mengisi dengan data baru
              $('#kec_usaha').html('<option value="">-Kecamatan-</option>'); 
              
              // Tambahkan opsi ke dropdown
              $.each(data, function(index, kec_usaha) {
                    var selected = '';
                    // Tentukan apakah kelurahan ini sesuai dengan session yang ada
                    if (kec_usaha.id == "<?= $this->session->userdata('kec_usaha'); ?>") {
                        selected = 'selected="selected"';
                    }
                    $('#kec_usaha').append('<option value="' + kec_usaha.id + '" ' + selected + '>' + kec_usaha.name + '</option>');
                });
          },
          error: function(xhr, status, error) {
              console.error("AJAX Error: ", status, error);
          }
        });
      }

      
      // Fungsi untuk mendapatkan kelurahan berdasarkan kecamatan
      function getKelurahan(kec_usaha) {
        $.ajax({
            url: '<?= site_url("PelatihanController/getKel/") ?>' + kec_usaha,
            type: 'POST',
            dataType: 'json', // Mendapatkan data dalam format JSON
            success: function(data) {              
                // Kosongkan dropdown sebelum mengisi dengan data baru
                $('#kel_usaha').html('<option value="">-Kelurahan-</option>'); 
                
                // Tambahkan opsi ke dropdown
                $.each(data, function(index, kel_usaha) {
                    var selected = '';
                    // Tentukan apakah kelurahan ini sesuai dengan session yang ada
                    if (kel_usaha.id == "<?= $this->session->userdata('kel_usaha'); ?>") {
                        selected = 'selected="selected"';
                    }
                    $('#kel_usaha').append('<option value="' + kel_usaha.id + '" ' + selected + '>' + kel_usaha.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: ", status, error);
            }
        });
      }
    });
  </script>
</body>

</html>