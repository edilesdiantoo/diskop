<?php

defined('BASEPATH') or exit('No direct script access allowed');

class VerifikasiController extends CI_Controller
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
        // $this->load->model('KeputusanGubernurModel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function VerifikasiPelakuUsaha()
    {
        $this->template->display('Transaksi/Verifikasi/VerifikasiPelakuUsaha');
    }

    public function ShowVerifikasiPelakuUsaha()
    {
        $kab = $this->session->userdata('kab');
        $kec = $this->session->userdata('kec');
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $config['base_url'] = base_url('VerifikasiController/ShowVerifikasiPelakuUsaha');
            $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countPelakuUsaha()->num_rows();
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
            $data['getDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->getDataVerifikasiPelakuUsahaAdministrator($data['start'], $config['per_page']);
        } elseif ($level == 3) {
            $config['base_url'] = base_url('VerifikasiController/ShowVerifikasiPelakuUsaha');
            $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countPelakuUsahaAdmin($kab)->num_rows();
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
            $data['getDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->getDataVerifikasiPelakuUsahaVerify($kab, $data['start'], $config['per_page']);
        } else {
            $config['base_url'] = base_url('VerifikasiController/ShowVerifikasiPelakuUsaha');
            $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countPelakuUsahaAdmin($kab)->num_rows();
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
            $data['getDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->getDataVerifikasiPelakuUsaha($kab, $data['start'], $config['per_page']);
        }
        $this->template->display('Transaksi/Verifikasi/Modal/ShowVerifikasiPelakuUsaha', $data, $config);

        // print_r($kab);
    }

    public function ShowVerifikasiPelakuUsaha2024()
    {
        $kab = $this->session->userdata('kab');
        $kec = $this->session->userdata('kec');
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $config['base_url'] = base_url('VerifikasiController/ShowVerifikasiPelakuUsaha2024');
            $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countPelakuUsaha2024()->num_rows();
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
            $data['getDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->getDataVerifikasiPelakuUsahaAdministrator2024($data['start'], $config['per_page']);
        } elseif ($level == 3) {
            $config['base_url'] = base_url('VerifikasiController/ShowVerifikasiPelakuUsaha2024');
            $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countPelakuUsahaAdmin2024($kab)->num_rows();
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
            $data['getDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->getDataVerifikasiPelakuUsahaVerify2024($kab, $data['start'], $config['per_page']);
        } else {
            $config['base_url'] = base_url('VerifikasiController/ShowVerifikasiPelakuUsaha2024');
            $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countPelakuUsahaAdmin2024($kab)->num_rows();
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
            $data['getDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->getDataVerifikasiPelakuUsaha2024($kab, $data['start'], $config['per_page']);
        }
        $this->template->display('Transaksi/Verifikasi/Modal/ShowVerifikasiPelakuUsaha2024', $data, $config);

        // print_r($kab);
    }

    public function getPelakuUsahaTahun($offset = null)
    {
        $kab = $this->session->userdata('kab');
        $kec = $this->session->userdata('kec');
        $level = $this->session->userdata('level_user');
        if ($level == 3) {
            $config['base_url'] = base_url('VerifikasiController/getPelakuUsahaTahun');
            // $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countPelakuUsahaAdminTahun($kab, $tahun)->num_rows();
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
            $data['getDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->getDataVerifikasiPelakuUsahaVerify($kab, $data['start'], $config['per_page']);

            $this->load->view('Transaksi/Verifikasi/Modal/ShowVerifikasiPelakuUsahaTahun', $data, $config);
        }
    }

    public function ShowAspirasi()
    {
        $kab = $this->session->userdata('kab');
        $kec = $this->session->userdata('kec');
        $level = $this->session->userdata('level_user');
        // if ($level == 1) {
        //     $config['base_url']   = base_url('VerifikasiController/ShowVerifikasiPelakuUsaha');
        //     $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countAspirasi()->num_rows();
        //     $config['per_page']   = 10;

        //     $data['start'] = $this->uri->segment(3, 0);

        //     $config['full_tag_open']  = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end">';
        //     $config['full_tag_close'] = '</ul></nav>';

        //     $config['first_link']      = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"></i>';
        //     $config['first_tag_open']  = '<li class="page-item">';
        //     $config['first_tag_close'] = '</li>';

        //     $config['last_link']      = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right"></i>';
        //     $config['last_tag_open']  = '<li class="page-item">';
        //     $config['last_tag_close'] = '</li>';

        //     $config['next_link']      = '<i class="fa fa-angle-right"></i>';
        //     $config['next_tag_open']  = '<li class="page-item">';
        //     $config['next_tag_close'] = '</li>';

        //     $config['prev_link']      = '<i class="fa fa-angle-left"></i>';
        //     $config['prev_tag_open']  = '<li class="page-item">';
        //     $config['prev_tag_close'] = '</li>';

        //     $config['cur_tag_open']  = '<li class="page-item active"><a class="page-link" href="#">';
        //     $config['cur_tag_close'] = '</a></li>';

        //     $config['num_tag_open']  = '<li class="page-item ">';
        //     $config['num_tag_close'] = '</li>';

        //     $config['attributes'] = array('class' => 'page-link');

        //     $this->pagination->initialize($config);
        //     $data['getDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->getDataVerifikasiPelakuUsahaAdministrator($data['start'], $config['per_page']);
        // } else if ($level == 3) {
        //     $config['base_url']   = base_url('VerifikasiController/ShowVerifikasiPelakuUsaha');
        //     $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countAspirasi($kab)->num_rows();
        //     $config['per_page']   = 10;

        //     $data['start'] = $this->uri->segment(3, 0);

        //     $config['full_tag_open']  = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-left flex-wrap">';
        //     $config['full_tag_close'] = '</ul></nav>';

        //     $config['first_link']      = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"><<</i>';
        //     $config['first_tag_open']  = '<li class="page-item">';
        //     $config['first_tag_close'] = '</li>';

        //     $config['last_link']      = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right">>></i>';
        //     $config['last_tag_open']  = '<li class="page-item">';
        //     $config['last_tag_close'] = '</li>';

        //     $config['next_link']      = '<i class="fa fa-angle-right"></i>Selanjutnya';
        //     $config['next_tag_open']  = '<li class="page-item">';
        //     $config['next_tag_close'] = '</li>';

        //     $config['prev_link']      = '<i class="fa fa-angle-left"></i> Sebelumnya';
        //     $config['prev_tag_open']  = '<li class="page-item">';
        //     $config['prev_tag_close'] = '</li>';

        //     $config['cur_tag_open']  = '<li class="page-item active"><a class="page-link" href="#">';
        //     $config['cur_tag_close'] = '</a></li>';

        //     $config['num_tag_open']  = '<li class="page-item ">';
        //     $config['num_tag_close'] = '</li>';

        //     $config['attributes'] = array('class' => 'page-link');

        //     $this->pagination->initialize($config);
        //     $data['getDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->getDataVerifikasiPelakuUsahaVerify($kab, $data['start'], $config['per_page']);
        // } else {
        //     $config['base_url']   = base_url('VerifikasiController/ShowVerifikasiPelakuUsaha');
        //     $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countAspirasi($kab)->num_rows();
        //     $config['per_page']   = 10;

        //     $data['start'] = $this->uri->segment(3, 0);

        //     $config['full_tag_open']  = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-left flex-wrap">';
        //     $config['full_tag_close'] = '</ul></nav>';

        //     $config['first_link']      = '<i class="fa fa-angle-left" href="#"></i><i class="fa fa-angle-left"><<</i>';
        //     $config['first_tag_open']  = '<li class="page-item">';
        //     $config['first_tag_close'] = '</li>';

        //     $config['last_link']      = '<i class="fa fa-angle-right" href="#"></i><i class="fa fa-angle-right">>></i>';
        //     $config['last_tag_open']  = '<li class="page-item">';
        //     $config['last_tag_close'] = '</li>';

        //     $config['next_link']      = '<i class="fa fa-angle-right"></i>Selanjutnya';
        //     $config['next_tag_open']  = '<li class="page-item">';
        //     $config['next_tag_close'] = '</li>';

        //     $config['prev_link']      = '<i class="fa fa-angle-left"></i> Sebelumnya';
        //     $config['prev_tag_open']  = '<li class="page-item">';
        //     $config['prev_tag_close'] = '</li>';

        //     $config['cur_tag_open']  = '<li class="page-item active"><a class="page-link" href="#">';
        //     $config['cur_tag_close'] = '</a></li>';

        //     $config['num_tag_open']  = '<li class="page-item ">';
        //     $config['num_tag_close'] = '</li>';

        //     $config['attributes'] = array('class' => 'page-link');

        //     $this->pagination->initialize($config);
        //     $data['getDataVerifikasiPelakuUsaha'] = $this->M_verifikasiPelakuUsaha->getDataVerifikasiPelakuUsaha($kab, $data['start'], $config['per_page']);
        // }
        // $this->template->display('Transaksi/Verifikasi/Modal/ShowVerifikasiPelakuUsaha', $data, $config);

        // print_r($kab);
    }

    public function DetailVerifikasi($id)
    {
        $data = [
            'id_pelaku_usaha' => $id,
            // 'getDataPelakuUsaha' => $this->M_verifikasiPelakuUsaha->getDataPelakuUsaha($id),
        ];
        // print_r($data);
        $this->template->display('Transaksi/Verifikasi/DetailVerifikasi/ShowDetailVerifikasi', $data);
    }

    public function CekDataPelakuUsaha($id_pelaku_usaha)
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
        $this->template->display('Transaksi/Verifikasi/DetailVerifikasi/ShowCekDataPelakuUsaha', $data);
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

    public function fotoUsahaMethod($filename, $field)
    {
        $config['upload_path'] = './uploads/fotoUsaha';
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        // $config['max_size']     = 10000;
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($field);
    }

    public function SimpanCekDataEditPelakuUsaha()
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

        // if ($_FILES["file_kk"]["name"]) {
        //     if ($this->input->post('file_kk_old')) {
        //         unlink("uploads/KTP/" . $this->input->post('file_kk_old'));
        //         $curtime = time();
        //         $file_kk = "file_kk" . $curtime . str_replace(" ", "", $_FILES["file_kk"]["name"]);
        //         $this->fcKK_method($file_kk, 'file_kk');
        //     } else {
        //         $curtime = time();
        //         $file_kk = "file_kk" . $curtime . str_replace(" ", "", $_FILES["file_kk"]["name"]);
        //         $this->fcKK_method($file_kk, 'file_kk');
        //     }

        //     unlink("uploads/KTP/" . $this->input->post('file_kk_old'));
        //     $curtime = time();
        //     $file_kk = "file_kk" . $curtime . str_replace(" ", "", $_FILES["file_kk"]["name"]);
        //     $this->fcKK_method($file_kk, 'file_kk');
        // } else {
        //     $file_kk = $this->input->post('file_kk_old');
        // }

        // if ($_FILES["file_sertifikat_umkm"]["name"]) {
        //     if ($this->input->post('file_sertifikat_umkm_old')) {
        //         unlink("uploads/KTP/" . $this->input->post('file_sertifikat_umkm_old'));
        //         $curtime              = time();
        //         $file_sertifikat_umkm = "file_sertifikat_umkm" . $curtime . str_replace(" ", "", $_FILES["file_sertifikat_umkm"]["name"]);
        //         $this->sertifikatUMKM_method($file_sertifikat_umkm, 'file_sertifikat_umkm');
        //     } else {
        //         $curtime              = time();
        //         $file_sertifikat_umkm = "file_sertifikat_umkm" . $curtime . str_replace(" ", "", $_FILES["file_sertifikat_umkm"]["name"]);
        //         $this->sertifikatUMKM_method($file_sertifikat_umkm, 'file_sertifikat_umkm');
        //     }
        // } else {
        //     $file_sertifikat_umkm = $this->input->post('file_sertifikat_umkm_old');
        // }

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

        ];
        $simpanCekDataPelakuUsaha = $this->M_verifikasiPelakuUsaha->simpanCekDataPelakuUsaha($this->input->post('id_pelaku_usaha'), $data);
        echo json_encode($simpanCekDataPelakuUsaha);
        // echo json_encode($data);
    }

    public function VerifikasiAkhir($id_pelaku_usaha)
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
        // print_r($data);
        $this->template->display('Transaksi/Verifikasi/DetailVerifikasi/VerifikasiAkhir', $data);
    }

    public function SimpanVerifikasiAkhir()
    {
        $data = [
            'catatan_penolakan_akhir' => $this->input->post('catatan_penolakan_akhir'),
            'id_kategori_dumisake' => $this->input->post('id_kategori_dumisake'),
            'tgl_edit' => date('Y-m-d'),
            // 'session_aksi_akhir'      => $this->session->userdata('id_pegawai'),
            // 'aksi_akhir_date'         => date('Y-m-d : H:i:s'),
        ];

        $SimpanVerifikasiAkhir = $this->M_verifikasiPelakuUsaha->SimpanVerifikasiAkhir($this->input->post('id_pelaku_usaha'), $data);
        echo json_encode($SimpanVerifikasiAkhir);
    }

    public function VerifikasiAkhirFinal($id_pelaku_usaha, $status)
    {
        $data = [
            // 'simpanValidasiAkhir' => $this->M_verifikasiPelakuUsaha->simpanValidasiAkhir($id_pelaku_usaha, $status),
            'simpanValidasiAkhir' => $this->M_verifikasiPelakuUsaha->simpanValidasiTolakAksi1($id_pelaku_usaha, $status),
        ];
        redirect('VerifikasiController/ShowVerifikasiPelakuUsaha');
    }

    public function showTidakLayak()
    {
        $kab = $this->session->userdata('kab');
        $config['base_url'] = base_url('VerifikasiController/showTidakLayak');
        $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countTidakLayak($kab)->num_rows();
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
        // $data['showTidakLayak'] = $this->M_verifikasiPelakuUsaha->showTidakLayak($kab, $data['start'], $config['per_page']);
        $data['showTidakLayak'] = $this->M_verifikasiPelakuUsaha->showTidakLayakAksi1($kab, $data['start'], $config['per_page']);
        $this->template->display('Transaksi/Verifikasi/ShowTidakLayak', $data, $config);
    }

    public function showCalonPenerima()
    {
        $kab = $this->session->userdata('kab');
        $config['base_url'] = base_url('VerifikasiController/showCalonPenerima');
        $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countCalonPenerima($kab)->num_rows();
        // $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countCalonPenerima2024($kab)->num_rows();
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
        $data['tahunInput'] = '2023';
        $data['showCalonPenerima'] = $this->M_verifikasiPelakuUsaha->showCalonPenerima($kab, $data['start'], $config['per_page']);
        // $data['showCalonPenerima'] = $this->M_verifikasiPelakuUsaha->showCalonPenerimaAksi1($kab, $data['start'], $config['per_page']);
        $this->template->display('Transaksi/Verifikasi/ShowCalonPenerima', $data, $config);
        // print_r($config['total_rows']);
    }

    public function showCalonPenerima2024()
    {
        $kab = $this->session->userdata('kab');
        $config['base_url'] = base_url('VerifikasiController/showCalonPenerima2024');
        // $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countCalonPenerima($kab)->num_rows();
        $config['total_rows'] = $this->M_verifikasiPelakuUsaha->countCalonPenerima2024($kab)->num_rows();
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
        $data['tahunInput'] = '2024';
        // $data['showCalonPenerima'] = $this->M_verifikasiPelakuUsaha->showCalonPenerima($kab, $data['start'], $config['per_page']);
        $data['showCalonPenerima'] = $this->M_verifikasiPelakuUsaha->showCalonPenerimaAksi1($kab, $data['start'], $config['per_page']);
        $this->template->display('Transaksi/Verifikasi/ShowCalonPenerima', $data, $config);
        // print_r($config['total_rows']);
    }

    // public function searchTidakLayak($nama)
    // {
    //     $kab   = $this->session->userdata('kab');

    //     $data = array(
    //         'getDataPelakUsaha' => $this->M_transaksi->getDataPelakUsaha($kab, $nama)->result(),
    //     );

    //     $this->load->view('Transaksi/Ajax/showPelakuSearch', $data);
    //     // echo json_encode($data);
    // }

    public function getKabUsahaEdit()
    {
        $data = [
            'getPelakuUsahaEditWilayahUsaha' => $this->M_verifikasiPelakuUsaha->getPelakuUsahaEditWilayahUsaha($this->input->post('id_pelaku_usaha'))->row(),
            'getKab' => $this->M_verifikasiPelakuUsaha->getKab($this->input->post('prov'))->result(),
        ];
        // echo json_encode($data);
        $this->load->view('Transaksi/WiliyahUsahaEdit/KabupatenUsaha.php', $data);
    }

    public function getKecUsahaEdit()
    {
        $data = [
            'getPelakuUsahaEditWilayahUsaha' => $this->M_verifikasiPelakuUsaha->getPelakuUsahaEditWilayahUsaha($this->input->post('id_pelaku_usaha'))->row(),
            'getKec' => $this->M_verifikasiPelakuUsaha->getKec($this->input->post('kab'))->result(),
        ];

        // print_r($data);
        $this->load->view('Transaksi/WiliyahUsahaEdit/KecamatanUsaha.php', $data);
    }

    public function getKelUsahaEdit()
    {
        $data = [
            'getPelakuUsahaEditWilayahUsaha' => $this->M_verifikasiPelakuUsaha->getPelakuUsahaEditWilayahUsaha($this->input->post('id_pelaku_usaha'))->result(),
            'getKel' => $this->M_verifikasiPelakuUsaha->getKel($this->input->post('kec'))->result(),
        ];
        // print_r($data);
        $this->load->view('Transaksi/WiliyahUsahaEdit/KelurahanUsaha.php', $data);
    }

    public function getPenerimaAdmin()
    {
        $kab_usaha = $this->input->post('kab_usaha');
        $id_kategori = $this->input->post('<id_kateg></id_kateg>ori');
        $data['resultDataPenerimaAdmin'] = $this->M_verifikasiPelakuUsaha->resultDataPenerimaAdmin($kab_usaha, $id_kategori);
        // $data['resultDataPenerimaAdmin'] = $this->M_verifikasiPelakuUsaha->resultDataPenerimaAdmin2024($kab_usaha, $id_kategori);
        $this->load->view('Transaksi/Ajax/ShowDataCalonPenerimaAdmin', $data);
    }

    public function getPenerimaAdmin2024()
    {
        $kab_usaha = $this->input->post('kab_usaha');
        $id_kategori = $this->input->post('<id_kateg></id_kateg>ori');
        // $data['resultDataPenerimaAdmin'] = $this->M_verifikasiPelakuUsaha->resultDataPenerimaAdmin($kab_usaha, $id_kategori);
        $data['resultDataPenerimaAdmin'] = $this->M_verifikasiPelakuUsaha->resultDataPenerimaAdmin2024($kab_usaha, $id_kategori);
        $this->load->view('Transaksi/Ajax/ShowDataCalonPenerimaAdmin', $data);
    }

    public function searchPelakuUsaha($nama)
    {
        $kab = $this->session->userdata('kab');
        $data = [
            'showCalonPenerimaSearch' => $this->M_verifikasiPelakuUsaha->showCalonPenerimaSearch($kab, $nama)->result(),
            // 'showCalonPenerimaSearch' => $this->M_verifikasiPelakuUsaha->showCalonPenerimaSearchAksi1($kab, $nama)->result(),
        ];

        $this->load->view('Transaksi/Ajax/showPelakuSearchCalonPenerima', $data);
        // print_r($data);
    }

    public function searchPelakuUsaha2024($nama)
    {
        $kab = $this->session->userdata('kab');
        $data = [
            // 'showCalonPenerimaSearch' => $this->M_verifikasiPelakuUsaha->showCalonPenerimaSearch($kab, $nama)->result(),
            'showCalonPenerimaSearch' => $this->M_verifikasiPelakuUsaha->showCalonPenerimaSearchAksi1($kab, $nama)->result(),
        ];

        $this->load->view('Transaksi/Ajax/showPelakuSearchCalonPenerima', $data);
        // print_r($data);
    }
}
