@extends('admin/layouts/app')
@section('main-content')
<div class="row">
	  <div class="col-12">
		<div class="card">
		  <div class="card-header">
		  <h4>User List</h4>
		  <div class="card-header-action"> <a class="btn btn-outline-primary" href="{{ route('admin.user.create') }}">Add User</a>
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
					<th>Name</th>
					<th>Email</th>
					<th>Institute Name</th>
					<th>Institute Name</th>
					<th>Address</th>
					<th>Gender</th>
					<th>Role Assign</th>
					<th>Status</th>
					<th>Created By</th>
					<th>Created At</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody>
				@if(!$users->isEmpty())
				  @foreach($users as $user)
				  <tr>
					<td>
					 {{ $loop->iteration }}
					</td>
					<td>{{ $user->firstName }} {{ $user->lastName }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->instituteId }}</td>
					<td>{{ $user->addressId }}</td>
					<td>{{ $user->titleId }}</td>
					@if($user->gender =='1')
						<td>Male</td>
					@elseif($user->gender =='2')
						<td>Female</td>
					@else
						<td>Other</td>
					@endif
					<td><div class="card-body">

						<button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal" onClick="UserAssignRoleID({{ $user->id }})">
						Assign
						</button>
					  </div>
					</td>
					@if($user->status =='1')
					<td>
						<button class="badge badge-success"  onClick="ActiveDeactive('7')" type="button">Active</button>
						</td>
					@else
					<td><div class="badge badge-danger">
						Not Active
						</div></td>
					@endif 
					<td>{{ Auth::user()->name }}</td>
					<td>{{ $user->created_at }}</td>
					<td>
					 <a href="{{ route('admin.user.show', ['id' => $user->id]) }}"><i class="far fa-eye"></i></a>&nbsp;<a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"><i class="far fa-edit"></i></a>&nbsp;<i class="fas fa-trash-alt"></i></td>
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
	  </div>
	</div>
			
<!-- Modal with form -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog withtablemodel" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="formModal">User Roles</h5>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="alerts"> </div>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
		<form class="needs-validation" novalidate="" action="{{ route('admin.user.assignRole') }}" method="POST" onsubmit="return CheckValidaRoleCheckBox()">
			 @csrf
		<input type="hidden" name="user_id"  id="mapping_user_id" value="">
	   <div class="row">
		  <div class="col-12">
			<div class="card">
			  <div class="card-body">
				<div class="table-responsive">
				  <table class="table table-striped" id="table-2">
					<thead>
					  <tr>
						<th>#</th>
						<th>Role Name</th>
						<th>Crated By</th>
						<th class="text-center pt-3">Select All
						  <div class="custom-checkbox custom-checkbox-table custom-control">
							<input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"  id="checkbox-all"><label for="checkbox-all" class="custom-control-label">&nbsp;</label>
						  </div>
						</th>
					  </tr>
					</thead>
					<tbody>
					
					@if(!$rolesData->isEmpty())
					  @foreach($rolesData as $rolesDatas)
					  <tr>
					   <td>{{ $loop->iteration }}</td>
						<td>{{ $rolesDatas->roleName }}</td>
						<td>{{ Auth::user()->name }}</td>
						<td class="text-center pt-2">
						  <div class="custom-checkbox custom-control">
							<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input roleassign" id="checkbox-{{ $rolesDatas->id }}" name="roleassign[{{ $rolesDatas->id }}]" >
							<label for="checkbox-{{ $rolesDatas->id }}" class="custom-control-label">&nbsp;</label>
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
				<button class="btn btn-primary">Role Assign</button>
			</div>
		  </div>
		</div>
	   </form>
	</div>
  </div>
</div>	
@endsection