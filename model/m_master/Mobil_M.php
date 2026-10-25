<?php
class Mobil_M extends Model
{
    // Menampilkan semua data mobil
    public function datamobil()
    {
        $sql = $this->db->prepare(
            "SELECT * FROM mobil"
        );

        $sql->execute();

        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Mengecek nomor plat
    public function cekplat($no_plat)
    {
        $sql = $this->db->prepare(
            "SELECT no_plat FROM mobil WHERE no_plat = ?"
        );

        $sql->bind_param("s", $no_plat);
        $sql->execute();

        return $sql->get_result()->num_rows > 0;
    }

    // Menyimpan data mobil baru
    public function simpan($data)
    {
        $sql = $this->db->prepare(
            "INSERT INTO mobil
            (no_plat, nm_mobil, nkursi, nbagasi, jns_mobil,
             transmisi, thn_buat, ft_depan, ft_blkg,
             ft_interior, hrg_hari, cttn_unit, status_unit)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $sql->bind_param(
            "ssiississsdss",
            $data['no_plat'],
            $data['nm_mobil'],
            $data['nkursi'],
            $data['nbagasi'],
            $data['jns_mobil'],
            $data['transmisi'],
            $data['thn_buat'],
            $data['ft_depan'],
            $data['ft_blkg'],
            $data['ft_interior'],
            $data['hrg_hari'],
            $data['cttn_unit'],
            $data['status_unit']
        );

        return $sql->execute();
    }

    // Mengambil satu data mobil
    public function ambilmobil($no_plat)
    {
        $sql = $this->db->prepare(
            "SELECT * FROM mobil WHERE no_plat = ?"
        );

        $sql->bind_param("s", $no_plat);
        $sql->execute();

        return $sql->get_result()->fetch_assoc();
    }

    // Memperbarui data mobil
    public function update($data, $no_plat_lama)
    {
        $sql = $this->db->prepare(
            "UPDATE mobil SET
                no_plat = ?,
                nm_mobil = ?,
                nkursi = ?,
                nbagasi = ?,
                jns_mobil = ?,
                transmisi = ?,
                thn_buat = ?,
                ft_depan = ?,
                ft_blkg = ?,
                ft_interior = ?,
                hrg_hari = ?,
                cttn_unit = ?,
                status_unit = ?
             WHERE no_plat = ?"
        );

        $sql->bind_param(
            "ssiississsdsss",
            $data['no_plat'],
            $data['nm_mobil'],
            $data['nkursi'],
            $data['nbagasi'],
            $data['jns_mobil'],
            $data['transmisi'],
            $data['thn_buat'],
            $data['ft_depan'],
            $data['ft_blkg'],
            $data['ft_interior'],
            $data['hrg_hari'],
            $data['cttn_unit'],
            $data['status_unit'],
            $no_plat_lama
        );

        return $sql->execute();
    }

    // Menghapus data mobil
    public function hapus($no_plat)
    {
        $sql = $this->db->prepare(
            "DELETE FROM mobil WHERE no_plat = ?"
        );

        $sql->bind_param("s", $no_plat);

        return $sql->execute();
    }
}