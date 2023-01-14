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
body,html
{
  font-family:tahoma;
  line-height:30px;
  padding:0px;
  margin:0px;
}
.header
{
  font-size:26px;
  margin:0 auto;
  text-align:center;
  color:#9F6905;
  font-weight:lighter;
  background-color:#f0f0f0;
  height:50px;
  line-height:50px;
  border-bottom:1px solid #9F6905;
}
.container
{
  width:450px;
  cursor:default;
  margin:20px auto;
  max-height:350px;
  overflow-y:scroll;
}
.container::-webkit-scrollbar 
{
width: 3px;
max-width: 3px;
height: auto;
max-height: 8px;
}
.container::-webkit-scrollbar-thumb 
{
background: #f0f0f0;
border-radius: 5px;
max-width: 3px;
}
.container::-webkit-scrollbar-track {
background: #9F6905;
  border-radius:5px;
}
.Area
{
  margin:0 auto;
  width:400px;
  background-color:rgba(240, 240, 240, 0.2);
  display:table;
  padding:5px;
  border-radius:5px;
  margin-bottom:10px;
}
.L
{
  float:left;
}
img
{
  width:50px;
  height:50px;
  border-radius:50%;
  border:2px solid #f0f0ff;
  padding:5px;    
}
img:hover
{
    -moz-box-shadow: 0 5px 5px rgba(223, 120, 8, 1);
-webkit-box-shadow: 0 5px 5px rgba(223, 120, 8, 1);
box-shadow: 0 5px 5px rgba(223, 120, 8, 1);
       -webkit-transition: all 1.5s;
    -moz-transition: all 1.5s;
    transition: all 1.5s;
  cursor:pointer;
}
.R
{
    float:right;
}
.text
{
  color: #a4a4a4;
font-family: tahoma;
font-size: 13px;
  font-weight:lighter;
line-height: 30px;
  width:300px;
  border:1px solid #f0f0f0;
  background-color:rgba(255, 255, 255, 0.6);
  margin-top:10px;
  border-radius:5px;
  padding:5px;  
}
.Area textarea
{
  font-size:12px;
  width:90%;
  max-width:90%;
  min-width:90%;
  padding:5%;
  border-radius:5px;
  border:1px solid #f0f0f1;
  max-height:50px;
  height:50px;
  min-height:50px;
  background-color:#333;
  color:#fff;
  outline:none;
  border:1px solid transparent;
  resize:none;
}
.Area textarea:focus
{
  color:#333;
  border:1px solid #ccc;
     -webkit-transition: all 1.5s;
    -moz-transition: all 1.5s;
    transition: all 1.5s;
  background-color:#fff;
}
.Area .note
{
  color:#9F6905;
  font-size:10px;
}
.R .tooltip
{
  font-size:10px;
  position:absolute;
  background-color:#fff;
  padding:5px;
  border-radius:5px;
  border:2px solid #9F6905;
  margin-left:70px;
  margin-top:-70px;
  display:none;
  color:#545454;
}
.R .tooltip:before
{
    content: '';
    position: absolute;
    width: 1px;
    height: 1px;
    border: 5px solid transparent;
    border-right-color: #9F6905;
    margin-top: 10px;
    margin-left: -17px;
}
.R:hover .tooltip
{
  display:block;
}

.L .tooltip
{
  font-size:10px;
  position:absolute;
  background-color:#fff;
  padding:5px;
  border-radius:5px;
  border:2px solid #9F6905;
  margin-left:70px;
  margin-top:-70px;
  display:none;  
  color:#545454;
}
.L .tooltip:before
{
    content: '';
    position: absolute;
    width: 1px;
    height: 1px;
    border: 5px solid transparent;
    border-right-color: #9F6905;
    margin-top: 10px;
    margin-left: -17px;
}
.L:hover .tooltip
{
  display:block;
}
a
{
  text-decoration:none;
}


