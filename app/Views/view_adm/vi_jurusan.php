<?= $this->extend('view_page/header_admin');  ?>
<?= $this->section('isi'); ?>
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Jurusan Kuliah</h1>
                    <p class="mb-4">Admin dapat membuat Jurusan Baru</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('adm/jurusan/add') ?>">Tambah Data Jurusan</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Jurusan</th>
                                            <th>Nama Jurusan</th>
                                            <th>Jenjang Pendidikan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1 +(10 * ($current - 1)); ?>
                                        <?php foreach ($jurusan as $data): ?>
                                        <tr>
                                            <td><?= $data['kd_jurusan'] ?></td>
                                            <td><?= $data['nama_jurusan'] ?></td>
                                            <td><?= $data['jenjang_pendidikan'] ?></td>
                                            <td> <a href="<?= base_url('adm/jurusan/edit_jurusan/'.$data['kd_jurusan']) ?>">Edit</a>| <a href="<?= base_url('adm/jurusan/hapus_jurusan/'.$data['kd_jurusan']) ?>">Hapus</a></td>
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