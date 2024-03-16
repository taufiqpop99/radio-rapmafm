<?= $this->extend('user/templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- List Inventaris -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4 text-gray-800">Data Inventaris</h1>
            <?php if (in_groups(['Admin', 'MU', 'AOff'])) : ?>
                <a href="<?= base_url(); ?>control/inventaris/form" class="btn btn-primary">Add Inventaris</a>
                <br><br>
            <?php endif; ?>

            <!-- Search Bar -->
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="keyword" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Messages -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>

            <!-- Table -->
            <div class="row card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" class="cursor-active">No</th>
                                    <th scope="col" class="cursor-active">ID Barang</th>
                                    <th scope="col" class="cursor-active">Nama Barang</th>
                                    <th scope="col" class="cursor-active">Kode Ruangan</th>
                                    <th scope="col" class="cursor-active">Nomor</th>
                                    <th scope="col" class="cursor-active">Tahun</th>
                                    <th scope="col" class="cursor-active">Jumlah</th>
                                    <th scope="col" class="cursor-active">Kondisi</th>
                                    <?php if (in_groups(['Admin', 'MU', 'AOff'])) : ?>
                                        <th scope="col" class="cursor-stop">Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($inventaris as $index => $invent) : ?>
                                    <?php $data = json_decode($invent['value']) ?>
                                    <tr>
                                        <th scope="row"><?= $index + 1; ?></th>
                                        <td>INV/RAPMA/<?= $invent['kode']; ?>/<?= $data->nomor; ?>/<?= $invent['tahun']; ?></td>
                                        <td><?= $data->barang; ?></td>
                                        <td><?= $invent['kode']; ?></td>
                                        <td><?= $data->nomor; ?></td>
                                        <td>20<?= $invent['tahun']; ?></td>
                                        <td><?= $data->jumlah; ?></td>
                                        <td><?= $data->kondisi ?></td>
                                        <?php if (in_groups(['Admin', 'MU', 'AOff'])) : ?>
                                            <td>
                                                <a href="<?= base_url(); ?>control/inventaris/edit/<?= $invent['id']; ?>" class="btn btn-warning mb-1"><i class="fas fa-edit"></i></a>
                                                <form action="<?= base_url(); ?>control/inventaris/<?= $invent['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Apakah Anda Yakin ??');"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Pagers -->
                        <?= $pager->links('inventaris', 'data_pagination'); ?>
                    </div>
                </div>
            </div>
            <!-- End Table -->
        </div>
    </div>
</div>

<?= $this->endSection(); ?>