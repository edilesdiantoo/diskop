<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('id_pegawai')) {
        //     redirect('PageErrController');
        // }
        $this->load->model('M_transaksi');
        // $this->load->model('KeputusanGubernurModel');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function landing()
    {
        $this->load->view('landing1');
    }

    public function cekNoKK($nokk)
    {
        $data = array(
            'cekNoKK' => $this->M_transaksi->cekNoKK($nokk)->row(),
        );
        echo json_encode($data);
    }

    public function cekNoKKDetail($nokk)
    {
        $kab  = $this->session->userdata('kab');
        $data = array(
            'cekNoKK' => $this->M_transaksi->cekNoKK($nokk, $kab)->row(),
        );
        echo json_encode($data);
    }

    public function input($nokk)
    {
        // echo json_encode("1");
        $data['kk_input'] = $nokk;
        if ($nokk) {
            $this->load->view('input', $data);
        } else {
            $this->load->view('Contruction');
        }
    }

    public function getKategoriDumisake()
    {
        $data = array(
            'get_kategori_dumisake' => $this->M_transaksi->get_kategori_dumisake($this->input->post('id_kategori_dumisake')),
        );

        // print_r($data);
        $this->load->view('Transaksi/Ajax/Kategori_dumisake', $data);
    }

    public function input1($id_kategori_dumisake = null)
    {
        // echo json_encode("1");
        // echo $value;
        $data = array(
            'id_kategori_dumisake' => $id_kategori_dumisake,
            'get_sektor_usaha'     => $this->M_transaksi->get_sektor_usaha()->result(),
        );
        if ($id_kategori_dumisake) {
            $this->load->view('input1.php', $data);
        } else {
            $this->load->view('Contruction');
        }
    }

    public function input2()
    {
        $data = array(
            'id_kategori_dumisake' => $this->input->post('id_kategori_dumisake'),
            'nama_lengkap'         => $this->input->post('nama_lengkap'),
            'nik'                  => $this->input->post('nik'),
            'kk'                   => $this->input->post('kk'),
            'jk'                   => $this->input->post('jk'),
            'tempat_lahir'         => $this->input->post('tempat_lahir'),
            'tgl_lahir'            => $this->input->post('tgl_lahir'),
            'hp'                   => $this->input->post('hp'),
            'pdd_terakhir'         => $this->input->post('pdd_terakhir'),
            'nama_ibu'             => $this->input->post('nama_ibu'),
            'getProvJambi'         => $this->M_transaksi->getProvJambi()->row(),

        );
        // print_r($data);
        $this->load->view('input2', $data);
    }

    public function getKab($prov)
    {
        $data = array(
            'getKab' => $this->M_transaksi->getKab($prov)->result(),
        );
        $this->load->view('Transaksi/Ajax/Kabupaten.php', $data);
    }

    public function getKec($kab)
    {
        $data = array(
            'getKec' => $this->M_transaksi->getKec($kab)->result(),
        );

        // print_r($data);
        $this->load->view('Transaksi/Ajax/Kecamatan.php', $data);
    }

    public function getKel($kec)
    {
        $data = array(
            'getKel' => $this->M_transaksi->getKel($kec)->result(),
        );

        // print_r($data);
        $this->load->view('Transaksi/Ajax/Kelurahan.php', $data);
    }

    public function getKabUsaha($prov)
    {
        $data = array(
            'getKab' => $this->M_transaksi->getKab($prov)->result(),
        );
        $this->load->view('Transaksi/Ajax/KabupatenUsaha.php', $data);
    }

    public function getKecUsaha($kab)
    {
        $data = array(
            'getKec' => $this->M_transaksi->getKec($kab)->result(),
        );

        // print_r($data);
        $this->load->view('Transaksi/Ajax/KecamatanUsaha.php', $data);
    }

    public function getKelUsaha($kec)
    {
        $data = array(
            'getKel' => $this->M_transaksi->getKel($kec)->result(),
        );

        // print_r($data);
        $this->load->view('Transaksi/Ajax/KelurahanUsaha.php', $data);
    }

    public function input3()
    {
        $data = array(
            //input 1
            'id_kategori_dumisake' => $this->input->post('id_kategori_dumisake'),
            'nama_lengkap'         => $this->input->post('nama_lengkap'),
            'nik'                  => $this->input->post('nik'),
            'kk'                   => $this->input->post('kk'),
            'jk'                   => $this->input->post('jk'),
            'tempat_lahir'         => $this->input->post('tempat_lahir'),
            'tgl_lahir'            => $this->input->post('tgl_lahir'),
            'hp'                   => $this->input->post('hp'),
            'pdd_terakhir'         => $this->input->post('pdd_terakhir'),
            'nama_ibu'             => $this->input->post('nama_ibu'),

            // input 2
            'alamat' => $this->input->post('alamat'),
            'prov'   => $this->input->post('prov'),
            'kab'    => $this->input->post('kab'),
            'kec'    => $this->input->post('kec'),
            'kel'    => $this->input->post('kel'),

            'get_sektor_usaha' => $this->M_transaksi->get_sektor_usaha()->result(),
            // 'getProv'             => $this->M_transaksi->getProv()->result(),
            'getProvJambi' => $this->M_transaksi->getProvJambi()->row(),

        );
        // print_r($data);
        $this->load->view('input3.php', $data);
    }

    public function input4()
    {
        $data = array(
            //input 1
            'id_kategori_dumisake' => $this->input->post('id_kategori_dumisake'),
            'nama_lengkap'         => $this->input->post('nama_lengkap'),
            'nik'                  => $this->input->post('nik'),
            'kk'                   => $this->input->post('kk'),
            'jk'                   => $this->input->post('jk'),
            'tempat_lahir'         => $this->input->post('tempat_lahir'),
            'tgl_lahir'            => $this->input->post('tgl_lahir'),
            'hp'                   => $this->input->post('hp'),
            'pdd_terakhir'         => $this->input->post('pdd_terakhir'),
            'nama_ibu'             => $this->input->post('nama_ibu'),

            // input 2
            'alamat' => $this->input->post('alamat'),
            'prov'   => $this->input->post('prov'),
            'kab'    => $this->input->post('kab'),
            'kec'    => $this->input->post('kec'),
            'kel'    => $this->input->post('kel'),

            // input 3
            'nama_ibu'            => $this->input->post('nama_ibu'),
            'nib_sku_iumk'        => $this->input->post('nib_sku_iumk'),
            'nama_usaha'          => $this->input->post('nama_usaha'),
            'alamat_usaha'        => $this->input->post('alamat_usaha'),
            'prov_usaha'          => $this->input->post('prov_usaha'),
            'kab_usaha'           => $this->input->post('kab_usaha'),
            'kec_usaha'           => $this->input->post('kec_usaha'),
            'kel_usaha'           => $this->input->post('kel_usaha'),
            'sektor_usaha'        => $this->input->post('sektor_usaha'),
            'jenis_usaha'         => $this->input->post('jenis_usaha'),
            'lainnya'             => $this->input->post('lainnya'),
            'pendapatan_perbulan' => $this->input->post('pendapatan_perbulan'),
            'getProv'             => $this->M_transaksi->getProv()->result(),

        );
        // print_r($data);
        $this->load->view('input4', $data);
    }

    // public function fcKTP_method($filename, $field)
    // {
    //     $config['upload_path']   = './uploads/KTP';
    //     $config['allowed_types'] = '*';
    //     $config['overwrite']     = true;
    //     // $config['max_size']     = 10000;
    //     $config['file_name'] = $filename;
    //     $this->load->library('upload', $config);
    //     $this->upload->initialize($config);
    //     $this->upload->do_upload($field);
    // }

    // public function fcKK_method($filename, $field)
    // {
    //     $config['upload_path']   = './uploads/KK';
    //     $config['allowed_types'] = '*';
    //     $config['overwrite']     = true;
    //     // $config['max_size']     = 10000;
    //     $config['file_name'] = $filename;
    //     $this->load->library('upload', $config);
    //     $this->upload->initialize($config);
    //     $this->upload->do_upload($field);
    // }

    public function fotoUsahaMethod($filename, $field)
    {
        $config['upload_path']   = './uploads/fotoUsaha';
        $config['allowed_types'] = '*';
        $config['overwrite']     = true;
        // $config['max_size']     = 10000;
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($field);
    }

    public function simpanInputPelakuUsaha()
    {
        if ($_FILES["foto_usaha"]["name"]) {
            $curtime    = time();
            $foto_usaha = "foto_usaha" . $curtime . str_replace(" ", "", $_FILES["foto_usaha"]["name"]);
            $this->fotoUsahaMethod($foto_usaha, 'foto_usaha');
        } else {
            $foto_usaha = '';
        }

        // if ($_FILES["fc_kk"]["name"]) {
        //     $curtime = time();
        //     $fc_kk = "fc_kk" . $curtime . str_replace(" ", "", $_FILES["fc_kk"]["name"]);
        //     $this->fcKK_method($fc_kk, 'fc_kk');
        // } else {
        //     $fc_kk = '';
        // }

        // if ($_FILES["file_sertifikat_umkm"]["name"]) {
        //     $curtime = time();
        //     $file_sertifikat_umkm = "file_sertifikat_umkm" . $curtime . str_replace(" ", "", $_FILES["file_sertifikat_umkm"]["name"]);
        //     $this->sertifikatUMKM_method($file_sertifikat_umkm, 'file_sertifikat_umkm');
        // } else {
        //     $file_sertifikat_umkm = '';
        // }

        $data = array(
            //input 1
            'id_kategori_dumisake' => $this->input->post('id_kategori_dumisake'),
            'nama_lengkap'         => $this->input->post('nama_lengkap'),
            'nik'                  => $this->input->post('nik'),
            'kk'                   => $this->input->post('kk'),
            'jk'                   => $this->input->post('jk'),
            'tempat_lahir'         => $this->input->post('tempat_lahir'),
            'tgl_lahir'            => $this->input->post('tgl_lahir'),
            'hp'                   => $this->input->post('hp'),
            'pdd_terakhir'         => $this->input->post('pdd_terakhir'),
            'nama_ibu'             => $this->input->post('nama_ibu'),

            // input 2
            'alamat' => $this->input->post('alamat'),
            'prov'   => $this->input->post('prov'),
            'kab'    => $this->input->post('kab'),
            'kec'    => $this->input->post('kec'),
            'kel'    => $this->input->post('kel'),

            // input 3
            'nama_ibu'            => $this->input->post('nama_ibu'),
            'nib_sku_iumk'        => $this->input->post('nib_sku_iumk'),
            'nama_usaha'          => $this->input->post('nama_usaha'),
            'alamat_usaha'        => $this->input->post('alamat_usaha'),
            'prov_usaha'          => $this->input->post('prov_usaha'),
            'kab_usaha'           => $this->input->post('kab_usaha'),
            'kec_usaha'           => $this->input->post('kec_usaha'),
            'kel_usaha'           => $this->input->post('kel_usaha'),
            'sektor_usaha'        => $this->input->post('sektor_usaha'),
            'jenis_usaha'         => $this->input->post('jenis_usaha'),
            'pendapatan_perbulan' => $this->input->post('pendapatan_perbulan'),

            //input 4
            'bersedia_bertanggung_jawab_1' => $this->input->post('bersedia_bertanggung_jawab_1'),
            'bersedia_bertanggung_jawab_2' => $this->input->post('bersedia_bertanggung_jawab_2'),
            'tidak_komisi_jasa'            => $this->input->post('tidak_komisi_jasa'),
            // 'file_ktp'                     => $fc_ktp,
            // 'file_kk'                      => $fc_kk,
            // 'file_sertifikat_umkm'         => $file_sertifikat_umkm,
            'tgl_input' => date('Y-m-d'),
            // 'aksi'                         => '1',
            'foto_usaha'            => $foto_usaha,
            'rekomendasi_dari'      => $this->input->post('rekomendasi_dari'),
            'ditambahkan_oleh'      => $this->session->userdata('id_pegawai'),
            'kategori_pelaku_usaha' => $this->input->post('kategori_pelaku_usaha'),
        );

        $simpanPelakuUsaha = $this->M_transaksi->simpanPelakuUsaha($data);
        $nourut            = array('no_urut' => $simpanPelakuUsaha);
        $SimpanNoUrut      = $this->M_transaksi->noUrut($simpanPelakuUsaha, $nourut);

        // // print_r($SimpanNoUrut);
        echo json_encode($SimpanNoUrut);
    }

    public function bukti_pengajauan($kk)
    {
        $data = array(
            'getPelakuUsahaData' => $this->M_transaksi->getPelakuUsahaData($kk),
        );
        // print_r($data);
        $this->load->view('report', $data);
    }

    public function Panduan()
    {
        $this->load->view('Panduan');
    }

    public function searchPelakuUsaha()
    {
        $kab  = $this->session->userdata('kab');
        $nama = $this->input->post('nama_search');
        // $get_kategori = $this->input->post('get_kategori');

        $data = array(
            'getDataPelakUsaha' => $this->M_transaksi->getDataPelakUsaha($kab, $nama)->result(),
        );

        $this->load->view('Transaksi/Ajax/showPelakuSearch', $data);
        // echo json_encode($get_kategori);
    }

    public function searchPelakuUsaha2024()
    {
        $kab  = $this->session->userdata('kab');
        $nama = $this->input->post('nama_search');
        // $get_kategori = $this->input->post('get_kategori');

        $data = array(
            'getDataPelakUsaha' => $this->M_transaksi->getDataPelakUsaha2024($kab, $nama)->result(),
        );

        $this->load->view('Transaksi/Ajax/showPelakuSearch', $data);
        // echo json_encode($get_kategori);
    }

    public function searchPelakuUsahaLevelUser()
    {
        $kab          = $this->session->userdata('kab');
        $nama         = $this->input->post('nama_search');
        $get_kategori = $this->input->post('get_kategori');
        $data         = array(
            'getDataPelakUsaha' => $this->M_transaksi->getDataPelakUsahaLevelUser($kab, $nama, $get_kategori)->result(),
        );

        $this->load->view('Transaksi/Ajax/showPelakuSearch', $data);
        // echo json_encode($data);
    }

    public function searchPelakuUsahaLevelUser2024()
    {
        $kab          = $this->session->userdata('kab');
        $nama         = $this->input->post('nama_search');
        $get_kategori = $this->input->post('get_kategori');

        $data = array(
            'getDataPelakUsaha' => $this->M_transaksi->getDataPelakUsahaLevelUser2024($kab, $nama, $get_kategori)->result(),
        );

        $this->load->view('Transaksi/Ajax/showPelakuSearch', $data);
        // echo json_encode($data);
    }

    public function DataPenerima()
    {

        // echo "under maintenence";
        $this->template->display('Transaksi/DataPenerima');
    }

    public function ShowDataPenerima($kk)
    {
        $data = array(
            'getDataPenerima' => $this->M_transaksi->getDataPenerima()->result($kk),
        );
        $this->load->view('Transaksi/ShowDataPenerima');
    }
}
