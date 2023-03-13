<?php
class Dashboard extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }

        $this->view('dashboard/template/header');
        $this->view('dashboard/index');
        $this->view('dashboard/template/footer');
    }
}
