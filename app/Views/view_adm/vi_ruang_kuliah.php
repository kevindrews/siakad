<?= $this->extend('view_page/header_admin');  ?>
<?= $this->section('isi'); ?>
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Ruang Kuliah</h1>
                    <p class="mb-4">Admin dapat membuat mata kuliah prasyarat baru</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('adm/ruang_kuliah/add') ?>">Tambah Data Ruang Kuliah</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Ruangan</th>
                                            <th>Nama Ruangan</th>
                                            <th>Kapasitas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1 +(10 * ($current - 1)); ?>
                                        <?php foreach ($ruang as $data): ?>
                                        <tr>
                                            <td><?= $data['kd_ruang'] ?></td>
                                            <td><?= $data['nama_ruang'] ?></td>
                                            <td><?= $data['kapasitas'] ?></td>
                                            <td> <a href="<?= base_url('adm/ruang_kuliah/edit_ruang/'.$data['kd_ruang']) ?>">Edit</a>| <a href="<?= base_url('adm/ruang_kuliah/hapus_ruang/'.$data['kd_ruang']) ?>">Hapus</a></td>
                                        </tr>
                                         <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <?= $pager->links('prasyarat', 'main'); ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?= $this->endSection(); ?>