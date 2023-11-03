

<?php $__env->startSection('title','Kategori'); ?>

<?php $__env->startSection('conten'); ?>
    
		<h6 class="mb-0 text-uppercase">Kategori Sampah</h6>
		<hr/>
		<div class="card">
			<div class="card-body">
				<a href="<?php echo e(url('admin/addkategori')); ?>" class="btn btn-primary">+Tambah Kategori</a></br></br>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Kategori Sampah</th>
											<th>Harga Pergram</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php ($i = 1); ?>
                					<?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($i++); ?></td>
											<td><?php echo e($kat->kategori_sampah); ?></td>
											<td><?php echo e($kat->harga_pergram); ?></td>
											<td>
												<a href="/admin/<?php echo e($kat->id); ?>/editkategori" class="btn btn-primary">Edit</a>
												<a href="/admin/delkategori/<?php echo $kat->id ?>" class="btn btn-primary">Delete</a>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
									</tbody>
								</table>
					</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/kategori.blade.php ENDPATH**/ ?>