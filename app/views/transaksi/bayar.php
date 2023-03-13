<!-- Begin Page Content -->
<form action="<?= BASEURL ?>/transaksi/create" method="post">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
        <div class="row">
            <div class="col-sm-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <input type="text" class="d-none" name="tahun_dibayar" value="<?= $data['siswa']['tahun_ajaran'] ?>">
                        <input type="text" class="d-none" name="siswa_id" value="<?= $data['siswa']['id'] ?>">
                        <input type="text" class="d-none" name="petugas_id" value="<?= $_SESSION['id'] ?>">
                        <input type="text" class="d-none" name="pembayaran_id" value="<?= $data['siswa']['pembayaran_id_siswa'] ?>">
                        <input type="text" class="form-control d-none" id="id" name="id" value="<?= $data['siswa']['id'] ?>">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="number" class="form-control" id="nisn" name="nisn" value="<?= $data['siswa']['nisn'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="number" class="form-control" id="nis" name="nis" value="<?= $data['siswa']['nis'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['siswa']['nama'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select class="form-control" id="kelas_id" name="kelas_id" readonly>
                                <?php foreach ($data['kelas'] as $kelas) : ?>
                                    <option value="<?= $kelas['id'] ?>" <?php if ($kelas['id'] == $data['siswa']['kelas_id']) {
                                                                            echo " selected";
                                                                        } ?>><?= $kelas['nama'] ?> <?= $kelas['kompetensi_keahlian'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pembayaran_id">Pembayaran</label>
                            <select class="form-control" id="pembayaran_id" name="pembayaran_id" readonly>
                                <?php foreach ($data['pembayaran'] as $pembayaran) : ?>
                                    <option value="<?= $pembayaran['id'] ?>" <?php if ($pembayaran['id'] == $data['siswa']['pembayaran_id']) {
                                                                                    echo " selected";
                                                                                } ?>><?= $pembayaran['tahun_ajaran'] ?> || <?= $pembayaran['nominal'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Nominal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data['bulan_ajaran'] as $bulan) {

                                    ?>
                                        <tr>
                                            <td><?= $bulan['bulan']; ?></td>
                                            <td><?= $data['siswa']['nominal'] ?></td>
                                            <td>
                                                <?php
                                                if (in_array($bulan['bulan'], $data['bulan_terbayar'])) {
                                                ?>
                                                    <input type="checkbox" name="bulan_bayar[]" value="<?= $bulan['bulan']; ?>" checked disabled>
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="checkbox" name="bulan_bayar[]" value="<?= $bulan['bulan']; ?>">
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
</form>
</div>
<!-- /.container-fluid -->