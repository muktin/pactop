@extends('admin/layouts/app')
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                  <div class="card-header">
                    <h4>All Params</h4>
                    <div class="card-header-action">
                        <div class="input-group">
                        <a href="{{ route('admin.params.create') }}" class="btn btn-primary float-right">Add Params</a>
                        </div>
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
                            <th>Value</th>
                            <th>Created By</th>
                            <th>Updated By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if($datas)
                          @foreach($datas as $data)
                          
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td class="align-middle">{{ $data->code }}</td>
                            <td>{{ $data->value }}</td>
                            <td>{{ App\User::find($data->created_by)->name }}</td>
                            <td>{{ App\User::find($data->updated_by)->name }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td> <a href="">@if($data->status == 1) <div class="badge badge-success badge-shadow">{{ __('Active') }}</div> @else <div class="badge badge-danger badge-shadow">{{ __('Inactive') }}</div> @endif </a></td>
                            <td>
                                <a href="{{ route('admin.params.edit', ['id'=>$data->id]) }}" class="badge badge-warning badge-shadow" title="edit"> <i class="far fa-edit"></i> </a>
                                <!-- <a href="" class="badge badge-success badge-shadow" title="view"><i class="far fa-eye "></i></a> -->
                                <!-- <a href="#" class="badge badge-danger badge-shadow" title="delete"><i class="fas fa-trash"></i></a> -->
                            </td>
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
              </div>
            </div>
    </section>
@endsection