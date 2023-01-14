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
      <span style="color:white; margin-left:24px"> {{Illuminate\Support\Facades\Auth::user()->advisorrelation->first_name}}</span> <span style="color:red">{{Illuminate\Support\Facades\Auth::user()->advisorrelation->last_name}}</span>
      </div>
    </div>
    <ul>
      <li ><a href="{{route('advisor_dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('advisor_post')}}"><i class="fa fa-folder-open"></i> My Post</a></li>
      <li><a href="{{route('advisor_profile')}}"><i class="fa fa-user"></i> Profile</a></li>
      <li class="active"><a href="{{route('con',[Illuminate\Support\Facades\Auth::id()])}}"><i class="fa fa-comments"></i> Conversation</a></li>
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
      abdullah iftikhar
    </div>
    <div id="sortable">
     Conversation
    </div>
  </div>
</section>

</body>
</html>