<?php defined('BASEPATH') or exit('No direct script access allowed');

class KepegawaianModel extends CI_Model
{

    public function GetDataPegawaiDashboard($level_user)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('user_level', $level_user);
        return $query = $this->db->get();
    }

    public function GetDataPegawai()
    {
        return $this->db->get('pegawai');
    }

    public function GetDataPegawaiLevel($user_level)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('user_level', $user_level);
        return $query = $this->db->get();
    }

    public function getlevel_user()
    {
        return $this->db->get('user_level');
    }

    public function GetDataPegawaiEdit($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('id_pegawai', $id_pegawai);
        return $query = $this->db->get();
    }

    public function getTingkatPendidikan($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('tingkat_pendidikan');
        $this->db->where('id_pegawai', $id_pegawai);
        return $query = $this->db->get();
    }

    public function SimpanDataPegawai($DataPegawai)
    {
        $this->db->insert('pegawai', $DataPegawai);
        $insert_id = $this->db->insert_id();

        return $insert_id;
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

    public function HapusPdd($id_pegawai)
    {
        $this->db->where('id_pegawai', $id_pegawai)->delete('tingkat_pendidikan');
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function SimpanTingkatPendidikan($arrayPdd)
    {
        $this->db->insert('tingkat_pendidikan', $arrayPdd);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function simpanHapusTingkatPendidikan($id_pegawai)
    {
        $this->db->where('id_pegawai', $id_pegawai)->delete('tingkat_pendidikan');
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function SimpanPasangan($arrayPasangan)
    {
        $this->db->insert('anggota_klg_pasangan', $arrayPasangan);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function simpanHapusPasanganKlg($id_pegawai)
    {
        $this->db->where('id_pegawai', $id_pegawai)->delete('anggota_klg_pasangan');
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getPasanganKeluarga($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('anggota_klg_pasangan');
        $this->db->where('id_pegawai', $id_pegawai);
        return $query = $this->db->get();
    }

    public function JenisJabatan()
    {
        return $this->db->get('master_jabatan');
    }

    public function JenisNamaJabatan()
    {
        return $this->db->get('master_nama_jabatan');
    }

    public function NamaJabatan()
    {
        return $this->db->get('master_Golongan');
    }
}
