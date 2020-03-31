@extends('admin/layouts/app')

@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit User</h4>
                  </div>
				 
				   <form class="needs-validation" novalidate="" action="{{ route('admin.institute.update', ['id' => $institutes->id]) }}" method="POST">
				    @csrf
                  <div class="card-body">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Name</label>
		                    <input type="text" class="form-control" name='iname'  value='{{ $institutes->name }}' required="" >
		                  </div>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Code</label>
		                      <input type="text" class="form-control"  value='{{ $institutes->code }}' name='code' required="">
		                  </div>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                          <label>Address</label>
		                      <input type="text" class="form-control" value='{{ $institutes->addressId }}' name='iaddress' required="">
		                  </div>
		                  </div>
						  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>Institute Type</label>
							  <select class="form-control" name='inttype' required="">
							   <option value=''>Select</option>
								<option value='1'>Instutite type1</option>
								<option value='2'>Instutite type2</option>
								<option value='3'>Instutite type3</option>
								<option value='4'>Instutite type4</option>
								<option value='5'>Instutite type5</option>
								<option value='6'>Instutite type6</option>
							  </select>
							</div>
	                    </div>
					</div>	
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>Status</label>
							  <select class="form-control" name='istatus'  required="">
							    <option value=''>Select</option>
								<option value='1'>Active</option>
								<option value='0'>Deactive</option>
							  </select>
							</div>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	
	                    </div>
					</div>
                </div>
                <div class="card-footer">
                   	 	<button class="btn btn-primary">Update</button>
						<a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                	</div>
              </div>
			  </form>
            </div>   
           @endsection