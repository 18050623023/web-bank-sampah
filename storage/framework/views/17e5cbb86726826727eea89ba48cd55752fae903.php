

<?php $__env->startSection('title','Edit Lokasi'); ?>

<?php $__env->startSection('conten'); ?>
    
		<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Edit Lokasi Bank</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
										<h5 class="mb-0 text-info">Edit Lokasi Bank</h5>
									</div>
									<hr/>
                        <form method="POST" action="/admin/updatelokasi" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
									<div class="row mb-3" hidden>
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">id lok</label>
										<div class="col-sm-9">
											<input type="text" name="id_lok" class="form-control" id="inputEnterYourName" value="<?php echo e($lokasi->id); ?>">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama Bank</label>
										<div class="col-sm-9">
											<input type="text" name="nama_bank" class="form-control" id="inputEnterYourName" value="<?php echo e($lokasi->nama_bank); ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Tanggal Bergabung</label>
										<div class="col-sm-9">
											<input type="date" name="tgl_bergabung" class="form-control" id="inputEnterYourName" value="<?php echo e($lokasi->tgl_bergabung); ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Latitude</label>
										<div class="col-sm-9">
											<input type="text" name="lat" class="form-control" id="inputEmailAddress2" value="<?php echo e($lokasi->lat); ?>">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Longitude</label>
										<div class="col-sm-9">
											<input type="text" name="long" class="form-control" id="inputEmailAddress2" value="<?php echo e($lokasi->long); ?>">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Dokument</label>
										<div class="col-sm-9">
											<input type="file" class="form-control" id="file" name="file" required autocomplete="file">
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/editlokasi.blade.php ENDPATH**/ ?>