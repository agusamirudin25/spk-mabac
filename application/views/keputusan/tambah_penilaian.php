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
                                    <label>Kode</label>
                                    <input type="text" readonly class="form-control" id="kode" name="kode" value="<?= $kode; ?>">
                                    <?= form_error('c01', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Alternatif</label>
                                    <input type="text" readonly class="form-control" id="nama" name="nama" value="<?= $karyawan['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>C01</label>
                                    <input type="text" class="form-control" id="c01" name="c01" placeholder="Nilai kriteria absensi" value="<?= set_value('c01'); ?>">
                                    <?= form_error('c01', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>C02</label>
                                    <input type="text" class="form-control" id="c02" name="c02" placeholder="Nilai kriteria disiplin kerja" readonly value="<?= $nilaic02 ?>">
                                    <?= form_error('c02', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>C03</label>
                                    <input type="text" class="form-control" id="c03" name="c03" placeholder="Nilai kriteria lama bekerja" value="<?= set_value('c03'); ?>">
                                    <?= form_error('c03', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>C04</label>
                                    <input type="text" class="form-control" id="c04" name="c04" placeholder="Nilai kriteria pendidikan" value="<?= set_value('c04'); ?>">
                                    <?= form_error('c04', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>C05</label>
                                    <input type="text" class="form-control" id="c05" name="c05" placeholder="Nilai kriteria kreatifitas" value="<?= set_value('c05'); ?>">
                                    <?= form_error('c05', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-md"><i class="far fa-address-card"></i>&nbsp; Simpan</button>
                                    <a href="<?= base_url('keputusan/keputusan'); ?>"><button type="button" class="btn btn-danger btn-md ml-4"><i class="fas fa-undo"></i>&nbsp; Batal</button></a>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>