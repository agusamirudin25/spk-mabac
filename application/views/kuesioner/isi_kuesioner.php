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
                        <div class="card-header p-2">
                            <h3 class="profile-username text-left">Kuesioner</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <!-- Post -->
                            <form action="<?= base_url('kuesioner/simpan_kuesioner') ?>" method="post" class="post">
                                <input type="hidden" readonly class="form-control" id="kode_alternatif" name="kode_alternatif" value="<?= $karyawan['kode']; ?>">
                                <?php $i = 1;
                                foreach ($kuesioner as $kuisioner) { ?>
                                    <input type="hidden" readonly class="form-control" id="kode_<?= $kuisioner['kode']; ?>" name="kode_pertanyaan[]" value="<?= $kuisioner['kode']; ?>">
                                    <label for="kuisioner"><?= $i ?>. <?= $kuisioner['pertanyaan']; ?></label>
                                    <div class="position-relative form-group ml-2">
                                        <div class="form-group">
                                            <?php foreach ($opsi as $br) : ?>
                                                <div class="icheck-primary d-inline col-md-3">
                                                    <input type="radio" required id="radioPrimary<?= $i . $br->id ?>" name="jawaban_<?= $i ?>" value="<?= $br->nilai ?>">
                                                    <label for="radioPrimary<?= $i . $br->id ?>"><?= $br->opsi ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php $i++;
                                } ?>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-md"><i class="far fa-address-card"></i>&nbsp; Simpan</button>
                                    <a href="<?= base_url('kuesioner'); ?>"><button type="button" class="btn btn-danger btn-md ml-4"><i class="fas fa-undo"></i>&nbsp; Batal</button></a>
                                </div>
                            </form>
                            <!-- /.post -->
                        </div><!-- /.card-body -->
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.end col-md-9 -->
            </div>
    </section>
</div>