@extends('backend.template.template')
@section('title', 'Outlet')
@section('main')
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div>
        <!-- Your content goes here -->
        <h4 class="h3">This page is under maintenance</h4>
    </div>
</div>
@endsection
@push('script')
<script>
     $(".filter-btn").click(function() {
           $(".filter").slideToggle(300);
       });
</script>
@endpush