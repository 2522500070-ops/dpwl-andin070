<?php
class Mobil_C extends Controller
{
    // Menampilkan daftar mobil
    public function index()
    {
        $email = $this->session->userdata('emailuser');

        $info['nm_user'] = $email
            ? explode('@', $email)[0]
            : 'Admin';

        $model = $this->load->model('m_master/Mobil_M');
        $dt['dtmobil'] = $model->datamobil();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/mobilview', $dt);
        $this->load->view('layout/footer');
    }

    // Form tambah mobil
    public function create_mobil()
    {
        $email = $this->session->userdata('emailuser');

        $info['nm_user'] = $email
            ? explode('@', $email)[0]
            : 'Admin';

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_mobilview');
        $this->load->view('layout/footer');
    }

    // Form edit mobil
    public function edit_mobil()
    {
        $no_plat = $this->load->get('no_plat');

        if (!$no_plat) {
            $this->pesanKembali('Nomor plat tidak ditemukan!');
            return;
        }

        $model = $this->load->model('m_master/Mobil_M');
        $data['mobil'] = $model->ambilmobil($no_plat);

        if (!$data['mobil']) {
            $this->pesanKembali('Data mobil tidak ditemukan!');
            return;
        }

        $email = $this->session->userdata('emailuser');

        $info['nm_user'] = $email
            ? explode('@', $email)[0]
            : 'Admin';

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/edit_mobilview', $data);
        $this->load->view('layout/footer');
    }

