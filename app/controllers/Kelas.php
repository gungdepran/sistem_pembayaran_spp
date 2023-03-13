<?php
class Kelas extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['kelas'] = $this->model('Data')->getKelas();
        $this->view('dashboard/template/header');
        $this->view('kelas/index', $data);
        $this->view('dashboard/template/footer');
    }
    public function add()
    {
        $data['kelas'] = $this->model('Data')->getKelas();
        $this->view('dashboard/template/header');
        $this->view('kelas/add', $data);
        $this->view('dashboard/template/footer');
    }
    public function edit($id)
    {
        $data['kelas'] = $this->model('Data')->getKelasById($id);
        $this->view('dashboard/template/header');
        $this->view('kelas/edit', $data);
        $this->view('dashboard/template/footer');
    }
    public function create()
    {
        if ($this->model('Data')->addKelas()) {
            header('Location: ' . BASEURL . '/kelas');
        }
    }
    public function delete($id)
    {
        if ($this->model('Data')->deleteKelas($id)) {
            header('Location: ' . BASEURL . '/kelas');
        }
    }
    public function update()
    {
        //echo $this->model('Data')->editKelas();
        if ($this->model('Data')->editKelas()) {
            header('Location: ' . BASEURL . '/kelas');
        } else {
            echo "update gagal";
        }
    }
}
