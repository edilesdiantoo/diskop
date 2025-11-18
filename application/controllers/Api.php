<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('id_karyawan')) {
        //     redirect('Login');
        // }
        $this->load->model('ApiModel');
        // date_default_timezone_set("Asia/Jakarta");

        // $this->methods['index']['limit'] = 2;
    }

    public function get_pelaku_usaha_post()
    {
        // Ambil parameter dari body POST
        $page = $this->post('page') ?: 1;
        $per_page = $this->post('per_page') ?: 10;
        $tahun = $this->post('tahun') ?: NULL;  // Ambil parameter tahun, jika tidak ada, set ke NULL

        // Hitung total data untuk pagination dengan filter tahun
        $total_data = $this->ApiModel->get_total_data($tahun);  // Tambahkan parameter tahun
        $total_pages = ceil($total_data / $per_page);

        // Ambil data pelaku usaha dari stored procedure dengan filter tahun
        $pelaku_usaha = $this->ApiModel->get_data_pelaku_usaha($page, $per_page, $tahun);

        // Menyusun respons JSON sesuai format yang diinginkan
        $response = [
            'status' => 'OK',
            'data-availability' => 'available',
            'data' => [
                [
                    'page' => $page,
                    'pages' => $total_pages,
                    'per_page' => $per_page,
                    'count' => count($pelaku_usaha),  // Menggunakan count dari data pelaku usaha
                    'total' => $total_data  // Total sesuai dengan filter tahun
                ]
            ],
            'items' => $pelaku_usaha  // Menambahkan data pelaku usaha ke dalam 'items'
        ];

        // Mengembalikan respons JSON
        $this->response($response, RestController::HTTP_OK);
    }

    public function tahun_post()
    {
        // Mengambil daftar tahun yang tersedia di tabel pelaku_usaha
        $tahun_list = $this->ApiModel->get_tahun_available();

        // Menyusun respons JSON untuk daftar tahun
        $response = [
            'status' => 'OK',
            'data-availability' => 'available',
            'data' => $tahun_list
        ];

        // Mengembalikan respons JSON
        $this->response($response, RestController::HTTP_OK);
    }
}