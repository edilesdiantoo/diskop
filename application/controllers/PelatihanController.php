<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PelatihanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('id_pegawai')) {
        //     redirect('PageErrController');
        // }
        $this->load->model('M_pelatihan');
        $this->load->model('M_transaksi');
        // $this->load->model('KeputusanGubernurModel');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function landing()
    {
        $this->load->view('pelatihan/landing1');
    }

    public function cekNoKK($nokk)
    {
        $this->session->set_userdata('nokk', $nokk);
        $data = array(
            'cekNoKK' => $this->M_pelatihan->cekNoKK($nokk)->row(),
        );
        echo json_encode($data);
    }

    public function input1()
    {
        $session_data = $this->session->userdata();
        $no_kk        = $this->session->userdata('nokk');
        $nama_lengkap = htmlspecialchars(trim($session_data['nama_lengkap'] ?? ''), ENT_QUOTES);
        $nik          = htmlspecialchars(trim($session_data['nik'] ?? ''), ENT_QUOTES);
        $kk           = htmlspecialchars(trim($session_data['nokk'] ?? ''), ENT_QUOTES);
        $jk           = htmlspecialchars(trim($session_data['jk'] ?? ''), ENT_QUOTES);
        $tempat_lahir = htmlspecialchars(trim($session_data['tempat_lahir'] ?? ''), ENT_QUOTES);
        $tgl_lahir    = htmlspecialchars(trim($session_data['tgl_lahir'] ?? ''), ENT_QUOTES);
        $hp           = htmlspecialchars(trim($session_data['hp'] ?? ''), ENT_QUOTES);
        $pdd_terakhir = htmlspecialchars(trim($session_data['pdd_terakhir'] ?? ''), ENT_QUOTES);
        $nama_ibu     = htmlspecialchars(trim($session_data['nama_ibu'] ?? ''), ENT_QUOTES);
        $data         = array(
            'nama_lengkap'     => $nama_lengkap,
            'nik'              => $nik,
            'kk'               => $kk,
            'jk'               => $jk,
            'tempat_lahir'     => $tempat_lahir,
            'tgl_lahir'        => $tgl_lahir,
            'hp'               => $hp,
            'pdd_terakhir'     => $pdd_terakhir,
            'nama_ibu'         => $nama_ibu,
            'get_sektor_usaha' => $this->M_transaksi->get_sektor_usaha()->result(),
        );
        if ($no_kk) {

            // print_r($data);
            $this->load->view('Pelatihan/input1.php', $data);
        } else {
            $this->load->view('Contruction');
        }
    }

    public function input2()
    {
        $data1 = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik'          => $this->input->post('nik'),
            'kk'           => $this->input->post('kk'),
            'jk'           => $this->input->post('jk'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir'    => $this->input->post('tgl_lahir'),
            'hp'           => $this->input->post('hp'),
            'pdd_terakhir' => $this->input->post('pdd_terakhir'),
            'nama_ibu'     => $this->input->post('nama_ibu'),
            'lainnya'      => $this->input->post('lainnya'),
            'getProvJambi' => $this->M_transaksi->getProvJambi()->row(),

        );
        
        // Simpan data dalam session
        $this->session->set_userdata($data1);

        // Dapatkan data yang tersimpan di session untuk ditampilkan di halaman berikutnya
        $session_data2 = $this->session->userdata();
                
        // print_r($session_data2);
        $this->load->view('Pelatihan/input2', $session_data2);
    }

    public function input3()
    {
        $data2 = array(
            // input 2
            'alamat'           => $this->input->post('alamat'),
            'prov'             => $this->input->post('prov'),
            'kab'              => $this->input->post('kab'),
            'kec'              => $this->input->post('kec'),
            'kel'              => $this->input->post('kel'),
            'getProvJambi'     => $this->M_transaksi->getProvJambi()->row(),
            'get_sektor_usaha' => $this->M_transaksi->get_sektor_usaha()->result(),
        );

        // Simpan data dalam session
        $this->session->set_userdata($data2);

        // Dapatkan data yang tersimpan di session untuk ditampilkan di halaman berikutnya
        $session_data3 = $this->session->userdata();

        // print_r($session_data3);
        $this->load->view('Pelatihan/input3.php', $session_data3);
    }

    public function input4()
    {
        $data3 = array(
            // input 3
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

        // Simpan data dalam session
        $this->session->set_userdata($data3);

        // Dapatkan data yang tersimpan di session untuk ditampilkan di halaman berikutnya
        $session_data4 = $this->session->userdata();

        // print_r($session_data4);
        $this->load->view('Pelatihan/input4', $session_data4);
    }

    public function simpanInputPelatihan()
    {
        // Ambil data dari session
        $session_data = $this->session->userdata();

        // Pastikan data ada dalam session sebelum digunakan
        if (!$session_data) {
            echo json_encode(array('error' => 'Data session tidak ditemukan.'));
            return;
        }

        // Sanitasi dan validasi data dari session
        $nama_lengkap = htmlspecialchars(trim($session_data['nama_lengkap']), ENT_QUOTES);
        $nik          = htmlspecialchars(trim($session_data['nik']), ENT_QUOTES);
        $kk           = htmlspecialchars(trim($session_data['nokk']), ENT_QUOTES);
        $jk           = htmlspecialchars(trim($session_data['jk']), ENT_QUOTES);
        $tempat_lahir = htmlspecialchars(trim($session_data['tempat_lahir']), ENT_QUOTES);
        $tgl_lahir    = htmlspecialchars(trim($session_data['tgl_lahir']), ENT_QUOTES);
        $hp           = htmlspecialchars(trim($session_data['hp']), ENT_QUOTES);
        $pdd_terakhir = htmlspecialchars(trim($session_data['pdd_terakhir']), ENT_QUOTES);
        $nama_ibu     = htmlspecialchars(trim($session_data['nama_ibu']), ENT_QUOTES);

        // Input data ke dalam array setelah sanitasi
        $data = array(
            'nama_lengkap'                 => $nama_lengkap,
            'nik'                          => $nik,
            'kk'                           => $kk,
            'jk'                           => $jk,
            'tempat_lahir'                 => $tempat_lahir,
            'tgl_lahir'                    => $tgl_lahir,
            'hp'                           => $hp,
            'pdd_terakhir'                 => $pdd_terakhir,
            'nama_ibu'                     => $nama_ibu,
            'alamat'                       => htmlspecialchars(trim($session_data['alamat']), ENT_QUOTES),
            'prov'                         => htmlspecialchars(trim($session_data['prov']), ENT_QUOTES),
            'kab'                          => htmlspecialchars(trim($session_data['kab']), ENT_QUOTES),
            'kec'                          => htmlspecialchars(trim($session_data['kec']), ENT_QUOTES),
            'kel'                          => htmlspecialchars(trim($session_data['kel']), ENT_QUOTES),
            'nib_sku_iumk'                 => htmlspecialchars(trim($session_data['nib_sku_iumk']), ENT_QUOTES),
            'nama_usaha'                   => htmlspecialchars(trim($session_data['nama_usaha']), ENT_QUOTES),
            'alamat_usaha'                 => htmlspecialchars(trim($session_data['alamat_usaha']), ENT_QUOTES),
            'prov_usaha'                   => htmlspecialchars(trim($session_data['prov_usaha']), ENT_QUOTES),
            'kab_usaha'                    => htmlspecialchars(trim($session_data['kab_usaha']), ENT_QUOTES),
            'kec_usaha'                    => htmlspecialchars(trim($session_data['kec_usaha']), ENT_QUOTES),
            'kel_usaha'                    => htmlspecialchars(trim($session_data['kel_usaha']), ENT_QUOTES),
            'sektor_usaha'                 => htmlspecialchars(trim($session_data['sektor_usaha']), ENT_QUOTES),
            'jenis_usaha'                  => htmlspecialchars(trim($session_data['jenis_usaha']), ENT_QUOTES),
            'pendapatan_perbulan'          => floatval($session_data['pendapatan_perbulan']),
            'bersedia_bertanggung_jawab_1' => htmlspecialchars(trim($this->input->post('bersedia_bertanggung_jawab_1')), ENT_QUOTES),
            'bersedia_bertanggung_jawab_2' => htmlspecialchars(trim($this->input->post('bersedia_bertanggung_jawab_2')), ENT_QUOTES),
            'tidak_komisi_jasa'            => htmlspecialchars(trim($this->input->post('tidak_komisi_jasa')), ENT_QUOTES),
            'ditambahkan_oleh'             => intval($this->session->userdata('id_pegawai')),
            'tgl_input'                    => date('Y-m-d'),
        );

        // Cek apakah kk sudah ada di database
        if ($this->M_pelatihan->cekKK($kk)) {
            // Jika kk sudah ada, kirim error ke frontend
            echo json_encode(['status' => 'error', 'message' => 'Nomor KK sudah terdaftar.']);
            return;
        }

        // Menyimpan data
        $simpanPelatihan = $this->M_pelatihan->simpanPelatihan($data);
        $nourut = array('no_urut' => $simpanPelatihan);
        $SimpanNoUrut = $this->M_pelatihan->noUrut($simpanPelatihan, $nourut);

        echo json_encode(['status' => 'success']);
    }


    public function bukti_pelatihan($kk)
    {
        $data = array(
            'getPelakuUsahaData' => $this->M_pelatihan->getDataPelatihan($kk),
        );
        // print_r($data);
        $this->load->view('Pelatihan/report', $data);
    }

    public function getKab($prov) {
        $kabupaten = $this->M_pelatihan->getKabupatenByProvinsi($prov);
        $options = '<option value="">-Kabupaten-</option>';
        foreach ($kabupaten as $kab) {
        $options .= '<option value="' . $kab->id . '">' . $kab->name . '</option>';
        }
        echo $options;
    }

    public function getKec($kab) {
        $kecamatan = $this->M_pelatihan->getKecamatanByKabupaten($kab);
        $options = '<option value="">-Kecamatan-</option>';
        foreach ($kecamatan as $kec) {
        $options .= '<option value="' . $kec->id . '">' . $kec->name . '</option>';
        }
        echo $options;
    }

    public function getKel($kec) {
        $kelurahan = $this->M_pelatihan->getKelurahanByKecamatan($kec);
        $options = '<option value="">-Kelurahan-</option>';
        foreach ($kelurahan as $kel) {
        $options .= '<option value="' . $kel->id . '">' . $kel->name . '</option>';
        }
        echo $options;
    }
}