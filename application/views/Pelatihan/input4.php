<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SINETAP</title> <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- sweetalert -->
  <script src="<?= base_url(); ?>assets/js/sweetalert211.js" integrity="" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
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

  /* Modal Loading yang berada di tengah */
  .modal-dialog {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;  /* Mengatur agar modal berada di tengah layar vertikal */
  }

  .modal-content {
    width: auto;
    max-width: 300px;  /* Sesuaikan ukuran */
    border-radius: 10px;
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
          <li class="active">Konfirmasi</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <form class="" id="upload_form" method="post" enctype="multipart/form-data">
      <div class="row pt-4">
        <div class="col">
          <!-- <div class="mb-4">
            <label class="form-label">FC KTP</label>
            <input type="file" class="inputfile" name="fc_ktp" required>
            <small>
              <i style="color: red;">*</i> file yang diupload max 200kb
            </small>
          </div> -->
          <!-- <div class="mb-4">
            <label class="form-label">FC KK</label>
            <input type="file" class="inputfile" name="fc_kk" required>
            <small>
              <i style="color: red;">*</i> file yang diupload max 200kb
            </small>
          </div>
          <div class="mb-4">
            <label class="form-label">FC Sertifikat UMKM</label>
            <input type="file" class="inputfile" name="file_sertifikat_umkm" id="fc_tertifikat">
            <small>
              <i style="color: red;">*</i> file yang diupload max 200kb
            </small>
          </div> -->
          <!-- <div class="mb-3">
            <div class="card cardx">
              <div class="card-body">
                <label class="form-label">Foto Usaha</label> <br>
                <input type="file" class="inputfile" id="foto_usaha" name="foto_usaha" accept="image/*" required> <br>
                <small id="error"></small>
              </div>
            </div>
          </div> -->
          <div class="mb-3">
            <div class="card cardx">
              <div class="card-body">
                <label class="form-label">Bersedia bertanggung jawab penuh atas dana bantuan</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="bersedia_bertanggung_jawab_1" value="1" id="flexRadioDefault1" required>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Ya
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="bersedia_bertanggung_jawab_1" value="0" id="flexRadioDefault1" required>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Tidak
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card cardx">
              <div class="card-body">
                <label class="form-label">Bersedia bertanggung jawab membuat laporan pemanfaatan dana bantuan</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="bersedia_bertanggung_jawab_2" value="1" id="flexRadioDefault1" required>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Ya
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="bersedia_bertanggung_jawab_2" value="0" id="flexRadioDefault1" required>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Tidak
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="card cardx">
              <div class="card-body">
                <label class="form-label">Tidak memberikan uang ucapan terima kasih, uang jasa dan uang komisi kepada pihak lain</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tidak_komisi_jasa" value="1" id="flexRadioDefault1" required>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Ya
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tidak_komisi_jasa" value="0" id="flexRadioDefault1" required>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Tidak
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row py-4">
        <div class="col">
          <div class="d-flex justify-content-between">
            <div><a href="<?= site_url() ?>TransaksiController/input" id="Back" class="btn btn-costum-outline-primary">Hal 1</a></div>
            <div><button type="submit" id="Next" class="btn btn-costum-primary">Selesai</button></div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
      <div class="modal-dialog modal-sm">
          <div class="modal-content" style="width: 48px; background: transparent; border: none;">
              <div class="d-flex justify-content-center">
                  <div class="spinner-border" style="width: 3rem; height: 3rem; border-color: transparent; border-top-color: #007bff; font-size: 2rem;" role="status">
                      <span class="visually-hidden">Loading...</span>
                  </div>
              </div>
          </div>
      </div>
  </div>



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
        // alert(no_kk)
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
      $('#upload_form').on('submit', function(event) {
        const KK = localStorage.getItem('kk');
        event.preventDefault();
        // Menampilkan modal loading
        $('.modal').modal('show');

        // Kirim data menggunakan AJAX
        $.ajax({
          url: "<?= site_url() ?>PelatihanController/simpanInputPelatihan",
          method: "POST",
          data: new FormData(this),
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            // Modal loading tetap terbuka selama minimal 5 detik
            setTimeout(function() {
              // Setelah 5 detik, sembunyikan modal
              $('.modal').modal('hide');
              
              if (data.status === 'success') {
                // Tampilkan notifikasi sukses jika data berhasil disimpan
                Swal.fire({
                  title: 'DATA BERHASIL DISIMPAN',
                  text: "SILAHKAN ANTAR PROPOSAL KE DINAS KOPERASI & UKM KABUPATEN/KOTA BERDASARKAN DOMISILI USAHA UNTUK DIPROSES VERIFIKASI",
                  icon: "success",
                  showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
                }).then(function() {
                  // Redirect ke halaman selanjutnya 
                  // window.location.href = "bukti-pelatihan/" + KK;
                  window.location.href = "input-pelatihan";
                });
              } else if (data.status === 'error') {
                // Menangani error jika ada error dari server (misalnya KK duplikat)
                Swal.fire({
                  title: 'Terjadi Kesalahan',
                  text: data.message, // Menampilkan pesan error dari backend
                  icon: 'error'
                }).then(function() {
                  // Redirect setelah tombol OK di klik
                  window.location.href = "input-pelatihan"; 
                });
              }
            }, 5000); // 5 detik delay sebelum modal ditutup
          },
          error: function() {
            // Menangani error jika terjadi masalah pada AJAX request
            $('.modal').modal('hide');
            Swal.fire({
              title: 'Terjadi Kesalahan',
              text: "Data gagal disimpan. Silakan coba lagi.",
              icon: 'error'
            });
          }
        });
      });
    });
  </script>
</body>

</html>