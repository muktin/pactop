<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\Role;
use App\Admin\Model\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RoleformValidation;

class RoleController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.role.create');
    }

	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
		DB::enableQueryLog();
		$permissionDatas=Permission::where('status',1)->orderBy('id', 'desc')->get();		
	    $roles=Role::all();
        return view('admin.role.list',['roles'=>$roles],['permissionDatas'=>$permissionDatas]);
    }

	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleformValidation $request)
    { 
	  $validated = $request->validated();
	  $role=new Role();
	  $role->roleName			 = $request->input('rname');
	  $role->instituteId		 = $request->input('rinstitute');
	  $role->status				 = $request->input('rstatus');
	  $role->created_by			 = Auth::user()->id;
	  $role->updated_by	 		 = Auth::user()->id;
	  
	  if($role->save()){
		  return redirect('admin/role/view')->with('sucess', 'Data has been added successfully!!');
	  }else{
		  return redirect('admin/role/view')->with('error', 'Data has been not added please try agian!!');
	  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $roles=Role::find($id);
         return view('admin.role.view',['roles'=>$roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $roles=Role::find($id);
         return view('admin.role.edit',['roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleformValidation $request, $id)
    {
      $role=Role::find($id);
	  $role->roleName			 = $request->input('rname');
	  $role->instituteId		 = $request->input('rinstitute');
	  $role->status				 = $request->input('rstatus');
	  $role->created_by			 = $role->created_by;
	  $role->updated_by	 		 = Auth::user()->id;

	  if($role->save()){
		  return redirect('admin/role/view')->with('sucess', 'Data has been updated successfully!!');
	  }else{
		  return redirect('admin/role/view')->with('error', 'Data has been not updated please try agian!!');
	  }
	 
	  //return redirect('admin/role/view');
	  //return view('admin.role.list',['roles'=>$roleData]);
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
    public function assignPermission(request $request)
    {
		// get all role id
		$permissionassign = $request->get('permissionassign');
		//print_r($permissionassign);die;
		// get role id from user selection
		$role_id = $request->input('role_id');
		// if condition check not empty 
		DB::table('role_permission')
			->where('role_id', $role_id)
			->update(['status' => 0]);
		if(!empty($permissionassign) && !empty($role_id)){
			// for all permission id and role id checked if not availanble in table then insert if available data in table then update.
			foreach($permissionassign as $key => $permissionId){
				if(strtolower($permissionId) =='on') {
					$permissionId=$key;
					//DB::enableQueryLog();
						$users = DB::table('role_permission')
							->select('status')
							->where('role_id', $role_id)
							->where('permission_id', $permissionId)
							->get();
							//$quries = DB::getQueryLog();
					if(count($users) > 0){						
						DB::table('role_permission')
							->where('role_id', $role_id)
							->where('permission_id', $permissionId)
							->update(['status' => 1]);
					}else{			
						 DB::table('role_permission')->insert([
							'role_id' => $role_id,
							'permission_id' => $permissionId,
							'status' => 1,
							'created_by' => Auth::user()->id,
							'updated_by' => Auth::user()->id
						]);
					} 			
				}
			}
			return redirect('admin/role/view')->with('sucess', 'Role has been mapped successfully!!');		
		}else{
			return redirect('admin/role/view')->with('error', 'You must check at least one permission!!!');
		}
	}
	
	// active or inactive function
	public function ajaxCallActiveDeactive(Request $request)
	{
		$role_id = $request->input('id');
		
		$RoleDetails=Role::find($role_id);
		
		if($RoleDetails->status == '1'){
			$status=0;
		}else{
			$status=1;
		}
		
		$RoleDetails->status			 = $status;
		$RoleDetails->updated_by		 = Auth::user()->id;
		if($RoleDetails->save()){
		  return redirect('admin/user/view')->with('sucess', 'Status has been updated successfully!!');
		}else{
		  return redirect('admin/user/view')->with('error', 'Status has been not updated please try agian!!');
		}		
	}
}
