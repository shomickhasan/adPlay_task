@extends('backend.template.template')
@section('title', __('user.user.title'))
@push('css')

@endpush
@section('main')

<div class="row mb-2">
    <div class="col">
        <h4 class="py-3 mb-4 fs-5 d-inline">
            <span class="text-muted fw-light">{{ __('user.user.title') }} /</span> 
            <span class="heading-color">{{ __('common.information.update') }}</span>
        </h4>
    </div>
    <div class="col text-end">
        <a href="{{ route('users.index') }}" style="color: white;" type="submit" 
        class="btn btn-primary me-sm-3 me-1 waves-effect waves-light"><i class="ti ti-arrow-left me-sm-1 ti-xs"></i> {{__('user.user.all')}}</a>
    </div>
</div>

<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">{{ __('common.information.update') }}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="first-name">{{ __('user.user.name') }}</label>
                                <div class="col-sm-9">
                                    <input name="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror"
                                      id="first-name" placeholder="{{ __('user.user.name') }}" value="{{old('full_name',$user->full_name)}}"  /> 
                                    @error('full_name')
                                      <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>     
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="last-name">{{ __('user.user.user_name') }}</label>
                                <div class="col-sm-9">
                                    <input name="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror"
                                      id="last-name" placeholder="{{ __('user.user.user_name') }}" value="{{old('user_name',$user->user_name)}}"  /> 
                                    @error('user_name')
                                      <p class="text-danger">{{$message}}</p>
                                    @enderror    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="phone">{{ __('user.user.phone') }}</label>
                                <div class="col-sm-9">
                                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                      id="phone" placeholder="{{ __('user.user.phone') }}" value="{{old('phone',$user->phone)}}"  /> 
                                    @error('phone')
                                      <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="email">{{ __('user.user.email') }}</label>
                                <div class="col-sm-9">
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                      id="email" placeholder="{{ __('user.user.email') }}" value="{{old('email',$user->email)}}"  />
                                      @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="user-password">{{ __('user.user.password') }}</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="user-password" placeholder="{{ __('login.password') }}" />
                                        
                                    </div>
                                    <span class="text-warning">{{ __('user.user.password.change') }}</span>
                                      @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>

                       
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label text-sm-end" for="status">{{ __('user.user.status') }}</label>
                                <div class="col-sm-9 d-inline-block">
                                    @foreach ($status as $statu)
                                        <div class="vs-radio-con">
                                            <input type="radio" name="status" value="{{ $statu->value }}" class="@error('status') is-invalid @enderror"
                                            {{ (old('status', $user->status->value) == $statu->value || (old('status') === null && $statu->value == 'Active')) ? 'checked' : '' }} />
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
                                <label class="col-sm-3 col-form-label text-sm-end" for="logo">{{ __('user.user.image') }}</label>
                                <div class="col-sm-9">
                                    <input type="file" id="image" name="image" class="form-control image @error('image') is-invalid @enderror">
                                    @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                   @enderror
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-sm-8 mt-5" style="height: 70px;width: 100px;">
                                    @if(isset($user->photo) && !empty($user->photo))
                                    <img class="img-responsive image-show" src="{{ Storage::url($user->photo) }}"  alt="" style="height:100%;width: 100%;"/>
                                    @else
                                    <img class="img-responsive image-show" src="{{asset('image/no-image-uploded-2.png')}}"  alt="" style="height:100%;width: 100%;"/>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="row justify-content-end">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">{{ __('common.update.button') }}</button>
                                    <button type="reset" class="btn btn-label-secondary waves-effect">{{ __('common.cancle.button') }}</button>
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