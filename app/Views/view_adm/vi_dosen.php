<?= $this->extend('view_page/header_admin');  ?>
<?= $this->section('isi'); ?>
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Dosen</h1>
                    <p class="mb-4">Admin dapat membuat Data Dosen Baru</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('adm/dosen/add') ?>">Tambah Data Dosen</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama Dosen</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1 +(10 * ($current - 1)); ?>
                                        <?php foreach ($dosen as $data): ?>
                                        <tr>
                                            <td><?= $data['nip'] ?></td>
                                            <td><?= $data['nama_dosen'] ?></td>
                                            <td><?= $data['jenis_kelamin'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td> <a href="<?= base_url('adm/dosen/edit_dosen/'.$data['nip']) ?>">Edit</a>| <a href="<?= base_url('adm/dosen/hapus_dosen/'.$data['nip']) ?>">Hapus</a></td>
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