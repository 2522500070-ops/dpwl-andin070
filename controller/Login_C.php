<?php
class Login_C extends Controller
{
    public function index()
    {
        $isipsn['psn'] = $this->session->set_flashdata('pesan');
        $this->load->view('login', $isipsn);
    }

    public function penyewa()
    {
        $this->session->set_userdata('userplg', 'penyewa');

        $isipsn['psn'] = $this->session->set_flashdata('pesan');
        $this->load->view('login', $isipsn);
    }

    public function CekLogin()
    {
        // LOGIN PENYEWA
        if (!empty($this->session->userdata('userplg'))) {

            $email = $this->load->post('email');
            $password = $this->load->post('pass');

            $cekdata = $this->load->model('LoginPlg_M');
            $datauser = $cekdata->DataPlg($email);

            // Password penyewa menggunakan teks biasa
            if ($datauser && $password === $datauser['sandi070']) {

                $this->session->set_userdata('EmailPlg', $email);
                $this->session->set_userdata('NmPlg', $datauser['nm_lngkp070']);

                $this->session->set_flashdata('pesan', 'Login berhasil...');
                redirect('Shopping/index');

            } else {

                $this->session->set_flashdata('pesan', 'Gagal: Silahkan cek username dan password Anda...');
                redirect('Login_C/penyewa');
            }

            exit();
        }

        // LOGIN ADMIN
        $email = $this->load->post('email');
        $password = $this->load->post('pass');

        $cekdata = $this->load->model('Login_M');
        $datauser = $cekdata->ambildata($email);

        // Password admin menggunakan hash
        if ($datauser && password_verify($password, $datauser['password'])) {

            $this->session->set_userdata('emailuser', $email);

            $this->session->set_flashdata('pesan', 'Login berhasil sebagai ' . $this->session->userdata('emailuser'));
            redirect('Admin_C/index');

        } else {

            $this->session->set_flashdata('pesan', 'Gagal: Silahkan cek email, password, atau status akun Anda...');
            redirect('Login_C/index');
        }

        exit();
    }

    public function keluar()
    {
        $this->session->unset_userdata('userplg');
        $this->session->unset_userdata('EmailPlg');
        $this->session->unset_userdata('NmPlg');

        $this->session->set_flashdata('pesan', 'Berhasil Logout');

        redirect('Shopping/index');
        exit;
    }
}
