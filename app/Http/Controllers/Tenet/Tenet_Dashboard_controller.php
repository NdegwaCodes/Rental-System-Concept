<?php

namespace App\Http\Controllers\Tenet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Tenet_Dashboard_controller extends Controller
{
    public function dashboard_view() {
        return view('Tenet.tenet_dashboard');
    }
    
}
