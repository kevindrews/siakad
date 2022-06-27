<?= $this->extend('view_page/header_admin');  ?>
<?= $this->section('isi'); ?>
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Mata Kuliah Prasyarat</h1>
                    <p class="mb-4">Admin dapat membuat mata kuliah prasyarat baru</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('adm/prasyarat/add') ?>">Tambah Data Prasyarat Mata Kuliah</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Prasyarat</th>
                                            <th>Mata Kuliah Prasyarat</th>
                                            <th>Semester</th>
                                            <th>Jumlah SKS</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1 +(10 * ($current - 1)); ?>
                                        <?php foreach ($syarat as $data): ?>
                                        <tr>
                                            <td><?= $data['id_prasyarat'] ?></td>
                                            <td><?= $data['mk_prasyarat'] ?></td>
                                            <td><?= $data['semester'] ?></td>
                                            <td><?= $data['jumlah_sks'] ?></td>
                                            <td> <a href="<?= base_url('adm/prasyarat/edit_prasyarat/'.$data['id_prasyarat']) ?>">Edit</a>| <a href="<?= base_url('adm/prasyarat/hapus_prasyarat/'.$data['id_prasyarat']) ?>">Hapus</a></td>
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