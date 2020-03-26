@extends('admin/layouts/app')

@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View User</h4>
                  </div>
                  <div class="card-body">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Name</label>
		                    <input type="text" class="form-control" name='fname'  value='{{ $institutes->name }}' readonly >
		                  </div>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Code</label>
		                      <input type="text" class="form-control"  value='{{ $institutes->code }}' name='lname' readonly>
		                  </div>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                          <label>Address</label>
		                      <input type="text" class="form-control" value='{{ $institutes->addressId }}' name='email' readonly>
		                  </div>
		                  </div>
						  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>Institute Type</label>
							  <select class="form-control" name='inttype' disabled>
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
							  <select class="form-control" name='istatus'  disabled >
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
                   	 	<a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                	</div>
              </div>
            </div>   
           @endsection