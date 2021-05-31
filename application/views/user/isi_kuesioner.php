<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">Data Karyawan</h3>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>NIK</b> <a class="float-right">
                                        <input type="text" readonly class="form-control" id="nik" name="nik" value="<?= $karyawan['nik']; ?>">
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Nama</b> <a class="float-right">
                                        <input type="text" readonly class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $karyawan['nama']; ?>">
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Jabatan</b> <a class="float-right">
                                        <input type="text" readonly class="form-control" id="jabatan" name="jabatan" placeholder="Alias" value="<?= $karyawan['jabatan']; ?>">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.end col-md-3 -->

                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card">
                            <div class="card-header p-2">
                                <h3 class="profile-username text-left">Kuisioner</h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <!-- Post -->
                                <form action="<?= base_url('user/simpan_kuisioner') ?>" method="post" class="post">
                                    <input type="text" readonly class="form-control" id="nik" name="nikKaryawan" value="<?= $karyawan['nik']; ?>">
                                    <?php $i = 1;
                                    foreach ($kuisioner as $kuisioner) { ?>
                                        <input type="hidden" readonly class="form-control" id="kode_<?= $kuisioner['kode']; ?>" name="kode_<?= $kuisioner['kode']; ?>" value="<?= $kuisioner['kode']; ?>">
                                        <label for="kuisioner"><?= $i ?>. <?= $kuisioner['pertanyaan']; ?></label>
                                        <div class="position-relative form-group ml-2">
                                            <div class="form-group">
                                                <div class="icheck-primary d-inline col-md-3">
                                                    <input type="radio" id="radioPrimary1<?= $i ?>" name="jawab_<?= $kuisioner['kode'] ?>" value="5">
                                                    <label for="radioPrimary1<?= $i ?>">Sangat Baik
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline col-md-3">
                                                    <input type="radio" id="radioPrimary2<?= $i ?>" name="jawab_<?= $kuisioner['kode'] ?>" value="4">
                                                    <label for="radioPrimary2<?= $i ?>">Baik
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline col-md-3">
                                                    <input type="radio" id="radioPrimary3<?= $i ?>" name="jawab_<?= $kuisioner['kode'] ?>" value="3">
                                                    <label for="radioPrimary3<?= $i ?>"> Cukup Baik
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline col-md-3">
                                                    <input type="radio" id="radioPrimary4<?= $i ?>" name="jawab_<?= $kuisioner['kode'] ?>" value="2">
                                                    <label for="radioPrimary4<?= $i ?>">Tidak Baik
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline col-md-3">
                                                    <input type="radio" id="radioPrimary5<?= $i ?>" name="jawab_<?= $kuisioner['kode'] ?>" value="1">
                                                    <label for="radioPrimary5<?= $i ?>">Sangat Tidak Baik
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $i++;
                                    } ?>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md"><i class="far fa-address-card"></i>&nbsp; Simpan</button>
                                        <a href="<?= base_url('user/kuesioner'); ?>"><button type="button" class="btn btn-danger btn-md ml-4"><i class="fas fa-undo"></i>&nbsp; Batal</button></a>
                                    </div>
                                </form>
                                <!-- /.post -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.end col-md-9 -->
            </div>
    </section>
</div>