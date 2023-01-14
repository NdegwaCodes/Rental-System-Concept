<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online House Rental</title>
    <!-- Stylesheets -->
    <!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/animate.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
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
  <div class="white-label" style="background-color: black;">
  </div> 
  <div id="sidebar-nav" style="background-color: black;"> 
    <div class="col-md-12" style="margin-top:30px; padding-bottom:30px;">
    <div class="profileimg">
      <a href="#" ><img  title="Profile Image" style="    width: 120px; height:100px; margin-bottom: 20px; margin-left:22px;" src="{{asset('profile')}}/{{Illuminate\Support\Facades\Auth::user()->profile_img}}" alt=""></a>
      <span style="color:white; margin-left:24px">{{Illuminate\Support\Facades\Auth::user()->adminrelation->first_name}}</span> <span style="color:red">{{Illuminate\Support\Facades\Auth::user()->adminrelation->last_name}}</span>
      </div>
    </div>
    <ul>
      <li ><a href="{{route('admin_dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li ><a href="{{route('tenet_info')}}"><i class="fa fa-info"></i> Tenant Info</a></li>
      <li ><a href="{{route('advisor_info')}}"><i class="fa fa-info"></i> Advisor Info</a></li>
      <li ><a href="{{route('advisor_upgrade')}}"><i class="fa fa-thumbs-up"></i> Advisor Upgradation</a></li>
      <li class="active"><a href="{{route('admin_profile')}}"><i class="fa fa-user"></i> Profile</a></li>
      <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
  </div>
</section>
<section id="content">
  <div id="header">
    <div class="header-nav" style="background-color: blue;">
      <div class="menu-button">
        <!-- <i class="fa fa-navicon"></i> -->
      </div>
      <div class="nav">
        <ul >
          <li class="nav-settings">
          @php
            $count = \App\RegisterAdvisor::all()->where('is_recived','=',1)->where('is_upgrated','=',0)->count();
          @endphp
            <a href="{{route('advisor_upgrade')}}"><div title="Notification" class="font-icon"><i class="fa fa-bell-o" aria-hidden="true"></i><span style="float: left; margin-right: 5px; margin-top: 3px;" class="badge badge-light">{{$count}}</span></div></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
<div class="content">
  <div id="sortable">
        <h5>First Name: </h5><span>{{Illuminate\Support\Facades\Auth::user()->adminrelation->first_name}}</span>
        <h5>Last Name: </h5><span>{{Illuminate\Support\Facades\Auth::user()->adminrelation->last_name}}</span>
        <h5>Phone:  </h5><span>{{Illuminate\Support\Facades\Auth::user()->adminrelation->phone}}</span>
        <h5>Address: </h5><span>{{Illuminate\Support\Facades\Auth::user()->adminrelation->address}}</span>
          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">
              <!--Grid column-->
              <div class="text-center mb-3 col-md-2">
                <button type="button" id="update_button" class="btn btn-success btn-block btn-rounded z-depth-1">Edit</button>
              </div>
              <!--Grid column-->
          </div>
          <!--Grid row--> 
  </div>
</div>
<!-- Modal Login -->

	
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
	<!--Content-->

    <div class="modal-content card card-image" style="background-image: url('img/login.jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Update</strong> <a
              class="green-text font-weight-bold"><strong> Admin Profile</strong></a></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
		  <form action="{{route('update_admin_profile.update',[Illuminate\Support\Facades\Auth::id()])}}" method="post" autocomplete="">
		 @csrf
     @method('put')
          <div class="md-form mb-5">
            <input type="text" name="fname" value="{{Illuminate\Support\Facades\Auth::user()->adminrelation->first_name}}" id="Form-email5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-email5">First Name</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="lname" value="{{Illuminate\Support\Facades\Auth::user()->adminrelation->last_name}}" id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Last Name</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="phone" value="{{Illuminate\Support\Facades\Auth::user()->adminrelation->phone}}" id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Phone Number</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="address" value="{{Illuminate\Support\Facades\Auth::user()->adminrelation->address}}" id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Address</label>
          </div>
          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <button type="submit" class="btn btn-success btn-block btn-rounded z-depth-1">Update</button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
		  </form>
         
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal for signin-->

<!--====== Javascripts & Jquery ======-->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	<!-- smodel script -->
<script> 
		$('#update_button').on('click', function() {
    //  alert("hello"); 
     $('#login').modal('show');  
      });
</script>
</body>
</html>