<?php defined('BASEPATH') or exit('No direct script access allowed');

class AspirasiModel extends CI_Model
{
    public function countPelakuUsaha()
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha WHERE aksi = '1' and kategori_pelaku_usaha = 1 and aksi_akhir is null ");
        return $query;
    }

    public function getDataVerifikasiPelakuUsahaAdministrator($start, $limit)
    {
        $query = $this->db->query("SELECT a.rekomendasi_dari, a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, 
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
        WHERE a.aksi = '1' and a.kategori_pelaku_usaha = 1 and a.aksi_akhir is null limit $start,$limit
            ");
        return $query->result();
    }


    public function countPelakuUsahaAdmin($kab)
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha where kab_usaha = '$kab' and kategori_pelaku_usaha = 1");
        return $query;
    }

    public function countPelakuUsahaAdmin2024($kab)
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha where kab_usaha = '$kab' AND  aksi = 1 and aksi_akhir is null and (year(tgl_input) = 2024 OR year(tgl_edit) = 2024) and kategori_pelaku_usaha = 1");
        return $query;
    }


    public function countPelakuUsaha2024()
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha WHERE aksi = '1' and aksi_akhir is null and year(tgl_input) = '2024' AND kategori_pelaku_usaha = 1");
        return $query;
    }

    public function getDataVerifikasiPelakuUsahaVerify($kab, $start, $limit)
    {
        $query = $this->db->query("SELECT a.rekomendasi_dari, a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM villages WHERE a.kel = id) as kel, 
        g.nama as sektor_name,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.kab_usaha = '$kab' and a.kategori_pelaku_usaha = 1 and  a.aksi = 1 and a.aksi_akhir is null limit $start,$limit
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

    public function getDataVerifikasiPelakuUsahaAdministrator2024($start, $limit)
    {
        $query = $this->db->query("SELECT a.rekomendasi_dari, a.id_pelaku_usaha, a.tgl_input, a.tgl_edit, a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, 
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
        WHERE a.kategori_pelaku_usaha = 1 and a.aksi_akhir is null and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024) limit $start,$limit
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
                WHERE a.kab_usaha = '$kab' AND a.kategori_pelaku_usaha = 1  AND
                (CAST(a.aksi AS UNSIGNED) is null or  CAST(a.aksi AS UNSIGNED) = '') and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024) limit $start, $limit
            ");
        return $query->result();
    }

    public function getDataVerifikasiPelakuUsaha($kab, $start, $limit)
    {
        $query = $this->db->query("SELECT a.rekomendasi_dari, a.titik_koordinat,
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
        WHERE a.kab_usaha = '$kab'  AND a.kategori_pelaku_usaha = 1 and
        (CAST(a.aksi AS UNSIGNED) is not null or  CAST(a.aksi AS UNSIGNED) = '1') limit $start, $limit
            ");
        return $query->result();
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
        where a.kk not in (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) and a.kategori_pelaku_usaha = 1 $where_aksi $kategori_ada $like_val limit 100");
        return $query;
    }

    public function getDataPelakUsahaLevelUser2024($kab, $nama, $get_kategori, $kab_usaha, $penerima)
    {
        $level = $this->session->userdata('level_user');
        if ($level == 1) {
            $where_aksi = "AND a.kab_usaha = '$kab_usaha'";
        } else if ($level == 3) {
            $where_aksi = "AND a.kab_usaha = '$kab' ";
        } else {
            $where_aksi = "AND a.kab_usaha = '$kab'";
        }

        if ($penerima == 1) {
            $penerimaWhere = 'AND (kk IN (SELECT kk FROM pelaku_usaha_penerima_2023 WHERE kk = a.kk) OR (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk))';
        } else {
            $penerimaWhere = '';
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


        $query = $this->db->query(
            "SELECT a.*,
                (SELECT kk FROM pelaku_usaha_penerima_2023 WHERE kk = a.kk) as kk3,
                (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
                FROM pelaku_usaha as a 
                WHERE a.kategori_pelaku_usaha = 1 $where_aksi and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024) AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') AND (a.aksi = '' or aksi IS NULL)
                $kategori_ada $penerimaWhere
            "
        );
        return $query;
    }

    public function getAspirasiByYears($kab, $nama, $get_kategori, $kab_usaha, $penerima, $tahun)
    {
        $level = $this->session->userdata('level_user');

        // Set the query condition based on user level
        if ($level == 1) {
            $where_aksi = "AND a.kab_usaha = '$kab_usaha'";
        } else if ($level == 3) {
            $where_aksi = "AND a.kab_usaha = '$kab'";
        } else {
            $where_aksi = "AND a.kab_usaha = '$kab'";
        }

        // Handling penerima condition
        if ($penerima == 1) {
            $penerimaWhere = 'AND (kk IN (SELECT kk FROM pelaku_usaha_penerima_2023 WHERE kk = a.kk) OR (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk))';
        } else {
            $penerimaWhere = '';
        }

        // Handling search by name if provided
        if ($nama) {
            $like_val = "AND LOWER(REPLACE(a.nama_lengkap,' ','')) LIKE '%$nama%'";
        } else {
            $like_val = "";
        }

        // Handling the category filter if provided
        if ($get_kategori) {
            $kategori_ada = "AND a.id_kategori_dumisake = '$get_kategori'";
        } else {
            $kategori_ada = "";
        }

        // Query with dynamic year filtering based on the selected year
        $query = $this->db->query(
            "SELECT a.*,
                    (SELECT kk FROM pelaku_usaha_penerima_2023 WHERE kk = a.kk) as kk3,
                    (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2
                FROM pelaku_usaha as a 
                WHERE a.kategori_pelaku_usaha = 1 
                $where_aksi 
                AND (YEAR(a.tgl_input) = ? OR YEAR(a.tgl_edit) = ?) 
                AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') 
                AND (a.aksi = '' OR a.aksi IS NULL)
                $kategori_ada 
                $penerimaWhere
                ", array($tahun, $tahun) // Binding the year parameter for both tgl_input and tgl_edit
        );

        return $query;
    }

    public function getDataPelakUsaha($kab, $nama, $tahun)
    {
        $level = $this->session->userdata('level_user');
        
        // Set the query condition based on user level
        if ($level == 1) {
            $where_aksi = "AND a.kab_usaha = '$kab' ";
        } else if ($level == 3) {
            $where_aksi = "AND a.kab_usaha = '$kab' ";
        } else {
            $where_aksi = "AND a.kab_usaha = '$kab' ";
        }

        // Initialize $like_val and $nama_clean as empty to handle edge cases
        $like_val = "";
        $nama_clean = "";

        // Sanitize the nama input to avoid unwanted spaces if provided
        if ($nama) {
            // Clean the nama search input by trimming spaces and converting it to lowercase
            $nama_clean = strtolower(trim($nama));  // Ensure lowercase and no leading/trailing spaces
            $like_val = "AND (LOWER(REPLACE(a.nama_lengkap, ' ', '')) LIKE '%$nama_clean%' OR a.no_urut LIKE '%$nama_clean%')";
        }

        // Prepare the query with filtering by year (based on tahun)
        $query = $this->db->query(
            "SELECT a.*, 
                (SELECT kk FROM pelaku_usaha_penerima_2023 WHERE kk = a.kk) AS kk3,
                (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk LIMIT 1) as kk2  -- LIMIT 1 to ensure only one row is returned
            FROM pelaku_usaha as a 
            WHERE a.kategori_pelaku_usaha = 1 
            $where_aksi 
            AND (YEAR(a.tgl_input) = ? OR YEAR(a.tgl_edit) = ?) 
            AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') 
            AND (a.aksi = '' OR a.aksi IS NULL)
            $like_val 
            ", array($tahun, $tahun)  // Bind the year parameter for both tgl_input and tgl_edit
        );

        return $query;
    }



    //======================2025====================//

    public function countPelakuUsaha2025()
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha WHERE aksi = '1' and aksi_akhir is null and year(tgl_input) = '2025' AND kategori_pelaku_usaha = 1");
        return $query;
    }

    public function countPelakuUsahaAdmin2025($kab)
    {
        $query = $this->db->query("SELECT * FROM pelaku_usaha where kab_usaha = '$kab' AND  aksi = 1 and aksi_akhir is null and (year(tgl_input) = 2025 OR year(tgl_edit) = 2025) and kategori_pelaku_usaha = 1");
        return $query;
    }

    public function getDataVerifikasiPelakuUsahaAdministrator2025($start, $limit)
    {
        $query = $this->db->query("SELECT a.rekomendasi_dari, a.id_pelaku_usaha, a.tgl_input, a.tgl_edit, a.titik_koordinat, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, 
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
        WHERE a.kategori_pelaku_usaha = 1 and a.aksi_akhir is null and (year(a.tgl_input) = 2025 OR year(a.tgl_edit) = 2025) limit $start,$limit
            ");
        return $query->result();
    }

    public function getDataVerifikasiPelakuUsahaVerify2025($kab, $start, $limit)
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
            WHERE a.kab_usaha = '$kab' and  a.aksi = 1 and a.aksi_akhir is null and (year(a.tgl_input) = 2025 OR year(a.tgl_edit) = 2025) limit $start,$limit");
        return $query->result();
    }

    public function getDataVerifikasiPelakuUsaha2025($kab, $start, $limit)
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
                WHERE a.kab_usaha = '$kab' AND a.kategori_pelaku_usaha = 1  AND
                (CAST(a.aksi AS UNSIGNED) is null or  CAST(a.aksi AS UNSIGNED) = '') and (year(a.tgl_input) = 2025 OR year(a.tgl_edit) = 2025) limit $start, $limit
            ");
        return $query->result();
    }

    //==========berdasarkan data tahun yang dipilih===============//
    public function getDataPelakuUsahaByYear($tahun_penerima)
    {
        $query = $this->db->query("SELECT
                a.*,
                (SELECT kk FROM pelaku_usaha_penerima_2023 WHERE kk = a.kk) AS kk3,
                (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) AS kk2
            FROM pelaku_usaha AS a 
            WHERE
                (YEAR(a.tgl_input) = ? OR YEAR(a.tgl_edit) = ?)
                AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake != '')
                AND (a.aksi = '' OR a.aksi IS NULL)
        ", array($tahun_penerima, $tahun_penerima));
        
        return $query;
    }
}
