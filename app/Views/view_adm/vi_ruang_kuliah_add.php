<?= $this->extend('view_page/header_admin');  ?>
<?= $this->section('isi'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Tambah Data Prasyarat Mata Kuliah</h1>
                    <p class="mb-4">Tambah Data Mata Kuliah Prasyarat</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Progress Small -->
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Ruang Kuliah</h6>
                                </div>
                                <div class="card-body">
								  <?= form_open('adm/ruang_kuliah/save_ruang'); ?>
                                  <?= csrf_field();  ?>

                                  <div class="form-group">
								    <label for="exampleInputPassword1">Kode Ruangan</label>
								   <input type="text" name="kd_ruang" class="form-control <?= ($validation->hasError('kd_ruang')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Ruang Kuliah">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('kd_ruang'); ?>
			                        </div>
								  </div>
									
								  <div class="form-group">
								    <label for="exampleInputPassword1">Nama Ruangan</label>
								   <input type="text" name="nama_ruang" class="form-control <?= ($validation->hasError('nama_ruang')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Ruang Kuliah">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('nama_ruang'); ?>
			                        </div>
								  </div>

								  <div class="form-group">
								    <label for="exampleInputPassword1">Kapasitas</label>
								    <input type="number" name="kapasitas" class="form-control <?= ($validation->hasError('kapasitas')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Kapasitas Ruang Kuliah">
								    <div class="invalid-feedback">
			                            <?= $validation->getError('kapasitas'); ?>
			                        </div>
								  </div>
								  
								  <button type="submit" class="btn btn-primary">Simpan</button>
								<?= form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

<?= $this->endSection(); ?>