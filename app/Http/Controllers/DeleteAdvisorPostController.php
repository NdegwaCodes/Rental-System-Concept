<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\AdvisorPost;
use Session;
use Illuminate\Support\Facades\File;
class DeleteAdvisorPostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=AdvisorPost::find($id);
        return redirect()->back()->with('update_post',$post)->with('open','open');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    { 
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
            'img'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        );
        $message= array(
            'area.required'=>"Area is required",
            'garage.required'=>"Garag is Required",
            'bath.required'=>"Bathrooms is Required ",
            'bed.required'=>"Bedrooms is Required",
            'ownername.required'=>"Owner name is Required",
            'rent.required'=>"Rent value is Required",
            'city.required'=>"City is Required",
            'state.required'=>"State is Required",
            'address.required'=>"Address is Required",
        );
        $validate = Validator::make($req->all(),$rules,$message);

        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors())->with('msg','Please Fill Again');
        }
        else
        {
            
        $reg_post =  AdvisorPost::find($id);
  
           
            if($img=$req->file('img'))
            {
                $old_img='sourceimg/post'.$reg_post->image;
                File::delete($old_img);
              
                $p_img= (time() . '_' . $img->getClientOriginalName());
                $img->move('sourceimg/post',$p_img);
                $reg_post->image = $p_img;
            }
            $reg_post ->area = $req->get('area');
            $reg_post ->garage = $req->get('garage');
            $reg_post ->bathroom = $req->get('bath');
            $reg_post ->bedroom = $req->get('bed');
            $reg_post ->ownername = $req->get('ownername');
            $reg_post ->rent = $req->get('rent');
            $reg_post ->city = $req->get('city');
            $reg_post ->state = $req->get('state');
            $reg_post ->address = $req->get('address');
            $reg_post ->description = $req->get('des');
           
            $reg_post->save();
            return redirect()->route('advisor_post');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdvisorPost::find($id)->delete();
        return redirect()->route('advisor_post');
        
    }
}
