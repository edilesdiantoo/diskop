<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginDiskopController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('id_pegawai')) {
        //     redirect('LoginDiskopController');
        // }
        $this->load->model('LoginDiskopModel');
        $this->load->library('pagination');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $this->load->view('LoginDiskop');
    }
    public function cek()
    {
        $u = $this->input->post('nip');
        $p = $this->input->post('password');

        $pegawai = $this->LoginDiskopModel->cek_login($u, $p); // Mengecek login

        if ($pegawai) {
            // Password valid, lanjutkan login
            $this->session->set_userdata('id_pegawai', $pegawai->id_pegawai);
            $this->session->set_userdata('nama', $pegawai->nama);
            $this->session->set_userdata('level', $pegawai->level);
            $this->session->set_userdata('level_user', $pegawai->level_user);
            $this->session->set_userdata('nip', $pegawai->nip);
            $this->session->set_userdata('kab', $pegawai->kab);
            $this->session->set_userdata('kec', $pegawai->kec);
            $this->session->set_userdata('kab_name', $pegawai->kab_name);
            $this->session->set_userdata('jabatan', $pegawai->jabatan);
            $this->session->set_userdata('id_jabatan', $pegawai->id_jabatan);

            redirect('DashboardController'); // Arahkan ke dashboard setelah login
        } else {
            // Jika login gagal
            $this->session->set_flashdata('message', "<div class='alert alert-danger text-white' role='alert'>
                    <strong>Nik atau Password salah...!</strong>
                    </div>");
            redirect('LoginDiskopController/Index'); // Redirect kembali ke halaman login
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_pegawai');
        $this->session->unset_userdata('nama_lengkap');
        // $this->session->unset_userdata('nama_karyawan');
        redirect('LoginDiskopController');
    }
}
