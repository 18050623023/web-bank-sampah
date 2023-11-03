

<?php $__env->startSection('title','User'); ?>

<?php $__env->startSection('conten'); ?>
    
		<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Profile</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
										<h5 class="mb-0 text-info">Edit Profile</h5>
									</div>
									<hr/>
                                    <a href="/admin/<?php echo e(Auth::user()->id); ?>/changeuserpass" class="btn btn-primary">Change Password</a><br><br>
                        <form method="POST" action="<?php echo e(url('admin/saveprofile')); ?>">
                        <?php echo csrf_field(); ?>
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama</label>
										<div class="col-sm-9">
											<input type="text" name="name" class="form-control" id="inputEnterYourName" value="<?php echo e(Auth::user()->name); ?>" >
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email</label>
										<div class="col-sm-9">
											<input type="email" name="email" class="form-control" id="inputEmailAddress2" value="<?php echo e(Auth::user()->email); ?>">
										</div>
									</div>
	
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-info px-5">simpan</button>
										</div>
									</div>
                        </form>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/profile.blade.php ENDPATH**/ ?>