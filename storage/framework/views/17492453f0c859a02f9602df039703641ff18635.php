<?php if(session('alert-primary')): ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong><?php echo e(session('alert-primary')); ?></strong>
        <button type="button" class="close" data-dismiss="alaert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if(session('alert-success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo e(session('alert-success')); ?></strong>
        <button type="button" class="close" data-dismiss="alaert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if(session('alert-warning')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?php echo e(session('alert-warning')); ?></strong>
        <button type="button" class="close" data-dismiss="alaert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if(session('alert-danger')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo e(session('alert-danger')); ?></strong>
        <button type="button" class="close" data-dismiss="alaert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/components/alert.blade.php ENDPATH**/ ?>