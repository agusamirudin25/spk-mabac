<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5">
                    <h3>Keputusan</h3>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <b>Nilai Keputusan Awal</b>
                            <div class="card-tools">
                                <form class="form-inline" action="<?= base_url('keputusan/cari_karyawan'); ?>" method="POST">
                                    <div class="input-group input-group-sm" style="width: 185px;">
                                        <input type="text" id="keyword" name="keyword" class="form-control float-right" placeholder="Cari Berdasarkan Alias">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="thead-blue">
                                    <tr class="tr-thead">
                                        <th class="thead-custom" scope="col">#</th>
                                        <th class="thead-custom" scope="col">Kode</th>
                                        <th class="thead-custom" scope="col">Alias</th>
                                        <th class="thead-custom" scope="col">C1</th>
                                        <th class="thead-custom" scope="col">C2</th>
                                        <th class="thead-custom" scope="col">C3</th>
                                        <th class="thead-custom" scope="col">C4</th>
                                        <th class="thead-custom" scope="col">C5</th>
                                        <th class="thead-custom" scope="col">Status</th>
                                        <th class="thead-custom" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php if (count($penilaian) > 0) : ?>
                                        <?php foreach ($penilaian as $kep) : ?>
                                            <tr>
                                                <td><?= $count++; ?></td>
                                                <td><?php echo $kep['kode'] ?></td>
                                                <td><?php echo $kep['alias'] ?></td>
                                                <td><?php echo $kep['C1'] ?></td>
                                                <td class="<?= ($kep['C2'] == 0) ? 'bg-danger' : null ?>"><?php echo $kep['C2'] ?></td>
                                                <td><?php echo $kep['C3'] ?></td>
                                                <td><?php echo $kep['C4'] ?></td>
                                                <td><?php echo $kep['C5'] ?></td>
                                                <td class="<?= ($kep['status'] == 1) ? 'bg-success' : 'bg-danger' ?>"><?php echo ($kep['status'] == 1) ? 'Sudah Lengkap' : 'Belum Lengkap' ?></td>
                                                <?php if ($kep['status'] == 1) : ?>
                                                    <td>
                                                        <a href="<?= base_url('keputusan/ubah_penilaian/' . $kep['kode']); ?>"><button type="button" class="btn btn-sm btn-success ml-2"><i class="fas fa-user-edit"></i>&nbsp; Ubah Penilaian</button></a>
                                                        <a href="<?= base_url('keputusan/hapus_penilaian/' . $kep['kode']); ?>"><button type="button" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Apakah data ini akan dihapus?');"><i class="far fa-trash-alt"></i>&nbsp; Hapus</button></a>
                                                    </td>
                                                <?php else : ?>
                                                    <td>
                                                        <a href="<?= base_url('keputusan/tambah_penilaian/' . $kep['kode']); ?>"><button type="button" class="btn btn-sm btn-info ml-2"><i class="fas fa-user-edit"></i>&nbsp; Tambah Penilaian</button></a>
                                                        <a href="<?= base_url('keputusan/hapus_penilaian/' . $kep['kode']); ?>"><button type="button" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Apakah data ini akan dihapus?');"><i class="far fa-trash-alt"></i>&nbsp; Hapus</button></a>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr class="tr-striped">
                                            <td class="border-custom" colspan="4">
                                                <center>
                                                    <i class="fas fa-exclamation-triangle" style="font-size: 30px; color:#fc5c65;"></i><br>
                                                    <h3 style="font-style: italic;">Data Tidak Ditemukan!</h3>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <a href="<?= base_url('keputusan/buat_keputusan') ?>" class="btn btn-info mt-4 float-right">
                                Buat Keputusan
                            </a>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>