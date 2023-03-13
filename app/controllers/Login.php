<?php
class Login extends Controller
{
    public function index()
    {
        $this->view('login/index');
        $_SESSION['status'] = '';
    }
    public function auth()
    {
        if ($data = $this->model('Data')->auth()) {
            /* buat session */
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];
            /* panggil controller dashboard */
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            $_SESSION['status'] = 'login_gagal';
            header('Location: ' . BASEURL . '/login');
        }
    }
}