    // Menyimpan mobil baru
    public function simpan()
    {
        $no_plat = trim($this->load->post('no_plat'));

        if ($no_plat === '') {
            $this->pesanKembali('Nomor plat wajib diisi!');
            return;
        }

        $model = $this->load->model('m_master/Mobil_M');

        if ($model->cekplat($no_plat)) {
            $this->pesanKembali('Nomor plat sudah terdaftar!');
            return;
        }

        $folder = dirname(__DIR__, 2) . '/img/';

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $foto = [];

        foreach (['ft_depan', 'ft_blkg', 'ft_interior'] as $field) {
            $nama = $this->uploadFoto($field, $folder, true);

            if ($nama === false) {
                return;
            }

            $foto[$field] = $nama;
        }

        $data = [
            'no_plat'     => $no_plat,
            'nm_mobil'    => $this->load->post('nm_mobil'),
            'nkursi'      => (int) $this->load->post('nkursi'),
            'nbagasi'     => (int) $this->load->post('nbagasi'),
            'jns_mobil'   => $this->load->post('jns_mobil'),
            'transmisi'   => $this->load->post('transmisi'),
            'thn_buat'    => (int) $this->load->post('thn_buat'),
            'ft_depan'    => $foto['ft_depan'],
            'ft_blkg'     => $foto['ft_blkg'],
            'ft_interior' => $foto['ft_interior'],
            'hrg_hari'    => (float) $this->load->post('hrg_hari'),
            'cttn_unit'   => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        if ($model->simpan($data)) {
            redirect('Mobil_C/index');
        } else {
            $this->pesanKembali('Data mobil gagal disimpan!');
        }
    }

    // Memperbarui data mobil
    public function update_mobil()
    {
        $no_plat_lama = trim(
            $this->load->post('no_plat_lama')
        );

        $no_plat_baru = trim(
            $this->load->post('no_plat')
        );

        if ($no_plat_lama === '' || $no_plat_baru === '') {
            $this->pesanKembali('Nomor plat wajib diisi!');
            return;
        }

        $model = $this->load->model('m_master/Mobil_M');

        if (
            $no_plat_baru !== $no_plat_lama &&
            $model->cekplat($no_plat_baru)
        ) {
            $this->pesanKembali('Nomor plat baru sudah digunakan!');
            return;
        }

        $mobilLama = $model->ambilmobil($no_plat_lama);

        if (!$mobilLama) {
            $this->pesanKembali('Data mobil tidak ditemukan!');
            return;
        }

        $folder = dirname(__DIR__, 2) . '/img/';

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $foto = [];

        foreach (['ft_depan', 'ft_blkg', 'ft_interior'] as $field) {
            $nama = $this->uploadFoto(
                $field,
                $folder,
                false,
                $mobilLama[$field]
            );

            if ($nama === false) {
                return;
            }

            $foto[$field] = $nama;
        }

        $data = [
            'no_plat'     => $no_plat_baru,
            'nm_mobil'    => $this->load->post('nm_mobil'),
            'nkursi'      => (int) $this->load->post('nkursi'),
            'nbagasi'     => (int) $this->load->post('nbagasi'),
            'jns_mobil'   => $this->load->post('jns_mobil'),
            'transmisi'   => $this->load->post('transmisi'),
            'thn_buat'    => (int) $this->load->post('thn_buat'),
            'ft_depan'    => $foto['ft_depan'],
            'ft_blkg'     => $foto['ft_blkg'],
            'ft_interior' => $foto['ft_interior'],
            'hrg_hari'    => (float) $this->load->post('hrg_hari'),
            'cttn_unit'   => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        if ($model->update($data, $no_plat_lama)) {
            redirect('Mobil_C/index');
        } else {
            $this->pesanKembali('Data mobil gagal diperbarui!');
        }
    }

    // Menghapus mobil dan foto terkait
    public function hapus_mobil()
    {
        $no_plat = trim($this->load->post('no_plat'));

        if ($no_plat === '') {
            $this->pesanKembali('Nomor plat tidak ditemukan!');
            return;
        }

        $model = $this->load->model('m_master/Mobil_M');
        $mobil = $model->ambilmobil($no_plat);

        if (!$mobil) {
            $this->pesanKembali('Data mobil tidak ditemukan!');
            return;
        }

        if ($model->hapus($no_plat)) {
            $folder = dirname(__DIR__, 2) . '/img/';

            foreach (
                ['ft_depan', 'ft_blkg', 'ft_interior'] as $field
            ) {
                $namaFoto = $mobil[$field] ?? '';

                if ($namaFoto !== '') {
                    $pathFoto = $folder . basename($namaFoto);

                    if (is_file($pathFoto)) {
                        @unlink($pathFoto);
                    }
                }
            }

            redirect('Mobil_C/index');
        } else {
            $this->pesanKembali(
                'Data gagal dihapus! Periksa relasi database.'
            );
        }
    }

    // Upload foto JPG, JPEG, atau PNG
    private function uploadFoto(
        $field,
        $folder,
        $wajib = false,
        $namaLama = ''
    ) {
        if (
            !isset($_FILES[$field]) ||
            $_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE
        ) {
            if ($wajib) {
                $this->pesanKembali(
                    'Pilih semua foto mobil terlebih dahulu!'
                );
                return false;
            }

            return $namaLama;
        }

        if ($_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
            $this->pesanKembali(
                'Upload foto gagal. Periksa ukuran file!'
            );
            return false;
        }

        $originalName = basename($_FILES[$field]['name']);
        $extension = strtolower(
            pathinfo($originalName, PATHINFO_EXTENSION)
        );

        if (!in_array($extension, ['jpg', 'jpeg', 'png'], true)) {
            $this->pesanKembali(
                'Foto harus berformat JPG, JPEG, atau PNG!'
            );
            return false;
        }

        $safeName = preg_replace(
            '/[^A-Za-z0-9._-]/',
            '_',
            $originalName
        );

        $filename = pathinfo(
            $safeName,
            PATHINFO_FILENAME
        );

        $targetName = $safeName;
        $counter = 1;

        while (file_exists($folder . $targetName)) {
            $targetName = $filename . '_' .
                $counter . '.' . $extension;
            $counter++;
        }

        if (!move_uploaded_file(
            $_FILES[$field]['tmp_name'],
            $folder . $targetName
        )) {
            $this->pesanKembali(
                'Foto gagal disimpan ke folder img!'
            );
            return false;
        }

        return $targetName;
    }

    // Menampilkan pesan peringatan
    private function pesanKembali($pesan)
    {
        echo '<script>
            alert(' . json_encode($pesan) . ');
            history.back();
        </script>';
    }
}