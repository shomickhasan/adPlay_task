@extends('backend.template.template')
@section('title', 'Dashboard')
@section('main')
            {{--  <div class="row">
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-primary">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-hanger-2 ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">
                          @if (isset($data['fusionCloth']))
                            {{ $data['fusionCloth'] }}
                          @endif
                        </h4>
                      </div>
                      <p class="mb-1">
                        @if (isset($data['first']['name']))
                          {{$data['first']['name']}}
                        @endif
                      </p>
                      <p class="mb-0">
                        <small class="text-muted">
                          @if (isset($data['fusionCloth']))
                            {{$data['fusionCloth']}} Entrepreneurs
                          @endif
                        </small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-warning">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-warning"
                            ><i class="ti ti-cheese ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">
                          @if (isset($data['foodmake']))
                            {{  $data['foodmake'] }}
                          @endif

                        </h4>
                      </div>
                      <p class="mb-1">
                        @if (isset($data['second']['name']))
                          {{ $data['second']['name'] }}
                        @endif

                      </p>
                      <p class="mb-0">
                        <small class="text-muted">{{ $data['foodmake']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-danger">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-danger"
                            ><i class="ti ti-paper-bag ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $data['foodpokria']}}</h4>
                      </div>
                      <p class="mb-1">{{ $data['third']['name'] }}</p>
                      <p class="mb-0">

                        <small class="text-muted">{{ $data['foodpokria']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-info">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-info"><i class="ti ti-brand-craft ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $data['craft']}}</h4>
                      </div>
                      <p class="mb-1">{{ $data['fourth']['name'] }}</p>
                      <p class="mb-0">
                        <small class="text-muted">{{ $data['craft']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-primary">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-brand-framer ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $data['farm'] }}</h4>
                      </div>
                      <p class="mb-1">{{$data['five']['name']}}</p>
                      <p class="mb-0">
                        <small class="text-muted">{{$data['farm']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-warning">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-warning"
                            ><i class="ti ti-salad ti-md"></i
                          ></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{  $data['foodvagitable'] }}</h4>
                      </div>
                      <p class="mb-1">{{ $data['six']['name'] }}</p>
                      <p class="mb-0">
                        <small class="text-muted">{{ $data['foodvagitable']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-danger">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-danger"
                            ><i class="ti ti-hotel-service ti-md"></i
                          ></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $data['womenhostel']}}</h4>
                      </div>
                      <p class="mb-1">{{ $data['seven']['name'] }}</p>
                      <p class="mb-0">

                        <small class="text-muted">{{ $data['womenhostel']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-info">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-info"><i class="ti ti-wash-dry-a ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $data['londri']}}</h4>
                      </div>
                      <p class="mb-1">{{ $data['eight']['name'] }}</p>
                      <p class="mb-0">
                        <small class="text-muted">{{ $data['londri']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-primary">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-car ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $data['cngdriver'] }}</h4>
                      </div>
                      <p class="mb-1">{{$data['nine']['name']}}</p>
                      <p class="mb-0">
                        <small class="text-muted">{{$data['cngdriver']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-warning">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-warning"
                            ><i class="ti ti-outlet ti-md"></i
                          ></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{  $data['beautyfallar'] }}</h4>
                      </div>
                      <p class="mb-1">{{ $data['ten']['name'] }}</p>
                      <p class="mb-0">
                        <small class="text-muted">{{ $data['beautyfallar']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-danger">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-barbell-off ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $data['womengym']}}</h4>
                      </div>
                      <p class="mb-1">{{ $data['eleven']['name'] }}</p>
                      <p class="mb-0">

                        <small class="text-muted">{{ $data['womengym']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-info">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-info"><i class="ti ti-brand-deliveroo ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $data['domestic_workers']}}</h4>
                      </div>
                      <p class="mb-1">{{ $data['twellve']['name'] }}</p>
                      <p class="mb-0">
                        <small class="text-muted">{{ $data['domestic_workers']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-primary">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-medicine-syrup ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $data['pharmacy'] }}</h4>
                      </div>
                      <p class="mb-1">{{$data['thirty']['name']}}</p>
                      <p class="mb-0">
                        <small class="text-muted">{{$data['pharmacy']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-warning">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-warning"
                            ><i class="ti ti-businessplan ti-md"></i
                          ></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{  $data['small_business'] }}</h4>
                      </div>
                      <p class="mb-1">{{ $data['fourthy']['name'] }}</p>
                      <p class="mb-0">
                        <small class="text-muted">{{ $data['small_business']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-danger">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-danger"
                            ><i class="ti ti-browser ti-md"></i
                          ></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $data['other']}}</h4>
                      </div>
                      <p class="mb-1">{{ $data['fifthy']['name'] }}</p>
                      <p class="mb-0">

                        <small class="text-muted">{{ $data['other']}} Entrepreneurs</small>
                      </p>
                    </div>
                  </div>
                </div>
              </div>--}}



@php

@endphp

@endsection
@push('script')

@endpush
