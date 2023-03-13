                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Siswa</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?php echo BASEURL ?>/siswa/add" type="button" class="btn btn-success">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Kelas</th>
                                            <th>Pengguna</th>
                                            <th>Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data['siswa'] as $siswa) {
                                        ?>
                                            <tr>
                                                <td><?php echo $siswa['nisn']; ?></td>
                                                <td><?php echo $siswa['nis']; ?></td>
                                                <td><?php echo $siswa['nama']; ?></td>
                                                <td><?php echo $siswa['alamat']; ?></td>
                                                <td><?php echo $siswa['telepon']; ?></td>
                                                <td><?php echo $siswa['nama_kelas']; ?> <?= $siswa['kompetensi_keahlian'] ?></td>
                                                <td><?php echo $siswa['username']; ?></td>
                                                <td><?php echo $siswa['nominal']; ?></td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="<?= BASEURL ?>/siswa/edit/<?= $siswa['id'] ?>" class="btn btn-warning">Edit</a>
                                                        <a href="<?= BASEURL ?>/siswa/delete/<?= $siswa['id'] ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-danger">Delete</a>
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