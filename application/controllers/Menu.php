<?php
class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('menu/create');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description')
            );
            $this->Menu_model->add_menu($data);
            $id = $this->db->insert_id();
            redirect('menu/view/' . $id);
        }
    }

    public function view($id)
    {
        $data['menu'] = $this->Menu_model->get_menu($id);

        if (empty($data['menu'])) {
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('menu/view', $data);
        $this->load->view('templates/footer');
    }
}
