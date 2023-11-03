

<?php $__env->startSection('title','Petugas'); ?>

<?php $__env->startSection('conten'); ?>
    
		<h6 class="mb-0 text-uppercase">Hasil Laporan jumlah sampah</h6>
		<hr/>
		<div class="card">
			<div class="card-body">
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Kategori</th>
											<th>Jumlah Sampah Pergram</th>
										</tr>
									</thead>
									<tbody>
                                    <?php ($i = 1); ?>
                					<?php $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
                                            <td><?php echo e($i++); ?></td>
											<td><?php echo e($lap->kategori_sampah); ?></td>
											<td><?php echo e($lap->jml_tab_pergram); ?></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        <tr>
                                            <td>Total Sampah</td>
                                            <td></td>
                                            <td><?php echo e($jmlsampah); ?></td>
                                        </tr>
									</tbody>
								</table>
					</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/hasillaporan.blade.php ENDPATH**/ ?>