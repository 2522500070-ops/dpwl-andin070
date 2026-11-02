
<?php
class Penyewa_M070 extends Model
{
    // Menampilkan semua data penyewa
    public function datapenyewa()
    {
        $sql = $this->db->prepare(
            "SELECT * FROM penyewa"
        );

        $sql->execute();

        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Mengecek username penyewa
    public function cekuser($user_plg070)
    {
        $sql = $this->db->prepare(
            "SELECT user_plg070 FROM penyewa WHERE user_plg070 = ?"
        );

        $sql->bind_param("s", $user_plg070);
        $sql->execute();

        return $sql->get_result()->num_rows > 0;
    }

    // Menyimpan data penyewa baru
    public function simpan($data)
    {
        $sql = $this->db->prepare(
            "INSERT INTO penyewa
            (user_plg070, sandi070, nik070, nm_lngkp070,
             no_hp070, almt_lngkp070, ft_ktp, ft_sim_a)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $sql->bind_param(
            "ssssssss",
            $data['user_plg070'],
            $data['sandi070'],
            $data['nik070'],
            $data['nm_lngkp070'],
            $data['no_hp070'],
            $data['almt_lngkp070'],
            $data['ft_ktp'],
            $data['ft_sim_a']
        );

        return $sql->execute();
    }

    // Mengambil detail data penyewa berdasarkan username
    public function detailpenyewa($user_plg070)
    {
        $sql = $this->db->prepare(
            "SELECT * FROM penyewa WHERE user_plg070 = ?"
        );

        $sql->bind_param("s", $user_plg070);
        $sql->execute();

        return $sql->get_result()->fetch_assoc();
    }

    // Mengambil satu data penyewa
    public function ambilpenyewa($user_plg070)
    {
        $sql = $this->db->prepare(
            "SELECT * FROM penyewa WHERE user_plg070 = ?"
        );

        $sql->bind_param("s", $user_plg070);
        $sql->execute();

        return $sql->get_result()->fetch_assoc();
    }

    // Memperbarui data penyewa
    public function update($data, $user_plg_lama)
    {
        $sql = $this->db->prepare(
            "UPDATE penyewa SET
                user_plg070 = ?,
                sandi070 = ?,
                nik070 = ?,
                nm_lngkp070 = ?,
                no_hp070 = ?,
                almt_lngkp070 = ?,
                ft_ktp = ?,
                ft_sim_a = ?
             WHERE user_plg070 = ?"
        );

        $sql->bind_param(
            "sssssssss",
            $data['user_plg070'],
            $data['sandi070'],
            $data['nik070'],
            $data['nm_lngkp070'],
            $data['no_hp070'],
            $data['almt_lngkp070'],
            $data['ft_ktp'],
            $data['ft_sim_a'],
            $user_plg_lama
        );

        return $sql->execute();
    }

    // Fungsi memperbarui data penyewa sesuai pola materi
    public function UpdatePenyewa($data, $user_plg_lama)
    {
        return $this->update($data, $user_plg_lama);
    }

    // Menghapus data penyewa
    public function hapus($user_plg070)
    {
        $sql = $this->db->prepare(
            "DELETE FROM penyewa WHERE user_plg070 = ?"
        );

        $sql->bind_param("s", $user_plg070);

        return $sql->execute();
    }

    // Fungsi menghapus data penyewa sesuai pola materi
    public function HapusDtPenyewa($user_plg070)
    {
        return $this->hapus($user_plg070);
    }
}
