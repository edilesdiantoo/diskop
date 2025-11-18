<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_pelatihan extends CI_Model
{

    public function cekNoKK($nokk)
    {
        $this->db->select('kk', 'tgl_input', 'nib_sku_iumk', 'no_urut');
        $this->db->from('pelaku_usaha_pelatihan');
        $this->db->where('kk', $nokk);
        return $query = $this->db->get();
    }

    public function simpanPelatihan($data)
    {
        $this->db->insert('pelaku_usaha_pelatihan', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function noUrut($id_pelaku_usaha, $no_urut)
    {
        $this->db->where('id_pelaku_usaha', $id_pelaku_usaha);
        $this->db->update('pelaku_usaha_pelatihan', $no_urut);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function cekKK($kk)
    {
        $this->db->where('kk', $kk);
        $query = $this->db->get('pelaku_usaha_pelatihan');
        
        // Jika ditemukan, berarti kk sudah ada
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }

    public function getDataPelatihan($kk)
    {
        $query = $this->db->query("SELECT a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, c.name as kab_usaha, d.name as kec_usaha 
        FROM pelaku_usaha_pelatihan as a
        LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
        LEFT OUTER JOIN regencies AS c ON a.kab_usaha = c.id
        LEFT OUTER JOIN districts AS d ON a.kec_usaha = d.id
        WHERE a.kk = '$kk'
        ");
        return $query->row();
    }

    // Ambil kabupaten berdasarkan provinsi
    public function getKabupatenByProvinsi($prov) {
        $this->db->where('id', $prov);
        $query = $this->db->get('regencies');
        return $query->result(); // Mengembalikan data kabupaten
    }

    // Ambil kecamatan berdasarkan kabupaten
    public function getKecamatanByKabupaten($kab) {
        $this->db->where('id', $kab);
        $query = $this->db->get('districts');
        return $query->result(); // Mengembalikan data kecamatan
    }

    // Ambil kelurahan berdasarkan kecamatan
    public function getKelurahanByKecamatan($kec) {
        $this->db->where('id', $kec);
        $query = $this->db->get('villages');
        return $query->result(); // Mengembalikan data kelurahan
    }
}