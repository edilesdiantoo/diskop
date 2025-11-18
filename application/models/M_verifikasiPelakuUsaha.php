<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_verifikasiPelakuUsaha extends CI_Model
{
    public function getDataVerifikasiPelakuUsaha($kab, $start, $limit)
    {
        $query = $this->db->query("SELECT  a.titik_koordinat,
        a.aksi_akhir, a.aksi, a.jk, 
        a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, 
        a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk and kab_usaha = '$kab') as kk2,
        g.nama as sektor_name
                FROM pelaku_usaha as a
                LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
                LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
                WHERE a.kab_usaha = '$kab' AND 
                (CAST(a.aksi AS UNSIGNED) is null or  CAST(a.aksi AS UNSIGNED) = '') limit $start, $limit
            ");
        return $query->result();
    }

    public function getDataVerifikasiPelakuUsaha2024($kab, $start, $limit)
    {
        $query = $this->db->query("SELECT  a.titik_koordinat,
        a.aksi_akhir, a.aksi, a.jk, 
        a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, 
        a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk and kab_usaha = '$kab') as kk2,
        g.nama as sektor_name
                FROM pelaku_usaha as a
                LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
                LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
                WHERE a.kab_usaha = '$kab' AND 
                (CAST(a.aksi AS UNSIGNED) is null or  CAST(a.aksi AS UNSIGNED) = '') and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024) limit $start, $limit
            ");
        return $query->result();
    }

    public function cekDataVerifikasiPelakuUsaha($id_pelaku_usaha)
    {
        $query = $this->db->query("SELECT a.foto_usaha, a.kategori_pelaku_usaha, a.rekomendasi_dari, a.aksi, a.titik_koordinat, a.prov_usaha, a.kab_usaha, a.kec_usaha, a.kel_usaha, a.prov as id_prov, a.kab as id_kab, a.kec as id_kec, a.kel as id_kel, a.file_ktp, a.file_kk, a.file_sertifikat_umkm,
         a.tidak_komisi_jasa, a.bersedia_bertanggung_jawab_2, a.bersedia_bertanggung_jawab_1, a.pendapatan_perbulan, a.sektor_usaha, a.nama_ibu, a.pdd_terakhir, a.jk, a.tempat_lahir, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, 
        a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name, 
        (SELECT name FROM provinces WHERE a.kab_usaha = id) as prov, 
        (SELECT name FROM regencies WHERE a.kec_usaha = id) as kab, 
        (SELECT name FROM districts WHERE a.prov_usaha = id) as kec, 
        (SELECT name FROM villages WHERE a.kel_usaha = id) as kel
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.id_pelaku_usaha = '$id_pelaku_usaha'
            ");
        return $query;
    }

    public function simpanCekDataPelakuUsaha($id_pelaku_usaha, $data)
    {
        $this->db->where('id_pelaku_usaha', $id_pelaku_usaha);
        $this->db->update('pelaku_usaha', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function SimpanVerifikasiAkhir($id_pelaku_usaha, $data)
    {
        $this->db->where('id_pelaku_usaha', $id_pelaku_usaha);
        $this->db->update('pelaku_usaha', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getDataVerifikasiPelakuUsahaVerify($kab, $start, $limit)
    {
        $query = $this->db->query("SELECT a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.kab_usaha = '$kab' and  a.aksi = 1 and a.aksi_akhir is null limit $start,$limit
            ");
        return $query->result();
    }

    public function getDataVerifikasiPelakuUsahaVerify2024($kab, $start, $limit)
    {
        $query = $this->db->query("SELECT a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.kab_usaha = '$kab' and  a.aksi = 1 and a.aksi_akhir is null and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024) limit $start,$limit");
        return $query->result();
    }



    public function getDataVerifikasiPelakuUsahaAdministrator($start, $limit)
    {
        $query = $this->db->query("SELECT a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, 
        a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, 
        a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, 
        a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.aksi = '1' and a.aksi_akhir is null limit $start,$limit
            ");
        return $query->result();
    }

    public function getDataVerifikasiPelakuUsahaAdministrator2024($start, $limit)
    {
        $query = $this->db->query("SELECT a.id_pelaku_usaha, a.tgl_input, a.tgl_edit, a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, 
        a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, 
        a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, 
        a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
        FROM pelaku_usaha as a
        LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
        LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
        WHERE a.aksi = 1 and a.aksi_akhir is null and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024)  limit $start,$limit
            ");
        return $query->result();
    }

    public function countPelakuUsaha()
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha WHERE aksi = '1' and aksi_akhir is null ");
        return $query;
    }

    public function countPelakuUsaha2024()
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha WHERE aksi = '1' and aksi_akhir is null and year(tgl_input) = '2024'");
        return $query;
    }

    public function countAspirasi()
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha WHERE aksi = '1' and aksi_akhir is null ");
        return $query;
    }

    public function countPelakuUsahaAdmin($kab)
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha where kab_usaha = '$kab' AND  aksi = 1 and aksi_akhir is null ");
        return $query;
    }

    public function countPelakuUsahaAdmin2024($kab)
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha where kab_usaha = '$kab' AND  aksi = 1 and aksi_akhir is null and (year(tgl_input) = 2024 OR year(tgl_edit) = 2024)");
        return $query;
    }

    public function countPelakuUsahaAdminTahun($kab, $tahun)
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha where kab_usaha = '$kab' AND YEAR(tgl_input) = '$tahun");
        return $query;
    }

    public function getPelakuUsahaBaru($kab)
    {
        $query = $this->db->query("SELECT count(id_pelaku_usaha) as hitung FROM pelaku_usaha where kab_usaha = '$kab' AND aksi IS NULL and titik_koordinat IS NULL");
        return $query;
    }

    public function simpanValidasiAkhir($id_pelaku_usaha, $status)
    {
        $dateTimeNow = date('Y-m-d : H:i:s');
        $this->db->set('aksi_akhir', $status)
            ->set('aksi_akhir_date', $dateTimeNow)
            ->where('id_pelaku_usaha', $id_pelaku_usaha)
            ->update('pelaku_usaha');
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function simpanValidasiTolakAksi1($id_pelaku_usaha, $status)
    {
        $dateTimeNow = date('Y-m-d : H:i:s');
        $this->db->set('aksi', $status)
            ->set('date_tolak_aksi', $dateTimeNow)
            ->where('id_pelaku_usaha', $id_pelaku_usaha)
            ->update('pelaku_usaha');
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function countTidakLayak($kab)
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha WHERE kab_usaha = '$kab' and aksi_akhir = '0'");
        return $query;
    }

    public function countCalonPenerima($kab)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $kab_where = "";
        } else {
            $kab_where = "AND kab_usaha = '$kab'";
        }
        $query = $this->db->query("SELECT * FROM pelaku_usaha WHERE aksi_akhir = 1 $kab_where");
        return $query;
    }

    public function countCalonPenerima2024($kab)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $kab_where = "";
        } else {
            $kab_where = "AND kab_usaha = '$kab'";
        }
        $query = $this->db->query("SELECT * FROM pelaku_usaha WHERE aksi = 1 and (year(tgl_input) = 2024 OR year(tgl_edit) = 2024) $kab_where");
        return $query;
    }


    public function showTidakLayak($kab, $start, $limit)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $kab_where = "";
        } else {
            $kab_where = "AND a.kab_usaha = '$kab' ";
        }

        $query = $this->db->query("SELECT a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.aksi_akhir = '0' $kab_where limit $start,$limit
            ");
        return $query->result();
    }

    public function showTidakLayakAksi1($kab, $start, $limit)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $kab_where = "";
        } else {
            $kab_where = "AND a.kab_usaha = '$kab' ";
        }

        $query = $this->db->query("SELECT a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.aksi = '0'  $kab_where ORDER BY a.date_tolak_aksi ASC limit $start,$limit
            ");
        return $query->result();
    }

    public function showCalonPenerima($kab, $start, $limit)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $kab_where = "";
        } else {
            $kab_where = "AND a.kab_usaha = '$kab'";
        }

        $query = $this->db->query("SELECT a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE (a.aksi_akhir = '1' OR a.aksi = 1) $kab_where AND a.aksi_akhir_date is not null ORDER BY a.aksi_akhir_date ASC limit $start,$limit 
            ");
        return $query->result();
    }

    public function showCalonPenerimaAksi1($kab, $start, $limit)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $kab_where = "";
        } else {
            $kab_where = "AND a.kab_usaha = '$kab'";
        }

        $query = $this->db->query("SELECT a.tgl_edit, a.tgl_input, a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2,
		(SELECT kk FROM pelaku_usaha_penerima_2023 WHERE kk = a.kk) as kk3 
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.aksi = '1' and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024) $kab_where ORDER BY (year(a.tgl_input) OR year(a.tgl_edit) = 2024) ASC limit $start,$limit 
            ");
        return $query->result();
    }

    public function resultDataPenerimaAdmin($kab_usaha, $id_kategori)
    {
        if ($kab_usaha) {
            $where_kab = "AND a.kab_usaha = '$kab_usaha'";
        } else {
            $where_kab = "";
        }

        if ($id_kategori) {
            $where_kategori = "AND a.id_kategori_dumisake = '$id_kategori'";
        } else {
            $where_kategori = "";
        }

        $query = $this->db->query("SELECT a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.aksi_akhir = '1' $where_kab $where_kategori ORDER BY a.aksi_akhir_date ASC
            ");
        return $query->result();
    }

    public function resultDataPenerimaAdmin2024($kab_usaha, $id_kategori)
    {
        if ($kab_usaha) {
            $where_kab = "AND a.kab_usaha = '$kab_usaha'";
        } else {
            $where_kab = "";
        }

        if ($id_kategori) {
            $where_kategori = "AND a.id_kategori_dumisake = '$id_kategori'";
        } else {
            $where_kategori = "";
        }

        $query = $this->db->query("SELECT a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2,
        (SELECT kk FROM pelaku_usaha_penerima_2023 WHERE kk = a.kk) as kk3
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.aksi = '1' and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024)  AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') AND (a.kategori_pelaku_usaha != 1 OR a.kategori_pelaku_usaha IS NULL OR a.kategori_pelaku_usaha ='')  $where_kab $where_kategori ORDER BY (year(a.tgl_input) OR year(a.tgl_edit)) ASC
            ");
        return $query->result();
    }

    public function getPelakuUsahaEditWilayahUsaha($id_pelaku_usaha)
    {
        $query = $this->db->query("SELECT kab_usaha, kec_usaha, kel_usaha FROM pelaku_usaha WHERE id_pelaku_usaha = '$id_pelaku_usaha'");
        return $query;
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

    public function showCalonPenerimaSearch($kab, $nama)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $where_aksi = "AND (a.aksi_akhir = 1 or a.aksi = 1)";
        } else if ($level == 3) {
            $where_aksi = "AND a.kab_usaha = '$kab' AND (a.aksi_akhir = 1 or a.aksi = 1)";
        } else {
            $where_aksi = "AND a.kab_usaha = '$kab' AND (a.aksi_akhir = 1 or a.aksi = 1)";
        }

        if ($nama) {
            $like_val = "AND LOWER(REPLACE(a.nama_lengkap,' ','')) like '%$nama%'";
        } else {
            $like_val = "";
        }


        $query = $this->db->query("SELECT a.*
        FROM pelaku_usaha as a 
        where a.kk not in (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) $where_aksi $like_val ");
        return $query;
    }

    public function showCalonPenerimaSearchAksi1($kab, $nama)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $where_aksi = "AND a.aksi = 1";
        } else if ($level == 3) {
            $where_aksi = "AND a.kab_usaha = '$kab' AND a.aksi = 1";
        } else {
            $where_aksi = "AND a.kab_usaha = '$kab' AND a.aksi = 1";
        }

        if ($nama) {
            $like_val = "AND LOWER(REPLACE(a.nama_lengkap,' ','')) like '%$nama%'";
        } else {
            $like_val = "";
        }


        $query = $this->db->query("SELECT a.*
        FROM pelaku_usaha as a 
        where a.kk not in (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024) $where_aksi $like_val");
        return $query;
    }
}
