<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5">
                    <h3>Data Kuesioner</h3>
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
                            <a href="<?= base_url('admin/tambah_pertanyaan'); ?>"><button type="button" class="btn btn-sm btn-info"><i class="fas fa-user-plus"></i>&nbsp; Tambah Pertanyaan</button></a>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 180px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="thead-blue">
                                    <tr class="tr-thead">
                                        <th class="thead-custom" scope="col">#</th>
                                        <th class="thead-custom" scope="col">Kode</th>
                                        <th class="thead-custom" scope="col">Pertanyaan</th>
                                        <th class="thead-custom" scope="col">Nilai1</th>
                                        <th class="thead-custom" scope="col">Nilai2</th>
                                        <th class="thead-custom" scope="col">Nilai3</th>
                                        <th class="thead-custom" scope="col">Nilai4</th>
                                        <th class="thead-custom" scope="col">Nilai5</th>
                                        <th class="thead-custom" scope="col">Aksi</th>
                                    </tr>


                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kuisioner->result_array() as $kuisioner) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $kuisioner['kode'] ?></td>
                                            <td><?php echo $kuisioner['pertanyaan'] ?></td>
                                            <td><?php echo $kuisioner['nilai1'] ?></td>
                                            <td><?php echo $kuisioner['nilai2'] ?></td>
                                            <td><?php echo $kuisioner['nilai3'] ?></td>
                                            <td><?php echo $kuisioner['nilai4'] ?></td>
                                            <td><?php echo $kuisioner['nilai5'] ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/ubah_pertanyaan/' . $kuisioner['kode']); ?>"><button type="button" class="btn btn-sm btn-success ml-2"><i class="fas fa-user-edit"></i>&nbsp; Ubah</button></a>
                                                <a href="<?= base_url('admin/hapus_pertanyaan/' . $kuisioner['kode']); ?>"><button type="button" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Apakah data ini akan dihapus?');"><i class="far fa-trash-alt"></i>&nbsp; Hapus</button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix"></div>
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