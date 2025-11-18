<?php
class Contruction extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    public function index()
    {
        // $this->output->set_status_header('404');
        $this->load->view('Contruction'); //loading in custom error view
    }

    public function login()
    {
        // $this->output->set_status_header('404');
        $this->load->view('Contruction2'); //loading in custom error view
    }
}
