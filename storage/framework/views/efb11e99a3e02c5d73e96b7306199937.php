<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style2.css')); ?>">
</head>
<body>
<div class="auth-container">
    <div class="auth-box">
        <h2>Student Sign Up</h2>

        <?php if(session('success')): ?>
            <p style="color: green;"><?php echo e(session('success')); ?></p>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <ul style="color: red;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>

        <form action="<?php echo e(route('student.register.submit')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="middle_name" placeholder="Middle Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>

        <p>Already have an account? <a href="<?php echo e(route('student.login')); ?>">Login</a></p>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\scholarship-system\resources\views/auth/student-register.blade.php ENDPATH**/ ?>