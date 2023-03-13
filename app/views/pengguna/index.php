<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo BASEURL ?>/pengguna/add" type="button" class="btn btn-success">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['pengguna'] as $pengguna) {
                        ?>
                            <tr>
                                <td><?php echo $pengguna['username']; ?></td>
                                <td><?php echo $pengguna['role']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= BASEURL ?>/pengguna/edit/<?= $pengguna['id'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= BASEURL ?>/pengguna/delete/<?= $pengguna['id'] ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-danger">Delete</a>
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