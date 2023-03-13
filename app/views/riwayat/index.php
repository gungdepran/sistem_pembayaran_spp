<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Riwayat</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Tahun Ajaran</th>
                            <th>Bulan</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['riwayat'] as $riwayat) : ?>
                            <tr>
                                <td><?= $riwayat['tanggal_bayar'] ?></td>
                                <td><?= $riwayat['nisn'] ?></td>
                                <td><?= $riwayat['nis'] ?></td>
                                <td><?= $riwayat['nama'] ?></td>
                                <td><?= $riwayat['nama_kelas'] ?> <?= $riwayat['kompetensi_keahlian'] ?></td>
                                <td><?= $riwayat['tahun_ajaran'] ?></td>
                                <td><?= $riwayat['bulan_dibayar'] ?></td>
                                <td><?= $riwayat['nominal'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->