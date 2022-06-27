<?= $this->extend('view_page/header');  ?>
<?= $this->section('isi'); ?>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Edit Data Profile Anda <?= session('userData.name') ?></h1>
                    Note : Tidak bisa mengisi KRS jika tidak melengkapi data dibawah ini!
                
                    <br>
                    <br>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Progress Small -->
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
                                </div>
                                <div class="card-body">
								  <?= form_open('mhs/profile/save_data'); ?>
                                  <?= csrf_field();  ?>

                                   <div class="form-group">
								    <label for="exampleInputPassword1">NIM</label>
								   <input type="text" name="nim" class="form-control <?= ($validation->hasError('nim')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="NIM">

								    <div class="invalid-feedback">
			                            <?= $validation->getError('nim'); ?>
			                        </div>
								  </div>
									
								  <div class="form-group">
								   	<label for="exampleInputPassword1">Kode Jurusan</label>
								   <select name="kd_jurusan" class="form-control" id="exampleFormControlSelect2">
								   	 <?php foreach ($jurusan as $data): ?>
								      <option value="<?= $data['kd_jurusan'] ?>"><?= $data['kd_jurusan'] ?> - <?= $data['nama_jurusan'] ?></option>
								      <?php endforeach; ?>
								    </select>
								   </div> 

								    <div class="form-group">
								   	<label for="exampleInputPassword1">Kode Ruangan</label>
								   <select name="kd_ruang" class="form-control" id="exampleFormControlSelect2">
								   	 <?php foreach ($ruang as $data): ?>
								      <option value="<?= $data['kd_ruang'] ?>"><?= $data['kd_ruang'] ?> - <?= $data['nama_ruang'] ?></option>
								      <?php endforeach; ?>
								    </select>
								   </div> 

								    <div class="form-group">
								   	<label for="exampleInputPassword1">Dosen</label>
								   <select name="nip" class="form-control" id="exampleFormControlSelect2">
								   	 <?php foreach ($dosen as $data): ?>
								      <option value="<?= $data['nip'] ?>"><?= $data['nip'] ?> - <?= $data['nama_dosen'] ?></option>
								      <?php endforeach; ?>
								    </select>
								   </div> 

								   <div class="form-group">
								    <label for="exampleInputPassword1">Nama Mahasiswa</label>
								    <input type="text" name="nama_mahasiswa" class="form-control <?= ($validation->hasError('jenis_kelamin')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Nama Mahasiswa">
								    <div class="invalid-feedback">
			                            <?= $validation->getError('nama_mahasiswa'); ?>
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
								    <label for="exampleInputPassword1">Angkatan</label>
								    <input type="text" name="angkatan" class="form-control <?= ($validation->hasError('angkatan')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Angkatan">
								    <div class="invalid-feedback">
			                            <?= $validation->getError('angkatan'); ?>
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
								    <input readonly value="<?= session('userData.email') ?>" type="text" name="email" class="form-control <?= ($validation->hasError('email')) ?'is-invalid' : ''; ?>" id="exampleInputPassword1" placeholder="Email">
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