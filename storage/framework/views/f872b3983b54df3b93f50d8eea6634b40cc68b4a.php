

<?php $__env->startSection('title','Setoran Nasabah'); ?>

<?php $__env->startSection('conten'); ?>
    
		<h6 class="mb-0 text-uppercase">Setoran Nasabah</h6>
        <table>
            <tr>
                <td>NIK </td>
                <td>:</td>
                <td><?php echo e($nasabah->nik); ?></td>
            </tr>
            <tr>
                <td>Nama </td>
                <td>:</td>
                <td><?php echo e($nasabah->nama_nasabah); ?></td>
            </tr>
        </table>
		<hr/>

        <div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<h5>Setor Tabungan</h5>
									</div>
									<hr/>
                        <form method="POST" action="<?php echo e(url('admin/stortabungan')); ?>">
                        <?php echo csrf_field(); ?>

						<div class="row mb-3" hidden>
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">User Id</label>
										<div class="col-sm-9">
											<input type="text" name="user_id" class="form-control" id="inputEmailAddress2" value="<?php echo e($nasabah->user_id); ?>">
										</div>
									</div>
						
									<div class="row mb-3" hidden>
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Nasabah Id</label>
										<div class="col-sm-9">
											<input type="text" name="nasabah_id" class="form-control" id="inputEmailAddress2" value="<?php echo e($nasabah->id); ?>">
										</div>
									</div>

								<?php if(auth()->user()->type == 'Admin'){ ?>
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
								<?php } ?>

						<?php if(auth()->user()->type == 'Teller'){ ?>
							<div class="row mb-3">
								<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Lokasi</label>
								<div class="col-sm-9">
									<input type="text" name="lokasi" class="form-control" id="inputEmailAddress2" value="<?php echo e($lokasi_bank->id); ?>" hidden>
									<input type="text" name="lokasi_front" class="form-control" id="inputEmailAddress2" value="<?php echo e($lokasi_bank->nama_bank); ?>" readonly>
								</div>
							</div>
						<?php } ?>

									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Kategori</label>
										<div class="col-sm-9">
											<select class="form-control" name="kategori">
                                                <option value="0">-Pilih Kategori-</option>
                                            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($kat->id); ?>"><?php echo e($kat->kategori_sampah); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Jumlah Tabungan (pergram)</label>
										<div class="col-sm-9">
											<input type="number" name="jml_tab" class="form-control" id="inputEmailAddress2">
										</div>
									</div>

									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Petugas</label>
										<div class="col-sm-9">
											<select class="form-control" name="petugas">
                                                <option value="0">-Pilih Petugas-</option>
											<?php $__currentLoopData = $petugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($pet->id); ?>"><?php echo e($pet->nama_pegawai); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
										</div>
									</div>
	
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-info px-5">simpan</button>
										</div>
									</div>
                        </form>
								</div><br><br>


		<div class="card">
			<div class="card-body">
							<div class="table-responsive">
                                <h5 align="center">Transaksi Kredit Nasabah</h5>
								<table id="example" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Tanggal Menabung</th>
											<th>Kategori</th>
											<th>Harga (Pergram)</th>
											<th>Jumlah Tabungan (Pergram)</th>
											<th>Total Tabungan</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php $__currentLoopData = $setoran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $set): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($set->tgl_menabung); ?></td>
											<td><?php echo e($set->kategori_sampah); ?></td>
											<td><?php echo e($set->harga_pergram); ?></td>
											<td><?php echo e($set->jml_tab_pergram); ?></td>
											<td><?php echo e($set->total_tabungan); ?></td>
											<td>
												<a href="/admin/<?php echo e($set->id); ?>/editsetoran" class="btn btn-primary">Edit</a>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
									</tbody>
								</table>
					</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/pilihnasabah.blade.php ENDPATH**/ ?>