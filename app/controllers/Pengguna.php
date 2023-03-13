<?php
class Pengguna extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['pengguna'] = $this->model('Data')->getPengguna();
        $this->view('dashboard/template/header');
        $this->view('pengguna/index', $data);
        $this->view('dashboard/template/footer');
    }
    public function add()
    {
        $data['pengguna'] = $this->model('Data')->getPengguna();
        $this->view('dashboard/template/header');
        $this->view('pengguna/add', $data);
        $this->view('dashboard/template/footer');
    }
    public function edit($id)
    {
        $data['pengguna'] = $this->model('Data')->getPenggunaById($id);
        $this->view('dashboard/template/header');
        $this->view('pengguna/edit', $data);
        $this->view('dashboard/template/footer');
    }
    public function create()
    {
        if ($this->model('Data')->addPengguna()) {
            header('Location: ' . BASEURL . '/pengguna');
        }
    }
    public function delete($id)
    {
        if ($this->model('Data')->deletePengguna($id)) {
            header('Location: ' . BASEURL . '/pengguna');
        }
    }
    public function update()
    {

        if ($this->model('Data')->editPengguna()) {
            header('Location: ' . BASEURL . '/pengguna');
        } else {
            echo "update gagal";
        }
    }
}
