<?php

namespace App\Http\Controllers\Advisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\JazzId;
use App\RegisterAdvisor;

class AdvisorDashboardController extends Controller
{
    //Dashboard post button link
    public function advisor_dashboard() {
        return view('Advisor.advisor_dashboard');
    }
    //Jazz Transection Id Proccess
    public function jazz_id(Request $req) {
        $rules=array(
            'jazz_no'=> 'required',
            'jazz_tra_id'=>'required|unique:jazz_ids,jazz_transection_id'
        );

        $message= array(
            'jazz_no'=>'Email is Requierd',
            'jazz_tra_id.required'=>"jazz transection id is requierd is required",
            'jazz_tra_id.unique'=>"This jazz transection id is already in use"
        );

        $validate = Validator::make($req->all(),$rules,$message);

        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {   
            $jazzid = new JazzId;
            $jazzid->jazz_transection_id = $req->get('jazz_tra_id');
            $jazzid->contact_no = $req->get('jazz_no');
            $user= Auth::user();
            $reg_adv = $user->advisorrelation;
            $reg_adv->jazzid()->save($jazzid);
            $reg_adv->is_recived = 1;
            $reg_adv->save();
            // $email = $req->get('email');
            // $pass = $req->get('pass');
             return redirect()->route('advisor_dashboard');
        }
    }
}
