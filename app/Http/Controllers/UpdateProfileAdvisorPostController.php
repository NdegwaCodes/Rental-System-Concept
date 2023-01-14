<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\AdvisorPost;
use Session;
use Illuminate\Support\Facades\File;
class UpdateProfileAdvisorPostController extends Controller
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
        //
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
            'fname'=>'required',
            'lname'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'cnic'=>'required',
            'brand'=>'required',
            'ntn'=>'required'
        );
        $message= array(
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
            $u = \App\User::find($id);
            $advisorreg = $u->advisorrelation;
            $advisorreg->cnic = $req->get('cnic');
            $advisorreg->brand = $req->get('brand');
            $advisorreg->ntn = $req->get('ntn');
            $advisorreg->first_name = $req->get('fname');
            $advisorreg->last_name = $req->get('lname');
            $advisorreg->phone = $req->get('phone');
            $advisorreg->address = $req->get('address');
            $advisorreg->save();
            return redirect()->back();

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
        //
    }
}
