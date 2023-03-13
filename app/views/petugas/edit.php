<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Petugas</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="<?= BASEURL ?>/petugas/update" method="post">
                <input type="text" class="form-control d-none" id="id" name="id" value="<?= $data['petugas']['id'] ?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['petugas']['nama'] ?>">
                </div>
                <div class="form-group">
                    <label for="pengguna_id">Pengguna</label>
                    <select class="form-control" id="pengguna_id" name="pengguna_id">
                        <?php foreach ($data['pengguna'] as $pengguna) : ?>
                            <option value="<?= $pengguna['id'] ?>" <?php if ($pengguna['id'] == $data['petugas']['pengguna_id']) {
                                                                        echo " selected";
                                                                    } ?>><?= $pengguna['username'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->