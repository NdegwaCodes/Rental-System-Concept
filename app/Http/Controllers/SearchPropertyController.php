<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class SearchPropertyController extends Controller
{
    public function search_property(Request $req)
    {
       // $post = \App\AdvisorPost::Where('state','=',$req->state)->Where('city','=',$req->c_name)->whereBetween('rent', [$req->rent-3000, $req->rent+3000])->get();

        if($req->rent != null && $req->c_name != null && $req->state!=null)
        {
            $post = \App\AdvisorPost::Where('rent','<=',$req->rent)->Where('city','=',$req->c_name)->whereBetween('rent', [$req->rent-3000, $req->rent+3000])->get();
            // dd($post);
        }
            elseif($req->rent != null && $req->c_name==null && $req->state==null)
            {
                $post = \App\AdvisorPost::whereBetween('rent', [$req->rent-3000, $req->rent+3000])->get();
                 
            }

            elseif($req->rent == null && $req->c_name!=null && $req->state==null)
            {
                $post = \App\AdvisorPost::where('city', '=' , $req->c_name)->get();
            
            }

            elseif($req->rent == null && $req->c_name==null && $req->state!=null)
            {
                $post = \App\AdvisorPost::where('state', '=' , $req->state)->get();
            }

            elseif($req->rent != null && $req->c_name!=null && $req->state==null)
            {
                $post = \App\AdvisorPost::Where('city','=',$req->c_name)->whereBetween('rent', [$req->rent-3000, $req->rent+3000])->get();
            }

           elseif($req->rent != null && $req->c_name==null && $req->state!=null)
            {
                $post = \App\AdvisorPost::Where('state','=',$req->state)->whereBetween('rent', [$req->rent-3000, $req->rent+3000])->get();
            }

            elseif($req->rent == null && $req->c_name!=null && $req->state!=null)
            {
                $post = \App\AdvisorPost::Where('city','=',$req->c_name)->Where('state','=',$req->state)->get();
            }
            // elseif($req->has('c_name'))
            // {
            //     $post = \App\AdvisorPost::Where('city','=',$req->c_name)->get();
            // }
            // elseif($req->has('state'))
            // {
            //     $post = \App\AdvisorPost::Where('state','=',$req->state)->get();
            // }

             return view('postpage')->with('post',$post);

    }
    public function profile_picture(Request $req) {
        $rules=array(
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        );
        $message= array(
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

            if($img=$req->file('img'))
            {
                if($user->profile_img != null)
                {
                $old_img='profile'.$user->profile_img;
                File::delete($old_img);
                }
                $p_img= (time() . '_' . $img->getClientOriginalName());
                $img->move('profile',$p_img);
                $user->profile_img = $p_img;
            }

            $user->save();

            return redirect()->back();
        }
    }
}
