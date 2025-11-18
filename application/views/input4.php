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

  .cardx {
    border-radius: 1.5rem;
    border: none;
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

  input[type=file]::-webkit-file-upload-button {
    background-color: #27374b;
    border: 0;
    padding: 8px 20px;
    color: white;
    border-bottom-left-radius: 1.5rem;
    border-top-left-radius: 1.5rem;
  }

  .inputfile {
    background-color: white;
    border: 0;
    width: 100%;
    border-radius: 1.5rem;
  }

  .bd-example-modal-lg .modal-dialog {
    display: table;
    position: relative;
    margin: 0 auto;
    top: calc(50% - 24px);
  }

  .bd-example-modal-lg .modal-dialog .modal-content {
    background-color: transparent;
    border: none;
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
          <li class="active">Usaha</li>
          <li class="active">Lainya</li>
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
          <div class="mb-4">
            <label class="form-label">Foto Usaha</label>
            <input type="file" class="inputfile" id="foto_usaha" name="foto_usaha" accept="image/*" required>
            <small id="error">

            </small>
          </div>
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
          <div class="mb-3">
            <div class="card cardx">
              <div class="card-body">
                <label class="form-label">Aspirasi</label>
                <div class="mb-3">
                  <select class="form-select" name="kategori_pelaku_usaha" id="kategori_pelaku_usaha" required>
                    <option value="0">-Tidak-</option>
                    <option value="1">-Ya-</option>
                  </select>
                </div>
                <label class="form-label">Rekomendasi Pelaku Usaha</label>
                <div class="mb-3">
                  <input type="text" class="form-control" name="rekomendasi_dari" placeholder="Rekomendasi" required>
                </div>
              </div>
            </div>
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

      <input type="hidden" class="form-control" placeholder="Alamat sesuai KTP" name="alamat" value="<?= $alamat ?>">
      <input type="hidden" class="form-control" placeholder="Provinsi" name="prov" value="<?= $prov ?>">
      <input type="hidden" class="form-control" placeholder="Kecamatan" name="kec" value="<?= $kec ?>">
      <input type="hidden" class="form-control" placeholder="Kabupaten / Kota" name="kab" value="<?= $kab ?>">
      <input type="hidden" class="form-control" placeholder="Kelurahan" name="kel" value="<?= $kel ?>">

      <input type="hidden" class="form-control" name="nama_usaha" value="<?= $nama_usaha ?>" placeholder="Nama usaha">
      <input type="hidden" class="form-control" name="alamat_usaha" value="<?= $alamat_usaha ?>" placeholder="Alamat usaha">
      <input type="hidden" class="form-control" name="prov_usaha" value="<?= $prov_usaha ?>">
      <input type="hidden" class="form-control" name="kab_usaha" value="<?= $kab_usaha ?>">
      <input type="hidden" class="form-control" name="kec_usaha" value="<?= $kec_usaha ?>">
      <input type="hidden" class="form-control" name="kel_usaha" value="<?= $kel_usaha ?>">
      <input type="hidden" class="form-control" name="sektor_usaha" value="<?= $sektor_usaha ?>">

      <input type="hidden" class="form-control" name="nib_sku_iumk" value="<?= $nib_sku_iumk ?>">
      <input type="hidden" class="form-control" name="jenis_usaha" value="<?= $jenis_usaha ?>">
      <input type="hidden" class="form-control" name="pendapatan_perbulan" value="<?= $pendapatan_perbulan ?>">

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
      <div class="modal-content" style="width: 48px">
        <div class="d-flex justify-content-center">
          <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
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

    var inputElement = document.getElementById("foto_usaha")

    inputElement.addEventListener('change', function() {
      var fileLimit = 200; // could be whatever you want 
      var files = inputElement.files; //this is an array
      var fileSize = files[0].size;
      var fileSizeInKB = (fileSize / 1024); // this would be in kilobytes defaults to bytes

      if (fileSizeInKB < fileLimit) {
        // console.log("file go for launch")
        // add file to db here
        document.getElementById("error").innerHTML = '<i style="color: red;">*</i> file yang diupload max 200kb'
      } else {
        // console.log(fileSizeInKB);
        // console.log("file too big")
        // do not pass go, do not add to db. Pass error to user    
        document.getElementById("error").innerHTML = '<span style="color: red;">Ukuran file yang anda input melebihi 200kb, silahkan input ulang.</span>'
        $(this).val('');
      }
    })
    document.getElementById("error").innerHTML = '<i style="color: red;">*</i> file yang diupload max 200kb'


    // $('.inputfile').on('change', function() {
    //   var numb = $(this)[0].files[0].size / 200 / 200;
    //   numb = numb.toFixed(2);
    //   if (numb > 6) {
    //     alert('File anda terlalu besar. File anda : ' + numb + ' MiB');
    //     $(this).val('');
    //   } else {
    //     // alert('it okey, your file has ' + numb + 'MiB')
    //   }
    // });

    $(document).ready(function() {
      const id_kategori_dumisake = $("#id_kategori_dumisake").val();
      // alert(id_kategori_dumisake);
      if (id_kategori_dumisake == 1) {
        Swal.fire({
          title: 'WAJIB DIISI',
          text: "Untuk kategori milenial 20juta harus menyertakan fc sertifikat umkm",
          icon: "warning",
          showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          }
        }).then(function() {
          // window.location.href = "<?= site_url() ?>TransaksiController/bukti_pengajauan/" + kk;
          $("fc_tertifikat").prop('required', true);
        });
      } else {
        $("fc_tertifikat").prop('required', false);

      }
      // alert('test');
      // $('#kk').val(no_kk);

    });

    $(document).ready(function() {
      $('#upload_form').on('submit', function(event) {
        const kk = $("#kk").val();
        event.preventDefault();
        $.ajax({
          url: "<?= site_url() ?>TransaksiController/simpanInputPelakuUsaha",
          method: "POST",
          data: new FormData(this),
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            // console.log(data);
            $('.modal').modal('show');
            setTimeout(function() {
              // console.log('hejsan');
              $('.modal').modal('hide');
              Swal.fire({
                title: 'DATA BERHASIL DISIMPAN',
                text: "SILAHKAN ANTAR PROFOSAL KE DINAS KOPERASI & UKM KABUPATEN/KOTA BERDASARKAN DOMISILI USAHA UNTUK DIPROSES VERIFIKASI",
                icon: "success",
                showClass: {
                  popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                  popup: 'animate__animated animate__fadeOutUp'
                }
              }).then(function() {
                window.location.href = "<?= site_url() ?>TransaksiController/bukti_pengajauan/" + kk;
              });
            }, 3000);

          }
        })
      });
    });
  </script>
</body>

</html>