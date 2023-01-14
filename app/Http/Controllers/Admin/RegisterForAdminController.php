<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\User;
Use App\RegisterAdmin;

class RegisterForAdminController extends Controller
{
    // admin Signup
    public function signup() {
        return view('Admin.registerforadmin');
    }
    // Register admin
    public function registerforadmin(Request $req) {
        
        $rules=array(
            'email'=>'required|email|unique:users,email',
            'fname'=>'required',
            'lname'=>'required',
            'pass'=>'required|min:1',
            'cpass'=>'required|min:1|same:pass',
            'phone'=>'required',
            'address'=>'required'
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
            'address.required'=>"address is Required",
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
            $user->role_id_fk = 1;
            $user->save();
            $user = User::orderBy('id','desc')->first();
            $adminreg = new RegisterAdmin;
            $adminreg->first_name = $req->get('fname');
            $adminreg->last_name = $req->get('lname');
            $adminreg->phone = $req->get('phone');
            $adminreg->address = $req->get('address');
            $user->adminrelation()->save($adminreg);
            return redirect()->route('home')->with('msg','Successfully register please login.');
        }
    }
    // Login admin
    public function loginforadmin(Request $req) {
        
    }
}
