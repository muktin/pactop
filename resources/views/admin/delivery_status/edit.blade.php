@extends('admin/layouts/app')
@section('main-content')
<section class="section">
    <div class="section-body">
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Delivery Status</h4>
                  </div>
                  @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ $message }}
                    </div>
                   @endif
                  <div class="card-body">
                    <form method="post" id="delivery_status_form" method="post" action="{{ route('admin.delivery_status.update', $detail->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="status_name" id="status_name" value="{{ $detail->status_name }}">
                        @if($errors->has('status_name'))
                        <span style="color:red">{{ $errors->first('status_name') }}</span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Code</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="code" id="code" value="{{ $detail->code }}">
                        @if($errors->has('code'))
                        <span style="color:red">{{ $errors->first('code') }}</span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status" id="status">
                          <option value="1" @if($detail->status == 1) {{ __('selected') }} @endif >Active</option>
                          <option value="0" @if($detail->status == 0) {{ __('selected') }} @endif >Inactive</option>
                        </select>
                      </div>
                    </div>
                    <input type="hidden" name="id" value = "{{ $detail->id }}">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('admin.delivery_status.view') }}" class="btn btn-primary">Back</a>
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