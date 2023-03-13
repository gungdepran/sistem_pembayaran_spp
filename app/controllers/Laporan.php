<?php
class Laporan extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['siswa'] = $this->model('Data')->getSiswa();
        $data['bulan'] = $this->model('Data')->getBulanAjaran();
        $pembayaran = [];
        foreach ($data['siswa'] as $siswa) {
            $pembayaran[$siswa['nama']] = [];
            $x = $this->model('Data')->getPembayaranBySiswaId($siswa['id']);
            foreach ($x as $y) {
                array_push($pembayaran[$siswa['nama']], $y['bulan_dibayar']);
            }
        }
        $data['pembayaran'] = $pembayaran;
        $this->view('dashboard/template/header');
        $this->view('laporan/index', $data);
        $this->view('dashboard/template/footer');
    }
}
