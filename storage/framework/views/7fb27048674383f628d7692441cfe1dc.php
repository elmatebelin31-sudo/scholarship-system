

<?php $__env->startSection('content'); ?>
<div style="padding:24px; background:#fff; box-shadow:0 4px 8px rgba(0,0,0,.1);">

    <h2>Student Application Details</h2>

    <hr>

    <h3>Student Information</h3>
    <p><strong>Name:</strong> <?php echo e($application->student->name ?? 'N/A'); ?></p>
    <p><strong>Email:</strong> <?php echo e($application->student->email ?? 'N/A'); ?></p>
    <p><strong>Student ID:</strong> <?php echo e($application->student->id ?? 'N/A'); ?></p>

    <hr>

    <h3>Scholarship</h3>
    <p><strong>Title:</strong> <?php echo e($application->scholarship->title ?? 'N/A'); ?></p>
    <p><strong>Status:</strong> <?php echo e($application->status); ?></p>

    <a href="<?php echo e(url()->previous()); ?>">← Back to Previous Page</a>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\scholarship-system\resources\views/admin/show.blade.php ENDPATH**/ ?>