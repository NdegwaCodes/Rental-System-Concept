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
      <img  title="Profile Image" style="    width: 120px; height:100px; margin-bottom: 20px; margin-left:22px;" src="{{asset('profile')}}/{{Illuminate\Support\Facades\Auth::user()->profile_img}}" alt="">
      <a href="#" id="profile" style="padding-left: 40px;">Profile img</a>    <br>
      <span style="color:white; margin-left:24px">{{Illuminate\Support\Facades\Auth::user()->advisorrelation->first_name}}</span> <span style="color:red">{{Illuminate\Support\Facades\Auth::user()->advisorrelation->last_name}}</span>
      </div>
    </div>
    <ul>
      <li class="active"><a href="{{route('advisor_dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('advisor_post')}}"><i class="fa fa-folder-open"></i> My Post</a></li>
      <li><a href="{{route('advisor_profile')}}"><i class="fa fa-user"></i> Profile</a></li>
      <li><a href="{{route('con',[Illuminate\Support\Facades\Auth::id()])}}"><i class="fa fa-comments"></i> Conversation</a></li>
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
          <li class="nav-settings">
            <a href="#"><div title="Notification" class="font-icon"><i class="fa fa-tasks"></i><span style="float: left; margin-right: 5px; margin-top: 3px;" class="badge badge-light"></span></div></a>
          </li>
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
            <a href="#"><div title="Your Post" class="font-icon"><i class="fa fa-calendar"></i><span style="float: left; margin-right: 5px; margin-top: 6px;" class="badge badge-light">{{\Illuminate\Support\Facades\Auth::user()->advisorrelation->post->count()}}</span></div></a>
          </li>
          
        </ul>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="content-header" >
    @if(Illuminate\Support\Facades\Auth::user()->advisorrelation->is_recived==0) 
    <form action="{{route('jazz_id')}}" method="post">
        @csrf
        <h3 style="margin-bottom:20px;">please pay $10 for post authorty on this number +923017160701.</h3>
        @if ($errors->any())
          <div class="alert alert-danger alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a>
            @foreach ($errors->all() as $error)
              <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }}</b>
              <br />
            @endforeach
          </div>
        @endif
        <div class="md-form ">
          <input type="trext" name="jazz_no" id="Form-pass5" class="form-control validate white-text">
          <label data-error="wrong" data-success="right" for="Form-pass5">Put Your Jazz Number</label>
        </div>
        <div class="md-form ">
          <input type="text" name="jazz_tra_id" id="Form-pass5"  class="form-control validate white-text">
          <label data-error="wrong" data-success="right" for="Form-pass5">Put Your Jazz Transection Id</label>
        </div>
        <!--Grid row-->
        <div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-2">
              <button type="submit" class="btn btn-success btn-block btn-rounded z-depth-1">Send </button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
      </form>
    @elseif(Illuminate\Support\Facades\Auth::user()->advisorrelation->is_recived==1) 
      @if(Illuminate\Support\Facades\Auth::user()->advisorrelation->is_upgrated==0) 
    <div class="comment" >
      <h4 style="color:green" >  You can post after 1 hour's </h4>
    </div>
    @elseif(Illuminate\Support\Facades\Auth::user()->advisorrelation->is_upgrated==1)
       <div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-2">
              <button type="submit" id="post" class="btn btn-success btn-block btn-rounded z-depth-1">Post your property </button>
            </div>
            <!--Grid column-->
        </div>
          <!--Grid row-->
    @endif
    @endif
    </div>
    <div id="sortable">
      <h2>What is Lorem Ipsum?</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
          when an unknown printer took a galley of type and scrambled it to make a type specimen book.
           It has survived not only five centuries, but also the leap into electronic typesetting, 
           remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
            like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <h2>Why do we use it?</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
          when an unknown printer took a galley of type and scrambled it to make a type specimen book.
           It has survived not only five centuries, but also the leap into electronic typesetting, 
           remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
            like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <h2>Where does it come from?</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
          when an unknown printer took a galley of type and scrambled it to make a type specimen book.
           It has survived not only five centuries, but also the leap into electronic typesetting, 
           remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
            like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
  </div>
