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
                            <a href="<?= base_url('pertanyaan/tambah_pertanyaan'); ?>"><button type="button" class="btn btn-sm btn-info"><i class="fas fa-user-plus"></i>&nbsp; Tambah Pertanyaan</button></a>
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
                                        <th class="thead-custom" scope="col">Kode Pertanyaan</th>
                                        <th class="thead-custom" scope="col">Pertanyaan</th>
                                        <th class="thead-custom" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pertanyaan->result_array() as $pertanyaan) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $pertanyaan['kode'] ?></td>
                                            <td><?php echo $pertanyaan['pertanyaan'] ?></td>
                                            <td>
                                                <a href="<?= base_url('pertanyaan/ubah_pertanyaan/' . $pertanyaan['kode']); ?>"><button type="button" class="btn btn-sm btn-success ml-2"><i class="fas fa-user-edit"></i>&nbsp; Ubah</button></a>
                                                <a href="<?= base_url('pertanyaan/hapus_pertanyaan/' . $pertanyaan['kode']); ?>"><button type="button" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Apakah data ini akan dihapus?');"><i class="far fa-trash-alt"></i>&nbsp; Hapus</button></a>
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
                    <!-- /.end tabel kuesioner -->

                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('pertanyaan/tambah_pertanyaan'); ?>"><button type="button" class="btn btn-sm btn-info"><i class="fas fa-user-plus"></i>&nbsp; Tambah Pertanyaan</button></a>
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
                                        <th class="thead-custom" scope="col">Kode Pertanyaan</th>
                                        <th class="thead-custom" scope="col">nilai</th>
                                        <th class="thead-custom" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($isi_kuisioner->result_array() as $isi) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $isi['kode_pertanyaan'] ?></td>
                                            <td><?php echo $isi['nilai'] ?></td>
                                            <td>
                                                <a href="<?= base_url('pertanyaan/ubah_pertanyaan/' . $isi['kode_pertanyaan']); ?>"><button type="button" class="btn btn-sm btn-success ml-2"><i class="fas fa-user-edit"></i>&nbsp; Ubah</button></a>
                                                <a href="<?= base_url('pertanyaan/hapus_pertanyaan/' . $isi['kode_pertanyaan']); ?>"><button type="button" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Apakah data ini akan dihapus?');"><i class="far fa-trash-alt"></i>&nbsp; Hapus</button></a>
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