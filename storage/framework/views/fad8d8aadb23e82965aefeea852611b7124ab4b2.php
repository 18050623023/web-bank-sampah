<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?php echo e(asset('template')); ?>/assets/images/dlh.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text text-success">Simbas.id</h4>
        </div>
        
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?php echo e(url('admin/dashboard')); ?>">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <?php if(auth()->user()->type == 'Admin'): ?>
            <li>
                <a href="<?php echo e(url('admin/user')); ?>">
                    <div class="parent-icon"><i class='bx bx-user'></i>
                    </div>
                    <div class="menu-title">Kelola User</div>
                </a>
            </li>

            <li>
                <a href="<?php echo e(url('admin/nasabah')); ?>">
                    <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                    </div>
                    <div class="menu-title">Data Nasabah</div>
                </a>
            </li>

            <li>
                <a href="<?php echo e(url('admin/petugas')); ?>">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Data Pegawai</div>
                </a>
            </li>

            <li>
                <a href="<?php echo e(url('admin/kategori')); ?>">
                    <div class="parent-icon"><i class="bx bx-folder"></i>
                    </div>
                    <div class="menu-title">Kategori Sampah</div>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('admin/lokasi')); ?>">
                    <div class="parent-icon"><i class="bx bx-map-alt"></i>
                    </div>
                    <div class="menu-title">Bank Sampah</div>
                </a>
            </li>

            

            <li>
                <a href="<?php echo e(url('admin/laporan')); ?>">
                    <div class="parent-icon"><i class="bx bx-map-alt"></i>
                    </div>
                    <div class="menu-title">Laporan Sampah</div>
                </a>
            </li>
        <?php endif; ?>

        <?php if(auth()->user()->type == 'Nasabah'): ?>
            <li>
                <a href="<?php echo e(url('admin/addnasabah')); ?>">
                    <div class="parent-icon"><i class='bx bx-user'></i>
                    </div>
                    <div class="menu-title">Buka Tabungan</div>
                </a>
            </li>

            <li>
                <a href="<?php echo e(url('admin/lihattabungan')); ?>">
                    <div class="parent-icon"><i class='bx bx-folder'></i>
                    </div>
                    <div class="menu-title">Lihat Tabungan</div>
                </a>
            </li>
        <?php endif; ?>


        <?php if(auth()->user()->type == 'Teller'): ?>
            <li>
                <a href="<?php echo e(url('admin/setoran')); ?>">
                    <div class="parent-icon"><i class="bx bx-repeat"></i>
                    </div>
                    <div class="menu-title">Setoran</div>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('admin/penarikan')); ?>">
                    <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                    </div>
                    <div class="menu-title">Penarikan</div>
                </a>
            </li>
        <?php endif; ?>

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
<?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>