<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Form Tambah Kuesoner</h3>
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
                                    <label>Kode Pertanyaan</label>
                                    <input type="text" readonly class="form-control" id="kode" name="kode" value="<?= $kode; ?>">
                                    <?= form_error('kode', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Pertayaan</label>
                                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Tambah Pertanyaan" value="<?= set_value('pertanyaan'); ?>">
                                    <?= form_error('pertanyaan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nilai 1</label>
                                    <input type="text" class="form-control" id="nilai1" name="nilai1" placeholder="Sangat Bagus" value="<?= set_value('nilai1'); ?>">
                                    <?= form_error('pertanyaan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nilai 2</label>
                                    <input type="text" class="form-control" id="nilai2" name="nilai2" placeholder="Bagus" value="<?= set_value('nilai2'); ?>">
                                    <?= form_error('pertanyaan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nilai 3</label>
                                    <input type="text" class="form-control" id="nilai3" name="nilai3" placeholder="Cukup Bagus" value="<?= set_value('nilai3'); ?>">
                                    <?= form_error('pertanyaan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nilai 4</label>
                                    <input type="text" class="form-control" id="nilai4" name="nilai4" placeholder="Tidak Bagus" value="<?= set_value('nilai4'); ?>">
                                    <?= form_error('pertanyaan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nilai 5</label>
                                    <input type="text" class="form-control" id="nilai5" name="nilai5" placeholder="Sangat Tidak Bagus" value="<?= set_value('nilai5'); ?>">
                                    <?= form_error('pertanyaan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-md"><i class="far fa-address-card"></i>&nbsp; Simpan</button>
                                    <a href="<?= base_url('admin/kuesioner'); ?>"><button type="button" class="btn btn-danger btn-md ml-4"><i class="fas fa-undo"></i>&nbsp; Batal</button></a>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>