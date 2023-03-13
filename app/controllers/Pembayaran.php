<?php
class Pembayaran extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['pembayaran'] = $this->model('Data')->getPembayaran();
        $this->view('dashboard/template/header');
        $this->view('pembayaran/index', $data);
        $this->view('dashboard/template/footer');
    }
    public function add()
    {
        $data['pembayaran'] = $this->model('Data')->getPembayaran();
        $this->view('dashboard/template/header');
        $this->view('pembayaran/add', $data);
        $this->view('dashboard/template/footer');
    }
    public function edit($id)
    {
        $data['pembayaran'] = $this->model('Data')->getPembayaranById($id);
        $this->view('dashboard/template/header');
        $this->view('pembayaran/edit', $data);
        $this->view('dashboard/template/footer');
    }
    public function create()
    {
        if ($this->model('Data')->addPembayaran()) {
            header('Location: ' . BASEURL . '/pembayaran');
        }
    }
    public function delete($id)
    {
        if ($this->model('Data')->deletePembayaran($id)) {
            header('Location: ' . BASEURL . '/pembayaran');
        }
    }
    public function update()
    {
        if ($this->model('Data')->editPembayaran()) {
            header('Location: ' . BASEURL . '/pembayaran');
        } else {
            echo "update gagal";
        }
    }
}
