<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\User;

class AdvisorUpgradationController extends Controller
{
    public function advisor_upgrade_view(){
        return view('Admin.advisor_upgradation');
    }
    public function admin_upgrade_to_advisor(Request $req) {
         $id =   User::find($req->ad_id)->advisorrelation;
            $id->is_upgrated=1;
            $id->save();
            return redirect()->back();
    }
}
