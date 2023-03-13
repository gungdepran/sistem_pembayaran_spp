<?php
class Transaksi extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL . "/login");
            exit;
        }
        $data['siswa'] = $this->model('Data')->getSiswa();
        $this->view('dashboard/template/header');
        $this->view('transaksi/index', $data);
        $this->view('dashboard/template/footer');
    }
    public function bayar($id)
    {
        $data['kelas'] = $this->model('Data')->getKelas();
        $data['pengguna'] = $this->model('Data')->getPengguna();
        $data['pembayaran'] = $this->model('Data')->getPembayaran();
        $data['pembayaran_by_siswa_id'] = $this->model('Data')->getPembayaranBySiswaId($id);
        $bulan_terbayar = [];
        foreach ($data['pembayaran_by_siswa_id'] as $d) {
            array_push($bulan_terbayar, $d['bulan_dibayar']);
        }
        $data['bulan_terbayar'] = $bulan_terbayar;
        $data['bulan_ajaran'] = $this->model('Data')->getBulanAjaran();
        $data['siswa'] = $this->model('Data')->getSiswaById($id);
        $this->view('dashboard/template/header');
        $this->view('transaksi/bayar', $data);
        $this->view('dashboard/template/footer');
    }
    public function create()
    {
        if ($this->model('Data')->addTransaksi()) {
            header('Location: ' . BASEURL . '/transaksi');
        }
    }
}
