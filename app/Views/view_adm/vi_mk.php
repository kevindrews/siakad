<?= $this->extend('view_page/header_admin');  ?>
<?= $this->section('isi'); ?>
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Mata Kuliah</h1>
                    <p class="mb-4">Admin dapat membuat mata kuliah baru, mengedit detail mata kuliah maupun menghapus mata kuliah</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('adm/mata_kuliah/add') ?>">Tambah Data Mata Kuliah</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Kode Ruangan</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Semester</th>
                                            <th>Jumlah SKS</th>
                                            <th>Prasyarat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1 +(10 * ($current - 1)); ?>
                                        <?php foreach ($mk as $data): ?>
                                        <tr>
                                            <td><?= $data['kd_mk'] ?></td>
                                            <td><?= $data['kd_ruang'] ?></td>
                                            <td><?= $data['nama_mk'] ?></td>
                                            <td><?= $data['semester'] ?></td>
                                            <td><?= $data['jumlah_sks'] ?></td>
                                            <td><?= $data['prasyarat'] ?></td>
                                            <td> <a href="<?= base_url('adm/mata_kuliah/edit_mata_kuliah/'.$data['kd_mk']) ?>">Edit</a>| <a href="<?= base_url('adm/mata_kuliah/hapus_mata_kuliah/'.$data['kd_mk']) ?>">Hapus</a></td>
                                        </tr>
                                         <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <?= $pager->links('mata_kuliah', 'main'); ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?= $this->endSection(); ?>