<!DOCTYPE html>
<html lang="en">
<head>
	<title>E-Home</title>
	<meta charset="UTF-8">
	<meta name="description" content="LERAMIZ Landing Page Template">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/icon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 header-top-left">
						<div class="top-info">
							<i class="fa fa-phone"></i>
							(+92) 3017160701
						</div>
						<div class="top-info">
							<i class="fa fa-envelope"></i>
							rentallands@gmail.com
						</div>
					</div>
					<div class="col-lg-6 text-lg-right header-top-right">
						<div class="top-social">
							<a href=""><i class="fa fa-facebook"></i></a>
							<a href=""><i class="fa fa-twitter"></i></a>
							<a href=""><i class="fa fa-instagram"></i></a>
							<a href=""><i class="fa fa-pinterest"></i></a>
							<a href=""><i class="fa fa-linkedin"></i></a>
						</div>
						<div class="user-panel">
							<a href="#" id="registerbutton"><i class="fa fa-user-circle-o"></i> Register</a>
							<a href="#" id="logbutton"><i class="fa fa-sign-in"></i> Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="#" class="site-logo"><img style="margin-top: -75px;" src="img/logo.png" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu">
							<li><a href="<?php echo e(route('index')); ?>">Home</a></li>
							<li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
							<li><a href="<?php echo e(route('postpage')); ?>">Properties</a></li>
							<li><a href="<?php echo e(route('blog')); ?>">Blog</a></li>
							<li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Properties</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Properties</span>
		</div>
	</div>


	<!-- page -->
	<section class="page-section categories-page">
		<div class="container">
			<div class="row">
			<?php if($post != null): ?>
			<?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
				<div class="col-lg-4 col-md-6">
					<!-- feature -->
					<div class="feature-item">
						<div class="feature-pic set-bg" data-setbg="<?php echo e(asset('sourceimg/post')); ?>/<?php echo e($postdata->image); ?>">
						</div>
						<div class="feature-text">
							<div class="text-center feature-title">
								<p><i class="fa fa-map-marker"></i> <?php echo e($postdata->address); ?></p>
							</div>
							<div class="room-info-warp">
								<div class="room-info">
                <div class="rf-left">
										<p><i class="fa fa-th-large"></i> <?php echo e($postdata->area); ?> sqr</p>
										<p><i class="fa fa-bed"></i> <?php echo e($postdata->bedroom); ?> Bedrooms</p>
										<p><i class="fa fa-compass"></i><?php echo e($postdata->state); ?> </p>
									</div>
									<div class="rf-right">
										<p><i class="fa fa-car"></i> <?php echo e($postdata->garage); ?> Garage</p>
										<p><i class="fa fa-bath"></i> <?php echo e($postdata->bathroom); ?> Bathroom</p>
										<p><i class="fa fa-map-marker"></i><?php echo e($postdata->city); ?> </p>
									</div>		
								</div>
								<div class="room-info">
									<div class="rf-left">
										<p><i class="fa fa-user"></i> <?php echo e($postdata->ownername); ?></p>
									</div>
									<div class="rf-right">
										<p><i class="fa fa-clock-o"></i> <?php echo e($postdata->created_at->diffForHumans()); ?></p>
									</div>	
								</div>
							</div>
							<?php if(\Illuminate\Support\Facades\Auth::check()): ?>
							<a href="<?php echo e(route('inbox',$postdata->advisor->user->id)); ?>" class="room-price">Rs <?php echo e($postdata->rent); ?></a>
							<?php else: ?>
							<a href="#" title="please Register" class="room-price">Rs <?php echo e($postdata->rent); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<?php else: ?>
			<?php $__currentLoopData = \App\AdvisorPost::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
				<div class="col-lg-4 col-md-6">
					<!-- feature -->
					<div class="feature-item">
						<div class="feature-pic set-bg" data-setbg="<?php echo e(asset('sourceimg/post')); ?>/<?php echo e($postdata->image); ?>">
						</div>
						<div class="feature-text">
							<div class="text-center feature-title">
								<p><i class="fa fa-map-marker"></i> <?php echo e($postdata->address); ?></p>
							</div>
							<div class="room-info-warp">
								<div class="room-info">
                <div class="rf-left">
										<p><i class="fa fa-th-large"></i> <?php echo e($postdata->area); ?> sqr</p>
										<p><i class="fa fa-bed"></i> <?php echo e($postdata->bedroom); ?> Bedrooms</p>
										<p><i class="fa fa-compass"></i><?php echo e($postdata->state); ?> </p>
									</div>
									<div class="rf-right">
										<p><i class="fa fa-car"></i> <?php echo e($postdata->garage); ?> Garage</p>
										<p><i class="fa fa-bath"></i> <?php echo e($postdata->bathroom); ?> Bathroom</p>
										<p><i class="fa fa-map-marker"></i><?php echo e($postdata->city); ?> </p>
									</div>		
								</div>
								<div class="room-info">
									<div class="rf-left">
										<p><i class="fa fa-user"></i> <?php echo e($postdata->ownername); ?></p>
									</div>
									<div class="rf-right">
										<p><i class="fa fa-clock-o"></i> <?php echo e($postdata->created_at->diffForHumans()); ?></p>
									</div>	
								</div>
							</div>
							<?php if(\Illuminate\Support\Facades\Auth::check()): ?>
							<a href="<?php echo e(route('inbox',$postdata->advisor->user->id)); ?>" class="room-price">Rs <?php echo e($postdata->rent); ?></a>
							<?php else: ?>
							<a href="#" title="please Register" class="room-price">Rs <?php echo e($postdata->rent); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>

				

			
		</div>
	</section>
	<!-- page end -->


	<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				<a href="#">
					<img src="img/partner/1.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/2.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/3.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/4.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/5.png" alt="">
				</a>
			</div>
		</div>
	</div>
	<!-- Clients section end -->


	<!-- Footer section -->
	<footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 footer-widget">
					<img src="img/logo.png" alt="">
					<p>Lorem ipsum dolo sit azmet, consecter dipise consult  elit. Maecenas mamus antesme non anean a dolor sample tempor nuncest erat.</p>
					<div class="social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 footer-widget">
					<div class="contact-widget">
						<h5 class="fw-title">CONTACT US</h5>
						<p><i class="fa fa-map-marker"></i>29F berkat market central plaza lahore </p>
						<p><i class="fa fa-phone"></i>(+92) 301 716 0701</p>
						<p><i class="fa fa-envelope"></i>www.rentallands.com</p>
						<p><i class="fa fa-clock-o"></i>Mon - Sat, 08 AM - 06 PM</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 footer-widget">
					<div class="double-menu-widget">
						<h5 class="fw-title">POPULAR PLACES</h5>
						<ul>
							<li><a href="">Khanewal</a></li>
							<li><a href="">Karachi</a></li>
							<li><a href="">KPK</a></li>
							<li><a href="">Attock</a></li>
							<li><a href="">Rawelpindi</a></li>
						</ul>
						<ul>
							<li><a href="">Sindh</a></li>
							<li><a href="">Islamabad</a></li>
							<li><a href="">Muree</a></li>
							<li><a href="">Kashmeer</a></li>
							<li><a href="">Sahiwal</a></li>
						</ul>
					</div>
				</div>
				
			</div>
			<div class="footer-bottom">
				<div class="footer-nav">
					<ul>
							<li><a href="<?php echo e(route('index')); ?>">Home</a></li>
							<li><a href="<?php echo e(route('blog')); ?>">About Us</a></li>
							<li><a href="<?php echo e(route('postpage')); ?>">Properties</a></li>
							<li><a href="<?php echo e(route('blog')); ?>">Blog</a></li>
							<li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
					</ul>
				</div>
				<span style="color:white">Developer : Abdullah Iftikhar BSCS 14F014</span>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->

