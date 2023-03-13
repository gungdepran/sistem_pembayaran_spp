<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <?php foreach ($data['bulan'] as $bulan) : ?>
                                <th><?= $bulan['bulan'] ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['pembayaran'] as $nama => $pembayaran) : ?>
                            <tr>
                                <td><?= $nama ?></td>
                                <?php foreach ($data['bulan'] as $bulan) : ?>
                                    <?php if (in_array($bulan['bulan'], $pembayaran)) : ?>
                                        <td>
                                            <p class="font-weight-bold text-success">v</p>
                                        </td>
                                    <?php else : ?>
                                        <td>
                                            <p class="font-weight-bold text-danger">x</p>
                                        </td>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->