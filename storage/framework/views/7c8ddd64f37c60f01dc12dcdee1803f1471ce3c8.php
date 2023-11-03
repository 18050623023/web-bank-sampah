

<?php $__env->startSection('title','Petugas'); ?>

<?php $__env->startSection('conten'); ?>
    
		<h6 class="mb-0 text-uppercase">Data Petugas</h6>
		<hr/>
		<div class="card">
			<div class="card-body">
				<a href="<?php echo e(url('admin/addpetugas')); ?>" class="btn btn-primary">+Tambah Pegawai</a><br><br>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Alamat</th>
											<th>No Telepon</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                					<?php $__currentLoopData = $petugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($pet->nama_pegawai); ?></td>
											<td><?php echo e($pet->no_hp); ?></td>
											<td><?php echo e($pet->alamat); ?></td>
											<td>
												<a href="/admin/<?php echo e($pet->id); ?>/editpetugas" class="btn btn-primary">Edit</a>
												<a href="/admin/delpetugas/<?php echo $pet->id ?>" class="btn btn-primary">Delete</a>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
									</tbody>
								</table>
					</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/petugas.blade.php ENDPATH**/ ?>