<?php

class Login extends Controller
{
    public function __construct()
    {
        if (isset($_SESSION['is_logged_in'])) {
            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'petugas') {
                redirect('/dashboard');
            } else {
                redirect('/home');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->view('/auth/login', $data);
    }

    public function loginProcess()
    {
        $dataUser = null;
        if (!$dataUser = $this->model('Siswa_model')->getSiswaByUsername($_POST['username'])) {
            if (!$dataUser = $this->model('Petugas_model')->getPetugasByUsername($_POST['username'])) {
                Flasher::setFlash('Username', 'tidak terdaftar', 'danger');
                redirect('/login');
                die;
            }
        }

        if (!password_verify($_POST['password'], $dataUser['password'])) {
            Flasher::setFlash('Password', 'tidak sesuai', 'danger');
            redirect('/login');
            die;
        }

        $_SESSION['username'] = $dataUser['username'];
        $_SESSION['id'] = $dataUser['id'];
        $_SESSION['is_logged_in'] = true;

        if ($dataUser['role'] == 'siswa') {
            $_SESSION['role'] = 'siswa';
            redirect('/home');
        } else {
            $_SESSION['role'] = $dataUser['role'];
            redirect('/dashboard');
        }
    }
}
