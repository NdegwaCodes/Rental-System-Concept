<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvisorInfoController extends Controller
{
    public function advisor_info_view(){
        return view('Admin.advisor_info');
    }
}
