<?= $this->extend('view_page/header_admin');  ?>
<?= $this->section('isi'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Tambah Data Jurusan Kuliah</h1>
                    <p class="mb-4">Tambah Data Jurusan Kuliah</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Progress Small -->
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Jurusan Kuliah</h6>
                                </div>
                                <div class="card-body">
								  <?= form_open('adm/jurusan/update_jurusan/'.$edit['kd_jurusan']); ?>
                                  <?= csrf_field();  ?>

                                   <div class="form-group">
								    <label for="exampleInputPassword1">Kode Jurusan</label>
								   <input type="text" value="<?= $edit['kd_jurusan'] ?>" name="kd_jurusan" class="form-control <?= ($validation->hasError('kd_jurusan')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Kode Jurusan">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('kd_jurusan'); ?>
			                        </div>
								  </div>
									
								  <div class="form-group">
								    <label for="exampleInputPassword1">Nama Jurusan</label>
								   <input value="<?= $edit['nama_jurusan'] ?>" type="text" name="nama_jurusan" class="form-control <?= ($validation->hasError('nama_jurusan')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Nama Jurusan">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('nama_jurusan'); ?>
			                        </div>
								  </div>

								  <div class="form-group">
								    <label for="exampleInputPassword1">Jenjang Pendidikan</label>
								    <input value="<?= $edit['jenjang_pendidikan'] ?>" type="text" name="jenjang_pendidikan" class="form-control <?= ($validation->hasError('jenjang_pendidikan')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Jenjang Pendidikan">
								    <div class="invalid-feedback">
			                            <?= $validation->getError('jenjang_pendidikan'); ?>
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