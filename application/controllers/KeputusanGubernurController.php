<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KeputusanGubernurController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('id_karyawan')) {
        //     redirect('Login');
        // }
        $this->load->model('KepegawaianModel');
        $this->load->model('KeputusanGubernurModel');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $sessionLoginLevel = $this->session->userdata('level_nama_jabatan');
        $data = array(
            'judul'             => 'MASTER',
            'sub_judul'         => 'Manage Akses Menu',
            'kat_judul'         => 'Akses Menu',
            'sub_title'         => 'Data Akses Menu',
            'title'             => 'List Data Menu',
            'sessionLoginLevel' => $sessionLoginLevel

        );
        if ($sessionLoginLevel == 2) {
            $this->template->display('SuratKeluar/KeputusanGubernur/VerifikasiKabid/KeputusanGubernurVerifikasiKabid.php', $data);
        } else if ($sessionLoginLevel == 1) {
            $this->template->display('SuratKeluar/KeputusanGubernur/VerifikasiKadis/KeputusanGubernurVerifikasiKadis.php', $data);
        } else {
            $this->template->display('SuratKeluar/KeputusanGubernur/KeputusanGubernurView.php', $data);
        }
    }

    public function ShowKeputusanGubernur()
    {
        $data = array(
            'getKeputusanGubernur' => $this->KeputusanGubernurModel->getKeputusanGubernur()->result(),
        );
        $this->load->view('SuratKeluar/KeputusanGubernur/ajax/ShowKeputusanGubernur.php', $data);
    }

    public function TambahKeputusanGubernur()
    {
        $this->load->view('SuratKeluar/KeputusanGubernur/ajax/TambahKeputusanGubernur.php');
    }

    public function KeputusanGubernur($filename, $field)
    {
        $config['upload_path'] = './uploads/SuratKeluar/KeputusanGubernur';
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        // $config['max_size']     = 10000;
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($field);
    }

    public function SimpanKeputusanGubernur()
    {
        if ($_FILES["keputusan_gubernur"]["name"]) {
            $curtime = time();
            $keputusan_gubernur = "keputusan_gubernur" . $curtime . str_replace(" ", "", $_FILES["keputusan_gubernur"]["name"]);
            $this->KeputusanGubernur($keputusan_gubernur, 'keputusan_gubernur');
        } else {
            $keputusan_gubernur = '';
        }
        $dataP = array(
            'no_surat_keputusan_gubernur' => 'XX/KEP.GUB/ITPROV-1/XXXX',
            'surat_keputusan_gubernur'    => $keputusan_gubernur,
            'tgl_input'                   => date('Y-m-d'),
            'dibuat_oleh'                 => $this->session->userdata('id_pegawai'),
            'status_pengajuan'           => '1'

        );
        $SimpanKeputusanGubernur = $this->KeputusanGubernurModel->SimpanKeputusanGubernur($dataP);
        echo json_encode($SimpanKeputusanGubernur);
    }

    public function HistoryPengajuan($id_keputusan_gubernur)
    {
        $data = array(
            'getKeputusanGubernur' => $this->KeputusanGubernurModel->HistoryPengajuan($id_keputusan_gubernur)->row(),
        );
        $this->template->display('SuratKeluar/KeputusanGubernur/KeputusanGubernurHistoryPengajuan.php', $data);
    }

    // public function EditKeputusanGubernur()
    // {
    //     $editPdd = array(
    //         'getKeputusanGubernurEdit' => $this->KeputusanGubernurModel->getKeputusanGubernurEdit($this->input->post('id_sarana'))->result(),
    //     );
    //     $this->load->view('SuratKeluar/KeputusanGubernur/ajax/EditKeputusanGubernur.php', $editPdd);
    // }

    public function SimpanKeputusanGubernurEdit()
    {
        $dataPD = array(
            'jenis'   => $this->input->post('jenis'),
            'nama'    => $this->input->post('nama'),
            'ruang'   => $this->input->post('ruang'),
            'lantai'  => $this->input->post('lantai'),
            'panjang' => $this->input->post('panjang'),
            'lebar'   => $this->input->post('lebar'),
            // 'tgl_input' => $this->input->post('tgl_input'),
            'tgl_edit'          => $this->input->post('tgl_edit'),
        );
        $SimpanKeputusanGubernurEdit = $this->KeputusanGubernurModel->SimpanKeputusanGubernurEdit($this->input->post('id_sarana'), $dataPD);
        echo json_encode($SimpanKeputusanGubernurEdit);
    }

    public function HapusKeputusanGubernur($id)
    {
        $delete = array(
            'HapusKeputusanGubernur' => $this->KeputusanGubernurModel->HapusKeputusanGubernur($id),
        );
        echo json_encode($delete);
    }

    //-----------------verifiakasi kabid ----------------------//

    public function ShowKeputusanGubernurKabid()
    {
        $data = array(
            'getKeputusanGubernurKabid' => $this->KeputusanGubernurModel->getKeputusanGubernurKabid()->result(),
        );
        $this->load->view('SuratKeluar/KeputusanGubernur/VerifikasiKabid/ajax/ShowKeputusanGubernurKabid.php', $data);
    }

    public function VerifikasiKabidSetuju($id_keputusan_gubernur)
    {
        $data = array(
            'id_keputusan_gubernur' => $id_keputusan_gubernur,
            'verifikasi_2'          => $this->session->userdata('id_pegawai'),
            'verifikasi_2_aksi'     => '1',
            'verifikasi_2_date'     => date('Y-m-d')
        );
        $this->KeputusanGubernurModel->VerifikasiKabidSetuju($id_keputusan_gubernur, $data);
        redirect('KeputusanGubernurController');
    }

    public function VerifikasiKabidTolak()
    {
        $data = array(
            'id_keputusan_gubernur' => $this->input->post('id_keputusan_gubernur'),
            'catatan'               => $this->input->post('catatan'),
            'verifikasi_2'          => $this->session->userdata('id_pegawai'),
            'verifikasi_2_aksi'     => '2',
            'verifikasi_2_date'     => date('Y-m-d')
        );
        $this->KeputusanGubernurModel->VerifikasiKabidTolak($this->input->post('id_keputusan_gubernur'), $data);
        redirect('KeputusanGubernurController');
    }

    //-----------------verifiakasi kadis ----------------------//

    public function ShowKeputusanGubernurKadis()
    {
        $data = array(
            'getKeputusanGubernurKadis' => $this->KeputusanGubernurModel->getKeputusanGubernurKadis()->result(),
        );
        $this->load->view('SuratKeluar/KeputusanGubernur/VerifikasiKadis/ajax/ShowKeputusanGubernurKadis.php', $data);
    }

    public function VerifikasiKadisSetuju($id_keputusan_gubernur)
    {
        $data = array(
            'id_keputusan_gubernur' => $id_keputusan_gubernur,
            'verifikasi_3'          => $this->session->userdata('id_pegawai'),
            'verifikasi_3_aksi'     => '1',
            'verifikasi_3_date'     => date('Y-m-d')
        );
        $this->KeputusanGubernurModel->VerifikasiKadisSetuju($id_keputusan_gubernur, $data);
        redirect('KeputusanGubernurController');
    }

    public function VerifikasiKadisTolak()
    {
        $data = array(
            'id_keputusan_gubernur' => $this->input->post('id_keputusan_gubernur'),
            'catatan'               => $this->input->post('catatan'),
            'verifikasi_3'          => $this->session->userdata('id_pegawai'),
            'verifikasi_3_aksi'     => '2',
            'verifikasi_3_date'     => date('Y-m-d')
        );
        $this->KeputusanGubernurModel->VerifikasiKadisTolak($this->input->post('id_keputusan_gubernur'), $data);
        redirect('KeputusanGubernurController');
    }

    public function ShowTTE($id_keputusan_gubernur)
    {
        $data = array(
            'getKeputusanGubernurTTE' => $this->KeputusanGubernurModel->getKeputusanGubernurTTE($id_keputusan_gubernur),
        );

        $this->load->view('SuratKeluar/TTE/KeputusanGubernurTTE.php', $data);

        // print_r($data);
    }
}
