<?php
class Template
{
    // protected $_ci;
    function __construct()
    {

        $this->_ci = &get_instance();
        $this->_ci->load->model('M_verifikasiPelakuUsaha');
        // $this->_ci->load->model('M_management_user');
    }

    function display($content, $data = null)
    {
        // $group               = $this->_ci->session->userdata('GroupID');
        // $data['data1']              = $this->_ci->session->userdata('id_jabatan');
        // $data['womasuk']    = $this->_ci->M_monitoring->WoMasuk($data1);
        // $data['getmenu1']   = $this->_ci->M_sidebar->selectMenu1($this->_ci->session->userdata('GroupID'));
        // $data['getmenu2']   = $this->_ci->M_sidebar->selectMenu2($this->_ci->session->userdata('GroupID'));

        // $data['get_hdr_menu']               = $this->_ci->M_management_user->get_header_menu()->result();
        // $data['get_detail_menu_master']     = $this->_ci->M_management_user->get_master_menu($this->_ci->session->userdata('id_jabatan'), $id_menu_hdr = 1)->result();
        // $data['get_manage_akses']           = $this->_ci->M_management_user->get_manage_akses($this->_ci->session->userdata('id_jabatan'), $id_menu_hdr = 2)->result();
        // $data['get_detail_menu_transaksi']  = $this->_ci->M_management_user->get_master_menu($this->_ci->session->userdata('id_jabatan'), $id_menu_hdr = 3)->result();
        $data['getPelakuUsahaBaru'] = $this->_ci->M_verifikasiPelakuUsaha->getPelakuUsahaBaru($this->_ci->session->userdata('kab'))->row();
        $data['_content'] = $this->_ci->load->view($content, $data, true);
        $data['_navbar']  = $this->_ci->load->view('Partials/Navbar', $data, true);
        $data['_sidebar'] = $this->_ci->load->view('Partials/Sidebar', $data, true);
        $data['_footer']  = $this->_ci->load->view('Partials/Footer', $data, true);
        $this->_ci->load->view('TemplateView.php', $data);
    }

    function displayPegawai($content, $data = null)
    {
        // $group               = $this->_ci->session->userdata('GroupID');
        // $data['data1']              = $this->_ci->session->userdata('id_jabatan');
        // $data['womasuk']    = $this->_ci->M_monitoring->WoMasuk($data1);
        // $data['getmenu1']   = $this->_ci->M_sidebar->selectMenu1($this->_ci->session->userdata('GroupID'));
        // $data['getmenu2']   = $this->_ci->M_sidebar->selectMenu2($this->_ci->session->userdata('GroupID'));

        // $data['get_hdr_menu']               = $this->_ci->M_management_user->get_header_menu()->result();
        // $data['get_detail_menu_master']     = $this->_ci->M_management_user->get_master_menu($this->_ci->session->userdata('id_jabatan'), $id_menu_hdr = 1)->result();
        // $data['get_manage_akses']           = $this->_ci->M_management_user->get_manage_akses($this->_ci->session->userdata('id_jabatan'), $id_menu_hdr = 2)->result();
        // $data['get_detail_menu_transaksi']  = $this->_ci->M_management_user->get_master_menu($this->_ci->session->userdata('id_jabatan'), $id_menu_hdr = 3)->result();
        // $data['get_detail_menu_monitoring'] = $this->_ci->M_management_user->get_master_menu($this->_ci->session->userdata('id_jabatan'), $id_menu_hdr = 4)->result();
        $data['_content'] = $this->_ci->load->view($content, $data, true);
        $data['_navbar']  = $this->_ci->load->view('PegawaiDisdik/Partials/Navbar', $data, true);
        $data['_sidebar'] = $this->_ci->load->view('PegawaiDisdik/Partials/Sidebar', $data, true);
        $data['_footer']  = $this->_ci->load->view('PegawaiDisdik/Partials/Footer', $data, true);
        $this->_ci->load->view('TemplateView.php', $data);
    }
}
