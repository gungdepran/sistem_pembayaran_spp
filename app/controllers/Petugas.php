<?php
class Petugas extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['petugas'] = $this->model('Data')->getPetugas();
        $this->view('dashboard/template/header');
        $this->view('dashboard/petugas', $data);
        $this->view('dashboard/template/footer');
    }
    public function add()
    {
        $data['pengguna'] = $this->model('Data')->getPengguna();
        $this->view('dashboard/template/header');
        $this->view('petugas/add', $data);
        $this->view('dashboard/template/footer');
    }
    public function edit($id)
    {
        $data['petugas'] = $this->model('Data')->getPetugasById($id);
        $data['pengguna'] = $this->model('Data')->getPengguna();
        $this->view('dashboard/template/header');
        $this->view('petugas/edit', $data);
        $this->view('dashboard/template/footer');
    }
    public function create()
    {
        if ($this->model('Data')->addPetugas()) {
            header('Location: ' . BASEURL . '/petugas');
        }
    }
    public function delete($id)
    {
        if ($this->model('Data')->deletePetugas($id)) {
            header('Location: ' . BASEURL . '/petugas');
        }
    }
    public function update()
    {

        if ($this->model('Data')->editPetugas()) {
            header('Location: ' . BASEURL . '/petugas');
        } else {
            echo "update gagal";
        }
    }
}
