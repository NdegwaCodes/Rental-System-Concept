<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TenetInfoController extends Controller
{
    public function tenet_info_view(){
        return view('Admin.tenet_info');
    }
}
