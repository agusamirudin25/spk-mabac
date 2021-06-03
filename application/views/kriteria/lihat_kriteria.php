<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5">
                    <h3>Data Kriteria</h3>
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
                            <a href="<?= base_url('kriteria/tambah_kriteria'); ?>"><button type="button" class="btn btn-sm btn-info"><i class="fas fa-user-plus"></i>&nbsp; Tambah Kriteria</button></a>
                            <div class="card-tools">
                                <form class="form-inline" action="<?= base_url('kriteria/cari_kriteria'); ?>" method="POST">
                                    <div class="input-group input-group-sm" style="width: 185px;">
                                        <input type="text" id="keyword" name="keyword" class="form-control float-right" placeholder="Cari Berdsarkan Nama">

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
                                        <th class="thead-custom" scope="col">Kode Kriteria</th>
                                        <th class="thead-custom" scope="col">Nama Kriteria</th>
                                        <th class="thead-custom" scope="col">Tipe</th>
                                        <th class="thead-custom" scope="col">Bobot</th>
                                        <th class="thead-custom" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php if ($criteria->num_rows() > 0) : ?>
                                        <?php foreach ($criteria->result_array() as $criteria) : ?>
                                            <tr>
                                                <td><?= $count++; ?></td>
                                                <td><?php echo $criteria['kode'] ?></td>
                                                <td><?php echo $criteria['nama'] ?></td>
                                                <td><?php echo $criteria['tipe'] ?></td>
                                                <td><?php echo $criteria['bobot'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('kriteria/detail_kriteria/' . $criteria['kode']); ?>"><button type="button" class="btn btn-sm btn-info"><i class="far fa-eye"></i></i>&nbsp; Detail</button></a>
                                                    <a href="<?= base_url('kriteria/ubah_kriteria/' . $criteria['kode']); ?>"><button type="button" class="btn btn-sm btn-success ml-2"><i class="fas fa-user-edit"></i>&nbsp; Ubah</button></a>
                                                    <a href="<?= base_url('kriteria/hapus_kriteria/' . $criteria['kode']); ?>"><button type="button" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Apakah data ini akan dihapus?');"><i class="far fa-trash-alt"></i>&nbsp; Hapus</button></a>
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