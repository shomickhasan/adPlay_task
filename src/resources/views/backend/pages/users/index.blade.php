@extends('backend.template.template')
@section('title','User')
@section('main')
<h4 class="py-3 mb-4 fs-5 ">
    <span class="text-muted fw-light">Administration /</span>
    <span class="heading-color">All User</span>
</h4>
<div class="card">
    <div class="card-header">
        <a href="{{ route('users.create') }}" style="color: white;">
            <button class="btn btn-secondary add-new btn-primary waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                <span>
                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                    <span class="d-none d-sm-inline-block">User Creat</span>
                </span>
            </button>
        </a>
       {{-- <div class="btn-group">
            <button  class="btn filter-btn btn-secondary add-new btn-primary waves-effect waves-light"><span> <i class="ti ti-filter me-0 me-sm-1 ti-xs"></i>&nbsp; {{ __('common.filter') }} </span></button>
        </div>--}}
    </div>
    <div class="card-body">
        <form class="dt_adv_search filter" method="get" action="{{ route('users.index') }}" id="searchForm"  style="display: none">
          <div class="row">
            <div class="col-12">
              <div class="row g-3">
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control dt-input" data-column="3" placeholder="Name" data-column-index="2">
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <label class="form-label">Phone :</label>
                  <input type="text" name="phone" class="form-control dt-input" data-column="3" placeholder="Phone" data-column-index="2">
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label">Status:</label>
                    <select id="status" name="status" class="select2 form-select @error('status') is-invalid @enderror" data-allow-clear="true">
                      <option value="">Select Status</option>
                      @foreach ($status as $statu)
                          <option value="{{ $statu->value }}" @if (old('status', '') == $statu->value) selected @endif > {{ $statu->value }}</option>
                      @endforeach

                    </select>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-end" style="justify-content: start;">
                    <div class="input-group-append me-2" id="button-addon2">
                        <button id="search" class="btn  btn-md btn-primary waves-effect waves-light index-search" type="button"><span> <i class="ti ti-filter me-0 me-sm-1 ti-xs"></i>&nbsp; {{ __('common.filter') }} </span></button>
                    </div>
                    <div class="input-group-append" id="button-addon2">
                        <button class="btn btn-md btn-danger waves-effect waves-light" onclick="resetForm()" type="reset"><span> <i class="ti ti-square-x me-0 me-sm-1 ti-xs"></i>&nbsp; {{ __('common.clear') }} </span></button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </form>
    </div>
    <div id="filterTable">
        <div class="card-datatable table-responsive">
            <table class="datatables-products table item_table table-hover">
                <thead class="border-top">
                    <tr>
                        <th>#</th>
                        <th>Created at</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Emain</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr id="deleteitem_remove_{{ $user->id }}">
                            <td>
                                {{ app()->getLocale() == 'bn' ? convertToBanglaNumber($loop->iteration) : $loop->iteration }}

                            </td>
                            <td>{{ $user->CreatedAtFormatted}}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                @if ($user->status == \App\Enums\Status::Active)
                                    <span class="badge bg-label-success" text-capitalized="">{{ $user->status }}</span>
                                @else
                                    <span class="badge bg-label-danger" text-capitalized="">{{ $user->status }}</span>
                                @endif

                            </td>
                            <td>
                                <div class="d-inline-block text-nowrap">

                                    <a href="{{route('users.edit',$user->id)}}">
                                        <button class="btn btn-sm btn-icon edit-i"><i class="ti ti-edit"></i></button>
                                    </a>
                                    <button  id="confirm-text_{{$user->id}}"  class="btn btn-sm btn-icon delete-record delete-i"><i onClick="deleteConfirmation({{$user->id}},'{{ route("users.destroy", $user->id) }}')" class="ti ti-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mb-2">
            {{ $users->links('backend.pagination.custome') }}
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $('#search').on('click', function() {
        var formData = $('#searchForm').serialize();
        $.ajax({
            type: 'GET',
            url: '{{ route('users.index') }}',
            data: formData,
            success: function(response) {
                $('#filterTable').html(response);
            },
            error: function(error) {

            }
        });
    });

    function showRoles(userId) {
        $.ajax({
            url: '/administration/users/roles/' + userId,
            type: 'GET',
            success: function(roles) {
                var roleList = $('#roleList');
                roleList.empty();
                roles.forEach(function(role) {
                    var businessName = role.business_id ? role.business_id : 'N/A';
                    roleList.append('<li class="list-group-item">Business Name: ' + businessName + ' Role Name: ' + role.name + '</li>');
                });
            },
            error: function(error) {

            }
        });
    }


</script>

@endpush
