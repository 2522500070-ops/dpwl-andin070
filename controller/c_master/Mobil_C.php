<?php
class Mobil_C extends Controller
{
    public function index()
    {
        // Load model mobil
        $this->load->model('m_master/Mobil_M');
        
        // Ambil data dari model
        $data['mobil'] = $this->Mobil_M->datamobil();
        
        // Kirim data ke view
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/mobilview', $data); // <-- data dikirim di sini
        $this->load->view('layout/footer');
    }

    public function create_mobil()
{
    $info['nm_user'] = explode('@', $this->session->userdata('emailuser'));
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar', $info);
    $this->load->view('v_master/create_mobilview');
    $this->load->view('layout/footer');
}

public function simpan()
{
    $mobil = $this->load->model('m_master/Mobil_M');

    // 1. Cek Duplikasi Plat Nomor
    if ($mobil->cekplat($this->load->post('no_plat'))) {
        echo "<script>
                alert('Nomor plat sudah terdaftar!');
                window.history.back();
              </script>";
        exit;
    }

    // 2. Unggah Berkas Foto Depan
    $nmgambar = $_FILES['ft_depan']['tmp_name'];
    $ekstensi = explode(".", $_FILES['ft_depan']['name']);
    $ekstensi = end($ekstensi);

    $ft_depan = 'Depan' . $this->load->post('no_plat') . '.' . $ekstensi;
    $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_depan;

    if ($ekstensi != "jpg" && $ekstensi != "png" && $ekstensi != "jpeg") {
        echo "<script>alert('Gagal simpan gambar depan, format jpg, png, dan jpeg..!');</script>";
    } else {
        move_uploaded_file($nmgambar, $target_dir);
    }

    // Penamaan berkas foto belakang dan interior
    $ft_blkg = 'Belakang' . $this->load->post('no_plat');
    $ft_interior = 'Interior' . $this->load->post('no_plat');

    // 3. Susun Array Data
    $data = [
        'no_plat'     => $this->load->post('no_plat'),
        'nm_mobil'    => $this->load->post('nm_mobil'),
        'nkursi'      => $this->load->post('nkursi'),
        'nbagasi'     => $this->load->post('nbagasi'),
        'jns_mobil'   => $this->load->post('jns_mobil'),
        'transmisi'   => $this->load->post('transmisi'),
        'thn_buat'    => $this->load->post('thn_buat'),
        'ft_depan'    => $ft_depan,
        'ft_blkg'     => $ft_blkg,
        'ft_interior' => $ft_interior,
        'hrg_hari'    => $this->load->post('hrg_hari'),
        'cttn_unit'   => $this->load->post('cttn_unit'),
        'status_unit' => $this->load->post('status_unit')
    ];

    // 4. Eksekusi Simpan ke Database
    $simpan = $mobil->simpan($data);

    if ($simpan) {
        echo "<script>
                alert('Data mobil berhasil disimpan!');
                window.location.href = '" . base_url('Mobil_C/index') . "';
              </script>";
    } else {
        echo "<script>
                alert('Data mobil gagal disimpan!');
                window.history.back();
              </script>";
    }
}
}