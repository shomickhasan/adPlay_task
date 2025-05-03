@extends('backend.template.template')
@section('title','User Details')
@section('main')
@push('css')
<style>
    .overflow-wrap {
        word-wrap: break-word; /* Handle long words */
        overflow-wrap: break-word; /* Handle normal words */
    }
</style>
@endpush
<div class="">
    <h4 class="py-3 mb-4 fs-5">
        <span class="text-muted fw-light">User /  
        <span class="heading-color">User Details</span>
    </h4>

    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-4 text-center text-sm-start gap-2">
        <div class="mb-2 mb-sm-0">
            <p class="mb-0">{{ $user->CreatedAtFormatted }}</p>
        </div>
        <a href="{{ route('users.index') }}" style="color: white;" type="submit" 
        class="btn btn-primary me-sm-3 me-1 waves-effect waves-light"><i class="ti ti-arrow-left me-sm-1 ti-xs">
            </i> All User</a>
    </div>

    <div class="row">
        <!-- Customer-detail Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- Customer-detail Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="customer-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded my-3" src="{{Storage::url($user->photo) }}" height="110" width="110" alt="User avatar" />
                            <div class="customer-info text-center">
                                <h4 class="mb-1">{{ $user->full_name }}</h4>
                                <small>User Name {{ $user->user_name }}</small>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-around flex-wrap my-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar">
                                <div class="avatar-initial rounded bg-label-primary">
                                    <i class="ti ti-shopping-cart ti-md"></i>
                                </div>
                            </div>
                            <div class="gap-0 d-flex flex-column">
                                <p class="mb-0 fw-medium">184</p>
                                <small>Orders</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar">
                                <div class="avatar-initial rounded bg-label-primary">
                                    <i class="ti ti-currency-dollar ti-md"></i>
                                </div>
                            </div>
                            <div class="gap-0 d-flex flex-column">
                                <p class="mb-0 fw-medium">$12,378</p>
                                <small>Spent</small>
                            </div>
                        </div>
                    </div> --}}

                    <div class="info-container">
                        <small class="d-block pt-4 border-top fw-normal text-uppercase text-muted my-3">USER DETAILS</small>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fw-medium me-2">User Full Name:</span>
                                <span>{{ $user->full_name }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Phone:</span>
                                <span>{{ $user->phone }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Email:</span>
                                <span>{{ $user->email }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Status:</span>
                                @if ($user->status == \App\Enums\Status::Active)
                                <span class="badge bg-label-success" text-capitalized="">{{ $user->status }}</span>
                                @else
                                    <span class="badge bg-label-danger" text-capitalized="">{{ $user->status }}</span>
                                @endif
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary me-3">Edit Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /Plan Card -->
        </div>
        <!--/ Customer Sidebar -->

        <!-- Customer Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- Customer Pills -->
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active py-2" href="javascript:void(0);"><i class="ti ti-building-store me-1"></i>Overview</a>
                </li>
            </ul>
            <div class="row text-nwrap">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">User Role</h4>
                            <ul class="list-unstyled">
                                @forelse ($roles as $role)
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Business Name : </span>
                                        <span class="text-muted mb-0">{{ $role?->business?->b_name }} &nbsp;</span>
                                        <span class="fw-medium me-2">Role Name : </span>
                                        <span class="text-muted mb-0">{{ $role?->name }}</span>
                                    </li>    
                                @empty
                                <li class="mb-3 text-center">
                                    <span class="fw-medium me-2 text-center">User Have No Role</span>
                                </li>
                                @endforelse
                            </ul>
                          
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">User Business</h4>
                            <ul class="list-unstyled">
                                @forelse ($user->businessUser as $business)
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Business Name : </span>
                                        <span class="text-muted mb-0">{{$business?->b_name }} &nbsp;</span>
                                    </li>    
                                @empty
                                <li class="mb-3 text-center">
                                    <span class="fw-medium me-2 text-center">Not Assigned Any Kind of Business</span>
                                </li>
                                @endforelse
                            </ul>
                          
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
        <!--/ Customer Content -->
    </div>
</div>



@endsection
@push('script')
@endpush