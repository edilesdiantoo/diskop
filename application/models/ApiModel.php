<?php defined('BASEPATH') or exit('No direct script access allowed');

class ApiModel extends CI_Model
{
    public function get_data_pelaku_usaha($page = 1, $per_page = 10, $tahun = NULL)
    {
        // Memanggil stored procedure dengan 3 argumen: page, per_page, dan tahun
        $query = $this->db->query("CALL GetPelakuUsaha(?, ?, ?)", array($page, $per_page, $tahun));

        // Mengembalikan hasilnya dalam bentuk array
        return $query->result_array();
    }

    public function get_total_data($tahun = NULL)
    {
        // Jika tahun diberikan, hitung total berdasarkan tahun
        if ($tahun) {
            $this->db->where('YEAR(tgl_input)', $tahun);  // Sesuaikan dengan kolom yang berisi tanggal input
        }

        // Menghitung total baris data pelaku usaha
        $this->db->from('pelaku_usaha');
        return $this->db->count_all_results();  // Menghitung jumlah total data
    }

    public function get_tahun_available()
    {
        // Query untuk mendapatkan daftar tahun yang ada di tabel pelaku_usaha
        $query = $this->db->query("SELECT DISTINCT YEAR(tgl_input) AS tahun FROM pelaku_usaha WHERE tgl_input IS NOT NULL ORDER BY tahun DESC");

        // Mengembalikan hasil query
        return $query->result_array();
    }

}
