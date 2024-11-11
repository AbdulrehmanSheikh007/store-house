<?php
$segment1 = Request::segment(1);
$segment2 = Request::segment(2);
?>
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <!--<img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">-->
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="width: 98%;" src="{{asset('public/images/logo.png')}}" alt="Shards Dashboard">
                    <span class="d-none d-md-inline ml-1">
                        <!--Customized Dashboard-->
                    </span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
    </form>
    <div class="nav-wrapper">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(in_array($segment1, ['home', 'dashboard'])) active @endif" href="{{url('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(in_array($segment1, ['categories'])) active @endif" href="{{url('categories')}}">
                    <i class="material-icons">vertical_split</i>
                    <span>Manage Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(in_array($segment1, ['products'])) active @endif" href="{{url('products')}}">
                    <i class="material-icons">view_module</i>
                    <span>Manage Products</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link @if(in_array($segment1, ['users'])) active @endif" href="{{url('users')}}">
                    <i class="material-icons">people</i>
                    <span>Manage Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}" 
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="material-icons">logout</i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>