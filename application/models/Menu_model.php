<?php
class Menu_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function add_menu($data)
    {
        return $this->db->insert('menus', $data);
    }

    public function get_menu($id)
    {
        $query = $this->db->get_where('menus', array('id' => $id));
        return $query->row_array();
    }
}
