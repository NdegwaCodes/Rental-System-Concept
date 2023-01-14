<?php

namespace App\Http\Controllers\Advisor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;
use \App\RegisterAdvisor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class RegisterForAdvisorController extends Controller
{
     // advisor Signup
     public function signup() {
        return view('Advisor.registerforadvisor');
    }
    // Register advisor
    public function registerforadvisor(Request $req) {
        $rules=array(
            'email'=>'required|email|unique:users,email',
            'fname'=>'required',
            'lname'=>'required',
            'pass'=>'required|min:1',
            'cpass'=>'required|min:1|same:pass',
            'phone'=>'required',
            'address'=>'required',
            'cnic'=>'required',
            'brand'=>'required',
            'ntn'=>'required'
        );
        $message= array(
            'email.required'=>"Email is required",
            'email.email'=>"Email is not in correct formate",
            'email.same'=>"The email does not match",
            'email.unique'=>"This email is already is in use",
            'pass.required'=>"Password is Required",
            'pass.min'=>"Password Must not be less then 6 Digits",
            'cpass.required'=>"Conferm Password is Required",
            'cpass.min'=>"Conferm Password Must not be less then 6 Digits",
            'fname.required'=>"First Name is Required",
            'lname.required'=>"Last Name is Required",
            'phone.required'=>"Country is Required",
            'address.required'=>"Address is Required",
            'cnic.required'=>"CNIC is Required",
            'brand.required'=>"Brands is Required",
            'ntn.required'=>"address is Required",
        );
        $validate = Validator::make($req->all(),$rules,$message);
        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {
            $user = new User;
            $user->email = $req->get('email');
            $user->password = bcrypt($req->get('pass'));
            $user->role_id_fk = 3;
            $user->save();
            $user = User::orderBy('id','desc')->first();
            $advisorreg = new Registeradvisor;
            $advisorreg->cnic = $req->get('cnic');
            $advisorreg->brand = $req->get('brand');
            $advisorreg->ntn = $req->get('ntn');
            $advisorreg->first_name = $req->get('fname');
            $advisorreg->last_name = $req->get('lname');
            $advisorreg->phone = $req->get('phone');
            $advisorreg->address = $req->get('address');
            $user->advisorrelation()->save($advisorreg);
            return redirect()->route('home')->with('msg','Successfully register Please login.');

        }
    }

    // Login for all user

    public function login(Request $req) {
        $rules=array(
            'email'=> 'required',
            'pass'=>'required',
            
        );

        $message= array(
            'email'=>'Email is Requierd',
           'pass.required' => 'Password is Required'

        );

        $validate = Validator::make($req->all(),$rules,$message);

        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        { 
            
            $email = $req->get('email');
            $pass = $req->get('pass');

            if(Auth::attempt(['email' =>  $email, 'password' => $pass,'role_id_fk' => 1]))
            {
                return redirect()->route('admin_dashboard');
            }
            else if(Auth::attempt(['email' =>  $email, 'password' => $pass,'role_id_fk' => 2]))
            {
                if(Auth::attempt(['email' =>  $email, 'password' => $pass,'role_id_fk' => 2 ]))
                {
                    return redirect()->route('tenet_dashboard_view');
                }
                else
                {
                    return redirect()->back()->with("msg","Your account is not active");
                }
            }
            else if(Auth::attempt(['email' =>  $email, 'password' => $pass,'role_id_fk' => 3]))
            {
                if(Auth::attempt(['email' =>  $email, 'password' => $pass,'role_id_fk' => 3 ]))
                {
                    return redirect()->route('advisor_dashboard');
                }
                else
                {
                    return redirect()->back()->with("msg","Your account is not active");
                }
            }
            else
            {
                return redirect()->back()->with("msg","Email or password is incorrect");
            }
        }
    }
}
