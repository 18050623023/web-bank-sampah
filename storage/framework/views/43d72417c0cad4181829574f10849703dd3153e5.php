

<?php $__env->startSection('title','Setoran'); ?>

<?php $__env->startSection('conten'); ?>
    
		<h6 class="mb-0 text-uppercase">Setoran Nasabah</h6>
		<hr/>
		<div class="card">
			<div class="card-body">
			
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>NIK</th>
											<th>Nama Nasabah</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php $__currentLoopData = $nasabah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($nas->nik); ?></td>
											<td><?php echo e($nas->nama_nasabah); ?></td>
											<td>
												<a href="/admin/<?php echo e($nas->id); ?>/pilihnasabah" class="btn btn-primary">Pilih</a>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
									</tbody>
								</table>
					</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/setoran.blade.php ENDPATH**/ ?>