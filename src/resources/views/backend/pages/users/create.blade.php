@extends('backend.template.template')
@section('title', __('user.user.title'))
@push('css')

@endpush
@section('main')

<div class="row mb-2">
    <div class="col">
        <h4 class="py-3 mb-4 fs-5 d-inline">
            <span class="text-muted fw-light">Admin /</span>
            <span class="heading-color">User Create</span>
        </h4>
    </div>
    <div class="col text-end">
        <a href="{{ route('users.index') }}" style="color: white;" type="submit"
        class="btn btn-primary me-sm-3 me-1 waves-effect waves-light"><i class="ti ti-arrow-left me-sm-1 ti-xs"></i> All User</a>
    </div>
</div>

<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">{{ __('user.user.create') }}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="first-name">Full Name</label>
                                <div class="col-sm-9">
                                    <input name="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror"
                                      id="first-name" placeholder="{{ __('user.user.name') }}" value="{{old('full_name')}}"  />
                                    @error('full_name')
                                      <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="last-name">User Name</label>
                                <div class="col-sm-9">
                                    <input name="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror"
                                      id="last-name" placeholder="{{ __('user.user.user_name') }}" value="{{old('user_name')}}"  />
                                    @error('user_name')
                                      <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="phone">Phone</label>
                                <div class="col-sm-9">
                                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                      id="phone" placeholder="{{ __('user.user.phone') }}" value="{{old('phone')}}"  />
                                    @error('phone')
                                      <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="email">Email</label>
                                <div class="col-sm-9">
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                      id="email" placeholder="{{ __('user.user.email') }}" value="{{old('email')}}"  />
                                      @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="user-password">Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="user-password" placeholder="{{ __('login.password') }}" />
                                        <span class="input-group-text cursor-pointer"></span>
                                    </div>

                                      @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="status">Status</label>
                                <div class="col-sm-9 d-inline-block">
                                    @foreach ($status as $statu)
                                        <div class="vs-radio-con">
                                            <input type="radio" name="status" value="{{ $statu->value }}" class="@error('status') is-invalid @enderror"
                                            {{ (old('status', '') == $statu->value || (old('status') === null && $statu->value == 'Active')) ? 'checked' : '' }} />
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">{{ $statu->value }}</span>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row image-div">
                                <label class="col-sm-3 col-form-label text-sm-end" for="logo">Photo</label>
                                <div class="col-sm-9">
                                    <input type="file" id="image" name="image" class="form-control image @error('image') is-invalid @enderror">
                                    @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                   @enderror
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-sm-8 mt-5" style="height: 70px;width: 100px;">
                                    <img class="img-responsive image-show" src="{{asset('image/no-image-uploded-2.png')}}"  alt="" style="height:100%;width: 100%;"/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="row justify-content-end">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>

                                    <button type="reset" class="btn btn-label-secondary waves-effect">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Basic with Icons -->

</div>


@endsection
@push('script')

@endpush
