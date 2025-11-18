<?php defined('BASEPATH') or exit('No direct script access allowed');

class KeputusanGubernurModel extends CI_Model
{

    public function getKeputusanGubernur()
    {
        $query = $this->db->query("SELECT a.verifikasi_2_aksi, a.verifikasi_3_aksi, a.catatan, a.id_keputusan_gubernur, a.no_surat_keputusan_gubernur, a.surat_keputusan_gubernur, b.nama_lengkap FROM surat_keputusan_gubernur AS a LEFT OUTER JOIN pegawai AS b ON a.dibuat_oleh = b.id_pegawai");
        return $query;
    }

    public function SimpanKeputusanGubernur($dataP)
    {
        $this->db->insert('surat_keputusan_gubernur', $dataP);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function HistoryPengajuan($id_keputusan_gubernur)
    {
        $this->db->select('*');
        $this->db->from('surat_keputusan_gubernur');
        $this->db->where('id_keputusan_gubernur', $id_keputusan_gubernur);
        // $this->db->where('id_cuti_haji_umroh', $id_cuti_haji_umroh);
        return $query = $this->db->get();
    }

    //-------------verifkasi kabid ----------------//
    public function getKeputusanGubernurKabid()
    {
        $query = $this->db->query("SELECT a.verifikasi_2_aksi, a.catatan,  a.id_keputusan_gubernur, a.no_surat_keputusan_gubernur, a.surat_keputusan_gubernur, b.nama_lengkap FROM surat_keputusan_gubernur AS a LEFT OUTER JOIN pegawai AS b ON a.dibuat_oleh = b.id_pegawai");
        return $query;
    }

    public function VerifikasiKabidSetuju($id_keputusan_gubernur, $data)
    {
        $this->db->where('id_keputusan_gubernur', $id_keputusan_gubernur);
        $this->db->update('surat_keputusan_gubernur', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function VerifikasiKabidTolak($id_keputusan_gubernur, $data)
    {
        $this->db->where('id_keputusan_gubernur', $id_keputusan_gubernur);
        $this->db->update('surat_keputusan_gubernur', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    //-------------verifkasi kadis ----------------//
    public function getKeputusanGubernurKadis()
    {
        $query = $this->db->query("SELECT a.verifikasi_3_aksi, a.catatan,  a.id_keputusan_gubernur, a.no_surat_keputusan_gubernur, a.surat_keputusan_gubernur, b.nama_lengkap FROM surat_keputusan_gubernur AS a LEFT OUTER JOIN pegawai AS b ON a.dibuat_oleh = b.id_pegawai");
        return $query;
    }

    public function VerifikasiKadisSetuju($id_keputusan_gubernur, $data)
    {
        $this->db->where('id_keputusan_gubernur', $id_keputusan_gubernur);
        $this->db->update('surat_keputusan_gubernur', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function VerifikasiKadisTolak($id_keputusan_gubernur, $data)
    {
        $this->db->where('id_keputusan_gubernur', $id_keputusan_gubernur);
        $this->db->update('surat_keputusan_gubernur', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getKeputusanGubernurTTE($id_keputusan_gubernur)
    {
        $this->db->select('*');
        $this->db->from('surat_keputusan_gubernur');
        $this->db->where('id_keputusan_gubernur', $id_keputusan_gubernur);
        return $query = $this->db->get()->row();
    }

    // public function SimpanKeputusanGubernurEdit($id_sarana, $dataP)
    // {
    //     $this->db->where('id_sarana', $id_sarana);
    //     $this->db->update('sarana_prasarana', $dataP);
    //     return ($this->db->affected_rows() != 1) ? false : true;
    // }

    // public function HapusKeputusanGubernur($id_sarana)
    // {
    //     $this->db->where('id_sarana', $id_sarana)->delete('sarana_prasarana');
    //     return ($this->db->affected_rows() != 1) ? false : true;
    // }
}
