<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Form Tambah Kriteria</h3>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="" class="form-custom">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Karyawan</label>
                                    <input type="text" readonly class="form-control" id="nama" name="nama" value="<?= $karyawan->nama; ?>">
                                </div>
                                <?php foreach ($kriteria as $krt) : ?>
                                    <div class="form-group">
                                        <label><?= $krt->kode . ' - ' . $krt->nama ?></label>
                                        <input type="number" class="form-control" id="<?= $krt->kode ?>" name="nilai[]" placeholder="Nilai Kriteria <?= $krt->nama ?>" required <?= ($krt->kode == 'C2' ? 'disabled' : null) ?> value="<?= ($krt->kode == 'C2') ? $nilai_c2 : 0 ?>">
                                        <?php if ($krt->kode != 'C2') : ?>
                                            <input type="hidden" name="kd_kriteria[]" value="<?= $krt->kode ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-md"><i class="far fa-address-card"></i>&nbsp; Simpan</button>
                                    <a href="<?= base_url('keputusan'); ?>"><button type="button" class="btn btn-danger btn-md ml-4"><i class="fas fa-undo"></i>&nbsp; Batal</button></a>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>