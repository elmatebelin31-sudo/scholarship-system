<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo $__env->yieldContent('title', 'Admin Panel'); ?></title>

  <!-- Include all your CSS here -->
  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
  <style>
    /* Minimalist admin styles (you can copy the CSS from your design) */
    body { 
        font-family: Inter, system-ui, sans-serif; 
        background:#ffffff; 
        color:#111; 
    }
    .container{ 
        max-width:980px; 
        margin:0 auto; 
        padding:28px; 
    }
    header{ 
        display:flex; 
        justify-content:space-between; 
        align-items:center; 
        padding:12px 0;
        border-radius: 10px 10px 0 0; 
    }
    .btn { 
        border:none; 
        padding:8px 14px; 
        border-radius:10px; 
        cursor:pointer; 
        font-weight:600; 
    }
    .btn-primary{ 
        background:#7c1c1c; 
        color:white; 
    }
    .btn-primary:hover{
        opacity: .8;
    }
    .btn-outline{ 
        background:#f5b700; 
        color:#111; 
    }
    table{ 
        width:100%; 
        border-collapse:collapse; 
        margin-top:20px;
    }
    th, td{ 
        padding:10px; 
        text-align:left; 
        border-bottom:1px solid #e6e6e6; 
    }
    form{ 
        display:inline-block; 
        margin:0; 
    }
    h1{
        margin-left: 25%;
        color: white;
    }
    h2{
        margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Student Scholarship Application</h1>
      <div>
        <a class="btn btn-primary" style="list-style: none; text-decoration:none; margin-right:10px; font-size:15px; padding:15px;" href="<?php echo e(route('admin.home')); ?>">Back to Home</a>
      </div>
    </header>

    <?php echo $__env->yieldContent('content'); ?>

    <footer style="margin-top:28px; text-align:center; color:#ffffff; border-radius: 0 0 10px 10px; ">
      &copy; <?php echo e(date('Y')); ?> Scholarship Management System
    </footer>
  </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\scholarship-system\resources\views/layouts/admin.blade.php ENDPATH**/ ?>