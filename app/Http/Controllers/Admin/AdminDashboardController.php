<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function admin_dashboard(){
        return view('Admin.admindashboard');
    }
    
}