.Area input[type=button]
{
  font-size:12px;
  padding:5px;
  border-radius:5px;
  border:1px solid #f0f0f1;
  background-color:#333;
  color:#fff;
  outline:none;
  border:1px solid transparent;
  float:left;
}
.Area input[type=button]:hover
{
  color:#fff;
  border:1px solid #ccc;
     -webkit-transition: all 1.5s;
    -moz-transition: all 1.5s;
    transition: all 1.5s;
  background-color:#9F6905;
} 
.validation
{
  float:left;
  background-color:#ccc;
  border-radius:5px;
  padding:5px;
  font-size:12px;
  line-height:14px;
  height:0px;
  margin-left:5px;
  display:none;
}
br
{
  clear:both;
  height:20px;
}
    </style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<section id="sidebar"> 
  <div class="white-label" style="background-color: black;">
  </div> 
  <div id="sidebar-nav" style="background-color: black;"> 
    <div class="col-md-12" style="margin-top:30px; padding-bottom:30px;">
    <div class="profileimg">
      <a href="#" ><img  title="Profile Image" style="    width: 120px; height:100px; margin-bottom: 20px; margin-left:22px;" src="{{asset('profile')}}/{{Illuminate\Support\Facades\Auth::user()->profile_img}}" alt=""></a>
      @if(Illuminate\Support\Facades\Auth::user()->role_id_fk == 2)
      <span style="color:white; margin-left:24px">{{Illuminate\Support\Facades\Auth::user()->tenetrelation->first_name}}</span> <span style="color:red">{{Illuminate\Support\Facades\Auth::user()->tenetrelation->last_name}}</span>
      @elseif(Illuminate\Support\Facades\Auth::user()->role_id_fk == 3)
      <span style="color:white; margin-left:24px">{{Illuminate\Support\Facades\Auth::user()->advisorrelation->first_name}}</span> <span style="color:red">{{Illuminate\Support\Facades\Auth::user()->advisorrelation->last_name}}</span>
      @endif
      </div>
    </div>
    <ul>
    @if(Illuminate\Support\Facades\Auth::user()->role_id_fk == 2)
      <li ><a href="{{route('tenet_dashboard_view')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('tenet_profile')}}"><i class="fa fa-user"></i> Profile</a></li>
      <li><a href="{{route('con',[Illuminate\Support\Facades\Auth::id()])}}"><i class="fa fa-comments"></i> Conversation</a></li>
      <li class="active"><a href="#"><i class="fa fa-comments"></i> Inbox</a></li>
      <li><a href="{{route('home')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
    @elseif(Illuminate\Support\Facades\Auth::user()->role_id_fk == 3)
      <li class="active"><a href="{{route('advisor_dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('advisor_post')}}"><i class="fa fa-folder-open"></i> My Post</a></li>
      <li><a href="{{route('advisor_profile')}}"><i class="fa fa-user"></i> Profile</a></li>
      <li><a href="{{route('con',[Illuminate\Support\Facades\Auth::id()])}}"><i class="fa fa-comments"></i> Conversation</a></li>
      <li class="active"><a href="#"><i class="fa fa-comments"></i> Inbox</a></li>
      <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
    @endif
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
        @if(Illuminate\Support\Facades\Auth::user()->role_id_fk == 2)
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
          @elseif(Illuminate\Support\Facades\Auth::user()->role_id_fk == 3)
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
          @endif
        </ul>
      </div>
    </div>
  </div>
  <div class="content">
<div class="header">Inbox</div>
<div class="container" >
  <div id="chat-window">
  </div>
  
    <div class="Area">
    <textarea placeholder="Participate in coversation" id="msg"></textarea>
      <br/><br/>
      <input type="button" onclick="clickX()" value="SEND"/>
    
      <br/>
  </div>
</div>
</div>

