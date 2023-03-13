<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelas</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo BASEURL ?>/kelas/add" type="button" class="btn btn-success">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kompetensi Keahlian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['kelas'] as $kelas) {
                        ?>
                            <tr>
                                <td><?php echo $kelas['nama']; ?></td>
                                <td><?php echo $kelas['kompetensi_keahlian']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= BASEURL ?>/kelas/edit/<?= $kelas['id'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= BASEURL ?>/kelas/delete/<?= $kelas['id'] ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-danger">Delete</a>
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