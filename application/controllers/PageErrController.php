<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PageErrController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('id_karyawan')) {
        //     redirect('Login');
        // }
        // $this->load->model('M_laporan');
        // $this->load->model('M_transaksi');
        // $this->load->model('M_master');
        // $this->load->model('M_verifikasiPelakuUsaha');
        // $this->load->model('KeputusanGubernurModel');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $this->load->view('ViewPageErr');
    }
}
