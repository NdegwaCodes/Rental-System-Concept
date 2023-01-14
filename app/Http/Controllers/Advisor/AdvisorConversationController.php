<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Advisor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvisorConversationController extends Controller
{
     public  function advisor_conversation() {
         return view('Advisor.advisorcoversation');
     }
}
