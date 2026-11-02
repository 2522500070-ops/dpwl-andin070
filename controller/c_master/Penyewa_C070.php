
<?php
class Penyewa_C070 extends Controller
{
    // Menampilkan daftar penyewa
    public function index()
    {
        $email = $this->session->userdata('emailuser');

        $info['nm_user'] = $email
            ? explode('@', $email)[0]
            : 'Admin';

        $model = $this->load->model('m_master/Penyewa_M070');
        $dt['dtpenyewa'] = $model->datapenyewa();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/penyewaview070', $dt);
        $this->load->view('layout/footer');
    }

    // Form tambah penyewa
    public function create_penyewa()
    {
        $email = $this->session->userdata('emailuser');

        $info['nm_user'] = $email
            ? explode('@', $email)[0]
            : 'Admin';

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_penyewaview070');
        $this->load->view('layout/footer');
    }

    // Form edit penyewa
    public function edit()
    {
        $user_plg070 = $this->load->get('user_plg070');

        if (!$user_plg070) {
            $this->pesanKembali('Username penyewa tidak ditemukan!');
            return;
        }

        $model = $this->load->model('m_master/Penyewa_M070');
        $data['penyewa'] = $model->detailpenyewa($user_plg070);

        if (!$data['penyewa']) {
            $this->pesanKembali('Data penyewa tidak ditemukan!');
            return;
        }

        $email = $this->session->userdata('emailuser');

        $info['nm_user'] = $email
            ? explode('@', $email)[0]
            : 'Admin';

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_penyewaview070', $data);
        $this->load->view('layout/footer');
    }

    // Menyimpan penyewa baru
    public function simpan()
    {
        $user_plg070 = trim(
            $this->load->post('user_plg070')
        );

        if ($user_plg070 === '') {
            $this->pesanKembali('Username penyewa wajib diisi!');
            return;
        }

        $model = $this->load->model('m_master/Penyewa_M070');

        if ($model->cekuser($user_plg070)) {
            $this->pesanKembali('Username penyewa sudah terdaftar!');
            return;
        }

        $folder = dirname(__DIR__, 2) . '/img/';

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $foto = [];

        foreach (['ft_ktp', 'ft_sim_a'] as $field) {
            $nama = $this->uploadFoto($field, $folder, true);

            if ($nama === false) {
                return;
            }

            $foto[$field] = $nama;
        }

        $data = [
            'user_plg070'   => $user_plg070,
            'sandi070'      => $this->load->post('sandi070'),
            'nik070'        => $this->load->post('nik070'),
            'nm_lngkp070'   => $this->load->post('nm_lngkp070'),
            'no_hp070'      => $this->load->post('no_hp070'),
            'almt_lngkp070' => $this->load->post('almt_lngkp070'),
            'ft_ktp'        => $foto['ft_ktp'],
            'ft_sim_a'      => $foto['ft_sim_a']
        ];

        if ($model->simpan($data)) {
            redirect('Penyewa_C070/index');
        } else {
            $this->pesanKembali('Data penyewa gagal disimpan!');
        }
    }

    // Memperbarui data penyewa
    public function UpdatePenyewa()
    {
        $user_plg_lama = trim(
            $this->load->post('user_plg_lama')
        );

        $user_plg_baru = trim(
            $this->load->post('user_plg070')
        );

        if ($user_plg_lama === '' || $user_plg_baru === '') {
            $this->pesanKembali('Username penyewa wajib diisi!');
            return;
        }

        $model = $this->load->model('m_master/Penyewa_M070');

        if (
            $user_plg_baru !== $user_plg_lama &&
            $model->cekuser($user_plg_baru)
        ) {
            $this->pesanKembali('Username baru sudah digunakan!');
            return;
        }

        $penyewaLama = $model->detailpenyewa($user_plg_lama);

        if (!$penyewaLama) {
            $this->pesanKembali('Data penyewa tidak ditemukan!');
            return;
        }

        $folder = dirname(__DIR__, 2) . '/img/';

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $foto = [];

        foreach (['ft_ktp', 'ft_sim_a'] as $field) {
            $nama = $this->uploadFoto(
                $field,
                $folder,
                false,
                $penyewaLama[$field] ?? ''
            );

            if ($nama === false) {
                return;
            }

            $foto[$field] = $nama;
        }

        $data = [
            'user_plg070'   => $user_plg_baru,
            'sandi070'      => $this->load->post('sandi070'),
            'nik070'        => $this->load->post('nik070'),
            'nm_lngkp070'   => $this->load->post('nm_lngkp070'),
            'no_hp070'      => $this->load->post('no_hp070'),
            'almt_lngkp070' => $this->load->post('almt_lngkp070'),
            'ft_ktp'        => $foto['ft_ktp'],
            'ft_sim_a'      => $foto['ft_sim_a']
        ];

        if ($model->UpdatePenyewa($data, $user_plg_lama)) {
            redirect('Penyewa_C070/index');
        } else {
            $this->pesanKembali('Data penyewa gagal diperbarui!');
        }
    }

    // Menghapus penyewa dan foto terkait
    public function hapus()
    {
        $user_plg070 = trim(
            $this->load->post('user_plg070')
        );

        if ($user_plg070 === '') {
            $this->pesanKembali('Username penyewa tidak ditemukan!');
            return;
        }

        $model = $this->load->model('m_master/Penyewa_M070');
        $penyewa = $model->detailpenyewa($user_plg070);

        if (!$penyewa) {
            $this->pesanKembali('Data penyewa tidak ditemukan!');
            return;
        }

        if ($model->HapusDtPenyewa($user_plg070)) {
            $folder = dirname(__DIR__, 2) . '/img/';

            foreach (['ft_ktp', 'ft_sim_a'] as $field) {
                $namaFoto = $penyewa[$field] ?? '';

                if ($namaFoto !== '') {
                    $pathFoto = $folder . basename($namaFoto);

                    if (is_file($pathFoto)) {
                        @unlink($pathFoto);
                    }
                }
            }

            redirect('Penyewa_C070/index');
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
                    'Pilih semua foto identitas terlebih dahulu!'
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