<!-- Modal for Button-->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
    <!--Content-->
    <div class="modal-content card card-image" style="background-image: url('img/modelimg.jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>SIGN</strong> <a
              class="green-text font-weight-bold"><strong> UP</strong></a></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
        
          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <a href="<?php echo e(route('signupadvisor')); ?> "><button type="button" class="btn btn-success btn-block btn-rounded z-depth-1">Property Advisor</button></a>
            </div>
            <!--Grid column-->
          </div>
		  <!--Grid row-->
		    <!--Grid row-->
			<div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <a href="<?php echo e(route('signuptenet')); ?> "><button type="button" class="btn btn-success btn-block btn-rounded z-depth-1">Tenant</button></a>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-md-12">
              <p  class="font-small white-text d-flex justify-content-end">Have an account? <a href="#" id="loginform" class="green-text ml-1 font-weight-bold">
                  Log in</a></p>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->

        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal for Button -->
<!-- Modal Login -->	
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
	<!--Content-->
	<?php if(Session::has('msg')): ?>
			<span style="background-color:black; padding:10px; color:white; font-weight:bold; border-radius=10px;"><?php echo e(Session('msg')); ?></span>
	<?php endif; ?>
    <div class="modal-content card card-image" style="background-image: url('img/modelimg.jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>SIGN</strong> <a
              class="green-text font-weight-bold"><strong> In</strong></a></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
		  <form action="<?php echo e(route('login')); ?>" method="post" autocomplete="off">
		  <?php echo csrf_field(); ?>
		<?php if($errors->any()): ?>
			<div class="alert alert-danger alert-dismissable">
				<a class="panel-close close" data-dismiss="alert">×</a>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="glyphicon glyphicon-warning-sign">&nbsp</div><b><?php echo e($error); ?></b>
					<br />
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php endif; ?>
          <div class="md-form mb-5">
            <input type="email" name="email" id="Form-email5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-email5">Your email</label>
          </div>
          <div class="md-form pb-3">
            <input type="password" name="pass"  id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Your password</label>
          </div>
          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <button type="submit" class="btn btn-success btn-block btn-rounded z-depth-1">Sign in</button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
		  </form>
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-md-12">
              <p  class="font-small white-text d-flex justify-content-end">Create Account? <a href="#" id="createsignup" class="green-text ml-1 font-weight-bold">
                  Signup</a></p>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal for signin-->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	<script> 
		$('#registerbutton').on('click', function() {
    //  alert("hello"); 
     $('#register').modal('show');  
 });
 $('#logbutton').on('click', function() {
    //  alert("hello"); 
     $('#login').modal('show');  
 });
 $('#createsignup').on('click', function() {
	//  alert("hello"); 
	$('#login').modal('hide');
     $('#register').modal('show');  
 });
 $('#loginform').on('click', function() {
	//  alert("hello"); 
	$('#register').modal('hide');
     $('#login').modal('show');  
 });
	</script>


</body>
</html>