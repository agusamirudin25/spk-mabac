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
                                    <label>NIK</label>
                                    <input type="text" readonly class="form-control" id="nik" name="nik" value="<?= $karyawan['nik']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $karyawan['nama']; ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Alias</label>
                                    <input type="text" class="form-control" id="alias" name="alias" placeholder="Alias" value="<?= $karyawan['alias']; ?>">
                                    <?= form_error('alias', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan</label>
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan" value="<?= $karyawan['pendidikan']; ?>">
                                    <?= form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="<?= $karyawan['jabatan']; ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?= $karyawan['tgl_masuk']; ?>">
                                    <?= form_error('tgl_masuk', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-md"><i class="far fa-address-card"></i>&nbsp; Simpan</button>
                                    <a href="<?= base_url('karyawan/karyawan'); ?>"><button type="button" class="btn btn-danger btn-md ml-4"><i class="fas fa-undo"></i>&nbsp; Batal</button></a>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>









<!-- Content Wrapper. Contains page content 
<div class="content-wrapper">
    <!-- Content Header (Page header) 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4>Ubah Data karyawan</h4>
                    <hr>

                    <?php foreach ($karyawan as $kar) : ?>
                        <form class="" action="<?= base_url('admin/ubah_aksi'); ?>" method="post">
                            <input type="hidden" name="nik" value="<?= $kar->nik; ?>">
                            <div class="form-group">
                                <label>Nik</label>
                                <input type="text" name="nik" value="<?php echo $kar->nik ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Nama Depan</label>
                                <input type="text" name="nm_depan" value="<?php echo $kar->nm_depan ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <input type="text" name="nm_belakang" value="<?php echo $kar->nm_belakang ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Alias</label>
                                <input type="text" name="alias" value="<?php echo $kar->alias ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pendidikan</label>
                                <input type="text" name="pendidikan" value="<?php echo $kar->pendidikan ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" value="<?php echo $kar->jabatan ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" name="tgl_masuk" value="<?php echo $kar->tgl_masuk ?>" class="form-control">
                            </div>

                            <button type="submit" name="button" class="btn btn-primary">Ubah</button>
                            <a href="<?= base_url('admin/karyawan'); ?>" class="btn btn-danger">Batal</a>
                        </form>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>