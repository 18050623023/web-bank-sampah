

<?php $__env->startSection('title','Laporan Sampah'); ?>

<?php $__env->startSection('conten'); ?>
    
		<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Laporan Jumlah sampah</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
								<div class="border p-4 rounded">
									
                        <form method="POST" action="<?php echo e(url('admin/searchlaporan')); ?>">
                        <?php echo csrf_field(); ?>
                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Lokasi Bank</label>
										<div class="col-sm-9">
											<select class="form-control" name="lokasi">
                                                <option value="0">-Pilih lokasi-</option>
                                            <?php $__currentLoopData = $lokasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lok->id); ?>"><?php echo e($lok->nama_bank); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Dari Tanggal</label>
										<div class="col-sm-9">
											<input type="date" name="tgl1" class="form-control" id="inputEmailAddress2">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Sampaidengan Tanggal</label>
										<div class="col-sm-9">
											<input type="date" name="tgl2" class="form-control" id="inputEmailAddress2">
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-info px-5">Search</button>
										</div>
									</div>
                        </form>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/laporansampah.blade.php ENDPATH**/ ?>