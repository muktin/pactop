@extends('admin/layouts/app')
@section('main-content')
<section class="section">
    <div class="section-body">
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New Payment Type</h4>
                  </div>
                  @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ $message }}
                    </div>
                   @endif
                  <div class="card-body">
                    <form method="post" id="payment_type_form" method="post" action="{{ route('admin.payment_type.store') }}">
                    @csrf
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" id="name">
                        @if($errors->has('name'))
                        <span style="color:red">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="type" id="type">
                        @if($errors->has('type'))
                        <span style="color:red">{{ $errors->first('type') }}</span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status" id="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit">Add Card</button>
                        <a href="{{ route('admin.payment_type.view') }}" class="btn btn-primary">Back</a>
                      </div>
                    </div>
                    </form>      
                  </div>

                </div>
              </div>
            </div>
    </div>
</section>
@endsection