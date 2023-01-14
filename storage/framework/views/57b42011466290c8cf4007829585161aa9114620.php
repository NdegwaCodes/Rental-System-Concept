<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Stylesheets -->
    <!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>"/>
	<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>"/>
	<link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>"/>
	<link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.css')); ?>"/>
	<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>"/>
	<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>"/>
    <style>
        html, body {
  font-family: 'Open Sans', sans-serif;
  height: 100%;
}
body {
  background: #FFFFFF;
  height: 100%;
}
    </style>

</head>
<body>
<section id="sidebar"> 
  <div class="white-label">
  </div> 
  <div id="sidebar-nav"> 
    <div class="col-md-12" style="margin-top:30px; padding-bottom:30px;">
    <div class="profileimg">
      <a href="#" ><img  title="Profile Image" style="    width: 120px; height:100px; margin-bottom: 20px; margin-left:22px;" src="<?php echo e(asset('profile')); ?>/<?php echo e(Illuminate\Support\Facades\Auth::user()->profile_img); ?>" alt=""></a>
      <span style="color:white; margin-left:24px"><?php echo e(Illuminate\Support\Facades\Auth::user()->adminrelation->first_name); ?></span> <span style="color:red"><?php echo e(Illuminate\Support\Facades\Auth::user()->adminrelation->last_name); ?></span>
      </div>
    </div>
    <ul>
      <li ><a href="<?php echo e(route('admin_dashboard')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="<?php echo e(route('tenet_info')); ?>"><i class="fa fa-info"></i> Tenant Info</a></li>
      <li class="active"><a href="<?php echo e(route('advisor_info')); ?>"><i class="fa fa-info"></i> Advisor Info</a></li>
      <li ><a href="<?php echo e(route('advisor_upgrade')); ?>"><i class="fa fa-thumbs-up"></i> Advisor Upgradation</a></li>
      <li><a href="<?php echo e(route('admin_profile')); ?>"><i class="fa fa-user"></i> Profile</a></li>
      <li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
  </div>
</section>
<section id="content">
  <div id="header">
    <div class="header-nav">
      <div class="menu-button">
        <!-- <i class="fa fa-navicon"></i> -->
      </div>
      <div class="nav">
        <ul >
          <li class="nav-settings">
          <?php
            $count = \App\RegisterAdvisor::all()->where('is_recived','=',1)->where('is_upgrated','=',0)->count();
          ?>
            <a href="<?php echo e(route('advisor_upgrade')); ?>"><div title="Notification" class="font-icon"><i class="fa fa-bell-o" aria-hidden="true"></i><span style="float: left; margin-right: 5px; margin-top: 3px;" class="badge badge-light"><?php echo e($count); ?></span></div></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
<div class="content">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">E-mail</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Contact #</th>
      <th scope="col">NTN #</th>
      <th scope="col">Shop Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    $counter = 0;
  ?>
  <?php $__currentLoopData = App\User::all()->where('role_id_fk','=',3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advisor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e(++$counter); ?></th>
      <td><?php echo e($advisor->email); ?></td>
      <td><?php echo e($advisor->advisorrelation->first_name); ?></td>
      <td><?php echo e($advisor->advisorrelation->last_name); ?></td>
      <td><?php echo e($advisor->advisorrelation->phone); ?></td>
      <td><?php echo e($advisor->advisorrelation->ntn); ?></td>
      <td><?php echo e($advisor->advisorrelation->brand); ?></td>  
      <td>
        <form action="<?php echo e(route('admin_advisor_handler.destroy',[$advisor->id])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('delete'); ?>
          <input style="background-color:black;color:white; border-style:none;cursor: pointer;" type="submit" value="Delete">
        </form>
      </td>   
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>

<!--====== Javascripts & Jquery ======-->
<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/masonry.pkgd.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/magnific-popup.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/main.js')); ?>"></script>
	<!-- smodel script -->

</body>
</html>