<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AspirasiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('id_pegawai')) {
            redirect('LoginDiskopController');
        }
        $this->load->model('M_transaksi');
        $this->load->model('M_master');
        $this->load->model('M_verifikasiPelakuUsaha');
        $this->load->library('pagination');
        $this->load->model('AspirasiModel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function landing()
    {
        $this->load->view('Aspirasi/landing1');
    }

    public function cekNoKK($nokk)
    {
        $data = [
            'cekNoKK' => $this->M_transaksi->cekNoKK($nokk)->row(),
        ];
        echo json_encode($data);
    }

    public function cekNoKKDetail($nokk)
    {
        $kab = $this->session->userdata('kab');
        $data = [
            'cekNoKK' => $this->M_transaksi->cekNoKK($nokk, $kab)->row(),
        ];
        echo json_encode($data);
    }

    public function input()
    {
        $this->load->view('Aspirasi/input.php');
    }

    public function getKategoriDumisake()
    {
        $data = [
            'get_kategori_dumisake' => $this->M_transaksi->get_kategori_dumisake($this->input->post('id_kategori_dumisake')),
        ];
        $this->load->view('Aspirasi/Ajax/Kategori_dumisake', $data);
    }

    public function input1($id_kategori_dumisake = null)
    {
        $data = [
            'id_kategori_dumisake' => $id_kategori_dumisake,
            'get_sektor_usaha' => $this->M_transaksi->get_sektor_usaha()->result(),
        ];
        $this->load->view('Aspirasi/input1.php', $data);
    }

    public function input2()
    {
        $data = [
            'id_kategori_dumisake' => $this->input->post('id_kategori_dumisake'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'kk' => $this->input->post('kk'),
            'jk' => $this->input->post('jk'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'hp' => $this->input->post('hp'),
            'pdd_terakhir' => $this->input->post('pdd_terakhir'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'getProv' => $this->M_transaksi->getProv()->result(),
        ];
        $this->load->view('Aspirasi/input2.php', $data);
    }

    public function getKab($prov)
    {
        $data = [
            'getKab' => $this->M_transaksi->getKab($prov)->result(),
        ];
        $this->load->view('Aspirasi/Ajax/Kabupaten.php', $data);
    }

    public function getKec($kab)
    {
        $data = [
            'getKec' => $this->M_transaksi->getKec($kab)->result(),
        ];

        // print_r($data);
        $this->load->view('Aspirasi/Ajax/Kecamatan.php', $data);
    }

    public function getKel($kec)
    {
        $data = [
            'getKel' => $this->M_transaksi->getKel($kec)->result(),
        ];

        // print_r($data);
        $this->load->view('Aspirasi/Ajax/Kelurahan.php', $data);
    }

    public function input3()
    {
        $data = [
            // input 1
            'id_kategori_dumisake' => $this->input->post('id_kategori_dumisake'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'kk' => $this->input->post('kk'),
            'jk' => $this->input->post('jk'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'hp' => $this->input->post('hp'),
            'pdd_terakhir' => $this->input->post('pdd_terakhir'),
            'nama_ibu' => $this->input->post('nama_ibu'),

            // input 2
            'alamat' => $this->input->post('alamat'),
            'prov' => $this->input->post('prov'),
            'kab' => $this->input->post('kab'),
            'kec' => $this->input->post('kec'),
            'kel' => $this->input->post('kel'),

            'get_sektor_usaha' => $this->M_transaksi->get_sektor_usaha()->result(),
            'getProv' => $this->M_transaksi->getProv()->result(),

        ];
        // print_r($data);
        $this->load->view('Aspirasi/input3.php', $data);
    }

    public function getKabUsaha($prov)
    {
        $data = [
            'getKab' => $this->M_transaksi->getKab($prov)->result(),
        ];
        $this->load->view('Aspirasi/Ajax/KabupatenUsaha.php', $data);
    }

    public function getKecUsaha($kab)
    {
        $data = [
            'getKec' => $this->M_transaksi->getKec($kab)->result(),
        ];

        // print_r($data);
        $this->load->view('Aspirasi/Ajax/KecamatanUsaha.php', $data);
    }

    public function getKelUsaha($kec)
    {
        $data = [
            'getKel' => $this->M_transaksi->getKel($kec)->result(),
        ];

        // print_r($data);
        $this->load->view('Aspirasi/Ajax/KelurahanUsaha.php', $data);
    }

    public function input4()
    {
        $data = [
            // input 1
            'id_kategori_dumisake' => $this->input->post('id_kategori_dumisake'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'kk' => $this->input->post('kk'),
            'jk' => $this->input->post('jk'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'hp' => $this->input->post('hp'),
            'pdd_terakhir' => $this->input->post('pdd_terakhir'),
            'nama_ibu' => $this->input->post('nama_ibu'),

            // input 2
            'alamat' => $this->input->post('alamat'),
            'prov' => $this->input->post('prov'),
            'kab' => $this->input->post('kab'),
            'kec' => $this->input->post('kec'),
            'kel' => $this->input->post('kel'),

            // input 3
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nib_sku_iumk' => $this->input->post('nib_sku_iumk'),
            'nama_usaha' => $this->input->post('nama_usaha'),
            'alamat_usaha' => $this->input->post('alamat_usaha'),
            'prov_usaha' => $this->input->post('prov_usaha'),
            'kab_usaha' => $this->input->post('kab_usaha'),
            'kec_usaha' => $this->input->post('kec_usaha'),
            'kel_usaha' => $this->input->post('kel_usaha'),
            'sektor_usaha' => $this->input->post('sektor_usaha'),
            'jenis_usaha' => $this->input->post('jenis_usaha'),
            'lainnya' => $this->input->post('lainnya'),
            'pendapatan_perbulan' => $this->input->post('pendapatan_perbulan'),
            'getProv' => $this->M_transaksi->getProv()->result(),

        ];
        // print_r($data);
        $this->load->view('Aspirasi/input4.php', $data);
    }

    public function fcKTP_method($filename, $field)
    {
        $config['upload_path'] = './uploads/KTP';
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        // $config['max_size']     = 10000;
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($field);
    }

    public function fcKK_method($filename, $field)
    {
        $config['upload_path'] = './uploads/KK';
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        // $config['max_size']     = 10000;
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($field);
    }

    public function sertifikatUMKM_method($filename, $field)
    {
        $config['upload_path'] = './uploads/sertifikatUMKM';
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        // $config['max_size']     = 10000;
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($field);
    }

    public function simpanInputPelakuUsaha()
    {
        if ($_FILES['fc_ktp']['name']) {
            $curtime = time();
            $fc_ktp = 'fc_ktp'.$curtime.str_replace(' ', '', $_FILES['fc_ktp']['name']);
            $this->fcKTP_method($fc_ktp, 'fc_ktp');
        } else {
            $fc_ktp = '';
        }

        if ($_FILES['fc_kk']['name']) {
            $curtime = time();
            $fc_kk = 'fc_kk'.$curtime.str_replace(' ', '', $_FILES['fc_kk']['name']);
            $this->fcKK_method($fc_kk, 'fc_kk');
        } else {
            $fc_kk = '';
        }

        if ($_FILES['file_sertifikat_umkm']['name']) {
            $curtime = time();
            $file_sertifikat_umkm = 'file_sertifikat_umkm'.$curtime.str_replace(' ', '', $_FILES['file_sertifikat_umkm']['name']);
            $this->sertifikatUMKM_method($file_sertifikat_umkm, 'file_sertifikat_umkm');
        } else {
            $file_sertifikat_umkm = '';
        }

        $data = [
            // input 1
            'id_kategori_dumisake' => $this->input->post('id_kategori_dumisake'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'kk' => $this->input->post('kk'),
            'jk' => $this->input->post('jk'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'hp' => $this->input->post('hp'),
            'pdd_terakhir' => $this->input->post('pdd_terakhir'),
            'nama_ibu' => $this->input->post('nama_ibu'),

            // input 2
            'alamat' => $this->input->post('alamat'),
            'prov' => $this->input->post('prov'),
            'kab' => $this->input->post('kab'),
            'kec' => $this->input->post('kec'),
            'kel' => $this->input->post('kel'),

            // input 3
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nib_sku_iumk' => $this->input->post('nib_sku_iumk'),
            'nama_usaha' => $this->input->post('nama_usaha'),
            'alamat_usaha' => $this->input->post('alamat_usaha'),
            'prov_usaha' => $this->input->post('prov_usaha'),
            'kab_usaha' => $this->input->post('kab_usaha'),
            'kec_usaha' => $this->input->post('kec_usaha'),
            'kel_usaha' => $this->input->post('kel_usaha'),
            'sektor_usaha' => $this->input->post('sektor_usaha'),
            'jenis_usaha' => $this->input->post('jenis_usaha'),
            'pendapatan_perbulan' => $this->input->post('pendapatan_perbulan'),

            // input 4
            'bersedia_bertanggung_jawab_1' => $this->input->post('bersedia_bertanggung_jawab_1'),
            'bersedia_bertanggung_jawab_2' => $this->input->post('bersedia_bertanggung_jawab_2'),
            'tidak_komisi_jasa' => $this->input->post('tidak_komisi_jasa'),
            'file_ktp' => $fc_ktp,
            'file_kk' => $fc_kk,
            'file_sertifikat_umkm' => $file_sertifikat_umkm,
            'tgl_input' => date('Y-m-d'),
            'rekomendasi_dari' => $this->input->post('rekomendasi_dari'),
            'ditambahkan_oleh' => $this->session->userdata('id_pegawai'),
            'kategori_pelaku_usaha' => '1',
            'aksi' => '1',
        ];

        $simpanPelakuUsaha = $this->M_transaksi->simpanPelakuUsaha($data);
        $nourut = ['no_urut' => $simpanPelakuUsaha];
        $SimpanNoUrut = $this->M_transaksi->noUrut($simpanPelakuUsaha, $nourut);

        // // print_r($SimpanNoUrut);
        echo json_encode($SimpanNoUrut);
    }

    public function bukti_pengajauan($kk)
    {
        $data = [
            'getPelakuUsahaData' => $this->M_transaksi->getPelakuUsahaData($kk),
        ];
        // print_r($data);
        $this->load->view('report', $data);
    }

    // public function aspirasi()
    // {
    //     $data = array();
    //     $this->template->display('Aspirasi/AspirasiView', $data);
    // }

    public function aspirasi()
    {
        $kab = $this->session->userdata('kab');
        $kec = $this->session->userdata('kec');
        $level = $this->session->userdata('level_user');
        $data['tahunInput'] = 2023;
        if ($level == 1) {
            $config['base_url'] = base_url('AspirasiController/aspirasi');
            $config['total_rows'] = $this->AspirasiModel->countPelakuUsaha()->num_rows();
            $config['per_page'] = 10;

            $data['start'] = $this->uri->segment(3, 0);

            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"></i><<';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right"></i>>>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '<i class="fa fa-angle-right"></i>>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-angle-left"></i><';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item ">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = ['class' => 'page-link'];

            $this->pagination->initialize($config);
            $data['getDataVerifikasiPelakuUsaha'] = $this->AspirasiModel->getDataVerifikasiPelakuUsahaAdministrator($data['start'], $config['per_page']);
        } elseif ($level == 3) {
            $config['base_url'] = base_url('AspirasiController/aspirasi');
            $config['total_rows'] = $this->AspirasiModel->countPelakuUsahaAdmin($kab)->num_rows();
            $config['per_page'] = 10;

            $data['start'] = $this->uri->segment(3, 0);

            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-left flex-wrap">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"><<</i>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right">>></i>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '<i class="fa fa-angle-right"></i>Selanjutnya';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Sebelumnya';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item ">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = ['class' => 'page-link'];

            $this->pagination->initialize($config);
            $data['getDataVerifikasiPelakuUsaha'] = $this->AspirasiModel->getDataVerifikasiPelakuUsahaVerify($kab, $data['start'], $config['per_page']);
        } else {
            $config['base_url'] = base_url('AspirasiController/aspirasi');
            $config['total_rows'] = $this->AspirasiModel->countPelakuUsahaAdmin($kab)->num_rows();
            $config['per_page'] = 10;

            $data['start'] = $this->uri->segment(3, 0);

            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-left flex-wrap">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"><<</i>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right">>></i>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '<i class="fa fa-angle-right"></i>Selanjutnya';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Sebelumnya';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item ">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = ['class' => 'page-link'];

            $this->pagination->initialize($config);
            $data['getDataVerifikasiPelakuUsaha'] = $this->AspirasiModel->getDataVerifikasiPelakuUsaha($kab, $data['start'], $config['per_page']);
        }
        $this->template->display('Aspirasi/AspirasiView', $data, $config);
        // print_r($data);
    }

    public function aspirasi2024()
    {
        $kab = $this->session->userdata('kab');
        $kec = $this->session->userdata('kec');
        $level = $this->session->userdata('level_user');
        $data['tahunInput'] = 2024;
        if ($level == 1) {
            $config['base_url'] = base_url('AspirasiController/aspirasi2024');
            $config['total_rows'] = $this->AspirasiModel->countPelakuUsaha2024()->num_rows();
            $config['per_page'] = 10;

            $data['start'] = $this->uri->segment(3, 0);

            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"></i><<';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right"></i>>>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '<i class="fa fa-angle-right"></i>>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-angle-left"></i><';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item ">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = ['class' => 'page-link'];

            $this->pagination->initialize($config);
            $data['getDataVerifikasiPelakuUsaha'] = $this->AspirasiModel->getDataVerifikasiPelakuUsahaAdministrator2024($data['start'], $config['per_page']);
        } elseif ($level == 3) {
            $config['base_url'] = base_url('VerifikasiController/aspirasi2024');
            $config['total_rows'] = $this->AspirasiModel->countPelakuUsahaAdmin2024($kab)->num_rows();
            $config['per_page'] = 10;

            $data['start'] = $this->uri->segment(3, 0);

            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-left flex-wrap">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"><<</i>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right">>></i>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '<i class="fa fa-angle-right"></i>Selanjutnya';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Sebelumnya';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item ">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = ['class' => 'page-link'];

            $this->pagination->initialize($config);
            $data['getDataVerifikasiPelakuUsaha'] = $this->AspirasiModel->getDataVerifikasiPelakuUsahaVerify2024($kab, $data['start'], $config['per_page']);
        } else {
            $config['base_url'] = base_url('AspirasiController/aspirasi2024');
            $config['total_rows'] = $this->AspirasiModel->countPelakuUsahaAdmin2024($kab)->num_rows();
            $config['per_page'] = 10;

            $data['start'] = $this->uri->segment(3, 0);

            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-left flex-wrap">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"><<</i>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right">>></i>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '<i class="fa fa-angle-right"></i>Selanjutnya';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Sebelumnya';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item ">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = ['class' => 'page-link'];

            $this->pagination->initialize($config);
            $data['getDataVerifikasiPelakuUsaha'] = $this->AspirasiModel->getDataVerifikasiPelakuUsaha2024($kab, $data['start'], $config['per_page']);
        }
        $this->template->display('Aspirasi/AspirasiView', $data, $config);
    }

    public function searchPelakuUsahaLevelUser()
    {
        $kab = $this->session->userdata('kab');
        $nama = $this->input->post('nama_search');
        $get_kategori = $this->input->post('get_kategori');

        $data = [
            'getDataPelakUsaha' => $this->AspirasiModel->getDataPelakUsahaLevelUser($kab, $nama, $get_kategori)->result(),
        ];

        $this->load->view('Aspirasi/Ajax/showPelakuSearch', $data);
        // echo json_encode($data);
    }

    public function searchPelakuUsahaLevelUser2024()
    {
        $kab = $this->session->userdata('kab');
        $nama = $this->input->post('nama_search');
        $tahun = $this->input->post('nama_search');
        $get_kategori = $this->input->post('get_kategori');
        $kab_usaha = $this->input->post('kab_usaha');
        $penerima = $this->input->post('penerima');

        $data = [
            'getDataPelakUsaha' => $this->AspirasiModel->getDataPelakUsahaLevelUser2024($kab, $nama, $get_kategori, $kab_usaha, $penerima)->result(),
        ];

        $this->load->view('Aspirasi/Ajax/showPelakuSearch', $data);
        // echo json_encode($data);
    }

    public function aspirasi2025()
    {
        $kab = $this->session->userdata('kab');
        $kec = $this->session->userdata('kec');
        $level = $this->session->userdata('level_user');
        $data['tahunInput'] = 2025;
        if ($level == 1) {
            $config['base_url'] = base_url('AspirasiController/aspirasi2025');
            $config['total_rows'] = $this->AspirasiModel->countPelakuUsaha2025()->num_rows();
            $config['per_page'] = 10;

            $data['start'] = $this->uri->segment(3, 0);

            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"></i><<';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right"></i>>>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '<i class="fa fa-angle-right"></i>>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-angle-left"></i><';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item ">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = ['class' => 'page-link'];

            $this->pagination->initialize($config);
            $data['getDataVerifikasiPelakuUsaha'] = $this->AspirasiModel->getDataVerifikasiPelakuUsahaAdministrator2025($data['start'], $config['per_page']);
        } elseif ($level == 3) {
            $config['base_url'] = base_url('VerifikasiController/aspirasi2025');
            $config['total_rows'] = $this->AspirasiModel->countPelakuUsahaAdmin2025($kab)->num_rows();
            $config['per_page'] = 10;

            $data['start'] = $this->uri->segment(3, 0);

            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-left flex-wrap">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"><<</i>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right">>></i>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '<i class="fa fa-angle-right"></i>Selanjutnya';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Sebelumnya';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item ">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = ['class' => 'page-link'];

            $this->pagination->initialize($config);
            $data['getDataVerifikasiPelakuUsaha'] = $this->AspirasiModel->getDataVerifikasiPelakuUsahaVerify2025($kab, $data['start'], $config['per_page']);
        } else {
            $config['base_url'] = base_url('AspirasiController/aspirasi2025');
            $config['total_rows'] = $this->AspirasiModel->countPelakuUsahaAdmin2025($kab)->num_rows();
            $config['per_page'] = 10;

            $data['start'] = $this->uri->segment(3, 0);

            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-left flex-wrap">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"><<</i>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right">>></i>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '<i class="fa fa-angle-right"></i>Selanjutnya';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-angle-left"></i> Sebelumnya';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item ">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = ['class' => 'page-link'];

            $this->pagination->initialize($config);
            $data['getDataVerifikasiPelakuUsaha'] = $this->AspirasiModel->getDataVerifikasiPelakuUsaha2025($kab, $data['start'], $config['per_page']);
        }
        $this->template->display('Aspirasi/AspirasiView', $data, $config);
    }

    // =========== get data berdasarkan tahun yang dipilih=============//

    public function searchPelakuUsaha()
    {
        $kab = $this->input->post('kab_usaha');       // Get kab_usaha from the AJAX request
        $nama = $this->input->post('nama_search');     // Get the search name
        $tahun = $this->input->post('tahun_penerima');  // Get the year from the AJAX request
        $jenis_bantuan = $this->input->post('jenis_bantuan');   // Tambahan: Jenis Bantuan

        // Validate if the tahun and kab are provided
        if (empty($tahun) || empty($kab)) {
            echo json_encode(['error' => 'Tahun Penerima dan Kabupaten Usaha harus diinput']);

            return;
        }

        // Call the model to fetch the filtered data
        $data = [
            'getDataPelakUsaha' => $this->AspirasiModel->getDataPelakUsaha($kab, $nama, $tahun, $jenis_bantuan)->result(),
        ];

        // Load the view with the data
        $this->load->view('Aspirasi/Ajax/showPelakuSearch', $data);
    }

    public function searchPelakuUsahaLevelUserByYear()
    {
        $tahun_penerima = $this->input->post('tahun_penerima');
        $jenis_bantuan = $this->input->post('jenis_bantuan'); // Ambil jika dikirim

        if ($tahun_penerima) {
            $data = [
                'getDataPelakUsaha' => $this->AspirasiModel->getDataPelakuUsahaByYear($tahun_penerima, $jenis_bantuan)->result(),
            ];

            $this->load->view('Aspirasi/Ajax/showPelakuSearch', $data);
        } else {
            echo 'Tahun tidak valid!';
        }
    }

    // 1. Tambahkan parameter $start = 0 langsung di dalam kurung fungsi
    public function getAspirasiByYears($start = 0)
    {
        // 2. HAPUS baris penangkapan $start dari POST ($start = $this->input->post('start')...)

        $kab = $this->session->userdata('kab');
        $nama = $this->input->post('nama_search');
        $tahun = $this->input->post('tahun_penerima');
        $get_kategori = $this->input->post('get_kategori');
        $kab_usaha = $this->input->post('kab_usaha');
        $penerima = $this->input->post('penerima');
        $jenis_bantuan = $this->input->post('jenis_bantuan');
        $kategori_pelaku_usaha = $this->input->post('kategori_pelaku_usaha');

        $get_kategori = (isset($get_kategori) && $get_kategori !== '') ? $get_kategori : null;
        $jenis_bantuan = (isset($jenis_bantuan) && $jenis_bantuan !== '') ? $jenis_bantuan : null;
        $kategori_pelaku_usaha = (isset($kategori_pelaku_usaha) && $kategori_pelaku_usaha !== '') ? $kategori_pelaku_usaha : null;

        $total_rows = $this->AspirasiModel->countAspirasiByYears($kab, $nama, $get_kategori, $kab_usaha, $penerima, $tahun, $jenis_bantuan, $kategori_pelaku_usaha);

        $this->load->library('pagination');
        $config['base_url'] = site_url('AspirasiController/getAspirasiByYears');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;

        // 3. Tambahkan num_links agar menampilkan lebih banyak angka halaman (misal: 1 2 3 4 5)
        $config['num_links'] = 4;

        // 4. Tambahkan class "justify-content-end" untuk menggeser kotak pagination ke KANAN
        $config['full_tag_open'] = '<ul class="pagination pagination-sm justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = ['class' => 'page-link'];

        $this->pagination->initialize($config);

        $data = [
            'getDataPelakUsaha' => $this->AspirasiModel->getAspirasiByYears($kab, $nama, $get_kategori, $kab_usaha, $penerima, $tahun, $jenis_bantuan, $kategori_pelaku_usaha, $config['per_page'], $start)->result(),
            'start' => $start,
        ];

        $this->load->view('Aspirasi/Ajax/showPelakuSearch', $data);
    }

    public function getKategoriByJenis()
    {
        $jenis = $this->input->post('jenis_bantuan');

        // Wajib: Hanya ambil kategori yang berstatus aktif (1)
        $this->db->where('aktive', 1);

        // Jika jenis bantuan dipilih, tambahkan filter jenis_bantuan
        if ($jenis != '') {
            $this->db->where('Jenis_bantuan', $jenis);
        }

        $kategori = $this->db->get('kategori_dumisake')->result();

        $html = '<option value="">-Pilih Kategori-</option>';
        foreach ($kategori as $row) {
            $html .= '<option value="'.$row->id_kategori_dumisake.'">'.$row->nama.'</option>';
        }

        echo $html;
    }

    public function EditDataPelakuUsaha($id_pelaku_usaha)
    {

        $data['cekDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->cekDataVerifikasiPelakuUsaha($id_pelaku_usaha)->row();
        $data['get_sektor_usaha'] = $this->M_transaksi->get_sektor_usaha()->result();
        $data['getProv'] = $this->M_transaksi->getProv()->result();
        $data['getKab'] = $this->M_master->getKab($data['cekDataVerifikasiPelakuUsaha']->id_prov)->result();
        $data['getKec'] = $this->M_master->getKec($data['cekDataVerifikasiPelakuUsaha']->id_kab)->result();
        $data['getKel'] = $this->M_master->getKel($data['cekDataVerifikasiPelakuUsaha']->id_kec)->result();
        $data['getProvUsaha'] = $this->M_transaksi->getProv()->result();
        $data['getKabUsaha'] = $this->M_master->getKab($data['cekDataVerifikasiPelakuUsaha']->prov_usaha)->result();
        $data['getKecUsaha'] = $this->M_master->getKec($data['cekDataVerifikasiPelakuUsaha']->kab_usaha)->result();
        $data['getKelUsaha'] = $this->M_master->getKel($data['cekDataVerifikasiPelakuUsaha']->kec_usaha)->result();
        // $data['uri1'] = $uri1;
        // $data['uri2'] = $uri2;
        // print_r($data);
        $this->template->display('Aspirasi/Edit/EditDataPengajuan', $data);
    }

    public function SimpanDataEditPelakuUsaha()
    {
        if ($_FILES['foto_usaha']['name']) {
            if ($this->input->post('foto_usaha_old')) {
                unlink('uploads/fotoUsaha/'.$this->input->post('foto_usaha_old'));
                $curtime = time();
                $foto_usaha = 'foto_usaha'.$curtime.str_replace(' ', '', $_FILES['foto_usaha']['name']);
                $this->fotoUsahaMethod($foto_usaha, 'foto_usaha');
            } else {
                $curtime = time();
                $foto_usaha = 'foto_usaha'.$curtime.str_replace(' ', '', $_FILES['foto_usaha']['name']);
                $this->fotoUsahaMethod($foto_usaha, 'foto_usaha');
            }
        } else {
            $foto_usaha = $this->input->post('foto_usaha_old');
        }

        $data = [
            'id_kategori_dumisake' => $this->input->post('id_kategori_dumisake'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'kk' => $this->input->post('kk'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'prov' => $this->input->post('prov'),
            'kab' => $this->input->post('kab'),
            'kec' => $this->input->post('kec'),
            'kel' => $this->input->post('kel'),
            'hp' => $this->input->post('hp'),
            'pdd_terakhir' => $this->input->post('pdd_terakhir'),
            'jk' => $this->input->post('jk'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nib_sku_iumk' => $this->input->post('nib_sku_iumk'),
            'alamat' => $this->input->post('alamat'),
            'nama_usaha' => $this->input->post('nama_usaha'),
            'prov_usaha' => $this->input->post('prov_usaha'),
            'kab_usaha' => $this->input->post('kab_usaha'),
            'kec_usaha' => $this->input->post('kec_usaha'),
            'kel_usaha' => $this->input->post('kel_usaha'),
            'sektor_usaha' => $this->input->post('sektor_usaha'),
            'jenis_usaha' => $this->input->post('jenis_usaha'),
            'pendapatan_perbulan' => $this->input->post('pendapatan_perbulan'),
            'alamat_usaha' => $this->input->post('alamat_usaha'),
            // 'file_ktp'                     => $file_ktp,
            'bersedia_bertanggung_jawab_1' => $this->input->post('bersedia_bertanggung_jawab_1'),
            // 'file_kk'                      => $file_kk,
            'bersedia_bertanggung_jawab_2' => $this->input->post('bersedia_bertanggung_jawab_2'),
            // 'file_sertifikat_umkm'         => $file_sertifikat_umkm,
            'tidak_komisi_jasa' => $this->input->post('tidak_komisi_jasa'),
            'titik_koordinat' => $this->input->post('titik_koordinat'),
            'catatan_penolakan' => $this->input->post('catatan_penolakan'),
            'session_edit' => $this->session->userdata('id_pegawai'),
            'tgl_edit' => date('Y-m-d'),
            'session_aksi' => $this->session->userdata('id_pegawai'),
            'rekomendasi_dari' => $this->input->post('rekomendasi_dari'),
            'kategori_pelaku_usaha' => $this->input->post('kategori_pelaku_usaha'),
            'foto_usaha' => $foto_usaha,
            'aksi' => $this->input->post('aksi'),
            'jenis_bantuan' => $this->input('jenis_bantuan'),

        ];
        $simpanCekDataPelakuUsaha = $this->M_verifikasiPelakuUsaha->simpanCekDataPelakuUsaha($this->input->post('id_pelaku_usaha'), $data);
        echo json_encode([
            'status' => $simpanCekDataPelakuUsaha ? true : false,
            'message' => 'Data berhasil disimpan',
        ]);

        exit;

        // Hentikan script di sini agar HTML di bawahnya tidak ikut tercetak
    }
}
