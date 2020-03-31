@extends('admin/layouts/app')
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                  <div class="card-header">
                    <h4>All Card Types</h4>
                    <div class="card-header-action">
                        <div class="input-group">
                          <a href="{{ route('admin.card_type.create') }}" class="btn btn-primary float-right">Add New Card</a>
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
                            <th>Card Name</th>
                            <th>Card Type</th>
                            <th>Created By</th>
                            <th>Updated By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if($card_types_datas)
                          @foreach($card_types_datas as $card_types_data)
                          
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $card_types_data->name }}</td>
                            <td class="align-middle">{{ $card_types_data->type }}</td>
                            <td>{{ App\User::find($card_types_data->created_by)->name }}</td>
                            <td>{{ App\User::find($card_types_data->updated_by)->name }}</td>
                            <td>{{ $card_types_data->created_at }}</td>
                            <td>{{ $card_types_data->updated_at }}</td>
                            <td> <a href="">@if($card_types_data->status == 1) <div class="badge badge-success badge-shadow">{{ __('Active') }}</div> @else <div class="badge badge-danger badge-shadow">{{ __('Inactive') }}</div> @endif </a></td>
                            <td>
                                <a href="{{ route('admin.card_type.edit', ['id'=>$card_types_data->id]) }}" class="badge badge-warning badge-shadow" title="edit"> <i class="far fa-edit"></i> </a>
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