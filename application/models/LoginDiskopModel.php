<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginDiskopModel extends CI_Model
{
    public function cek_login($nip, $password)
    {
        $this->db->where('nip', $nip);
        $query = $this->db->get('pegawai'); // Sesuaikan dengan nama tabel kamu
        $pegawai = $query->row();

        if ($pegawai) {
            // Verifikasi password yang dimasukkan dengan hash di database
            if (password_verify($password, $pegawai->password)) {
                return $pegawai; // Return data pegawai jika password benar
            }
        }
        return false; // Jika tidak ada atau password salah
    }

    public function getPegawai($nip)
    {
        $query = $this->db->query("SELECT g.jabatan, f.id_level_user, f.level, a.*, b.name as prov_name, c.name as kab_name, d.name as kec_name, e.name as kel_name 
        FROM pegawai as a
        LEFT OUTER JOIN provinces AS b ON a.prov = b.id
        LEFT OUTER JOIN regencies AS c ON a.kab = c.id
        LEFT OUTER JOIN districts AS d ON a.kec = d.id
        LEFT OUTER JOIN villages AS e ON a.kel = e.id
        LEFT OUTER JOIN level_user AS f ON a.level_user = f.id_level_user
        LEFT OUTER JOIN jabatan AS g ON a.id_jabatan = g.id_jabatan
        WHERE a.nip = '$nip'
        ");
        return $query;
    }
}
