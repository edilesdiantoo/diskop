<style>
  .nav-item.active {
    background-color: #4B49AC; /* Warna latar belakang aktif */
    color: white;  /* Warna teks saat aktif */
  }

  .nav-link.active {
      color: white !important; /* Pastikan teks ikon menjadi putih jika aktif */
  }
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- Dashboard Menu -->
    <li class="nav-item" style="background-color: #4B49AC; border-radius: 8px;">
      <a class="nav-link" href="<?= base_url('DashboardController') ?>">
        <i class="icon-grid menu-icon text-white"></i>
        <span class="menu-title text-white">Dashboard</span>
      </a>
    </li>

    <!-- Divider -->
    <li class="nav-item">
      <hr>
    </li>

    <!-- MASTER Menu for Users with Level other than 2 and 3 -->
    <?php if ($this->session->userdata('level_user') != 2 && $this->session->userdata('level_user') != 3): ?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth1">
          <i class="bi bi-person icon-align-justify menu-icon"></i>
          <span class="menu-title">MASTER</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth1">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('MasterController'); ?>">Pegawai</a>
            </li>
          </ul>
        </div>
      </li>
    <?php endif; ?>

    <!-- Verifikasi Menu -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth2">
        <i class="icon-align-justify bi bi-person-workspace  menu-icon"></i>
        <span class="menu-title">Verifikasi</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth2">
        <ul class="nav flex-column sub-menu">
          <?php if ($this->session->userdata('level_user') == 1 || $this->session->userdata('level_user') == 2): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('VerifikasiController/ShowVerifikasiPelakuUsaha'); ?>">Pengajuan 2023</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('VerifikasiController/ShowVerifikasiPelakuUsaha2024'); ?>">Pengajuan 2024</a>
            </li>
          <?php endif; ?>

          <?php if ($this->session->userdata('level_user') == 1 || $this->session->userdata('level_user') == 3): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('VerifikasiController/showTidakLayak'); ?>">Tidak Layak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('VerifikasiController/showCalonPenerima'); ?>">Penerima 2023</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('VerifikasiController/showCalonPenerima2024'); ?>">Penerima 2024</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </li>

    <!-- Monitoring Menu -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth3" aria-expanded="false" aria-controls="auth3">
        <i class="bi bi-zoom-in icon-align-justify menu-icon"></i>
        <span class="menu-title">Monitoring</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth3">
        <ul class="nav flex-column sub-menu">
          <?php if ($this->session->userdata('level_user') == 1 || $this->session->userdata('level_user') == 3): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('LaporanController/TotalCalonPenerima'); ?>">Total Penerima 2023</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('LaporanController/TotalCalonPenerima2024'); ?>">Total Penerima 2024</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('LaporanController/DataPerKab'); ?>">Rekap Perkab 2023</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('LaporanController/DataPerKab2024'); ?>">Rekap Perkab 2024</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('LaporanController/LapPelakuUsaha'); ?>">Lap. Pelaku Usaha</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('LaporanController/PrintPDF'); ?>">Print-Out 2023</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('LaporanController/PrintPDF2024'); ?>">Print-Out 2024</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Aspirasi Menu -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth4" aria-expanded="false" aria-controls="auth4">
        <i class="bi bi-wrench-adjustable icon-align-justify menu-icon"></i>
        <span class="menu-title">Aspirasi</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth4">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('TransaksiController/landing'); ?>">Input Pengajuan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('AspirasiController/aspirasi'); ?>">Pengajuan Aspirasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('LaporanController/rekapRekomendasi2024'); ?>">Rekomendasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('LaporanController/lapRekomendasi2024'); ?>">Print Laporan</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Pelatihan -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth5" aria-expanded="false" aria-controls="auth5">
        <i class="bi bi-wrench-adjustable icon-align-justify menu-icon"></i>
        <span class="menu-title">Pelatihan</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth5">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('PelatihanController/landing'); ?>">Input Pelatihan</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('AspirasiController/aspirasi'); ?>">Pengajuan Aspirasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('LaporanController/rekapRekomendasi2024'); ?>">Rekomendasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('LaporanController/lapRekomendasi2024'); ?>">Print Laporan</a>
          </li> -->
        </ul>
      </div>
    </li>
  </ul>
</nav>

<script>
  // Menambahkan event listener untuk setiap item menu
  document.querySelectorAll('.nav-item').forEach(item => {
      item.addEventListener('click', function() {
          // Menghapus kelas active dari semua item menu
          document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));

          // Menambahkan kelas active pada item yang dipilih
          item.classList.add('active');
      });
  });
</script>
