<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Siswa</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="<?= BASEURL ?>/siswa/create" method="post">
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="number" class="form-control" id="nisn" name="nisn">
                </div>
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="number" class="form-control" id="nis" name="nis">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" class="form-control" id="telepon" name="telepon">
                </div>
                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select class="form-control" id="kelas_id" name="kelas_id">
                        <?php foreach ($data['kelas'] as $kelas) : ?>
                            <option value="<?= $kelas['id'] ?>"><?= $kelas['nama'] ?> <?= $kelas['kompetensi_keahlian'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pengguna_id">Pengguna</label>
                    <select class="form-control" id="pengguna_id" name="pengguna_id">
                        <?php foreach ($data['pengguna'] as $pengguna) : ?>
                            <option value="<?= $pengguna['id'] ?>"><?= $pengguna['username'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pembayaran_id">Pembayaran</label>
                    <select class="form-control" id="pembayaran_id" name="pembayaran_id">
                        <?php foreach ($data['pembayaran'] as $pembayaran) : ?>
                            <option value="<?= $pembayaran['id'] ?>"><?= $pembayaran['tahun_ajaran'] ?> || <?= $pembayaran['nominal'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->