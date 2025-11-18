<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_pegawai')) {
            redirect('LoginDiskopController');
        }
        $this->load->model('M_master');
        $this->load->model('M_laporan');
        // $this->load->model('SaranaPrasaranaModel');
        // $this->load->model('RombonganBelajarModel');
        // $this->load->model('PesertaDidikModel');

        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $data = array(
            'getBerkasPengajuan' => $this->M_master->getBerkasPengajuan()->row(),
            'getBerkasPengajuan2024' => $this->M_master->getBerkasPengajuan2024()->row(),
            'getCalonPenerima'   => $this->M_master->getCalonPenerima()->num_rows(),
            'getDitolak'         => $this->M_master->getDitolak()->num_rows(),
            'penerima2020_2021'  => $this->M_master->penerima2020_2021()->row(),
            // 'getDataPerkab'      => $this->M_laporan->getDataPerkab()->result(),
            'getBeritaKegiatan'      => $this->M_laporan->getBeritaKegiatan()->result(),
            // 'getSaranaPrasarana' => $this->SaranaPrasaranaModel->getSaranaPrasarana()->num_rows(),
            // 'getRombonganBelajar' => $this->RombonganBelajarModel->getRombonganBelajar()->num_rows(),
            // 'getDataPesertaDidik' => $this->PesertaDidikModel->getDataPesertaDidik()->num_rows(),
        );
        // print_r($data);
        $this->template->display('Dashboard/DashboardPegawaiView.php', $data);
    }

    public function fotoKegiatan($filename, $field)
    {
        $config['upload_path']   = './uploads/kegiatan';
        $config['allowed_types'] = '*';
        $config['overwrite']     = true;
        // $config['max_size']     = 10000;
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($field);
    }

    public function simpanKegiatan()
    {
        if ($_FILES["foto_kegiatan"]["name"]) {
            if ($this->input->post('foto_kegiatan_old')) {
                unlink("uploads/kegiatan/" . $this->input->post('foto_kegiatan_old'));
                $curtime    = time();
                $foto_kegiatan = "foto_kegiatan" . $curtime . str_replace(" ", "", $_FILES["foto_kegiatan"]["name"]);
                $this->fotoKegiatan($foto_kegiatan, 'foto_kegiatan');
            } else {
                $curtime    = time();
                $foto_kegiatan = "foto_kegiatan" . $curtime . str_replace(" ", "", $_FILES["foto_kegiatan"]["name"]);
                $this->fotoKegiatan($foto_kegiatan, 'foto_kegiatan');
            }
        } else {
            $foto_kegiatan = $this->input->post('foto_kegiatan_old');
        }

        $hdr = array(
            'des'          => $this->input->post('des'),
            'link'         => $this->input->post('link'),
            'thumbnail'    => $foto_kegiatan,
            'tgl_input'    => date('Y-m-d'),
            'tgl_kegiatan' => date('Y-m-d'),
        );
        $id = $this->input->post('id');

        if ($id) {
            $simpanKegiatan = $this->M_master->simpanKegiatanEdit($id, $hdr);
        } else {
            $simpanKegiatan = $this->M_master->simpanKegiatan($hdr);
        }


        if ($simpanKegiatan > 0) {
            $response = array('status' => 'success', 'message' => 'AKSI BERHASIL');
        } else {
            $response = array('status' => 'error', 'message' => 'AKSI GAGAL');
        }

        echo json_encode($response);
    }

    public function editBeritaKegiatan()
    {
        $id = $this->input->post('id');
        $data  = $this->M_master->getBeritaKegitan($id)->row();

        echo json_encode($data);
    }

    public function hapusBeritaKegiatan()
    {
        $id = $this->input->post('id');
        $hapusBeritaKegiatan = $this->M_master->hapusBeritaKegiatan($id);

        if ($hapusBeritaKegiatan > 0) {
            $response = array('status' => 'success', 'message' => 'AKSI BERHASIL');
        } else {
            $response = array('status' => 'error', 'message' => 'AKSI GAGAL');
        }

        echo json_encode($response);
    }
}
