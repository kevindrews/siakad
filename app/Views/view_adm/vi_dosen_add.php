<?= $this->extend('view_page/header_admin');  ?>
<?= $this->section('isi'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Tambah Data Dosen</h1>
                    <p class="mb-4">Tambah Data Dosen</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Progress Small -->
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
                                </div>
                                <div class="card-body">
								  <?= form_open('adm/dosen/save_dosen'); ?>
                                  <?= csrf_field();  ?>

                                   <div class="form-group">
								    <label for="exampleInputPassword1">NIP</label>
								   <input type="text" name="nip" class="form-control <?= ($validation->hasError('nip')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="NIP">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('nip'); ?>
			                        </div>
								  </div>
									
								  <div class="form-group">
								    <label for="exampleInputPassword1">Nama Dosen</label>
								   <input type="text" name="nama_dosen" class="form-control <?= ($validation->hasError('nama_dosen')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Nama Dosen">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('nama_dosen'); ?>
			                        </div>
								  </div>

								  <div class="form-group">
								    <label for="exampleInputPassword1">Jenis Kelamin</label>
								    <input type="text" name="jenis_kelamin" class="form-control <?= ($validation->hasError('jenis_kelamin')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Jenis Kelamin">
								    <div class="invalid-feedback">
			                            <?= $validation->getError('jenis_kelamin'); ?>
			                        </div>
								  </div>

								  <div class="form-group">
								    <label for="exampleInputPassword1">Alamat</label>
								    <input type="text" name="alamat" class="form-control <?= ($validation->hasError('alamat')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Alamat">
								    <div class="invalid-feedback">
			                            <?= $validation->getError('alamat'); ?>
			                        </div>
								  </div>

								   <div class="form-group">
								    <label for="exampleInputPassword1">Email</label>
								    <input type="text" name="email" class="form-control <?= ($validation->hasError('email')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Email">
								    <div class="invalid-feedback">
			                            <?= $validation->getError('email'); ?>
			                        </div>
								  </div>


								  <br>
								  <br>
								  <button type="submit" class="btn btn-primary">Simpan</button>
								<?= form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

<?= $this->endSection(); ?>