@extends('multiauth::layouts.app')
@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
{{--                    <div class="search-element">--}}
{{--                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">--}}
{{--                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>--}}
{{--                        --}}
{{--                    </div>--}}
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{url(auth("admin")->user()->avatar)}}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{auth("admin")->user()->name}}</div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="{{route("admin.profile")}}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="/admin/logout" onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i>  {{ __('Logout') }}
                            </a>

                                                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                                                style="display: none;">
                                                                @csrf
                                                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{route("admin.dashboard")}}">Stisla</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{route("admin.dashboard")}}">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="nav-item dropdown">
                            <a href="{{route("admin.dashboard")}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>--}}
{{--                                <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>--}}
{{--                            </ul>--}}
                        </li>
                        <li class="menu-header">User Management</li>
                        <li class="nav-item dropdown active">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas  fa-user-circle"></i> <span>Users</span></a>
                            <ul class="dropdown-menu">
                                <li class=" @if(request()->url()==route('admin.show')) active @endif"><a class="nav-link" href="{{route("admin.show")}}">Admins</a></li>
                                <li class=" @if(request()->url()==route('admin.roles')) active @endif"><a class="nav-link" href="{{route("admin.roles")}}">Roles</a></li>
                                <li class=" @if(request()->url()==route('admin.users')) active @endif"><a class="nav-link" href="{{route("admin.users")}}">Users</a></li>
                                <li><a class="nav-link" href="layout-transparent.html">Role</a></li>
                                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                            </ul>
                        </li>

                       </ul>


                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield("section-header")
                    @yield("section-body")



                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    {{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>--}}
{{--                <div class="card-body">--}}
{{--                    @include('multiauth::message')--}}
{{--                    You are logged in to {{ config('multiauth.prefix') }} side!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
