<?= $this->extend('user/templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- Edit Newsflash -->
<?php foreach ($newsflash as $berita) : ?>
    <?php $data = json_decode($berita['value']) ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <h1 class="h3 mb-4 text-gray-800">Form Edit Data Newsflash</h1>

                <!-- Forms -->
                <form action="<?= base_url(); ?>newsflash/update/<?= $berita['id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <!-- Judul Berita -->
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="judul" value="<?= $data->judul; ?>" required autofocus>
                        </div>
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group row">
                        <label for="hari" class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-1">
                            <select name="hari" required>
                                <option value="<?= $data->hari; ?>"><?= $data->hari; ?></option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum'at">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="tanggal" value="<?= $data->tanggal; ?>" required>
                        </div>
                    </div>

                    <!-- Link -->
                    <div class="form-group row">
                        <label for="link" class="col-sm-2 col-form-label">Link</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="link" value="<?= $data->link; ?>" required>
                        </div>
                    </div>

                    <!-- Penulis -->
                    <div class="form-group row">
                        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="penulis" value="<?= $data->penulis; ?>" required>
                        </div>
                    </div>

                    <!-- Kendala -->
                    <div class="form-group row">
                        <label for="kendala" class="col-sm-2 col-form-label">Kendala</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="kendala" value="<?= $data->kendala; ?>" required>
                        </div>
                    </div>

                    <!-- Keterangan -->
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="keterangan" value="<?= $data->keterangan; ?>" required>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a href="<?= base_url(); ?>control/newsflash" class="btn btn-dark mb-1">Back</a>
                            <button type="submit" class="btn btn-primary mb-1">Confirm Changes</button>
                        </div>
                    </div>
                </form>
                <!-- End Forms -->
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>