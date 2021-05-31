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
                            <b>Data Altenatif</b>
                            <div class="card-tools">
                                <form class="form-inline" action="<?= base_url('admin/cari_karyawan'); ?>" method="POST">
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
                                        <th class="thead-custom" scope="col">Nik</th>
                                        <th class="thead-custom" scope="col">Nama</th>
                                        <th class="thead-custom" scope="col">Jabatan</th>
                                        <th class="thead-custom" scope="col">Status</th>
                                        <th class="thead-custom" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php if ($karyawan->num_rows() > 0) : ?>
                                        <?php foreach ($karyawan->result_array() as $kar) : ?>
                                            <tr>
                                                <td><?= $count++; ?></td>
                                                <td><?php echo $kar['nik'] ?></td>
                                                <td><?php echo $kar['nama'] ?></td>
                                                <td><?php echo $kar['jabatan'] ?></td>
                                                <td class="project-state">
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('admin/tambah_penilaian/' . $kar['nik']); ?>"><button type="button" class="btn btn-sm btn-success"><i class="fas fa-user-edit"></i>&nbsp; Nilai sekarang</button></a>
                                                </td>
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
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                        </div>
                    </div>
                    <!-- /.card -->


                    <div class="card">
                        <div class="card-header">
                            <b>Nilai Keputusan Awal</b>
                            <div class="card-tools">
                                <form class="form-inline" action="<?= base_url('admin/cari_karyawan'); ?>" method="POST">
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
                                        <th class="thead-custom" scope="col">Alternatif</th>
                                        <th class="thead-custom" scope="col">C01</th>
                                        <th class="thead-custom" scope="col">C02</th>
                                        <th class="thead-custom" scope="col">C03</th>
                                        <th class="thead-custom" scope="col">C04</th>
                                        <th class="thead-custom" scope="col">C05</th>
                                        <th class="thead-custom" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php if ($keputusan->num_rows() > 0) : ?>
                                        <?php foreach ($keputusan->result_array() as $kep) : ?>
                                            <tr>
                                                <td><?= $count++; ?></td>
                                                <td><?php echo $kep['kode'] ?></td>
                                                <td><?php echo $kep['nama'] ?></td>
                                                <td><?php echo $kep['c01'] ?></td>
                                                <td><?php echo $kep['c02'] ?></td>
                                                <td><?php echo $kep['c03'] ?></td>
                                                <td><?php echo $kep['c04'] ?></td>
                                                <td><?php echo $kep['c05'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/ubah_penilaian/' . $kep['kode']); ?>"><button type="button" class="btn btn-sm btn-info ml-2"><i class="fas fa-user-edit"></i>&nbsp; Ubah Penilaian</button></a>
                                                    <a href="<?= base_url('admin/hapus_penilaian/' . $kep['kode']); ?>"><button type="button" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Apakah data ini akan dihapus?');"><i class="far fa-trash-alt"></i>&nbsp; Hapus</button></a>
                                                </td>
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