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
                            <b>Nilai Keputusan Akhir</b>
                            <div class="card-tools">
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
                                        <th class="thead-custom" scope="col">Nilai Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php if ($penilaian->num_rows() > 0) : ?>
                                        <?php foreach ($mabac as $kep) : ?>
                                            <tr>
                                                <td><?= $count++; ?></td>
                                                <td><?php echo $kep['kode'] ?></td>
                                                <td><?php echo $kep['alias'] ?></td>
                                                <td><?php echo $kep['nilai'] ?></td>
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
                            <span class="btn btn-info mt-4 float-right">
                                Waktu Proses MABAC = <?= round($waktu, 2, PHP_ROUND_HALF_UP); ?> detik
                            </span>
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