<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_pegawai')) {
            redirect('LoginDiskopController');
        }
        $this->load->model('M_laporan');
        $this->load->model('M_transaksi');
        $this->load->model('M_master');
        $this->load->model('M_verifikasiPelakuUsaha');
        // $this->load->model('KeputusanGubernurModel');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function LapPelakuUsaha()
    {
        $data['GetKab'] = $this->M_transaksi->getKab(15)->result();
        $this->template->display('Laporan/LapPelakuUsaha', $data);
    }

    public function PrintPDF()
    {
        $data['GetKab'] = $this->M_transaksi->getKab(15)->result();
        $this->template->display('Laporan/PrintPDF', $data);
    }

    public function PrintPDF2024()
    {
        $data['GetKab'] = $this->M_transaksi->getKab(15)->result();
        $this->template->display('Laporan/PrintPDF2024', $data);
    }

    // public function PrintPenerima()
    // {
    //     $format = $this->input->post('format');
    //     $kab    = $this->session->userdata('kab');
    //     $kec    = $this->session->userdata('kec');
    //     $level  = $this->session->userdata('level_user');
    //     $kab    = $this->input->post('kab');
    //     $kec    = $this->input->post('kec');
    //     $kel    = $this->input->post('kel');
    //     $status = $this->input->post('status');

    //     if ($format == 1) {
    //         $data['getdataAdminKab'] = $this->M_laporan->getdataAdminKab($kab, $kec, $kel, $status);
    //         // print_r($kab);
    //         $this->load->view('Laporan/PerdaerahPDF', $data);
    //     } else {
    //         $data['getdataAdminKab'] = $this->M_laporan->getdataAdminKab($kab, $kec, $kel, $status);
    //         $this->load->view('Laporan/PerdaerahExcel', $data);
    //     }



    //     // if ($level == 3) {
    //     //     $data['getDataVerifikasiPelakuUsaha'] = $this->M_laporan->getDataVerifikasiPelakuUsahaVerifyLap();
    //     // } else {
    //     //     $data['getDataVerifikasiPelakuUsaha'] = $this->M_laporan->getDataVerifikasiPelakuUsahaLap($kab);
    //     // }
    //     // $this->load->view('Laporan/PerdaerahPDF', $data);
    // }

    public function Perdaerah()
    {
        $this->template->display('Laporan/Perdaerah');
    }

    public function getKab($prov)
    {
        $data = array(
            'getKab' => $this->M_transaksi->getKab($prov)->result(),
        );
        $this->load->view('Laporan/Wilayah/Kabupaten.php', $data);
    }

    public function getKec($kab)
    {
        $data = array(
            'getKec' => $this->M_transaksi->getKec($kab)->result(),
        );

        // print_r($data);
        $this->load->view('Laporan/Wilayah/Kecamatan.php', $data);
    }

    public function getKel($kec)
    {
        $data = array(
            'getKel' => $this->M_transaksi->getKel($kec)->result(),
        );

        // print_r($data);
        $this->load->view('Laporan/Wilayah/Kelurahan.php', $data);
    }

    public function Perwilayah()
    {
        $kab                     = $this->input->post('kab');
        $kec                     = $this->input->post('kec');
        $kel                     = $this->input->post('kel');
        $level                   = $this->session->userdata('level_user');
        $status                  = $this->input->post('status');
        $data['getdataAdminKab'] = $this->M_laporan->getdataAdminKab($kab, $kec, $kel, $status, $level)->result();
        // print_r($data);
        $this->load->view('Laporan/Wilayah/DataWilayah.php', $data);
    }

    public function pdf()
    {
        $kab                     = $this->input->post('kab');
        $kec                     = $this->input->post('kec');
        $kel                     = $this->input->post('kel');
        $level                   = $this->session->userdata('level_user');
        $status                  = $this->input->post('status');
        $format                  = $this->input->post('format');
        $data['tahunPengajuan'] = 2023;
        $data['status']          = $status;
        $data['getdataAdminKab'] = $this->M_laporan->getdataAdminKab($kab, $kec, $kel, $status, $level)->result();
        // print_r($data['getdataAdminKab']);f
        if ($format == '1') {
            $this->load->view('Laporan/PerdaerahPDF', $data);
        } else if ($format == '2') {

            // print_r($data);
            $this->load->view('Laporan/PerdaerahExcel', $data);
        } else {
            $this->load->view('Laporan/PerdaerahPDF', $data);
        }
    }

    public function pdf2024()
    {
        $kab                     = $this->input->post('kab');
        $kec                     = $this->input->post('kec');
        $kel                     = $this->input->post('kel');
        $level                   = $this->session->userdata('level_user');
        $status                  = $this->input->post('status');
        $format                  = $this->input->post('format');
        $data['tahunPengajuan'] = 2024;
        $data['status']          = $status;
        $data['getdataAdminKab'] = $this->M_laporan->getdataAdminKab2024($kab, $kec, $kel, $status, $level)->result();
        // print_r($data['getdataAdminKab']);
        if ($format == '1') {
            $this->load->view('Laporan/PerdaerahPDF', $data);
        } else if ($format == '2') {
            // print_r($data);
            $this->load->view('Laporan/PerdaerahExcel', $data);
        } else {
            $this->load->view('Laporan/PerdaerahPDF', $data);
        }
    }

    public function DataPerKab()
    {
        $data = array(
            'getDataPerkab' => $this->M_laporan->getDataPerkab()->result(),
        );
        $this->template->display('Transaksi/ShowDataPerkabupaten', $data);
    }

    public function DataPerKab2024()
    {
        $data = array(
            'getDataPerkab' => $this->M_laporan->getDataPerkab2024()->result(),
        );
        $this->template->display('Transaksi/ShowDataPerkabupaten', $data);
    }

    public function TotalCalonPenerima()
    {
        $kab   = $this->session->userdata('kab');
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $data = array(
                'GetKab' => $this->M_transaksi->getKab(15)->result(),
                // 'TotalCalonPenerimaAdmin' => $this->M_laporan->TotalCalonPenerimaAdmin()->result()
            );
            $this->template->display('Transaksi/ShowDataCalonPenerimaAdmin', $data);
        } else {
            $data = array(
                'TotalCalonPenerima' => $this->M_laporan->TotalCalonPenerima($kab)->result()
            );

            // print_r($data);
            $this->template->display('Transaksi/ShowTotalCalonPenerima', $data);
        }
    }

    public function TotalCalonPenerima2024()
    {
        $kab   = $this->session->userdata('kab');
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $data = array(
                'GetKab' => $this->M_transaksi->getKab(15)->result(),
                // 'TotalCalonPenerimaAdmin' => $this->M_laporan->TotalCalonPenerimaAdmin()->result()
            );
            $this->template->display('Transaksi/ShowDataCalonPenerimaAdmin2024', $data);
        } else {
            $data = array(
                'TotalCalonPenerima' => $this->M_laporan->TotalCalonPenerima2024($kab)->result()
            );

            // print_r($data);
            $this->template->display('Transaksi/ShowTotalCalonPenerima', $data);
        }
    }

    public function getCalonPenerimaAdmin($id_kab)
    {
        $data = array( 
            'TotalCalonPenerimaAdmin' => $this->M_laporan->TotalCalonPenerimaAdmin($id_kab)->result()
            // 'TotalCalonPenerimaAdmin' => $this->M_laporan->TotalCalonPenerimaAdmin2024($id_kab)->result()
        );
        // print_r($data);
        $this->load->view('Transaksi/Ajax/ShowCalonPenerimaAdmin', $data);
    }

    public function getCalonPenerimaAdmin2024($id_kab)
    {
        $data = array(
            // 'TotalCalonPenerimaAdmin' => $this->M_laporan->TotalCalonPenerimaAdmin($id_kab)->result()
            'TotalCalonPenerimaAdmin' => $this->M_laporan->TotalCalonPenerimaAdmin2024($id_kab)->result()
        );
        // print_r($data);
        $this->load->view('Transaksi/Ajax/ShowCalonPenerimaAdmin', $data);
    }

    public function rekapRekomendasi()
    {
        $kab  = $this->session->userdata('kab');
        $data = array(
            'TotalCalonPenerimaAspirasi' => $this->M_laporan->TotalCalonPenerimaAspirasi($kab)->result()
        );
        $this->template->display('Aspirasi/Monitoring/rekapRekomendasi', $data);
    }

    public function rekapRekomendasi2024()
    {
        $kab  = $this->session->userdata('kab');
        $data = array(
            'TotalCalonPenerimaAspirasi' => $this->M_laporan->TotalCalonPenerimaAspirasi2024($kab)->result()
        );
        // echo $kab;
        $this->template->display('Aspirasi/Monitoring/rekapRekomendasi2024', $data);
    }

    public function getByYearsKab() 
    {
        $kab  = $this->input->post('kab');
        $tahun  = $this->input->post('tahun');
        $data = array(
            'getByYearsKab' => $this->M_laporan->getByYearsKab($tahun,$kab)->result(),
            'kab' => $kab,
            'tahun' => $tahun,
        );
        // echo $kab;
        $this->load->view('Aspirasi/Monitoring/rekapRekomendasiByYearsKab', $data); 
    }


    public function rekapRekomendasiAccKabid()
    {
        $kab  = $this->session->userdata('kab');
        $data = array(
            'TotalCalonPenerimaAspirasi' => $this->M_laporan->TotalCalonPenerimaAspirasiBelumAccKabid($kab)->result()
        );
        $this->template->display('Aspirasi/Monitoring/rekapRekomendasiAccKabid', $data);
    }

    public function rekapRekomendasiAccKabid2024()
    {
        $kab  = $this->session->userdata('kab');
        $data = array(
            'TotalCalonPenerimaAspirasi' => $this->M_laporan->TotalCalonPenerimaAspirasiBelumAccKabid2024($kab)->result()
        );
        $this->template->display('Aspirasi/Monitoring/rekapRekomendasiAccKabid2024', $data);
    }

    public function lapRekomendasi()
    {
        $data['tahun'] = 2023;
        $data['GetKab'] = $this->M_transaksi->getKab(15)->result();
        // $data['getRekomendasi'] = $this->M_laporan->getRekomendasi()->result();
        // print_r($data['getdataAdminKab']);
        $this->template->display('Aspirasi/Monitoring/lapRekomendasi', $data);
    }

    public function lapRekomendasi2024()
    {
        $data['tahun'] = 2024;
        $data['GetKab'] = $this->M_transaksi->getKab(15)->result();
        // $data['getRekomendasi'] = $this->M_laporan->getRekomendasi()->result();
        // print_r($data['getdataAdminKab']);
        $this->template->display('Aspirasi/Monitoring/lapRekomendasi2024', $data);
    }

    public function getRekomendasi()
    {
        $rekomendasi = $this->input->post('nama');
        $id_kab      = $this->input->post('kab');
        // strip out all whitespace
        $zname_clean = preg_replace('/\s*/', '', $rekomendasi);
        // convert the string to all lowercase
        $zname_clean_lower = strtolower($zname_clean);
        $data              = array(
            'getRekomendasi' => $this->M_laporan->getRekomendasi($zname_clean_lower, $id_kab)->result(),
            'func'           => $this->input->post('func'),
        );
        $this->load->view('Aspirasi/Monitoring/autocompleteRekomendasi', $data);
    }

    public function pdfRekomendasi()
    {
        $kab    = $this->input->post('kab');
        $kec    = $this->input->post('kec');
        $kel    = $this->input->post('kel');
        $level  = $this->session->userdata('level_user');
        $status = $this->input->post('status');
        $format = $this->input->post('format');
        // strip out all whitespace
        $rekomen_dari = $this->input->post('rekomendasi');
        $zname_clean  = preg_replace('/\s*/', '', $rekomen_dari);
        // convert the string to all lowercase
        $zname_clean_lower = strtolower($zname_clean);

        $rekomendasi               = $zname_clean_lower;
        $data['getpdfRekomendasi'] = $this->M_laporan->getpdfRekomendasi($kab, $kec, $kel, $status, $level, $rekomendasi)->result();
        $data['tahun'] = 2023;
        // print_r($data['getpdfRekomendasi']);
        // // print_r($data['getpdfRekomendasi']);

        if ($format == '2') {
            $this->load->view('Aspirasi/Monitoring/ExcelRekomendasi', $data);
        } else {
            $this->load->view('Aspirasi/Monitoring/pdfRekomendasi', $data);
        }
    }

    // public function pdfRekomendasi2024()
    // {
    //     $tahun    = $this->input->post('tahun');
    //     $kab    = $this->input->post('kab');
    //     $kec    = $this->input->post('kec');
    //     $kel    = $this->input->post('kel');
    //     $level  = $this->session->userdata('level_user');
    //     $status = $this->input->post('status');
    //     $format = $this->input->post('format');
    //     // strip out all whitespace
    //     $rekomen_dari = $this->input->post('rekomendasi');
    //     $zname_clean  = preg_replace('/\s*/', '', $rekomen_dari);
    //     // convert the string to all lowercase
    //     $zname_clean_lower = strtolower($zname_clean);

    //     $rekomendasi               = $zname_clean_lower;
    //     $data['getpdfRekomendasi'] = $this->M_laporan->getpdfRekomendasi2024($kab, $kec, $kel, $status, $level, $rekomendasi)->result();
    //     $data['tahun'] = 2024;
    //     print_r($data['getpdfRekomendasi']);
    //     // // print_r($data['getpdfRekomendasi']);

    //     if ($format == '2') {
    //         $this->load->view('Aspirasi/Monitoring/ExcelRekomendasi', $data);
    //     } else {
    //         $this->load->view('Aspirasi/Monitoring/pdfRekomendasi', $data);
    //     }
    // }

    public function pdfRekomendasi2024()
    {
        $tahun    = $this->input->post('tahun');
        $kab      = $this->input->post('kab');
        $kec      = $this->input->post('kec');
        $kel      = $this->input->post('kel');
        $level    = $this->session->userdata('level_user');
        $status   = $this->input->post('status');
        $format   = $this->input->post('format');
        
        // Strip out all whitespace and make it lowercase
        $rekomen_dari = $this->input->post('rekomendasi');
        $zname_clean  = preg_replace('/\s*/', '', $rekomen_dari);
        $zname_clean_lower = strtolower($zname_clean);
        $rekomendasi = $zname_clean_lower;

        // Handle empty kec and kel to allow all values if they're empty
        $kec = $kec ? $kec : ''; // If kec is empty, set it to an empty string
        $kel = $kel ? $kel : ''; // If kel is empty, set it to an empty string

        // Fetch data using the model
        $data['getpdfRekomendasi'] = $this->M_laporan->getpdfRekomendasiByYears($kab, $kec, $kel, $status, $level, $rekomendasi, $tahun)->result();
        $data['tahun'] = $tahun;

        // Uncomment to debug the fetched data
        // print_r($data['getpdfRekomendasi']);

        // Load the correct view depending on the format
        if ($format == '2') {
            $this->load->view('Aspirasi/Monitoring/ExcelRekomendasi', $data);
        } else {
            $this->load->view('Aspirasi/Monitoring/pdfRekomendasi', $data);
        }
    }

}   
