<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Kelas</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="<?= BASEURL ?>/kelas/update" method="post">
                <input type="text" class="d-none" name="id" value="<?= $data['kelas']['id'] ?>">

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas">
                        <option value="X" <?php if ($data['kelas']['nama'] == 'X') : ?> selected <?php endif ?>>X</option>
                        <option value="XI" <?php if ($data['kelas']['nama'] == 'XI') : ?> selected <?php endif ?>>XI</option>
                        <option value="XII" <?php if ($data['kelas']['nama'] == 'XII') : ?> selected <?php endif ?>>XII</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                    <input type="text" class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian" value="<?= $data['kelas']['kompetensi_keahlian'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->