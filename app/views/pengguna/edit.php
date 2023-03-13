<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Pengguna</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="<?= BASEURL ?>/pengguna/update" method="post">
                <input type="text" class="form-control d-none" id="id" name="id" value="<?= $data['pengguna']['id'] ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $data['pengguna']['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Ketikkan Password Lama / Baru</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="admin" <?php if ($data['pengguna']['role'] == 'admin') {
                                                    echo " selected";
                                                } ?>>Admin</option>
                        <option value="petugas" <?php if ($data['pengguna']['role'] == 'petugas') {
                                                    echo " selected";
                                                } ?>>Petugas</option>
                        <option value="siswa" <?php if ($data['pengguna']['role'] == 'siswa') {
                                                    echo " selected";
                                                } ?>>Siswa</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->