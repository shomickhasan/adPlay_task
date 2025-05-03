@extends('backend.template.template')
@section('title', 'Dashboard')
@section('main')
    <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Table</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Data List</a>
                    </li>
                    <li class="breadcrumb-item active">List View
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                <div class="btn-group">
                    <button class="btn btn-outline-primary"><span><i class="feather icon-plus"></i> Add New</span></button>
                </div>
            </div>
        </div>
    </section>
    <scction class="column-selectors">
        <h1>Start your logic</h1>
    </scction>

@endsection
