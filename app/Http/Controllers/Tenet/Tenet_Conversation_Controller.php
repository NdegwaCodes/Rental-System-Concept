<?php

namespace App\Http\Controllers\Tenet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Tenet_Conversation_Controller extends Controller
{
    public function tenet_conversation() {
        return view('Tenet.tenet_conversation');
    }
}
