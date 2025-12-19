<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style2.css')); ?>">
</head>
<body>
<div class="auth-container">
    <div class="auth-box">
        <h2>Student Login</h2>

        <?php if($errors->any()): ?>
            <ul style="color: red;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>

        <form action="<?php echo e(route('student.login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="<?php echo e(route('student.register')); ?>">Sign Up</a></p>
        <a class="btn btn-outline" href="<?php echo e(route('admin.login')); ?>">
    Admin Login
</a>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\scholarship-system\resources\views/auth/student-login.blade.php ENDPATH**/ ?>