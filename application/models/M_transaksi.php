<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    public function cekNoKK($nokk)
    {
        $this->db->select('kk', 'tgl_input', 'nib_sku_iumk', 'no_urut');
        $this->db->from('pelaku_usaha');
        $this->db->where('kk', $nokk);
        return $query = $this->db->get();
    }

    public function cekNoKKDetail($nokk, $kab)
    {
        $query = $this->db->query("SELECT a.nama_lengkap, a.no_urut, 
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk and kab_usaha = '$kab') as kk2 
        FROM pelaku_usaha as a where a.kab_usaha = '$kab' AND a.kk = '$nokk'
        ");
        return $query->row();
    }

    public function kategories_dumisake()
    {
        // return $this->db->get('kategori_dumisake');
        $this->db->where('aktive', 1);
        return $this->db->get('kategori_dumisake');
    }

    public function get_sektor_usaha()
    {
        return $this->db->get('sektor_usaha');
    }

    public function getProv()
    {
        return $this->db->get('provinces');
    }

    public function getProvJambi()
    {
        $this->db->select('*');
        $this->db->from('provinces');
        $this->db->where('id', '15');
        return $query = $this->db->get();
    }

    public function getKab($prov)
    {
        $this->db->select('*');
        $this->db->from('regencies');
        $this->db->where('province_id', $prov);
        return $query = $this->db->get();
    }

    public function getKec($kab)
    {
        $this->db->select('*');
        $this->db->from('districts');
        $this->db->where('regency_id', $kab);
        return $query = $this->db->get();
    }

    public function getKel($kec)
    {
        $this->db->select('*');
        $this->db->from('villages');
        $this->db->where('district_id', $kec);
        return $query = $this->db->get();
    }

    public function get_kategori_dumisake($id_kategori_dumisake)
    {
        $this->db->select('isi');
        $this->db->from('dumisake');
        $this->db->where('id_kategori_dumisake', $id_kategori_dumisake);
        return $query = $this->db->get()->result();
    }

    public function simpanPelakuUsaha($data)
    {
        $this->db->insert('pelaku_usaha', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function noUrut($id_pelaku_usaha, $no_urut)
    {
        $this->db->where('id_pelaku_usaha', $id_pelaku_usaha);
        $this->db->update('pelaku_usaha', $no_urut);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    // public function getPelakuUsahaData($kk)
    // {
    //     $this->db->select('pelaku_usaha.kk', 'pelaku_usaha.nik', 'pelaku_usaha.tgl_lahir', 'pelaku_usaha.nama_lengkap', 'pelaku_usaha.kab_usaha', 'pelaku_usaha.kec_usaha', 'pelaku_usaha.no_urut', 'kategori_dumisake.nama', 'regencies.name as kb', 'districts.name as kec');
    //     $this->db->from('pelaku_usaha');
    //     $this->db->join('kategori_dumisake', 'pelaku_usaha.id_kategori_dumisake = kategori_dumisake.id_kategori_dumisake');
    //     $this->db->join('regencies', 'pelaku_usaha.kab = regencies.id');
    //     $this->db->join('districts', 'pelaku_usaha.kec = districts.id');
    //     $this->db->where('pelaku_usaha.kk', $kk);

    //     $query = $this->db->get();
    // }

    public function getPelakuUsahaData($kk)
    {
        $query = $this->db->query("SELECT a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, c.name as kab_usaha, d.name as kec_usaha 
        FROM pelaku_usaha as a
        LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
        LEFT OUTER JOIN regencies AS c ON a.kab_usaha = c.id
        LEFT OUTER JOIN districts AS d ON a.kec_usaha = d.id
        WHERE a.kk = '$kk'
        ");
        return $query->row();
    }

    public function getDataPelakUsaha($kab, $nama)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $where_aksi = "AND a.aksi = 1 AND";
        } else if ($level == 3) {
            $where_aksi = "AND a.kab_usaha = '$kab' AND a.aksi = 1 AND";
        } else {
            $where_aksi = "AND a.kab_usaha = '$kab' AND";
        }
        $query = $this->db->query("SELECT a.*, 
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2  
        FROM pelaku_usaha as a 
        where a.id_pelaku_usaha  $where_aksi  LOWER(REPLACE(a.nama_lengkap,' ','')) like '%$nama%' or a.no_urut like '%$nama%' or kk like '%$nama%' limit 10");
        return $query;
    }

    public function getDataPelakUsaha2024($kab, $nama)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $where_aksi = "AND a.aksi = 1 AND";
        } else if ($level == 3) {
            $where_aksi = "AND a.kab_usaha = '$kab' AND a.aksi = 1 AND";
        } else {
            $where_aksi = "AND a.kab_usaha = '$kab' AND";
        }
        $query = $this->db->query("SELECT a.*, 
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2  
        FROM pelaku_usaha as a 
        where a.id_pelaku_usaha and  (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024)  $where_aksi  LOWER(REPLACE(a.nama_lengkap,' ','')) like '%$nama%' or a.no_urut like '%$nama%' or kk like '%$nama%' limit 10");
        return $query;
    }

    public function getDataPelakUsahaLevelUser($kab, $nama, $get_kategori)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $where_aksi = "AND a.aksi = 1";
        } else if ($level == 3) {
            $where_aksi = "AND a.kab_usaha = '$kab' AND a.aksi = 1";
        } else {
            $where_aksi = "AND a.kab_usaha = '$kab'";
        }

        if ($nama) {
            $like_val = "AND LOWER(REPLACE(a.nama_lengkap,' ','')) like '%$nama%'";
        } else {
            $like_val = "";
        }

        if ($get_kategori) {
            $kategori_ada = "AND a.id_kategori_dumisake = '$get_kategori'";
        } else {
            $kategori_ada = "";
        }


        $query = $this->db->query("SELECT a.*
        FROM pelaku_usaha as a 
        where a.kk not in (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) $where_aksi $kategori_ada $like_val limit 100");
        return $query;
    }


    public function getDataPelakUsahaLevelUser2024($kab, $nama, $get_kategori)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $where_aksi = "AND a.aksi = 1";
        } else if ($level == 3) {
            $where_aksi = "AND a.kab_usaha = '$kab' AND a.aksi = 1";
        } else {
            $where_aksi = "AND a.kab_usaha = '$kab'";
        }

        if ($nama) {
            $like_val = "AND LOWER(REPLACE(a.nama_lengkap,' ','')) like '%$nama%'";
        } else {
            $like_val = "";
        }

        if ($get_kategori) {
            $kategori_ada = "AND a.id_kategori_dumisake = '$get_kategori'";
        } else {
            $kategori_ada = "";
        }


        $query = $this->db->query("SELECT a.*
        FROM pelaku_usaha as a 
        where a.kk not in (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) and  (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024) $where_aksi $kategori_ada $like_val  limit 100");
        return $query;
    }


    public function getDataPenerima($kk)
    {
        $query = $this->db->query("SELECT a.titik_koordinat,
        a.aksi_akhir, a.aksi, a.jk, 
        a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, 
        a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
				(SELECT name FROM regencies WHERE a.kab = id) as kab, 
				(SELECT name FROM districts WHERE a.kec = id) as kec, 
				(SELECT name FROM provinces WHERE a.prov = id) as prov, 
				(SELECT name FROM villages WHERE a.kel = id) as kel, 
				g.nama as sektor_name
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.kk = '$kk'
            ");
        return $query->result();
    }
}