<!--====== Javascripts & Jquery ======-->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	<!-- smodel script -->
<script>
var username = "{{\Illuminate\Support\Facades\Auth::id()}}";
    function clickX()
        {
          sendMessage();
        }


         function sendMessage() {

var dt = new Date();
var time = dt.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })
var month = dt.toLocaleString("en-us", {month: "long"});
var date = dt.getDate() + " " + month;
var msg = $('#msg').val();
$('#msg').val('');
if(msg != "")
{

    $('#chat-window').append(
    '<div class="Area"> <div class="R"><a href="https://twitter.com/MariamMassadeh"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSxU35znsBhAWQd5BouLIVtH1P4WNa0JZ_XXpyViHOIARbM2igbNgC6_kp5"/><div class="tooltip">Mariam Massadeh - 23 Years<br/>Computer Engineer<br/>Jordan</div></a></div><div class="text L textL">'+msg+'<span style="float:right;">'+date+'    |    '+time+'</span></div></div>'
    
    );
    
    
}

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "{{route('sendmessage')}}",
        data: {id1:username,id2:{{$id}},message:msg,},
        success: function (data) {
            // notTyping();
            console.log(data);
        },
});
}

function retrieveUnSeenChatMessages()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('readunseenmessage')}}",
                data: {id1:username,id2:{{$id}}},
                success: function (data) {

                    console.log(data);
                    if (data.length > 0)
                    {
                        for(var i =0;i<data[0].length;i++)
                        {
                            if(username == data[1][i])
                            {
                                // '+time+'    |    '+date+'

                                $('#chat-window').append('<div class="Area"> <div class="R"><a href="https://twitter.com/MariamMassadeh"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSxU35znsBhAWQd5BouLIVtH1P4WNa0JZ_XXpyViHOIARbM2igbNgC6_kp5"/><div class="tooltip">Mariam Massadeh - 23 Years<br/>Computer Engineer<br/>Jordan</div></a></div><div class="text L textL">'+data[0][i]+'<span style="float:right;">'+data[1][i]+'    |    '+data[2][i]+'</span></div></div>');
                            }
                            else
                            {
                              $('#chat-window').append('<div class="Area"><div class="L"><a href="https://twitter.com/SamiMassadeh"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrEyVlaWx0_FK_sz86j-CnUC_pfEqw_Xq_xZUm5CMIyEI_-X2hRUpx1BHL"/><div class="tooltip">Sami Massadeh - 28 Years<br/>Doctor <br/>Jordan</div></a></div><div class="text R textR">'+data[0][i]+'  <span style="float:right;">'+data[1][i]+'    |    '+data[2][i]+'</span></div></div>');

                            }

                        }
                        var messageBody = document.querySelector('#chat-window');
                        messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
                    }
                },
            });
        }

 function retrieveChatMessages(numberofmessages)
        {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('readusermessage')}}",
                data: {id1:username,id2:{{$id}},numberofmessages:numberofmessages},
                success: function (data) {

                    console.log("Data is This " + data);
                    $('#chat-window').empty();
                    if (data.length > 0)
                    {
                        for(var i =0;i<data[0].length;i++)
                        {
                            if(username == data[1][i])
                            {
                              $('#chat-window').append('<div class="Area"> <div class="R"><a href="https://twitter.com/MariamMassadeh"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSxU35znsBhAWQd5BouLIVtH1P4WNa0JZ_XXpyViHOIARbM2igbNgC6_kp5"/><div class="tooltip">Mariam Massadeh - 23 Years<br/>Computer Engineer<br/>Jordan</div></a></div><div class="text L textL">'+data[0][i]+'<span style="float:right;">'+data[2][i]+'    |    '+data[3][i]+'</span></div></div>');
                           
                            }
                            else
                            {
                              $('#chat-window').append('<div class="Area"><div class="L"><a href="https://twitter.com/SamiMassadeh"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrEyVlaWx0_FK_sz86j-CnUC_pfEqw_Xq_xZUm5CMIyEI_-X2hRUpx1BHL"/><div class="tooltip">Sami Massadeh - 28 Years<br/>Doctor <br/>Jordan</div></a></div><div class="text R textR">'+data[0][i]+'  <span style="float:right;">'+data[2][i]+'    |    '+data[3][i]+'</span></div></div>');

                            }

                        }
                    }
                },
            });
        }

        retrieveChatMessages(1000);
pullData();
function pullData()
        {
            retrieveUnSeenChatMessages();
            setTimeout(pullData,3000);
console.log("This is in Pull Data");
        }
</script>
</body>
</html>