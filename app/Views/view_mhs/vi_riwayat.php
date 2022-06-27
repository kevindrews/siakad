<?= $this->extend('view_page/header');  ?>
<?= $this->section('isi'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Data Riwayat KRS Anda <?= session('userData.email') ?></h1>
                  <hr>

                    <!-- Content Row -->
                    <!-- Content Row -->
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($profile as $data): ?>
                                        <tr>
                                            <td><?= $data['kd_mk'] ?></td>
                                            <td><?= $data['mk_kuliah'] ?></td>
                                            
                                            <td><a href="<?= base_url('mhs/krs/hapus_mk/'.$data['id_krs']) ?>">Hapus</a></td>
                                        </tr>
                                         <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                </div>
                <!-- /.container-fluid -->

<?= $this->endSection(); ?>