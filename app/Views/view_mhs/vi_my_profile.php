<?= $this->extend('view_page/header');  ?>
<?= $this->section('isi'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Data Profile Anda <?= $profile['nama_mahasiswa'] ?></h1>
                  <hr>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Progress Small -->
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Profile Anda</h6>
                                </div>
                                <div class="card-body">

                                <p>>>> NIM Mahasiswa : <?= $profile['nim'] ?></p>

								 <p>>>> Nama Mahasiswa : <?= $profile['nama_mahasiswa'] ?></p>

								 <p>>>> Jenis Kelamin : <?= $profile['jenis_kelamin'] ?></p>

								 <p>>>> Angkatan : <?= $profile['angkatan'] ?></p>

								 <p>>>> Alamat Sekarang : <?= $profile['alamat'] ?></p>

								 <p>>>> Email : <?= $profile['email'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

<?= $this->endSection(); ?>