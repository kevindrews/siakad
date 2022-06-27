<?= $this->extend('view_page/header');  ?>
<?= $this->section('isi'); ?>


 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Isi KRS Semester <?= $krs['semester'] ?></h1>
                    <p class="mb-4">Pengisian KRS Akan dibuka Hingga</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Progress Small -->
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Isi KRS</h6>
                                </div>
                                <?php 
			                    if($validation->hasError('kd_mk')) { ?>
			                    <div class="alert alert-warning alert-dismissible bg-warning text-white border-0 fade show" role="alert">
			                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                    </button>
			                    <?= $validation->getError('kd_mk'); ?>
			                    </div>
			                    <?php } ?>
                                <div class="card-body">
								  <?= form_open('mhs/krs/save_krs'); ?>
                                  <?= csrf_field();  ?>

								  	
								    <?php foreach ($mk as $data): ?>
								   
								  	
								    <div class="form-check">
								    
									  <input value="<?= $data['kd_mk'] ?>" name="kd_mk[]" class="form-check-input" type="radio"/>
									  <label class="form-check-label"> <?= $data['nama_mk'] ?> </label>
									</div>

									<input type="hidden" name="email" value="<?= session('userData.email') ?>">

									<input type="hidden" name="nama_mk" value="<?= $data['nama_mk'] ?>">

								  
								  <?php endforeach; ?>
								   
								  <button type="submit" class="btn btn-primary">Simpan</button>
								<?= form_close() ?>
                                </div>
                            </div>

                          

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->










<?= $this->endSection(); ?>