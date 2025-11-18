<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function getDataVerifikasiPelakuUsahaLap($kab)
    {
        $query = $this->db->query("SELECT  a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, 
        a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, 
        a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat,
        a.no_urut, b.nama, 
				(SELECT name FROM regencies WHERE a.kab = id) as kab, 
				(SELECT name FROM districts WHERE a.kec = id) as kec, 
				(SELECT name FROM provinces WHERE a.prov = id) as prov, 
				(SELECT name FROM villages WHERE a.kel = id) as kel,
				
				(SELECT name FROM regencies WHERE a.kab_usaha = id) as kab_usaha, 
				(SELECT name FROM districts WHERE a.kec_usaha = id) as kec_usaha, 
				(SELECT name FROM provinces WHERE a.prov_usaha = id) as prov_usaha, 
				(SELECT name FROM villages WHERE a.kel_usaha = id) as kel_usaha,
                
                g.nama as sektor_name
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.kab_usaha = '$kab' and a.aksi = '1' and a.aksi_akhir is not null limit 10
            ");
        return $query->result();
    }

    public function getDataVerifikasiPelakuUsahaLapKabid($kab)
    {
        $query = $this->db->query("SELECT  a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, 
        a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, 
        a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, 
        a.no_urut, b.nama, 
        
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
		(SELECT name FROM provinces WHERE a.prov = id) as prov, 
		(SELECT name FROM villages WHERE a.kel = id) as kel,
        
        g.nama as sektor_name
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.kab_usaha = '$kab' limit 10
            ");
        return $query->result();
    }

    public function getDataVerifikasiPelakuUsahaVerifyLap()
    {
        $query = $this->db->query("SELECT a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, a.no_urut, b.nama, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM villages WHERE a.kel = id) as kel,
        
        g.nama as sektor_name
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.aksi_akhir = '1'
            ");
        return $query->result();
    }

    public function getdataAdminKab($kab, $kec, $kel, $status, $level)
    {
        if ($kab) {
            $wilayah = "AND a.kab_usaha = '$kab'";
        }

        if ($kec) {
            $wilayah = "AND a.kec_usaha = '$kec'";
        }

        if ($kel) {
            $wilayah = "AND a.kel_usaha = '$kel'";
        }
        if ($status == '3') {
            $status_flag = "AND (a.aksi = '' or a.aksi IS NULL or a.aksi = '0')";
        } else if ($status == 2) {
            $status_flag = "AND a.aksi_akhir = '1'";
        } else if ($status == 1) {
            $status_flag = "AND a.aksi = '1'";
        } else {
            $status_flag = "AND a.aksi = '0'";
        }

        $query = $this->db->query("SELECT a.nama_ibu,  a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, 
        a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, 
        a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, 
        a.no_urut, b.nama, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM villages WHERE a.kel = id) as kel,
        (SELECT name FROM regencies WHERE a.kab_usaha = id) as name_usaha_kab, 
        (SELECT name FROM districts WHERE a.kec_usaha = id) as name_usaha_kec, 
        (SELECT name FROM provinces WHERE a.prov_usaha = id) as name_usaha_prov, 
        (SELECT name FROM villages WHERE a.kel_usaha = id) as name_usaha_kel,
        g.nama as sektor_name
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.prov_usaha = '15' $wilayah $status_flag AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') AND (a.kategori_pelaku_usaha = 0 OR a.kategori_pelaku_usaha IS NULL OR a.kategori_pelaku_usaha ='') 
            ORDER BY a.aksi_akhir_date asc
            ");
        return $query;
    }

    public function getdataAdminKab2024($kab, $kec, $kel, $status, $level)
    {
        if ($kab) {
            $wilayah = "AND a.kab_usaha = '$kab'";
        }

        if ($kec) {
            $wilayah = "AND a.kec_usaha = '$kec'";
        }

        if ($kel) {
            $wilayah = "AND a.kel_usaha = '$kel'";
        }
        if ($status == '0') {
            $status_flag = "AND (a.aksi = '0')";
        } else if ($status == 1) {
            $status_flag = "AND a.aksi = '1'";
        }

        $query = $this->db->query("SELECT a.nama_ibu,  a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, 
        a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, 
        a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, 
        a.no_urut, b.nama, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM villages WHERE a.kel = id) as kel,
        (SELECT name FROM regencies WHERE a.kab_usaha = id) as name_usaha_kab, 
        (SELECT name FROM districts WHERE a.kec_usaha = id) as name_usaha_kec, 
        (SELECT name FROM provinces WHERE a.prov_usaha = id) as name_usaha_prov, 
        (SELECT name FROM villages WHERE a.kel_usaha = id) as name_usaha_kel,
        g.nama as sektor_name
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.prov_usaha = '15' $wilayah $status_flag AND (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024)  AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') AND (a.kategori_pelaku_usaha = 0 OR a.kategori_pelaku_usaha IS NULL OR a.kategori_pelaku_usaha ='') 
            ORDER BY (year(a.tgl_input) OR year(a.tgl_edit)) asc
            ");
        return $query;
    }

    public function getDataPerkab()
    {
        $query = $this->db->query("SELECT
                a.kab_usaha,
                r.name AS kab,
                COUNT(a.kab_usaha) AS kab_usaha_total,
                SUM(CASE WHEN a.id_kategori_dumisake = 1 THEN 1 ELSE 0 END) AS mil_20,
                SUM(CASE WHEN a.id_kategori_dumisake = 2 THEN 1 ELSE 0 END) AS mil_10,
                SUM(CASE WHEN a.id_kategori_dumisake = 3 THEN 1 ELSE 0 END) AS mak_10,
                SUM(CASE WHEN a.id_kategori_dumisake = 4 THEN 1 ELSE 0 END) AS mak_5,
                SUM(CASE WHEN a.id_kategori_dumisake = 5 THEN 1 ELSE 0 END) AS wp_10,
                SUM(CASE WHEN a.id_kategori_dumisake = 6 THEN 1 ELSE 0 END) AS wp_5
            FROM
                pelaku_usaha AS a
            LEFT JOIN
                regencies AS r ON r.id = a.kab_usaha
            WHERE
                a.kab_usaha IS NOT NULL
                AND a.kab_usaha != 0
                AND a.id_kategori_dumisake IS NOT NULL
                AND a.id_kategori_dumisake != ''
                AND a.prov_usaha = '15'
            GROUP BY
                a.kab_usaha, r.name
            ORDER BY
                a.kab_usaha DESC;");
        return $query;
    }

    public function getDataPerkab2024()
    {
        $query = $this->db->query("SELECT
                a.kab_usaha,
                r.name AS kab,
                COUNT(a.kab_usaha) AS kab_usaha_total,
                SUM(CASE WHEN a.id_kategori_dumisake = 7 THEN 1 ELSE 0 END) AS mil_5, -- Corrected to count by kab_usaha
                SUM(CASE WHEN a.id_kategori_dumisake = 1 THEN 1 ELSE 0 END) AS mil_20,
                SUM(CASE WHEN a.id_kategori_dumisake = 2 THEN 1 ELSE 0 END) AS mil_10,
                SUM(CASE WHEN a.id_kategori_dumisake = 3 THEN 1 ELSE 0 END) AS mak_10,
                SUM(CASE WHEN a.id_kategori_dumisake = 4 THEN 1 ELSE 0 END) AS mak_5,
                SUM(CASE WHEN a.id_kategori_dumisake = 5 THEN 1 ELSE 0 END) AS wp_10,
                SUM(CASE WHEN a.id_kategori_dumisake = 6 THEN 1 ELSE 0 END) AS wp_5
            FROM
                pelaku_usaha AS a
            LEFT JOIN
                regencies AS r ON r.id = a.kab_usaha
            WHERE
                a.kab_usaha IS NOT NULL
                AND a.kab_usaha != 0
                AND a.id_kategori_dumisake IS NOT NULL
                AND a.id_kategori_dumisake != ''
                AND a.prov_usaha = '15'
                AND (YEAR(a.tgl_input) = 2024 OR YEAR(a.tgl_edit) = 2024) -- New 2024 filter
            GROUP BY
                a.kab_usaha, r.name
            ORDER BY
                a.kab_usaha DESC;");
        return $query;
    }

    public function TotalCalonPenerima($kab)
    {
        $query = $this->db->query("SELECT 
        a.id_pelaku_usaha, a.kab_usaha, a.kec_usaha,
        (SELECT name FROM districts WHERE id = a.kec_usaha) as kec_name,
        COUNT(a.kec_usaha) total_pelaku,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 1 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='')  GROUP BY b.id_kategori_dumisake) as mil_20,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 2 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='')  GROUP BY b.id_kategori_dumisake) as mil_10,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 3 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='')  GROUP BY b.id_kategori_dumisake) as mak_10,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 4 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='')  GROUP BY b.id_kategori_dumisake) as mak_5,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 5 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='')  GROUP BY b.id_kategori_dumisake) as wp_10,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 6 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='')  GROUP BY b.id_kategori_dumisake) as wp_5
        FROM pelaku_usaha as a WHERE kec_usaha != 0 AND aksi_akhir = 1 AND a.kab_usaha = '$kab' AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') AND (a.kategori_pelaku_usaha != 1 OR a.kategori_pelaku_usaha IS NULL OR a.kategori_pelaku_usaha ='') 
        GROUP BY a.kec_usaha;");
        return $query;
    }

    public function TotalCalonPenerima2024($kab)
    {
        $query = $this->db->query("SELECT 
        a.id_pelaku_usaha, a.kab_usaha, a.kec_usaha,
        (SELECT name FROM districts WHERE id = a.kec_usaha) as kec_name,
        COUNT(a.kec_usaha) total_pelaku,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 7  AND b.aksi = 1  AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') AND (year(tgl_input) = 2024 OR year(tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as mil_5,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 1  AND b.aksi = 1  AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') AND (year(tgl_input) = 2024 OR year(tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as mil_20,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 2  AND b.aksi = 1  AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') AND (year(tgl_input) = 2024 OR year(tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as mil_10,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 3  AND b.aksi = 1  AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') AND (year(tgl_input) = 2024 OR year(tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as mak_10,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 4  AND b.aksi = 1  AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') AND (year(tgl_input) = 2024 OR year(tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as mak_5,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 5  AND b.aksi = 1  AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') AND (year(tgl_input) = 2024 OR year(tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as wp_10,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 6  AND b.aksi = 1  AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') AND (year(tgl_input) = 2024 OR year(tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as wp_5
        FROM pelaku_usaha as a WHERE a.kec_usaha != 0 AND a.kab_usaha = '$kab' AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') AND (a.kategori_pelaku_usaha != 1 OR a.kategori_pelaku_usaha IS NULL OR a.kategori_pelaku_usaha ='') AND (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024) AND a.aksi= 1
        GROUP BY a.kec_usaha;");
        return $query;
    }

    public function TotalCalonPenerimaAdmin($id_kab)
{
    $query = $this->db->query("SELECT 
        a.id_pelaku_usaha, a.kab_usaha, a.kec_usaha,
        (SELECT name FROM districts WHERE id = a.kec_usaha) as kec_name,
        COUNT(a.kec_usaha) total_pelaku,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 1 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') GROUP BY b.id_kategori_dumisake) as mil_20,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 2 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') GROUP BY b.id_kategori_dumisake) as mil_10,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 3 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') GROUP BY b.id_kategori_dumisake) as mak_10,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 4 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') GROUP BY b.id_kategori_dumisake) as mak_5,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 5 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') GROUP BY b.id_kategori_dumisake) as wp_10,
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 6 AND aksi_akhir = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') GROUP BY b.id_kategori_dumisake) as wp_5
        FROM pelaku_usaha as a 
        WHERE kec_usaha != 0 
        AND aksi_akhir = 1 
        AND a.kab_usaha = '$id_kab' 
        AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') 
        AND (a.kategori_pelaku_usaha != 1 OR a.kategori_pelaku_usaha IS NULL OR a.kategori_pelaku_usaha ='') 
        GROUP BY a.kec_usaha, a.id_pelaku_usaha, a.kab_usaha;"); // Add a.id_pelaku_usaha and a.kab_usaha to GROUP BY
    return $query;
}

    public function TotalCalonPenerimaAdmin2024($id_kab)
    {
        $query = $this->db->query("SELECT 
            a.id_pelaku_usaha, 
            a.kab_usaha, 
            a.kec_usaha,
            (SELECT name FROM districts WHERE id = a.kec_usaha) as kec_name,
            COUNT(a.kec_usaha) total_pelaku,
            (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b 
                WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 7 AND b.aksi = 1 
                AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') 
                AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') 
                AND (YEAR(tgl_input) = 2024 OR YEAR(tgl_edit) = 2024)  
                GROUP BY b.id_kategori_dumisake) as mil_5,
            (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b 
                WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 1 AND b.aksi = 1 
                AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') 
                AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') 
                AND (YEAR(tgl_input) = 2024 OR YEAR(tgl_edit) = 2024)  
                GROUP BY b.id_kategori_dumisake) as mil_20,
            (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b 
                WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 2 AND b.aksi = 1 
                AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') 
                AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') 
                AND (YEAR(tgl_input) = 2024 OR YEAR(tgl_edit) = 2024)  
                GROUP BY b.id_kategori_dumisake) as mil_10,
            (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b 
                WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 3 AND b.aksi = 1 
                AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') 
                AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') 
                AND (YEAR(tgl_input) = 2024 OR YEAR(tgl_edit) = 2024)  
                GROUP BY b.id_kategori_dumisake) as mak_10,
            (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b 
                WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 4 AND b.aksi = 1 
                AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') 
                AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') 
                AND (YEAR(tgl_input) = 2024 OR YEAR(tgl_edit) = 2024)  
                GROUP BY b.id_kategori_dumisake) as mak_5,
            (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b 
                WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 5 AND b.aksi = 1 
                AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') 
                AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') 
                AND (YEAR(tgl_input) = 2024 OR YEAR(tgl_edit) = 2024)  
                GROUP BY b.id_kategori_dumisake) as wp_10,
            (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b 
                WHERE b.kec_usaha = a.kec_usaha AND b.id_kategori_dumisake = 6 AND b.aksi = 1 
                AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') 
                AND (b.kategori_pelaku_usaha != 1 OR b.kategori_pelaku_usaha IS NULL OR b.kategori_pelaku_usaha ='') 
                AND (YEAR(tgl_input) = 2024 OR YEAR(tgl_edit) = 2024)  
                GROUP BY b.id_kategori_dumisake) as wp_5
            FROM pelaku_usaha as a 
            WHERE a.kec_usaha != 0 
            AND a.aksi = 1 
            AND a.kab_usaha = '$id_kab' 
            AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') 
            AND (a.kategori_pelaku_usaha != 1 OR a.kategori_pelaku_usaha IS NULL OR a.kategori_pelaku_usaha ='') 
            AND (YEAR(a.tgl_input) = 2024 OR YEAR(a.tgl_edit) = 2024)
            GROUP BY a.kec_usaha, a.id_pelaku_usaha, a.kab_usaha;");

        return $query;
    }

    public function TotalCalonPenerimaAspirasi($kab)
    {
        $query = $this->db->query("SELECT COUNT(a.id_kategori_dumisake) as total_pelaku_usaha,
        a.kab_usaha, a.rekomendasi_dari,		
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir IS NULL GROUP BY b.id_kategori_dumisake) as mil_20,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 2 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir IS NULL GROUP BY b.id_kategori_dumisake) as mil_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 3 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir IS NULL GROUP BY b.id_kategori_dumisake) as mak_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 4 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir IS NULL GROUP BY b.id_kategori_dumisake) as mak_5,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 5 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir IS NULL GROUP BY b.id_kategori_dumisake) as wp_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 6 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir IS NULL GROUP BY b.id_kategori_dumisake) as wp_5			
        FROM pelaku_usaha as a WHERE a.kab_usaha = '$kab' and a.kategori_pelaku_usaha =1  AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') and a.aksi_akhir IS NULL
        GROUP BY a.rekomendasi_dari;");
        return $query;
    }

    public function TotalCalonPenerimaAspirasi2024($kab)
    {
        $query = $this->db->query("SELECT COUNT(a.id_kategori_dumisake) as total_pelaku_usaha,
        a.kab_usaha, a.rekomendasi_dari,		
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 7 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='')  AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as mil_5,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='')  AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as mil_20,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 2 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='')  AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as mil_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 3 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='')  AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as mak_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 4 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='')  AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as mak_5,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 5 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='')  AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as wp_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 6 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='')  AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024)  GROUP BY b.id_kategori_dumisake) as wp_5			
        FROM pelaku_usaha as a WHERE a.kab_usaha = '$kab' and a.kategori_pelaku_usaha =1  AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024)
        GROUP BY a.rekomendasi_dari;");
        return $query;
    }

    public function getByYearsKab($tahun, $kab)
    {
        // Define the parameters to pass to the query
        $params = array();
        for ($i = 0; $i < 7; $i++) { 
            // Loop for each placeholder in the subqueries
            $params[] = $tahun;
            $params[] = $tahun;
        }
        $params[] = $kab; // For kab_usaha
        $params[] = $tahun; // For the main query year
        $params[] = $tahun; // For the main query year

        $query = $this->db->query("
            SELECT 
                COUNT(a.id_kategori_dumisake) as total_pelaku_usaha,
                a.kab_usaha, a.rekomendasi_dari,
                (SELECT COUNT(b.id_kategori_dumisake) as hitung 
                    FROM pelaku_usaha as b 
                    WHERE b.kab_usaha = a.kab_usaha 
                        AND b.kategori_pelaku_usaha IS NOT NULL 
                        AND b.rekomendasi_dari = a.rekomendasi_dari 
                        AND b.id_kategori_dumisake = 7 
                        AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake != '') 
                        AND (YEAR(b.tgl_input) = ? OR YEAR(b.tgl_edit) = ?) 
                    GROUP BY b.id_kategori_dumisake) as mil_5,
                (SELECT COUNT(b.id_kategori_dumisake) as hitung 
                    FROM pelaku_usaha as b 
                    WHERE b.kab_usaha = a.kab_usaha 
                        AND b.kategori_pelaku_usaha IS NOT NULL 
                        AND b.rekomendasi_dari = a.rekomendasi_dari 
                        AND b.id_kategori_dumisake = 1 
                        AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake != '') 
                        AND (YEAR(b.tgl_input) = ? OR YEAR(b.tgl_edit) = ?) 
                    GROUP BY b.id_kategori_dumisake) as mil_20,
                (SELECT COUNT(b.id_kategori_dumisake) as hitung 
                    FROM pelaku_usaha as b 
                    WHERE b.kab_usaha = a.kab_usaha 
                        AND b.kategori_pelaku_usaha IS NOT NULL 
                        AND b.rekomendasi_dari = a.rekomendasi_dari 
                        AND b.id_kategori_dumisake = 2 
                        AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake != '') 
                        AND (YEAR(b.tgl_input) = ? OR YEAR(b.tgl_edit) = ?) 
                    GROUP BY b.id_kategori_dumisake) as mil_10,
                (SELECT COUNT(b.id_kategori_dumisake) as hitung 
                    FROM pelaku_usaha as b 
                    WHERE b.kab_usaha = a.kab_usaha 
                        AND b.kategori_pelaku_usaha IS NOT NULL 
                        AND b.rekomendasi_dari = a.rekomendasi_dari 
                        AND b.id_kategori_dumisake = 3 
                        AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake != '') 
                        AND (YEAR(b.tgl_input) = ? OR YEAR(b.tgl_edit) = ?) 
                    GROUP BY b.id_kategori_dumisake) as mak_10,
                (SELECT COUNT(b.id_kategori_dumisake) as hitung 
                    FROM pelaku_usaha as b 
                    WHERE b.kab_usaha = a.kab_usaha 
                        AND b.kategori_pelaku_usaha IS NOT NULL 
                        AND b.rekomendasi_dari = a.rekomendasi_dari 
                        AND b.id_kategori_dumisake = 4 
                        AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake != '') 
                        AND (YEAR(b.tgl_input) = ? OR YEAR(b.tgl_edit) = ?) 
                    GROUP BY b.id_kategori_dumisake) as mak_5,
                (SELECT COUNT(b.id_kategori_dumisake) as hitung 
                    FROM pelaku_usaha as b 
                    WHERE b.kab_usaha = a.kab_usaha 
                        AND b.kategori_pelaku_usaha IS NOT NULL 
                        AND b.rekomendasi_dari = a.rekomendasi_dari 
                        AND b.id_kategori_dumisake = 5 
                        AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake != '') 
                        AND (YEAR(b.tgl_input) = ? OR YEAR(b.tgl_edit) = ?) 
                    GROUP BY b.id_kategori_dumisake) as wp_10,
                (SELECT COUNT(b.id_kategori_dumisake) as hitung 
                    FROM pelaku_usaha as b 
                    WHERE b.kab_usaha = a.kab_usaha 
                        AND b.kategori_pelaku_usaha IS NOT NULL 
                        AND b.rekomendasi_dari = a.rekomendasi_dari 
                        AND b.id_kategori_dumisake = 6 
                        AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake != '') 
                        AND (YEAR(b.tgl_input) = ? OR YEAR(b.tgl_edit) = ?) 
                    GROUP BY b.id_kategori_dumisake) as wp_5
            FROM pelaku_usaha as a 
            WHERE a.kab_usaha = ? 
                AND a.kategori_pelaku_usaha = 1  
                AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake != '') 
                AND (YEAR(a.tgl_input) = ? OR YEAR(a.tgl_edit) = ?)
            GROUP BY a.rekomendasi_dari;
        ", $params); // Passing the parameters array to the query

        return $query;
    }

    public function TotalCalonPenerimaAspirasiBelumAccKabid($kab)
    {
        $query = $this->db->query("SELECT COUNT(a.id_kategori_dumisake) as total_pelaku_usaha,
        a.kab_usaha, a.rekomendasi_dari,		
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir = 1 GROUP BY b.id_kategori_dumisake) as mil_20,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 2 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir = 1 GROUP BY b.id_kategori_dumisake) as mil_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 3 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir = 1 GROUP BY b.id_kategori_dumisake) as mak_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 4 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir = 1 GROUP BY b.id_kategori_dumisake) as mak_5,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 5 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir = 1 GROUP BY b.id_kategori_dumisake) as wp_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 6 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi_akhir = 1 GROUP BY b.id_kategori_dumisake) as wp_5			
        FROM pelaku_usaha as a WHERE a.kab_usaha = '$kab' and a.kategori_pelaku_usaha =1  AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') and a.aksi_akhir = 1
        GROUP BY a.rekomendasi_dari;");
        return $query;
    }


    public function TotalCalonPenerimaAspirasiBelumAccKabid2024($kab)
    {
        $query = $this->db->query("SELECT COUNT(a.id_kategori_dumisake) as total_pelaku_usaha,
        a.kab_usaha, a.rekomendasi_dari,		
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi = 1 AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024) GROUP BY b.id_kategori_dumisake) as mil_5,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 1 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi = 1 AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024) GROUP BY b.id_kategori_dumisake) as mil_20,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 2 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi = 1 AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024) GROUP BY b.id_kategori_dumisake) as mil_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 3 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi = 1 AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024) GROUP BY b.id_kategori_dumisake) as mak_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 4 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi = 1 AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024) GROUP BY b.id_kategori_dumisake) as mak_5,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 5 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi = 1 AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024) GROUP BY b.id_kategori_dumisake) as wp_10,			
        (SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kab_usaha = a.kab_usaha and b.kategori_pelaku_usaha is not null and b.rekomendasi_dari = a.rekomendasi_dari and b.id_kategori_dumisake = 6 AND (b.id_kategori_dumisake IS NOT NULL AND b.id_kategori_dumisake !='') AND b.aksi = 1 AND (year(b.tgl_input) = 2024 OR year(b.tgl_edit) = 2024) GROUP BY b.id_kategori_dumisake) as wp_5			
        FROM pelaku_usaha as a WHERE a.kab_usaha = '$kab' and a.kategori_pelaku_usaha =1  AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') and a.aksi = 1 AND (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024)
        GROUP BY a.rekomendasi_dari;");
        return $query;
    }

    public function getpdfRekomendasi($kab, $kec, $kel, $status, $level, $rekomendasi)
    {
        if ($kab) {
            $wilayah = "AND a.kab_usaha = '$kab'";
        }

        if ($kec) {
            $wilayah = "AND a.kec_usaha = '$kec'";
        }

        if ($kel) {
            $wilayah = "AND a.kel_usaha = '$kel'";
        }
        if ($rekomendasi) {
            $wilayah = "AND  LOWER(REPLACE(a.rekomendasi_dari,' ','')) like '%$rekomendasi%'";
        }
        if ($status == '3') {
            $status_flag = "AND (a.aksi = '' or aksi IS NULL)";
        } else if ($status == 2) {
            $status_flag = "AND a.aksi_akhir = '1'";
        } else if ($status == 1) {
            $status_flag = "AND (a.aksi_akhir = '' OR a.aksi_akhir IS NULL) ";
        } else {
            $status_flag = "AND a.aksi_akhir = '0'";
        }

        $query = $this->db->query("SELECT a.nama_ibu, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.rekomendasi_dari,
        a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, 
        a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, 
        a.no_urut, b.nama, 
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM villages WHERE a.kel = id) as kel,
        g.nama as sektor_name,
        (SELECT name FROM regencies WHERE a.kab_usaha = id) as kab_usaha_name,
        (SELECT name FROM villages WHERE a.kel_usaha = id) as kel_usaha_name,
        (SELECT name FROM districts WHERE a.kec_usaha = id) as kec_usaha_name
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.prov_usaha = '15' $wilayah $status_flag AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') AND a.kategori_pelaku_usaha = 1 ORDER BY a.rekomendasi_dari
            ");
        return $query;
    }

    public function getpdfRekomendasi2024($kab, $kec, $kel, $status, $level, $rekomendasi)
    {
        if ($kab) {
            $wilayahKab = "AND a.kab_usaha = '$kab'";
        }   

        if ($kec) {
            $wilayahKec = "AND a.kec_usaha = '$kec'";
        } else {
            $wilayahKec = "";
        }

        // if ($kel) {
        //     $wilayah = "AND a.kel_usaha = '$kel'";
        // }
        if ($rekomendasi) {
            $wilayah = "AND  LOWER(REPLACE(a.rekomendasi_dari,' ','')) like '%$rekomendasi%'";
        }
        if ($status == '3') {
            $status_flag = "AND (a.aksi = '' or aksi IS NULL)";
        } else if ($status == 2) {
            $status_flag = "AND a.aksi = '1'";
        } else if ($status == 1) {
            $status_flag = "AND (a.aksi = '' OR a.aksi IS NULL) ";
        } else {
            $status_flag = "AND a.aksi = '0'";
        }

        $query = $this->db->query("SELECT a.nama_ibu, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.rekomendasi_dari,
        a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, 
        a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, 
        a.no_urut, b.nama,
        (SELECT kk FROM pelaku_usaha_penerima_2023 WHERE kk = a.kk) as kk3,
        (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2,
        (SELECT name FROM regencies WHERE a.kab = id) as kab, 
        (SELECT name FROM districts WHERE a.kec = id) as kec, 
        (SELECT name FROM provinces WHERE a.prov = id) as prov, 
        (SELECT name FROM villages WHERE a.kel = id) as kel,
        g.nama as sektor_name,
        (SELECT name FROM regencies WHERE a.kab_usaha = id) as kab_usaha_name,
        (SELECT name FROM villages WHERE a.kel_usaha = id) as kel_usaha_name,
        (SELECT name FROM districts WHERE a.kec_usaha = id) as kec_usaha_name
            FROM pelaku_usaha as a
            LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
            LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
            WHERE a.prov_usaha = '15' $wilayah $wilayahKab $wilayahKec AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') AND a.kategori_pelaku_usaha = 1 and (year(a.tgl_input) = 2024 OR year(a.tgl_edit) = 2024) ORDER BY a.rekomendasi_dari
            ");
        return $query;
    }

    public function getpdfRekomendasiByYears($kab, $kec, $kel, $status, $level, $rekomendasi, $tahun)
{
    if ($kab) {
        $wilayahKab = "AND a.kab_usaha = '$kab'";
    }

    if ($kec) {
        $wilayahKec = "AND a.kec_usaha = '$kec'";
    } else {
        $wilayahKec = "";
    }

    if ($kel) {
        $wilayahKel = "AND a.kel_usaha = '$kel'";
    } else {
        $wilayahKel = "";
    }

    if ($rekomendasi) {
        $wilayahRekomendasi = "AND LOWER(REPLACE(a.rekomendasi_dari, ' ', '')) LIKE '%$rekomendasi%'";
    } else {
        $wilayahRekomendasi = "";
    }

    if ($status == '3') {
        $status_flag = "AND (a.aksi = '' OR a.aksi IS NULL)";
    } else if ($status == 2) {
        $status_flag = "AND a.aksi = '1'";
    } else if ($status == 1) {
        $status_flag = "AND (a.aksi = '' OR a.aksi IS NULL)";
    } else {
        $status_flag = "AND a.aksi = '0'";
    }

    // Query with dynamic YEAR filtering based on selected year
    $query = $this->db->query("
        SELECT 
            a.nama_ibu, a.aksi_akhir, a.aksi, a.jk, a.id_pelaku_usaha, a.rekomendasi_dari,
            a.alamat_usaha, a.jenis_usaha, a.nama_usaha, a.nib_sku_iumk, a.hp, a.kk, a.nik, 
            a.id_kategori_dumisake, a.tgl_lahir, a.nama_lengkap, a.alamat, a.kab_usaha, a.kec_usaha, 
            a.no_urut, b.nama,
            (SELECT kk FROM pelaku_usaha_penerima_2023 WHERE kk = a.kk) as kk3,
            (SELECT kk FROM pelaku_usaha_19_06_2023_real WHERE kk = a.kk) as kk2,
            (SELECT name FROM regencies WHERE a.kab = id) as kab, 
            (SELECT name FROM districts WHERE a.kec = id) as kec, 
            (SELECT name FROM provinces WHERE a.prov = id) as prov, 
            (SELECT name FROM villages WHERE a.kel = id) as kel,
            g.nama as sektor_name,
            (SELECT name FROM regencies WHERE a.kab_usaha = id) as kab_usaha_name,
            (SELECT name FROM villages WHERE a.kel_usaha = id) as kel_usaha_name,
            (SELECT name FROM districts WHERE a.kec_usaha = id) as kec_usaha_name
        FROM pelaku_usaha as a
        LEFT OUTER JOIN kategori_dumisake AS b ON a.id_kategori_dumisake = b.id_kategori_dumisake
        LEFT OUTER JOIN sektor_usaha AS g ON a.sektor_usaha = g.id_sektor_usaha
        WHERE a.prov_usaha = '15' 
        $wilayahRekomendasi 
        $wilayahKab 
        $wilayahKec 
        $wilayahKel 
        AND (a.id_kategori_dumisake IS NOT NULL AND a.id_kategori_dumisake !='') 
        AND a.kategori_pelaku_usaha = 1 
        AND (YEAR(a.tgl_input) = ? OR YEAR(a.tgl_edit) = ?) 
        ORDER BY a.rekomendasi_dari
    ", array($tahun, $tahun));  // Binding the year parameter for both tgl_input and tgl_edit

    return $query;
}



    public function getRekomendasi($rekomendasi, $id_kab)
    {
        $query = $this->db->query("SELECT rekomendasi_dari  FROM pelaku_usaha WHERE kategori_pelaku_usaha = '1' AND rekomendasi_dari IS NOT NULL AND kab_usaha ='$id_kab' AND rekomendasi_dari LIKE '%$rekomendasi%' GROUP BY rekomendasi_dari");
        return $query;
    }

    // public function TotalCalonPenerima($kab)
    // {
    //     $query = $this->db->query("SELECT a.kec_usaha,
    //     (SELECT name FROM districts WHERE id = a.kec_usaha) as kec_name,  COUNT(a.kec_usaha) as total_pelaku
    //     FROM pelaku_usaha as a 
    //     WHERE a.kec_usaha != 0 AND a.aksi_akhir = 1 AND a.kab_usaha = '$kab' 
    //     GROUP BY a.kec_usaha
    //     ");
    //     return $query;
    // }

    // public function TotalCalonPenerima_mil_20($kec)
    // {
    //     $query = $this->db->query("SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = '$kec' AND b.id_kategori_dumisake = 1 AND aksi_akhir = 1 GROUP BY b.id_kategori_dumisake");
    //     return $query;
    // }

    // public function TotalCalonPenerima_mil_10($kec)
    // {
    //     $query = $this->db->query("SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = '$kec' AND b.id_kategori_dumisake = 2 AND aksi_akhir = 1 GROUP BY b.id_kategori_dumisake");
    //     return $query;
    // }

    // public function TotalCalonPenerima_mak_10($kec)
    // {
    //     $query = $this->db->query("SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = '$kec' AND b.id_kategori_dumisake = 3 AND aksi_akhir = 1 GROUP BY b.id_kategori_dumisake");
    //     return $query;
    // }

    // public function TotalCalonPenerima_mak_5($kec)
    // {
    //     $query = $this->db->query("SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = '$kec' AND b.id_kategori_dumisake = 4 AND aksi_akhir = 1 GROUP BY b.id_kategori_dumisake");
    //     return $query;
    // }

    // public function TotalCalonPenerima_wp_10($kec)
    // {
    //     $query = $this->db->query("SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = '$kec' AND b.id_kategori_dumisake = 5 AND aksi_akhir = 1 GROUP BY b.id_kategori_dumisake");
    //     return $query;
    // }

    // public function TotalCalonPenerima_wp_5($kec)
    // {
    //     $query = $this->db->query("SELECT COUNT(b.id_kategori_dumisake) as hitung FROM pelaku_usaha as b WHERE b.kec_usaha = '$kec' AND b.id_kategori_dumisake = 6 AND aksi_akhir = 1 GROUP BY b.id_kategori_dumisake");
    //     return $query;
    // }

    // berita kegiatan

    public function getBeritaKegiatan()
    {
        return $this->db->query("SELECT * FROM berita_kegiatan ORDER BY id Desc LIMIT 12");
    }
}
