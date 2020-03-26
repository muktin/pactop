<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\Institute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InstituteController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return view('admin.institute.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('admin.institute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $instituteDetails						 =new Institute();
	  $instituteDetails->name 				 = $request->input('iname');
	  $instituteDetails->code 				 = $request->input('code');
	  $instituteDetails->addressId 			 = $request->input('iaddress');
	  $instituteDetails->instituteTypeId 	 = $request->input('inttype');
	  $instituteDetails->status				 = $request->input('istatus');
	  $instituteDetails->created_by			 = Auth::user()->id;
	  $instituteDetails->updated_by			 = Auth::user()->id;
	  
	  if($instituteDetails->save()){
		  return redirect('admin/institute/view')->with('sucess', 'Data has been added successfully!!');
	  }else{
		  return redirect('admin/institute/view')->with('error', 'Data has been not added please try agian!!');
	  }
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
       $roles=Institute::all();
	  // echo"<pre>";
	   
	  // print_r($roles);die;
       return view('admin.institute.list',['institutes'=>$roles]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institutes=Institute::find($id);
        return view('admin.institute.view',['institutes'=>$institutes]);
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $institutes=Institute::find($id);
        return view('admin.institute.edit',['institutes'=>$institutes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	  $instituteDetails						 = Institute::find($id);
	  $instituteDetails->name 				 = $request->input('iname');
	  $instituteDetails->code 				 = $request->input('code');
	  $instituteDetails->addressId 			 = $request->input('iaddress');
	  $instituteDetails->instituteTypeId 	 = $request->input('inttype');
	  $instituteDetails->status				 = $request->input('istatus');
	  $instituteDetails->created_by			 = $instituteDetails->created_by;
	  $instituteDetails->updated_by			 = Auth::user()->id;
	  if($instituteDetails->save()){
		  return redirect('admin/institute/view')->with('sucess', 'Data has been updated successfully!!');
	  }else{
		  return redirect('admin/institute/view')->with('error', 'Data has been not updated please try agian!!');
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
