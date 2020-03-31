<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\Role;
use App\Admin\Model\User;
use App\Admin\Model\Userdetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserformValidation;


class UserController extends Controller
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
       return view('admin.user.show');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UserformValidation $request)
    {
		try {
			  $validated = $request->validated();
			  $userDetails=new Userdetail();
			  $userDetails->firstName		 = $request->input('fname');
			  $userDetails->lastName		 = $request->input('lname');
			  $userDetails->email			 = $request->input('email');
			  $userDetails->username		 = $request->input('username');
			  $userDetails->password  		 = bcrypt($request->input('password'));
			  $userDetails->instituteId 	 = $request->input('instituteId');
			  $userDetails->addressId		 = $request->input('addressid');
			  $userDetails->titleId	 		 = $request->input('titleid');
			  $userDetails->gender	 		 = $request->input('gender');
			  $userDetails->status			 = $request->input('status');
			  $userDetails->created_by		 = Auth::user()->id;
			  $userDetails->updated_by		 = Auth::user()->id;
  
			  if($userDetails->save()){
				  return redirect('admin/user/view')->with('sucess', 'Data has been updated successfully!!');
			  }else{
				  return redirect('admin/user/view')->with('error', 'Data has been not updated please try agian!!');
			  }
		} catch (Exception $e) {
			report($e);

			return false;
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
		$roleData=Role::where('status',1)
				->orderBy('id', 'desc')
				 ->get();
				
		$data=array();
		foreach($roleData as $roleDatas){
			/*
			$users = DB::table('user_role')
								 ->select('status')
								 ->where('user_id', $user_id)
								 ->where('role_id', $roleId)
								 ->get();
			$data['roleData']=$roleDatas;
			$data['status']=0;

			*/	
		}
		// echo "<pre>";
			//print_r($data);	 
				 
				 
			// die; 	 
				 
		$userData=Userdetail::all();
		return view('admin.user.list',['users'=>$userData],['rolesData'=>$roleData]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userviewData=Userdetail::find($id);
        return view('admin.user.view',['users'=>$userviewData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $usereditData=Userdetail::find($id);
        return view('admin.user.edit',['users'=>$usereditData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UserformValidation $request, $id)
    {
	  $validated = $request->validated();
	  $userDetails=Userdetail::find($id);
	  $userDetails->firstName		 = $request->input('fname');
	  $userDetails->lastName		 = $request->input('lname');
	  $userDetails->email			 = $request->input('email');
	  //$userDetails->username		 = $request->input('username');
	  //$userDetails->password  	 = $request->input('password');
	  $userDetails->instituteId 	 = $request->input('instituteId');
	  $userDetails->addressId		 = $request->input('addressid');
	  $userDetails->titleId	 		 = $request->input('titleid');
	  $userDetails->gender	 		 = $request->input('gender');
	  $userDetails->status			 = $request->input('status');
	  $userDetails->created_by		 = $userDetails->created_by;
	  $userDetails->updated_by		 = Auth::user()->id;
	  if($userDetails->save()){
		  return redirect('admin/user/view')->with('sucess', 'Data has been updated successfully!!');
	  }else{
		  return redirect('admin/user/view')->with('error', 'Data has been not updated please try agian!!');
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

	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignRole(Request $request)
    {
		// get all role id
		$roleassign = $request->input('roleassign');
		// get user id with mapping multiple role id
		$user_id = $request->input('user_id');
		DB::table('user_role')
			->where('user_id', $user_id)
			->update(['status' => 0]);
		// if condition check not empty 
		if(!empty($roleassign) && !empty($user_id)){
				foreach($roleassign as $rolekey => $roleId){
					if(strtolower($roleId) =='on') {
						$roleId=$rolekey;
						$users = DB::table('user_role')
								 ->select('status')
								 ->where('user_id', $user_id)
								 ->where('role_id', $roleId)
								 ->get();
						if(count($users) > 0){
							 DB::table('user_role')
								->where('user_id', $user_id)
								->where('role_id', $roleId)
								->update(['status' => 1]);
							
						}else{
							 DB::table('user_role')->insert([
								'user_id' => $user_id,
								'role_id' => $roleId,
								'status' => 1,
								'created_by' => Auth::user()->id,
								'updated_by' => Auth::user()->id
							]);
						} 
								
					}
				}
			return redirect('admin/user/view')->with('sucess', 'User Role mapping has been mapped successfully!!');		
		}else{
			return redirect('admin/user/view')->with('error', 'You must check at least one role!!!');
		}
	}
	// active or inactive function
	public function ajaxCallActiveDeactive(Request $request)
	{
		$user_id = $request->input('id');
		$userDetails=Userdetail::find($user_id);
		if($userDetails->status == '1'){
			$status=0;
		}else{
			$status=1;
		}
		
		$userDetails->status			 = $status;
		$userDetails->updated_by		 = Auth::user()->id;
		if($userDetails->save()){
		  return redirect('admin/user/view')->with('sucess', 'Data has been updated successfully!!');
		}else{
		  return redirect('admin/user/view')->with('error', 'Data has been not updated please try agian!!');
		}		
	}
	

}
