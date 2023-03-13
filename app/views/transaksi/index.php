<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['siswa'] as $siswa) {
                        ?>
                            <tr>
                                <td><?= $siswa['nisn']; ?></td>
                                <td><?= $siswa['nis']; ?></td>
                                <td><?= $siswa['nama']; ?></td>
                                <td><?= $siswa['nama_kelas']; ?> <?= $siswa['kompetensi_keahlian']; ?></td>
                                <td><?= $siswa['tahun_ajaran']; ?> <br>Rp.<?= $siswa['nominal']; ?> </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= BASEURL ?>/transaksi/bayar/<?= $siswa['id'] ?>" class="btn btn-success">Bayar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->