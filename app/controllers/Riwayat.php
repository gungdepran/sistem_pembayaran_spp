<?php
class Riwayat extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        if ($_SESSION['role'] != 'siswa') {
            $data['riwayat'] = $this->model('Data')->getRiwayat();
        } else {
            $data['riwayat'] = $this->model('Data')->getRiwayatBySiswaId();
        }
        $this->view('dashboard/template/header');
        $this->view('riwayat/index', $data);
        $this->view('dashboard/template/footer');
    }
}
