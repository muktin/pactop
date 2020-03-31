@extends('admin/layouts/app')

@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <h4>Role List</h4>
                  <div class="card-header-action"> <a class="btn btn-outline-primary" href="{{ route('admin.role.create')}}">Add Role</a>
                  </div>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Role Name</th>
                            <th>Institute Name</th>
							 <th>Assign Permission</th>
							<th>Status</th>
                            <th>Created By</th>
							 <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($roles as $role)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->roleName }}</td>
							<td>{{ $role->instituteId }}</td>
							<td><div class="card-body">
								
								<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onClick="UserAssignPermissionID({{ $role->id }})">
								Assign
								</button>
							  </div></td>
							  @if($role->status =='1')
								<td>
									<a class="badge badge-success activeinactive" data-toggle="modal" data-target="#basicModal" onClick="RoleAjaxCallActiveDeactive({{ $role->id }})" >Active</a>
									</td>
								@else
								<td><a class="badge badge-danger activeinactive" data-toggle="modal" data-target="#basicModal" onClick="RoleAjaxCallActiveDeactive({{ $role->id }})" >Inactive</a></td>
								@endif 
							<td>{{ Auth::user()->name }}</td>
                            <td>{{ $role->created_at }}</td>
                            <td>
                             <a href="{{ route('admin.role.show', ['id' => $role->id]) }}"><i class="far fa-eye"></i></a>&nbsp;<a href="{{ route('admin.role.edit', ['id' => $role->id]) }}"><i class="far fa-edit"></i></a>&nbsp;<i class="fas fa-trash-alt"></i></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<!-- Modal with form -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog withtablemodelpermission" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">User Roles</h5>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="alerts"> </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
			   <form class="needs-validation" novalidate="" action="{{ route('admin.role.assignPermission') }}" method="POST" onsubmit="return CheckValidaCheckBoxPermission()">
				@csrf
				<input type="hidden" name="role_id"  id="mapping_role_id" value="">
			   <div class="row">
				  <div class="col-12">
					<div class="card">
					  <div class="card-body">
						<div class="table-responsive">
						  <table class="table table-striped" id="table-2">
							<thead>
							  <tr>
								<th>#</th>
								<th>Permission Name</th>
								<th>Permission Url</th>
								<th>Crated By</th>
								<th class="text-center pt-3"> Select All
								 &nbsp;&nbsp; <div class="custom-checkbox custom-checkbox-table custom-control">
									<input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
									  class="custom-control-input" id="checkbox-all">
									<label for="checkbox-all" class="custom-control-label">&nbsp;</label>
								  </div>
								</th>
							  </tr>
							</thead>
							<tbody>
							
							@if(!$permissionDatas->isEmpty())
							  @foreach($permissionDatas as $permissionData)
							  <tr>
							   <td>{{ $loop->iteration }}</td>
								<td>{{ $permissionData->permissionName }}</td>
								<td>{{ $permissionData->permissionUrl }}</td>
								<td>{{ Auth::user()->name }}</td>
								<td class="text-center pt-2">
								  <div class="custom-checkbox custom-control">
									<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input permissionassign"  id="checkbox-{{ $permissionData->id }}" name="permissionassign[{{ $permissionData->id }}]">
									<label for="checkbox-{{ $permissionData->id }}" class="custom-control-label">&nbsp;</label>
								  </div>
								</td>
								
							  </tr>
								@endforeach
							  @else
								<tr>
									<td>
									 Data not founds.
									</td>
								</tr>
							  @endif
							</tbody>
						  </table>
						</div>
					  </div>
					</div>
					<div class="card-footer">
						<button class="btn btn-primary">Permission Assign</button>
					</div>
				  </div>
				</div>
				</form>
            </div>
          </div>
        </div>
    @endsection