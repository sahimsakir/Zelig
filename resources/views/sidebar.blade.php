<?php
$menus = getmenu(Auth::user()->email);
?>


<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                    <div class="me-3">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                            <span class="icon-menu"></span>
                        </button>
                    </div>
                    <div>
                        <a class="navbar-brand brand-logo" href="/">
                            <img src="{{asset('assets/images/logo.png')}}" alt="logo" />
                        </a>
                        <a class="navbar-brand brand-logo-mini" href="/">
                            <img src="{{asset('assets/images/logo.png')}}" alt="logo" />
                        </a>
                    </div>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-top">
                    <ul class="navbar-nav">
                        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                            <h1 class="welcome-text">Greetings, <span class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
    
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
    
                        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-xs rounded-circle" src="{{asset('assets/images/profileimg.png')}}" alt="Profile image"> </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                <div class="dropdown-header text-center">
                                    <img class="img-md rounded-circle" src="{{asset('assets/images/profileimg.png')}}" alt="Profile image">
                                    <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                                </div>
                                <a class="dropdown-item" href="/user-profile/{{Auth::id()}}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile</a>
                                <a class="dropdown-item" href="/logout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_settings-panel.html -->
                <!-- partial -->
                <!-- partial:partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    
                    <ul class="nav">
                        @if(collect($menus)->where('menu','=','Dashboard')->pluck('menu')->first())
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                <i class="mdi mdi-grid-large menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        @endif
                        @if(collect($menus)->where('menu','=','Inventory')->pluck('menu')->first())
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="auth">
                                 <i class=" menu-icon fa-solid fa-boxes-stacked"></i>
                                <span class="menu-title">Inventory</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="ui-basic">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="/add-inventory">Add An Item</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="/inventory-list">List Of Items</a></li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if(collect($menus)->where('menu','=','Activites')->pluck('menu')->first())
                        <li class="nav-item">
                            <a class="nav-link" href="/activites">
                                <i class="menu-icon mdi mdi-card-text-outline"></i>
                                <span class="menu-title">Activites</span>
                            </a>
                        </li>
                        @endif
                        @if(collect($menus)->where('menu','=','Report')->pluck('menu')->first())
                        <li class="nav-item">
                            <a class="nav-link" href="/report" >
                                <i class="menu-icon mdi mdi-chart-line"></i>
                                <span class="menu-title">Reports</span>
                                
                            </a>
                        </li>
                        @endif
                        @if(collect($menus)->where('menu','=','Payroll')->pluck('menu')->first())
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#payroll" aria-expanded="false" aria-controls="auth">
                                <i class="menu-icon fa-solid fa-chart-pie font-size-dashboard"></i>
                                <span class="menu-title">payroll</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="payroll">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="/add-payroll">Add A Payment</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="/payroll-list">Payroll List</a></li>
                                   
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if(collect($menus)->where('menu','=','Request')->pluck('menu')->first())
                        <li class="nav-item" >
                            <a class="nav-link" href="/request" >
                                <i class="menu-icon fa-solid fa-code-pull-request"></i>
                                <span class="menu-title">Request</span>
                            </a>
                        </li>
                        @endif
                        @if(collect($menus)->where('menu','=','Sales')->pluck('menu')->first())
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="auth">
                                <i class="menu-icon fa-solid fa-chart-pie font-size-dashboard"></i>
                                <span class="menu-title">Sales</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="icons">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="/sales-list">Sales List</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="/add-sales">Add A New Sale</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="/buyer-list">Buyers List</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="/buyer-profile">Buyers Profile</a></li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if(collect($menus)->where('menu','=','User')->pluck('menu')->first())
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                                <span class="menu-title">User</span>
                                 <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="auth">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="/user-list">List of users</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="/add-user">Create a new user</a></li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if(collect($menus)->where('menu','=','Expense')->pluck('menu')->first())
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#iconsnew" aria-expanded="false" aria-controls="icons">
                                <i class="menu-icon fa-solid fa-chart-pie font-size-dashboard"></i>
                                <span class="menu-title">Expense</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="iconsnew">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="/expense-list">Expense List</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="/add-expense">Add A New Expense</a></li>
                                </ul>
                            </div>
                        </li>
                        @endif
                       
                    </ul>
                </nav>
               