@extends('admin/layouts/app')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add User</h4>
                  </div>
                   <form class="needs-validation" novalidate="" action="{{ route('admin.user.store')}}" method="POST">
				    @csrf
                  <div class="card-body">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>First Name</label>
		                    <input type="text" class="form-control" name='fname' required="">
		                  </div>
						  <?php if($errors->has('fname')): ?>
							<?php 	foreach($errors->get('fname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Last Name</label>
		                      <input type="text" class="form-control"  name='lname' required="">
		                  </div>
						  <?php if($errors->has('lname')): ?>
							<?php 	foreach($errors->get('lname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                          <label>Email</label>
		                      <input type="email" class="form-control" name='email' required="">
		                  </div>
						  <?php if($errors->has('email')): ?>
							<?php 	foreach($errors->get('email') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>UserName</label>
		                      <input type="text" class="form-control" name='username' required="">
		                  </div>
						  <?php if($errors->has('username')): ?>
							<?php 	foreach($errors->get('username') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                          <label>Password</label>
		                      <input type="password" class="form-control" name='password' required="">
		                  </div>
						  <?php if($errors->has('password')): ?>
							<?php 	foreach($errors->get('password') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Institute Name</label>
		                      <input type="text" class="form-control" name='instituteId' required="">
		                  </div>
						  <?php if($errors->has('instituteId')): ?>
							<?php 	foreach($errors->get('instituteId') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                          <label>Address</label>
		                      <input type="text" class="form-control" name='addressid' required="">
		                  </div>
						  <?php if($errors->has('addressid')): ?>
							<?php 	foreach($errors->get('addressid') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Title Id</label>
		                      <input type="text" class="form-control" name='titleid' required="">
		                  </div>
						  <?php if($errors->has('titleid')): ?>
							<?php 	foreach($errors->get('titleid') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>Gender</label>
							  <select class="form-control" name='gender'  required="" >
							   <option value=''>Select</option>
								<option value='1'>Male</option>
								<option value='2'>Female</option>
								<option value='3'>Others</option>
							  </select>
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>Status</label>
							  <select class="form-control" name='status'  required="" >
							   <option value=''>Select</option>
								<option value='1'>Active</option>
								<option value='0'>Deactive</option>
							  </select>
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
                </div>
                <div class="card-footer">
                   	 	<button class="btn btn-primary">Add</button>
						<a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                	</div>
              </div>
              </form>
            </div>   
           @endsection

