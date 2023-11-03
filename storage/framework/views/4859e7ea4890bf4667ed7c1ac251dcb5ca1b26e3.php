

<?php $__env->startSection('title','profil nasabah'); ?>

<?php $__env->startSection('conten'); ?>
    
		<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Profil Nasabah</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
										<h5 class="mb-0 text-info">Profil Nasabah</h5>
									</div>
									<hr/>
                        <form method="POST" action="/admin/updatenasabah/<?php echo e($nasabah->id); ?>">
                        <?php echo method_field('put'); ?>
                        <?php echo csrf_field(); ?>

						<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">email</label>
										<div class="col-sm-9">
											<input type="email" name="email" class="form-control" id="inputEnterYourName" value="<?php echo e(Auth::user()->email); ?>" readonly>
										</div>
									</div>
									
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">NIK</label>
										<div class="col-sm-9">
											<input type="number" name="nik" class="form-control" id="inputEnterYourName" value="<?php echo e($nasabah->nik); ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputChoosePassword2" class="col-sm-3 col-form-label">Tanggal Bergabung</label>
										<div class="col-sm-9">
											<input type="date" name="tgl_bergabung" class="form-control" id="inputChoosePassword2" value="<?php echo e($nasabah->tgl_bergabung); ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Nama Nasabah</label>
										<div class="col-sm-9">
											<input type="text" name="nama_nasabah" class="form-control" id="inputEmailAddress2" value="<?php echo e($nasabah->nama_nasabah); ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputChoosePassword2" class="col-sm-3 col-form-label">No Handphone</label>
										<div class="col-sm-9">
											<input type="number" name="no_hp" class="form-control" id="inputChoosePassword2" value="<?php echo e($nasabah->no_hp); ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputChoosePassword2" class="col-sm-3 col-form-label">Tempat Lahir</label>
										<div class="col-sm-9">
											<input type="text" name="tempat_lahir" class="form-control" id="inputChoosePassword2" value="<?php echo e($nasabah->tempat_lahir); ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputChoosePassword2" class="col-sm-3 col-form-label">Tanggal Lahir</label>
										<div class="col-sm-9">
											<input type="date" name="tgl_lahir" class="form-control" id="inputChoosePassword2" value="<?php echo e($nasabah->tgl_lahir); ?>">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputChoosePassword2" class="col-sm-3 col-form-label">Alamat</label>
										<div class="col-sm-9">
											<input type="text" name="alamat" class="form-control" id="inputChoosePassword2" value="<?php echo e($nasabah->alamat); ?>">
										</div>
									</div>
									
	
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-info px-5">Update</button>
										</div>
									</div>
                        </form>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/profilnasabah.blade.php ENDPATH**/ ?>