</section>

 <!-- Model For Post -->

	
  <div class="modal fade" id="postmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
	<!--Content-->
    <div class="modal-content card card-image" style="background-image: url('img/modelimg.jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Post</strong> <a
              class="green-text font-weight-bold"><strong> Now</strong></a></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
		  <form action="{{route('post')}}" method="post" autocomplete="off" enctype="multipart/form-data">
           @csrf
              @if ($errors->any())
                  <div class="alert alert-danger alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    @foreach ($errors->all() as $error)
                      <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }}</b>
                      <br />
                    @endforeach
                  </div>
                  @if(Session::has('msg'))
			              <span style="background-color:black; padding:10px; color:white; font-weight:bold; border-radius=10px;">{{Session('msg')}}</span>
              	  @endif
                @endif
          <div class="md-form pb-3">
            <input type="text" name="area"  id="Form-pass5" class="form-control validate white-text" placeholder="e.g 1500">
            <label data-error="wrong" data-success="right" for="Form-pass5">Area</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="garage" autocomplete="off" placeholder="e.g 5 " id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Garage</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="bath" autocomplete="off" placeholder="e.g 8 " id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Bathroom</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="bed"  autocomplete="off" placeholder="e.g 3 " id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Bedroom</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="ownername" autocomplete="off" placeholder="e.g Abdullah" id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Owner Name</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="rent" autocomplete="off" placeholder="e.g 15,000" id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Monthly Rent</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="city" autocomplete="off" placeholder="e.g Lahore" id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">City</label>
          </div>
          <div class="md-form pb-3">
            <select name="state" style="border-radius: 5px;border: none;padding: 10px 271px 10px 0;">
              <option value="Punjab">Punjab</option>
              <option value="Sindh">Sindh</option>
              <option value="Kpk">Kpk</option>
              <option value="Blochistan">Blochistan</option>
            </select> <br>
            <label data-error="wrong" data-success="right" for="Form-pass5"> Select State</label>
          </div>
          <div class="md-form pb-3">
            <input type="text" name="address" autocomplete="off" placeholder="e.g DHA Multan" id="Form-pass5" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Address</label>
          </div>
          <div class="md-form pb-3">
            <textarea type="text" rows="4" cols="50" autocomplete="off" name="des" placeholder="e.g This is very beautifull house." id="Form-pass5" class="form-control validate white-text"></textarea>
            <label data-error="wrong" data-success="right" for="Form-pass5">Description</label>
          </div>
          <div class="md-form pb-3">
            <input type="file" rows="4" cols="50" autocomplete="off" name="img" >
          </div>
       
          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <button type="submit"  class="btn btn-success btn-block btn-rounded z-depth-1">Post</button>
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
 <!-- Model For Post -->

<!-- Model For Profile img -->

	
  <div class="modal fade" id="profilepicture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
	<!--Content-->
    <div class="modal-content card card-image" style="background-image: url('img/modelimg.jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Profile</strong> <a
              class="green-text font-weight-bold"><strong> Picture</strong></a></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
		  <form action="{{route('profile_picture')}}" method="post" autocomplete="off" enctype="multipart/form-data">
      @csrf
          @if ($errors->any())
              <div class="alert alert-danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                @foreach ($errors->all() as $error)
                  <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }}</b>
                  <br />
                @endforeach
              </div>
            @endif
          <div class="md-form pb-3">
            <input type="file" autocomplete="off" name="img" >
          </div>
          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">
            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <button type="submit"  class="btn btn-success btn-block btn-rounded z-depth-1">Upload Profile Picture</button>
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
 <!-- Model For Post -->
<!--====== Javascripts & Jquery ======-->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	<!-- smodel script -->
<script>
  $('#post').on('click', function() {
    //  alert("hello"); 
     $('#postmodel').modal('show');  
 });
 $('#profile').on('click', function() {
    //  alert("hello"); 
     $('#profilepicture').modal('show');  
 });
</script>
@if(Session::has('msg'))
		 <script>
		 $('#postmodel').modal('show');  
		 </script>
	@endif

</body>
</html>