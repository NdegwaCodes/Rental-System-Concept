<?php

namespace App\Http\Controllers\Tenet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Tenet_Profile_Controller extends Controller
{
    public function tenet_profile() {
        return view('Tenet.tenet_profile');
    }
}
