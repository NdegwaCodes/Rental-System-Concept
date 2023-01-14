<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Advisor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvisorProfileController extends Controller
{
    public function advisor_profile() {
        return view('Advisor.advisorprofile');
    }
}
