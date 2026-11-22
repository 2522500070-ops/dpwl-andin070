<?php
class Sewa_C extends Controller
{
    public function simpan($no_plat)
    {
        // Ambil email pelanggan dari session
        $email = $this->session->userdata('EmailPlg');

        if (!$email) {
            echo "<script>
                alert('Silakan login terlebih dahulu!');
                window.history.back();
            </script>";
            exit;
        }

        $sewa = $this->load->model('m_shop/Sewa_M');

        // Cek transaksi Keranjang
        $kode = $sewa->CekTransaksi($email);

        if (!$kode) {
            $kode = $sewa->buat_kode_sewa();

            // HEADER: Tabel sewa
            $data_sewa = [
                'kode_sewa'   => $kode,
                'tgl_mulai'   => date('Y-m-d'),
                'tgl_selesai' => date('Y-m-d'),
                'status_sewa' => 'Keranjang',
                'user_plg'    => $email
            ];

            $hasil = $sewa->simpan($data_sewa);

            if ($hasil === false) {
                echo "<script>
                    alert('Gagal menyimpan data penyewaan!');
                    window.history.back();
                </script>";
                exit;
            }
        }

        // Cek keberadaan data mobil
        $cekdata = $sewa->CekDataPilih($kode, $no_plat);

        if (!$cekdata) {
            // Data detail
            $hrgmobil = $this->load->model('m_master/Mobil_M');
            $ambilhrg = $hrgmobil->detailmobil($no_plat);

            $data_pilih = [
                'kode_sewa' => $kode,
                'no_plat'   => $no_plat,
                'hrg_sewa'  => $ambilhrg['hrg_hari'],
                'n_hari'    => 0
            ];

            $dtpilih = $sewa->simpandetail($data_pilih);
        } else {
            echo "<script>
                alert('Mobil Sudah dipilih..!');
                window.location.href = '" . base_url('shopping') . "';
            </script>";
            exit;
        }

        if ($dtpilih !== false) {
            echo "<script>
                alert('Mobil berhasil dimasukkan ke keranjang!');
                window.location.href = '" . base_url('shopping') . "';
            </script>";
            exit;
        } else {
            echo "<script>
                alert('Gagal menyimpan data penyewaan!');
                window.history.back();
            </script>";
            exit;
        }
    }
}
