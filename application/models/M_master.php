<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{

    // public function cekNoKK($nokk)
    // {
    //     $this->db->select('kk', 'tgl_input', 'nib_sku_iumk', 'no_urut');
    //     $this->db->from('pelaku_usaha');
    //     $this->db->where('kk', $nokk);
    //     return $query = $this->db->get();
    // }
    public function getPegawaiEdit($id)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('id_pegawai', $id);
        return $query = $this->db->get();
    }

    public function getJabatan()
    {
        return $this->db->get('jabatan');
    }

    public function getLevelUser()
    {
        return $this->db->get('level_user');
    }

    public function getProv()
    {
        return $this->db->get('provinces');
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

    public function getKabEdit($prov)
    {
        $this->db->select('*');
        $this->db->from('regencies');
        $this->db->where('province_id', $prov);
        return $query = $this->db->get();
    }

    public function getKecEdit($kab)
    {
        $this->db->select('*');
        $this->db->from('districts');
        $this->db->where('regency_id', $kab);
        return $query = $this->db->get();
    }

    public function getKelEdit($kec)
    {
        $this->db->select('*');
        $this->db->from('villages');
        $this->db->where('district_id', $kec);
        return $query = $this->db->get();
    }

    public function simpanDataPegawai($data)
    {
        $this->db->insert('pegawai', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getPegawai()
    {
        $query = $this->db->query("SELECT f.level, a.*,b.name as prov_name, c.name as kab_name, d.name as kec_name, e.name as kel_name 
        FROM pegawai as a
        LEFT OUTER JOIN provinces AS b ON a.prov = b.id
        LEFT OUTER JOIN regencies AS c ON a.kab = c.id
        LEFT OUTER JOIN districts AS d ON a.kec = d.id
        LEFT OUTER JOIN villages AS e ON a.kel = e.id
        LEFT OUTER JOIN level_user AS f ON a.level_user = f.id_level_user
        ");
        return $query->result();
    }

    public function SimpanDataPegawaiEdit($id_pegawai, $DataPegawaiEdit)
    {
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai', $DataPegawaiEdit);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function HapusPegawai($id_pegawai)
    {
        $this->db->where('id_pegawai', $id_pegawai)->delete('pegawai');
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getBerkasPengajuan()
    {
        $level = $this->session->userdata('level_user');
        $kab   = $this->session->userdata('kab');
        if ($level == 1) {
            $where = "";
        } else {
            $where = "AND kab_usaha='$kab'";
        }

        $query = $this->db->query("SELECT count(a.id_pelaku_usaha) as total FROM pelaku_usaha as a WHERE a.prov_usaha = '15' AND YEAR(a.tgl_input) = '2023' $where");
        return $query;
    }

    public function getBerkasPengajuan2024()
    {
        $level = $this->session->userdata('level_user');
        $kab   = $this->session->userdata('kab');
        if ($level == 1) {
            $where = "";
        } else {
            $where = "AND kab_usaha='$kab'";
        }

        $query = $this->db->query("SELECT count(a.id_pelaku_usaha) as total FROM pelaku_usaha as a WHERE a.prov_usaha = '15' AND YEAR(a.tgl_input) = '2024' $where");
        return $query;
    }

    public function getCalonPenerima()
    {
        $level = $this->session->userdata('level_user');
        $kab   = $this->session->userdata('kab');
        if ($level == 1) {
            $where = "";
        } else {
            $where = "AND kab_usaha='$kab'";
        }
        $query = $this->db->query("SELECT count(id_pelaku_usaha) as total FROM pelaku_usaha where aksi = 1 $where");
        return $query;
    }

    public function getDitolak()
    {
        $level = $this->session->userdata('level_user');
        $kab   = $this->session->userdata('kab');
        if ($level == 1) {
            $where = "";
        } else {
            $where = "AND kab_usaha='$kab'";
        }
        $query = $this->db->query("SELECT count(id_pelaku_usaha) as total FROM pelaku_usaha where aksi = 0 or aksi_akhir = 0 $where");
        return $query;
    }

    public function penerima2020_2021()
    {
        $level = $this->session->userdata('level_user');
        $kab   = $this->session->userdata('kab');
        if ($level == 1) {
            $where = "";
        } else {
            $where = "WHERE kab_usaha='$kab'";
        }
        $query = $this->db->query("SELECT count(id_pelaku_usaha) as total FROM pelaku_usaha_19_06_2023_real $where");
        return $query;
    }

    public function simpanKegiatan($data)
    {
        $this->db->insert('berita_kegiatan', $data);
        return ($this->db->affected_rows() != 1) ? 0 : 1;
    }

    public function getBeritaKegitan($id)
    {
        $query = $this->db->query("SELECT * FROM berita_kegiatan WHERE id='$id'");
        return $query;
    }

    public function simpanKegiatanEdit($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('berita_kegiatan', $data);
        return ($this->db->affected_rows() != 1) ? 0 : 1;
    }

    public function hapusBeritaKegiatan($id)
    {
        $this->db->where('id', $id)->delete('berita_kegiatan');
        return ($this->db->affected_rows() != 1) ? 0 : 1;
    }

    public function getBeritaKegiatan($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('berita_kegiatan');
        return $query;
    }

    public function getTotalRows()
    {
        return $this->db->count_all('berita_kegiatan');
    }
}
