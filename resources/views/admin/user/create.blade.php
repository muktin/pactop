@extends('admin/layouts/app')

@section('main-content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Create</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- @if(count($errors) > 0)
    @foreach($errors->all() as $error)
      <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
  @endif -->
<section class="content">
  <div class="container-fluid">
  <div class="row">
 <div class="col-md-6">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">User Form</h3>
  </div>
  <!-- /.card-header -->

  
  <!-- form start -->
  <form role="form" action="{{ route('admin.user.store') }}" method="post">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="full_name">Full Name</label>
        <input type="full_name" class="form-control" name="full_name" id="full_name" placeholder="Enter Full Name" value="{{ old('full_name') }}">
        @if($errors->has('full_name'))
          @foreach($errors->get('full_name') as $error)
          <span style="color: red;">{{ $error }}</span>
          @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="email_id">Email ID</label>
        <input type="email_id" class="form-control" name="email_id" id="email_id" placeholder="Enter Valid Email ID" value="{{ old('email_id') }}">
        @if($errors->has('email_id'))
          @foreach($errors->get('email_id') as $error)
          <span style="color: red;">{{ $error }}</span>
          @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="mobile">Mobile No.</label>
        <input type="mobile" class="form-control" name="mobile" id="mobile" placeholder="Enter Valid Mobile" value="{{ old('mobile') }}">
        @if($errors->has('mobile'))
          @foreach($errors->get('mobile') as $error)
          <span style="color: red;">{{ $error }}</span>
          @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
        @if($errors->has('password'))
          @foreach($errors->get('password') as $error)
          <span style="color: red;">{{ $error }}</span>
          @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter password">
        @if($errors->has('confirm_password'))
          @foreach($errors->get('confirm_password') as $error)
          <span style="color: red;">{{ $error }}</span>
          @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="profile_pic">Profile Pic</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="profile_pic" id="profile_pic">
            <label class="custom-file-label" for="profile_pic">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text" id="">Upload</span>
          </div>
        </div>
      </div>
      <!-- <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div> -->
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<!-- /.card -->
</div>
</div>
</div>
</section>
</div>
@endsection