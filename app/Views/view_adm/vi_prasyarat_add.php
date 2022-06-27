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
                                    <h6 class="m-0 font-weight-bold text-primary">Data Mata Kuliah</h6>
                                </div>
                                <div class="card-body">
								  <?= form_open('adm/prasyarat/save_prasyarat'); ?>
                                  <?= csrf_field();  ?>

                                   <div class="form-group">
								    <label for="exampleInputPassword1">ID Prasyarat</label>
								   <input type="text" name="id_prasyarat" class="form-control <?= ($validation->hasError('id_prasyarat')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="ID Mata Kuliah Prasyarat">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('id_prasyarat'); ?>
			                        </div>
								  </div>
									
								  <div class="form-group">
								    <label for="exampleInputPassword1">Nama Mata Kuliah Prasyarat</label>
								   <input type="text" name="mk_prasyarat" class="form-control <?= ($validation->hasError('mk_prasyarat')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Nama Mata Kuliah Prasyarat">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('mk_prasyarat'); ?>
			                        </div>
								  </div>

								  <div class="form-group">
								    <label for="exampleInputPassword1">Semester</label>
								    <input type="number" name="semester" class="form-control <?= ($validation->hasError('semester')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Semester">
								    <div class="invalid-feedback">
			                            <?= $validation->getError('semester'); ?>
			                        </div>
								  </div>

								  <div class="form-group">
								    <label for="exampleInputPassword1">Jumlah SKS</label>
								    <input type="number" name="jumlah_sks" class="form-control <?= ($validation->hasError('jumlah_sks')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Jumlah SKS">
								    <div class="invalid-feedback">
			                            <?= $validation->getError('jumlah_sks'); ?>
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