<?= $this->extend('view_page/header_admin');  ?>
<?= $this->section('isi'); ?>


 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Tambah Data Mata Kuliah</h1>
                    <p class="mb-4">Tambah Data Mata Kuliah Sesuai Dengan Kode Ruangan Yang Tersedia</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Progress Small -->
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Mata Kuliah</h6>
                                </div>
                                <div class="card-body">
								  <?= form_open('adm/mata_kuliah/save_mk'); ?>
                                  <?= csrf_field();  ?>
								  	<div class="form-group">
								    <label for="exampleInputPassword1">Kode Mata Kuliah</label>
								    <input type="text" name="kd_mk" class="form-control <?= ($validation->hasError('kd_mk')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Kode Mata Kuliah">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('kd_mk'); ?>
			                        </div>
								  </div>
								   <div class="form-group">
								   	<label for="exampleInputPassword1">Kode Ruangan</label>
								   <select name="kd_ruang" class="form-control" id="exampleFormControlSelect2">
								   	 <?php foreach ($ruang as $data): ?>
								      <option value="<?= $data['kd_ruang'] ?>"><?= $data['kd_ruang'] ?></option>
								      <?php endforeach; ?>
								    </select>
								   </div> 
									
								  <div class="form-group">
								    <label for="exampleInputPassword1">Nama Mata Kuliah</label>
								    <input type="text" name="nama_mk" class="form-control <?= ($validation->hasError('nama_mk')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Nama Mata Kuliah">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('nama_mk'); ?>
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

								   <div class="form-group">
								  <label for="exampleInputPassword1">Syarat Mata Kuliah</label>
								   <select name="prasyarat" class="form-control" id="exampleFormControlSelect2">
								   	 <?php foreach ($prasyarat as $data): ?>
								      <option value="<?= $data['id_prasyarat'] ?>"><?= $data['id_prasyarat'] ?> - <?= $data['mk_prasyarat'] ?></option>
								      <?php endforeach; ?>
								    </select>
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