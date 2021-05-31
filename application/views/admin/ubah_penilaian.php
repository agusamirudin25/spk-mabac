<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Form Ubah Karyawan</h3>
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
                                    <input type="text" readonly class="form-control" id="kode" name="kode" value="<?= $keputusan['kode']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" readonly class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $keputusan['nama']; ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>C01</label>
                                    <input type="text" class="form-control" id="c01" name="c01" placeholder="C01" value="<?= $keputusan['c01']; ?>">
                                    <?= form_error('c01', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>C02</label>
                                    <input type="text" class="form-control" id="c02" name="c02" placeholder="C02" value="<?= $keputusan['c02']; ?>">
                                    <?= form_error('c01', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>C03</label>
                                    <input type="text" class="form-control" id="c03" name="c03" placeholder="C03" value="<?= $keputusan['c03']; ?>">
                                    <?= form_error('c01', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>C04</label>
                                    <input type="text" class="form-control" id="c04" name="c04" placeholder="C04" value="<?= $keputusan['c04']; ?>">
                                    <?= form_error('c01', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>C05</label>
                                    <input type="text" class="form-control" id="c05" name="c05" placeholder="C05" value="<?= $keputusan['c05']; ?>">
                                    <?= form_error('c01', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-md"><i class="far fa-address-card"></i>&nbsp; Simpan</button>
                                    <a href="<?= base_url('admin/keputusan'); ?>"><button type="button" class="btn btn-danger btn-md ml-4"><i class="fas fa-undo"></i>&nbsp; Batal</button></a>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>