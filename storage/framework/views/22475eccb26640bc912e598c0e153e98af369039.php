

<?php $__env->startSection('title','Data Bank'); ?>

<?php $__env->startSection('conten'); ?>
    
		<h6 class="mb-0 text-uppercase">Data Bank Sampah</h6>
		<hr/>
		<div class="card">
			<div class="card-body">
				<a href="<?php echo e(url('admin/addlokasi')); ?>" class="btn btn-primary">+Data Bank Sampah</a></br></br>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Bank</th>
											<th>Tanggal Bergabung</th>
											<th>Latitude</th>
											<th>Longitude</th>
											<th>Document</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php ($i = 1); ?>
                					<?php $__currentLoopData = $lokasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($i++); ?></td>
											<td><?php echo e($lok->nama_bank); ?></td>
											<td><?php echo e($lok->tgl_bergabung); ?></td>
											<td><?php echo e($lok->lat); ?></td>
											<td><?php echo e($lok->long); ?></td>
											<td><a href="/document/invoice/<?php echo e($lok->path); ?>" target="__blank"><?php echo e($lok->path); ?></a></td>
											<td>
												<a href="/admin/<?php echo e($lok->id); ?>/editlokasi" class="btn btn-primary">Edit</a>
												<a href="/admin/dellokasi/<?php echo $lok->id ?>" class="btn btn-primary">Delete</a>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
									</tbody>
								</table>
					</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/lokasi.blade.php ENDPATH**/ ?>