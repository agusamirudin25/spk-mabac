<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Data Pengguna</h2>
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
                            <a href="<?= base_url('pengguna/tambah_user'); ?>"><button type="button" class="btn btn-sm btn-info"><i class="fas fa-user-plus"></i>&nbsp; Tambah Pengguna</button></a>
                            <div class="card-tools">
                                <form class="form-inline" action="<?= base_url('pengguna/cari_user') ?>" method="POST">
                                    <div class="input-group input-group-sm" style="width: 185px;">
                                        <input type="text" id="keyword" name="keyword" class="form-control float-right" autocomplete="off" placeholder="Cari berdasarkan nama..">

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
                                        <th class="thead-custom" scope="col">Username</th>
                                        <th class="thead-custom" scope="col">Nama</th>
                                        <th class="thead-custom" scope="col">Deskripsi</th>
                                        <th class="thead-custom" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php if ($users->num_rows() > 0) { ?>
                                        <?php foreach ($users->result_array() as $user) : ?>
                                            <tr>
                                                <td><?= $count++; ?></td>
                                                <td><?php echo $user['nik'] ?></td>
                                                <td><?php echo $user['username'] ?></td>
                                                <td><?php echo $user['nama'] ?></td>
                                                <td><?php echo $user['deskripsi'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('pengguna/ubah_user/' . $user['nik']); ?>"><button type="button" class="btn btn-sm btn-success"><i class="fas fa-user-edit"></i>&nbsp; Ubah</button></a>
                                                    <a href="<?= base_url('pengguna/hapus_user/' . $user['username']); ?>"><button type="button" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Apakah data ini akan dihapus?');"><i class="far fa-trash-alt"></i>&nbsp; Hapus</button></a>
                                                </td>
                                            </tr>
                                        <?php endforeach;
                                    } else { ?>
                                        <tr class="tr-striped">
                                            <td colspan="5" class="border-custom">
                                                <center>
                                                    <i class="fas fa-exclamation-triangle" style="font-size: 30px; color:#fc5c65;"></i><br>
                                                    <h3 style="font-style: italic;">Data Tidak Ditemukan!</h3>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php    } ?>
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