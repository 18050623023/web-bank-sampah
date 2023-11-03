

<?php $__env->startSection('title','Nasabah'); ?>

<?php $__env->startSection('conten'); ?>
    
		<h6 class="mb-0 text-uppercase">Data Nasabah</h6>
		<hr/>
		<div class="card">
			<div class="card-body">
			<!-- <a href="<?php echo e(url('admin/addnasabah')); ?>" class="btn btn-primary">+Tambah Nasabah</a><br><br> -->
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>NIK</th>
											<th>Tanggal Bergabung</th>
											<th>Nama Nasabah</th>
											<th>No Handphone</th>
											<th>Alamat</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php $__currentLoopData = $nasabah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($nas->nik); ?></td>
											<td><?php echo e($nas->tgl_bergabung); ?></td>
											<td><?php echo e($nas->nama_nasabah); ?></td>
											<td><?php echo e($nas->no_hp); ?></td>
											<td><?php echo e($nas->alamat); ?></td>
											<td>
												<a href="/admin/<?php echo e($nas->id); ?>/editnasabah" class="btn btn-primary">Edit</a>
												<a href="/admin/delnasabah/<?php echo $nas->id ?>" class="btn btn-primary">Delete</a>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
									</tbody>
								</table>
					</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/nasabah.blade.php ENDPATH**/ ?>