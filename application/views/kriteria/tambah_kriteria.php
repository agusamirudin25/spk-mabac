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
                                </div>
                                <div class="form-group">
                                    <label>Nama Kriteria</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Kriteria</label>
                                    <select class="form-control select2" style="width: 100%;" name="tipe">
                                        <option disabled selected>Pilih Tipe Kriteria ..</option>
                                        <option class="option-custom" value="benefit">Benefit</option>
                                        <option class="option-custom" value="cost">Cost</option>
                                    </select>
                                    <?= form_error('tipe', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Bobot</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select select-custom dropdown-success" name="bobot">
                                            <option disabled selected>Pilih skala penilain..</option>
                                            <option class="option-custom" value="1">Sangat tidak bagus</option>
                                            <option class="option-custom" value="2">Tidak bagus</option>
                                            <option class="option-custom" value="3">Cukup bagus</option>
                                            <option class="option-custom" value="4">Bagus</option>
                                            <option class="option-custom" value="5">Sangat bagus</option>
                                        </select>
                                        <?= form_error('bobot', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-md"><i class="far fa-address-card"></i>&nbsp; Simpan</button>
                                    <a href="<?= base_url('kriteria/kriteria'); ?>"><button type="button" class="btn btn-danger btn-md ml-4"><i class="fas fa-undo"></i>&nbsp; Batal</button></a>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>