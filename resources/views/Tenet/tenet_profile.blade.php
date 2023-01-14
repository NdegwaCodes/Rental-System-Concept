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
      <span style="color:white; margin-left:24px">{{Illuminate\Support\Facades\Auth::user()->tenetrelation->first_name}}</span> <span style="color:red">{{Illuminate\Support\Facades\Auth::user()->tenetrelation->last_name}}</span>
      </div>
    </div>
    <ul>
      <li ><a href="{{route('tenet_dashboard_view')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><a href="{{route('tenet_profile')}}"><i class="fa fa-user"></i> Profile</a></li>
      <li><a href="{{route('con',[Illuminate\Support\Facades\Auth::id()])}})}}"><i class="fa fa-comments"></i> Conversation</a></li>
      <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
  </div>
</section>
<section id="content">
  <div id="header">
    <div class="header-nav" style="background-color: black;">
      <div class="menu-button">
        <!-- <i class="fa fa-navicon"></i> -->
      </div>
      <div class="nav">
        <ul >
          <li class="nav-mail">
          @php

$u = Illuminate\Support\Facades\Auth::user();
 $shown = false;
 $total_messages = 0;
 $user_data = array();
 $time = array();
 $ids = array();
 $i = 0;

if (count($u->user_1_conversation) > 0) {
    $con = $u->user_1_conversation;
    foreach ($con as $c) {
        foreach ($c->message as $mess) {
            if ($mess->is_user_1_seen == 0) {
                $total_messages++;
                $user_data[$i] = $mess->message_text;
                $d = $mess->message_send_at;
                $ids[$i] = $mess->conversation->user_2_reference->id;
                $time[$i] = date('h:i', strtotime($d)) . ' ' . date('a', strtotime($d));
                $i++;
            }
        }
    }
} else {
    $con = $u->user_2_conversation;
    foreach ($con as $c) {
        foreach ($c->message as $mess) {
            if ($mess->is_user_2_seen == 0) {
                $total_messages++;
                $user_data[$i] = $mess->message_text;
                $d = $mess->message_send_at;
                $ids[$i] = $mess->conversation->user_1_reference->id;;
                $time[$i] = date('h:i', strtotime($d)) . ' ' . date('a', strtotime($d));
                $i++;
            }
        }
    }

}
        @endphp
            <a href="{{route('con',[Illuminate\Support\Facades\Auth::id()])}}"><div title="Masseges" class="font-icon"><i class="fa fa-envelope-o"></i><span style="float: left; margin-right: 5px; margin-top: 5px;" class="badge badge-light">{{$total_messages}}</span></div></a>
          </li>
          <li class="nav-calendar">
            <a href="#"><div title="Your Post" class="font-icon"><i class="fa fa-calendar"></i><span style="float: left; margin-right: 5px; margin-top: 6px;" class="badge badge-light">{{\App\AdvisorPost::all()->count()}}</span></div></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
<div class="content">
  <div class="content-header" >
      <h4 style="background-color:brown; color:white; padding:10px 20px; text-align:center;" >Profile</h4>
    </div>
    <div id="sortable">
        <h5>First Name: </h5><span>{{Illuminate\Support\Facades\Auth::user()->tenetrelation->first_name}}</span>
        <h5>Last Name: </h5><span>{{Illuminate\Support\Facades\Auth::user()->tenetrelation->last_name}}</span>
        <h5>Phone:  </h5><span>{{Illuminate\Support\Facades\Auth::user()->tenetrelation->phone}}</span>
        <h5>Address: </h5><span>{{Illuminate\Support\Facades\Auth::user()->tenetrelation->address}}</span>

       
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
              class="green-text font-weight-bold"><strong> Profile</strong></a></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
		  <form action="{{route('update_tenet.update',[Illuminate\Support\Facades\Auth::id()])}}" method="post" autocomplete="off">
		 @csrf
    @method('put')

    @if ($errors->any())
		<div class="alert alert-danger alert-dismissable">
			<a class="panel-close close" data-dismiss="alert">×</a>
			@foreach ($errors->all() as $error)
				<div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }}</b>
				<br />
			@endforeach
		</div>
    @endif

          <div class="md-form mb-5">
            <input type="text" name="fname" value="{{Illuminate\Support\Facades\Auth::user()->tenetrelation->first_name}}" id="Form-email5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-email5">First Name</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="lname" value="{{Illuminate\Support\Facades\Auth::user()->tenetrelation->last_name}}" id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Last Name</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="phone" value="{{Illuminate\Support\Facades\Auth::user()->tenetrelation->phone}}" id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Phone Number</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="address" value="{{Illuminate\Support\Facades\Auth::user()->tenetrelation->address}}" id="Form-pass5" class="form-control validate white-text">
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