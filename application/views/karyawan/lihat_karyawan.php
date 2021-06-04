<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5">
                    <h3>Data Karyawan</h3>
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
                            <a href="<?= base_url('karyawan/tambah_karyawan'); ?>"><button type="button" class="btn btn-sm btn-info"><i class="fas fa-user-plus"></i>&nbsp; Tambah Karyawan</button></a>
                            <div class="card-tools">
                                <form class="form-inline" action="<?= base_url('karyawan/cari_karyawan'); ?>" method="POST">
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
                                        <th class="thead-custom" scope="col">NIK</th>
                                        <th class="thead-custom" scope="col">Nama</th>
                                        <th class="thead-custom" scope="col">Alias</th>
                                        <th class="thead-custom" scope="col">Pendidikan</th>
                                        <th class="thead-custom" scope="col">Jabatan</th>
                                        <th class="thead-custom" scope="col">Tanggal Masuk</th>
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
                                                <td><?php echo $kar['alias'] ?></td>
                                                <td><?php echo $kar['pendidikan'] ?></td>
                                                <td><?php echo $kar['jabatan'] ?></td>
                                                <td><?php echo $kar['tgl_masuk'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('karyawan/ubah_karyawan/' . $kar['kode']); ?>"><button type="button" class="btn btn-sm btn-success"><i class="fas fa-user-edit"></i>&nbsp; Ubah</button></a>
                                                    <a href="<?= base_url('karyawan/hapus_karyawan/' . $kar['kode']); ?>"><button type="button" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Apakah data ini akan dihapus?');"><i class="far fa-trash-alt"></i>&nbsp; Hapus</button></a>
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
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
</div>