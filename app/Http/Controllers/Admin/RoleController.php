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
		$permissionassign = $request->input('permissionassign');
		//print_r($permissionassign);
		//die;
		if(!empty($permissionassign)){
		// get user id with mapping multiple role id
		$role_id = $request->input('role_id');
		//print_r($role_id);
		//die;
		
			foreach($permissionassign as $permissionId){
				
				$users = DB::table('role_permission')
						 ->select('role_id','permission_id')
						 ->where('role_id', $role_id)
						  ->where('permission_id', $permissionId)
						 ->get();
				if(count($users) > 0){
					 DB::table('role_permission')
					 	 ->where('role_id', $role_id)
						 ->where('permission_id', $permissionId)
					 	->delete();
					
				}else{
					 DB::table('role_permission')->insert([
						'role_id' => $role_id,
						'permission_id' => $permissionId,
						'created_by' => Auth::user()->id,
						'updated_by' => Auth::user()->id
					]);
				} 			
			}
		return redirect('admin/role/view')->with('sucess', 'User Role mapping has been mapped successfully!!');		
		}else{
			return redirect('admin/role/view')->with('sucess', 'Select minimum one role!!');
		}
	}
}
