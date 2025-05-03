@php

//Administration Module
$dashboard = [
    'dashboard',
];

// Administration  start

$administration = [
    'users.create','users.index','users.edit',
    'activityLog.index',
];
$categories = [
    'category.index',
    'category.create',
    'category.edit',
    'category.update',

];



//Maintenance Mood
$maintenances_route = ['maintenances.index'];


$routeName = \Request::route()->getName();

@endphp



<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <!-- <span class="app-brand-text demo menu-text fw-bold">Vuexy</span> -->
        </a>

        {{-- <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a> --}}
    </div>

    <!-- Apps & Pages -->
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{(in_array($routeName, $dashboard ) !== false ) ? 'active open ':''}}">
            <a href="{{ route('dashboard') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Administration -->
        <li class="menu-item {{(in_array($routeName, $administration ) !== false ) ? 'active open ':''}}">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shield"></i>
                <div data-i18n="Administration">Administration</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ $routeName ==  'users.index' ? 'active' : '' }}
                {{ $routeName ==  'users.create' ? 'active' : '' }}
                {{ $routeName ==  'users.edit' ? 'active' : '' }}">
                    <a href="{{route('users.index')}}" class="menu-link">
                        <div data-i18n="Users">Users</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ $routeName ==  'product.index' ? 'active' : '' }}
                {{ $routeName ==  'product.create' ? 'active' : '' }}
                {{ $routeName ==  'product.edit' ? 'active' : '' }}">
            <a href="{{route('product.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-package"></i>
                <div data-i18n="Users">Products</div>
            </a>
        </li>
    </ul>
</aside>
<!-- End Menu -->
