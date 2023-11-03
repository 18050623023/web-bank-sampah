<?php $__env->startSection('title', 'Penarikan Uang Nasabah'); ?>

<?php $__env->startSection('conten'); ?>

    <h6 class="mb-0 text-uppercase">Penarikan Uang Nasabah</h6>
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
    <hr />

    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = App\View\Components\Alert::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Alert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
    <div class="card border-top border-0 border-4 border-info">
        <div class="card-body">
            <div class="border p-4 rounded">
                <div class="card-title d-flex align-items-center">
                    <h5>Penarikan Uang Nasabah</h5>
                </div>
                <hr />
                <form method="POST" action="<?php echo e(url('admin/tarikuang')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="row mb-3" hidden>
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">user id</label>
                        <div class="col-sm-9">
                            <input type="text" name="user_id" class="form-control" id="inputEmailAddress2"
                                value="<?php echo e($nasabah->user_id); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3" hidden>
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">nasabah id</label>
                        <div class="col-sm-9">
                            <input type="text" name="nasabah_id" class="form-control" id="inputEmailAddress2"
                                value="<?php echo e($nasabah->id); ?>" readonly>
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
                            <input type="text" name="lokasi" class="form-control" id="inputEmailAddress2"
                                value="<?php echo e($lokasi_bank->id); ?>" hidden>
                            <input type="text" name="lokasi_front" class="form-control" id="inputEmailAddress2"
                                value="<?php echo e($lokasi_bank->nama_bank); ?>">
                        </div>
                    </div>
                    <?php } ?>

                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Saldo</label>
                        <div class="col-sm-9">
                            <input type="text" name="saldo" class="form-control" id="inputEmailAddress2"
                                value="<?php echo $saldo; ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Jumlah Uang Yang Ditarik</label>
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
                        <h5 align="center">Transaksi Debit Nasabah</h5>
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal Penarikan</th>
                                    <th>Kredit</th>
                                    <th>Debit</th>
                                    <th>Petugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $tarik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($tar->tgl_tab); ?></td>
                                        <td><?php echo e($tar->kredit); ?></td>
                                        <td><?php echo e($tar->debit); ?></td>
                                        <td><?php echo e($tar->nama_pegawai); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <h5>Saldo : RP. <?php echo $saldo; ?></h5>
                    </div>
                </div>
            </div>

        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/admin/penarikanuang.blade.php ENDPATH**/ ?>