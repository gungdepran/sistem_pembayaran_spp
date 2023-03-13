<?php
class Siswa extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['siswa'] = $this->model('Data')->getSiswa();
        $this->view('dashboard/template/header');
        $this->view('siswa/index', $data);
        $this->view('dashboard/template/footer');
    }
    public function add()
    {
        $data['siswa'] = $this->model('Data')->getSiswa();
        $data['kelas'] = $this->model('Data')->getKelas();
        $data['pengguna'] = $this->model('Data')->getPengguna();
        $data['pembayaran'] = $this->model('Data')->getPembayaran();
        $this->view('dashboard/template/header');
        $this->view('siswa/add', $data);
        $this->view('dashboard/template/footer');
    }
    public function edit($id)
    {
        $data['siswa'] = $this->model('Data')->getSiswaById($id);
        $data['kelas'] = $this->model('Data')->getKelas();
        $data['pengguna'] = $this->model('Data')->getPengguna();
        $data['pembayaran'] = $this->model('Data')->getPembayaran();
        $this->view('dashboard/template/header');
        $this->view('siswa/edit', $data);
        $this->view('dashboard/template/footer');
    }
    public function create()
    {
        if ($this->model('Data')->addSiswa()) {
            header('Location: ' . BASEURL . '/siswa');
        }
    }
    public function delete($id)
    {
        if ($this->model('Data')->deleteSiswa($id)) {
            header('Location: ' . BASEURL . '/siswa');
        }
    }
    public function update()
    {
        if ($this->model('Data')->editSiswa()) {
            header('Location: ' . BASEURL . '/siswa');
        } else {
            echo "update gagal";
        }
    }
}
