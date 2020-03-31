@extends('admin/layouts/app')

@section('main-content')
			<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <h4>User List</h4>
                  <div class="card-header-action"> <a class="btn btn-outline-primary" href="{{ route('admin.institute.create')}}">Add Institute</a>
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
                            <th>Code</th>
                            <th>Address ID</th>
                            <th>Institute Name</th>
							<th>Status</th>
                            <th>Created By</th>
							<th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($institutes as $institute)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $institute->name }} </td>
							<td>{{ $institute->code }} </td>
							<td>{{ $institute->addressId }} </td>
							<td>{{ $institute->instituteTypeId }} </td>
							@if($institute->status =='1')
							<td>
								<a class="badge badge-success activeinactive" data-toggle="modal" data-target="#basicModal" onClick="InstituteAjaxCallActiveDeactive({{ $institute->id }})" >Active</a>
								</td>
							@else
							<td><a class="badge badge-danger activeinactive" data-toggle="modal" data-target="#basicModal" onClick="InstituteAjaxCallActiveDeactive({{ $institute->id }})" >Inactive</a></td>
							@endif
							
							<td>{{ Auth::user()->name }}</td>
                            <td>{{ $institute->created_at }}</td>
							<td><a href="{{ route('admin.institute.show', ['id' => $institute->id]) }}"><i class="far fa-eye"></i></a>&nbsp;<a href="{{ route('admin.institute.edit', ['id' => $institute->id]) }}"><i class="far fa-edit"></i></a>&nbsp;<i class="fas fa-trash-alt"></i></td>
							 </tr>
                          @endforeach						  
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    @endsection