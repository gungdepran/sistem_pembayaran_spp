<?php

class Data
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function auth()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "CALL select_pengguna('$username','$password')";
        $this->db->query($query);
        $data = $this->db->single();
        return $data;
    }
    public function getSiswa()
    {
        $query = "CALL select_siswa()";
        $this->db->query($query);
        return $data = $this->db->resultSet();
    }
    public function getSiswaById($id)
    {
        $query = "CALL select_siswa_by_id($id)";
        $this->db->query($query);
        return $data = $this->db->single();
    }
    public function getPetugas()
    {
        $query = "CALL select_petugas()";
        $this->db->query($query);
        return $data = $this->db->resultSet();
    }
    public function getKelas()
    {
        $query = "CALL select_kelas()";
        $this->db->query($query);
        return $data = $this->db->resultSet();
    }
    public function getKelasById($id)
    {
        $query = "CALL select_kelas_by_id($id)";
        $this->db->query($query);
        return $data = $this->db->single();
    }
    public function getPengguna()
    {
        $query = "CALL select_pengguna_all()";
        $this->db->query($query);
        return $data = $this->db->resultSet();
    }
    public function getPenggunaById($id)
    {
        $query = "CALL select_pengguna_by_id('$id')";
        $this->db->query($query);
        return $data = $this->db->single();
    }
    public function getPembayaran()
    {
        $query = "CALL select_pembayaran()";
        $this->db->query($query);
        return $data = $this->db->resultSet();
    }
    public function getPembayaranById($id)
    {
        $query = "CALL select_pembayaran_by_id('$id')";
        $this->db->query($query);
        return $data = $this->db->single();
    }
    public function getPembayaranBySiswaId($siswa_id)
    {
        $query = "CALL select_pembayaran_by_siswa_id('$siswa_id')";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getBulanAjaran()
    {
        $query = "CALL select_bulan_ajaran()";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getRiwayat()
    {
        $query = "CALL select_riwayat()";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getRiwayatBySiswaId()
    {
        $siswa_id = $_SESSION['id'];
        $query = "CALL select_riwayat_by_siswa_id('$siswa_id')";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function addSiswa()
    {
        $nisn = $_POST['nisn'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $kelas_id = $_POST['kelas_id'];
        $pengguna_id = $_POST['pengguna_id'];
        $pembayaran_id = $_POST['pembayaran_id'];
        $query = "INSERT INTO `siswa` VALUES ('','$nisn','$nis','$nama','$alamat','$telepon','$kelas_id','$pengguna_id','$pembayaran_id');";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function addPetugas()
    {
        $nama = $_POST['nama'];
        $pengguna_id = $_POST['pengguna_id'];
        $query = "CALL add_petugas('$nama','$pengguna_id')";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function addPengguna()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $query = "CALL add_pengguna('$username','$password', '$role')";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function addKelas()
    {
        $kelas = $_POST['kelas'];
        $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
        $query = "CALL add_kelas('$kelas','$kompetensi_keahlian')";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function addPembayaran()
    {
        $tahun_ajaran = $_POST['tahun_ajaran'];
        $nominal = $_POST['nominal'];
        $query = "CALL add_pembayaran('$tahun_ajaran','$nominal')";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function addTransaksi()
    {
        $tahun_dibayar = $_POST['tahun_dibayar'];
        $siswa_id = $_POST['siswa_id'];
        $petugas_id = $_POST['petugas_id'];
        $pembayaran_id = $_POST['pembayaran_id'];
        foreach ($_POST['bulan_bayar'] as $bulan_dibayar) {
            $query = "CALL add_transaksi('$tahun_dibayar','$bulan_dibayar','$siswa_id','$petugas_id','$pembayaran_id')";
            $this->db->query($query);
            $this->db->execute();
        }
        return $this->db->rowCount();
    }
    public function getPetugasById($id)
    {
        $query = "CALL select_petugas_by_id($id)";
        $this->db->query($query);
        return $data = $this->db->single();
    }
    public function editSiswa()
    {
        $id = $_POST['id'];
        $nisn = $_POST['nisn'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $kelas_id = $_POST['kelas_id'];
        $pengguna_id = $_POST['pengguna_id'];
        $pembayaran_id = $_POST['pembayaran_id'];
        $query = "UPDATE `siswa` SET `nisn`='$nisn',`nis`='$nis',`nama`='$nama',`alamat`='$alamat',`telepon`='$telepon',`kelas_id`='$kelas_id',`pengguna_id`='$pengguna_id',`pembayaran_id`='$pembayaran_id' WHERE id = '$id';";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function editPetugas()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $pengguna_id = $_POST['pengguna_id'];
        $query = "CALL edit_petugas('$nama','$pengguna_id','$id')";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function editPengguna()
    {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        $query = "CALL edit_pengguna('$username','$role','$id')";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function editKelas()
    {
        $id = $_POST['id'];
        $kelas = $_POST['kelas'];
        $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
        echo $query = "CALL edit_kelas('$kelas','$kompetensi_keahlian','$id')";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function editPembayaran()
    {
        $id = $_POST['id'];
        $tahun_ajaran = $_POST['tahun_ajaran'];
        $nominal = $_POST['nominal'];
        echo $query = "CALL edit_pembayaran('$tahun_ajaran','$nominal','$id')";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteSiswa($id)
    {
        $query = "DELETE FROM siswa WHERE id = '$id';";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deletePetugas($id)
    {
        $query = "DELETE FROM petugas WHERE id = '$id';";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deletePengguna($id)
    {
        $query = "CALL delete_pengguna('$id');";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteKelas($id)
    {
        $query = "CALL delete_kelas('$id');";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deletePembayaran($id)
    {
        $query = "CALL delete_pembayaran('$id');";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
