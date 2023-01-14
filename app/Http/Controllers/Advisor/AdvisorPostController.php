<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Advisor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\RegisterAdvisor;
use App\AdvisorPost;

class AdvisorPostController extends Controller
{
    // dashboard post button link
    public function advisor_post() {
        return view('Advisor.advisorpost')->with('update_post',null);
    }
    // user post
    public function post(Request $req) {
        $rules=array(
            'area'=>'required',
            'garage'=>'required',
            'bath'=>'required',
            'bed'=>'required',
            'ownername'=>'required',
            'rent'=>'required',
            'city'=>'required',
            'state'=>'required',
            'address'=>'required',
            'des'=>'required',
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        );
        $message= array(
            'area.required'=>"Area is required",
            'garage.required'=>"Garag is Required",
            'bath.required'=>"Bathrooms is Required ",
            'bed.required'=>"Bedrooms is Required",
            'ownername.required'=>"Owner name is Required",
            'rent.required'=>"Rent value is Required",
            'city'=>'City is required',
            'state'=>'State is required',
            'address.required'=>"Address is Required",
            'des.required'=>"Description is Required",
            'img.required'=>"image is Required",
        );
        $validate = Validator::make($req->all(),$rules,$message);
        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors())->with('msg','Please Fill Again');
        }
        else
        {
            $user= Auth::user();
            $reg_post = $user->advisorrelation;
            $p_img="";

            if($img=$req->file('img'))
            {
                $p_img= (time() . '_' . $img->getClientOriginalName());
                $img->move('sourceimg/post',$p_img);
            }
            $post = new AdvisorPost;
            $post ->area = $req->get('area');
            $post ->garage = $req->get('garage');
            $post ->bathroom = $req->get('bath');
            $post ->bedroom = $req->get('bed');
            $post ->ownername = $req->get('ownername');
            $post ->rent = $req->get('rent');
            $post ->city = $req->get('city');
            $post ->state = $req->get('state');
            $post ->address = $req->get('address');
            $post ->description = $req->get('des');
            $post->image = $p_img;
            $user= Auth::user();
            $reg_post = $user->advisorrelation;
            $reg_post->post()->save($post);
            return redirect()->route('advisor_post');
        }
    }
    
}
