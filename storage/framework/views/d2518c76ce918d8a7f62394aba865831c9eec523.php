

<?php $__env->startSection('title','User'); ?>

<?php $__env->startSection('conten'); ?>
    
		<h6 class="mb-0 text-uppercase">Management User</h6>
		<hr/>
		<div class="card">
			<div class="card-body">
				<a href="adduser" class="btn btn-primary">+Tambah User</a></br></br>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Email</th>
											<th>Role</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php ($i = 1); ?>
                					<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($i++); ?></td>
											<td><?php echo e($usr->name); ?></td>
											<td><?php echo e($usr->email); ?></td>
											<td><?php echo e($usr->type); ?></td>
											<td>
												<a href="/admin/<?php echo e($usr->id); ?>/edituser" class="btn btn-primary">Edit</a>
												<a href="/admin/deluser/<?php echo $usr->id ?>" class="btn btn-primary">Delete</a>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
									</tbody>
								</table>
					</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/user.blade.php ENDPATH**/ ?>