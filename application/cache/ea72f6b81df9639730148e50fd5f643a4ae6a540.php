<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager - Framework PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,700,700i,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/Framework-php/public/css/manager.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="<?php echo e(route_url('manager')); ?>">Inicio <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?php echo e(route_url('manager/modules')); ?>">Modulos</a>
      <a class="nav-item nav-link" href="<?php echo e(route_url('manager/controllers')); ?>">Controllers</a>
      <a class="nav-item nav-link" href="<?php echo e(route_url('manager/models')); ?>">Models</a>
      <a class="nav-item nav-link" href="<?php echo e(route_url('manager/middlewares')); ?>">Middlewares</a>
    </div>
  </div>
</nav>
<div class="manager-content">
    <?php echo $__env->yieldContent('content'); ?>  
</div>

</body>
</html><?php /**PATH /var/www/html/Framework-php/application/modules/manager/views/template.blade.php ENDPATH**/ ?>