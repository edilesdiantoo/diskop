<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_pegawai')) {
            redirect('LoginDiskopController');
        }
        $this->load->model('M_master');
        $this->load->model('M_transaksi');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $sessionLoginLevel = $this->session->userdata('level_nama_jabatan');
        $data              = array(
            'judul'             => 'MASTER',
            'sub_judul'         => 'Manage Akses Menu',
            'kat_judul'         => 'Akses Menu',
            'sub_title'         => 'Data Akses Menu',
            'title'             => 'List Data Menu',
            'sessionLoginLevel' => $sessionLoginLevel

        );
        $this->template->display('Master/User/User.php');
    }

    public function ShowPengawai()
    {
        $data = array(
            'getPegawai' => $this->M_master->getPegawai(),
        );
        // print_r($data);
        $this->load->view('Master/User/Ajax/ShowUser.php', $data);
    }

    public function TambahPengawai()
    {
        $data = array(
            'getProv'      => $this->M_transaksi->getProv()->result(),
            'getJabatan'   => $this->M_master->getJabatan()->result(),
            'getLevelUser' => $this->M_master->getLevelUser()->result(),

        );
        $this->load->view('Master/User/Ajax/TambahPegawai.php', $data);
    }

    public function getKab($prov)
    {
        // $prov = $this->input->post('prov');
        $id_pegawai = $this->input->post('id_pegawai');
        $data       = array(
            'getPegawaiEdit' => $this->M_master->getPegawaiEdit($id_pegawai)->row(),
            'getKab'         => $this->M_master->getKab($prov)->result(),
        );
        // print_r($prov);
        $this->load->view('Master/Domisili/Kabupaten.php', $data);
    }

    public function getKec($kab)
    {
        // $kab = $this->input->post('kab');
        $id_pegawai = $this->input->post('id_pegawai');
        $data       = array(
            'getPegawaiEdit' => $this->M_master->getPegawaiEdit($id_pegawai)->row(),
            'getKec'         => $this->M_master->getKec($kab)->result(),
        );

        // print_r($data);
        $this->load->view('Master/Domisili/Kecamatan.php', $data);
    }

    public function getKel($kec)
    {
        // $kec = $this->input->post('kec');
        $id_pegawai = $this->input->post('id_pegawai');
        $data       = array(
            'getPegawaiEdit' => $this->M_master->getPegawaiEdit($id_pegawai)->row(),
            'getKel'         => $this->M_master->getKel($kec)->result(),
        );

        // print_r($data);
        $this->load->view('Master/Domisili/Kelurahan.php', $data);
    }

    public function SimpanPengawai()
    {
        $data = array(
            'nama'       => $this->input->post('nama'),
            'jk'         => $this->input->post('jk'),
            'tgl_lahir'  => $this->input->post('tgl_lahir'),
            'alamat'     => $this->input->post('alamat'),
            'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'prov'       => $this->input->post('prov'),
            'kab'        => $this->input->post('kab'),
            'kec'        => $this->input->post('kec'),
            'kel'        => $this->input->post('kel'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'level_user' => $this->input->post('id_level_user'),
            'nip'        => $this->input->post('nip'),
        );
        $simpanDataPegawai = $this->M_master->simpanDataPegawai($data);
        echo json_encode($simpanDataPegawai);
    }

    public function EditPegawai($id)
    {

        $data['getPegawaiEdit'] = $this->M_master->getPegawaiEdit($id)->row();
        $data['getProv']        = $this->M_transaksi->getProv()->result();
        $data['getKab']         = $this->M_master->getKab($data['getPegawaiEdit']->prov)->result();
        $data['getKec']         = $this->M_master->getKec($data['getPegawaiEdit']->kab)->result();
        $data['getKel']         = $this->M_master->getKel($data['getPegawaiEdit']->kec)->result();
        $data['getJabatan']     = $this->M_master->getJabatan()->result();
        $data['getLevelUser']   = $this->M_master->getLevelUser()->result();
        $this->load->view('Master/User/Ajax/EditPegawai.php', $data);
    }

    public function SimpanPengawaiEdit()
    {
        $data = array(
            'nama'          => $this->input->post('nama'),
            'jk'            => $this->input->post('jk'),
            'tgl_lahir'     => $this->input->post('tgl_lahir'),
            'alamat'        => $this->input->post('alamat'),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'prov'          => $this->input->post('prov'),
            'kab'           => $this->input->post('kab'),
            'kec'           => $this->input->post('kec'),
            'kel'           => $this->input->post('kel'),
            'level_user' => $this->input->post('id_level_user'),
            'nip'           => $this->input->post('nip'),
            'id_jabatan'    => $this->input->post('id_jabatan'),
        );
        $simpanDataPegawaiEdit = $this->M_master->simpanDataPegawaiEdit($this->input->post('id_pegawai'), $data);
        echo json_encode($simpanDataPegawaiEdit);
    }

    public function HapusPegawai($id)
    {
        $delete = array(
            'HapusPegawai' => $this->M_master->HapusPegawai($id),
        );
        echo json_encode($delete);
    }
}
