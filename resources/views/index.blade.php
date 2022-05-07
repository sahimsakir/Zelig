<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Zelig App </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('assets/vendors/feather/feather.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/typicons/typicons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/select.dataTables.min.css')}}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="{{asset('assets/css/vertical-layout-light/style.css')}}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}" />
    </head>
    
    <body>
        <div class="container-scroller">
    
            <!-- partial:partials/_navbar.html -->
            @include('sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                <div class="alert-box mb-2 mt-2">
                        @if(Session::get('success'))
                            <div class="alert alert-success mt-3" role="alert">
                                {{ Session::get('success') }}
                            </div>
                            
                        @endif

                        @if(Session::get('fail'))
                            <div class="alert alert-danger mt-3" role="alert">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                                <h2 class="welcome-text">Over View</h2>
                                <div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mt-4">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4>Current Employee</h4>
                                                    <h2 style="color: #48B047">{{$users}}</h2>
                                                </div>
                                                <div class="col-sm-4">
                                                    <i class="fa-solid fa-users font-size-dashboard"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-4">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4>Items In Inventory</h4>
                                                    <h2 style="color: #48B047">{{$inventories}}</h2>
                                                </div>
                                                <div class="col-sm-4">
                                                    <i class="fa-solid fa-boxes-stacked font-size-dashboard"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                                <h2 class="welcome-text">Local Sales</h2>
                                <div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mt-3">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4>Total Sales (Tk)</h4>
                                                    <h2 style="color: #48B047">{{$sale1}} TK</h2>
                                                </div>
                                                <div class="col-sm-4">
                                                    <i class="fa-solid fa-paste font-size-dashboard"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-3">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4>Total Recovery (TK)</h4>
                                                    <h2 style="color: #48B047">{{$sale_recovery}} TK</h2>
                                                </div>
                                                <div class="col-sm-4">
                                                    <i class="fa-solid fa-address-card font-size-dashboard"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-3">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4>Profit In Percentage(%)</h4>
                                                    <h2 style="color: #48B047">{{$profit_percentage}}</h2>
                                                </div>
                                                <div class="col-sm-4">
                                                    <i class="fa-solid fa-clipboard-check font-size-dashboard"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                                <h2 class="welcome-text">Indenting Sales</h2>
                                <div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mt-3">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4>Total Sales (Tk)</h4>
                                                    <h2 style="color: #48B047">{{$sale2}} TK</h2>
                                                </div>
                                                <div class="col-sm-4">
                                                    <i class="fa-solid fa-paste font-size-dashboard"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-3">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4>Total Recovery (TK)</h4>
                                                    <h2 style="color: #48B047">{{$sale_recovery2}} TK</h2>
                                                </div>
                                                <div class="col-sm-4">
                                                    <i class="fa-solid fa-address-card font-size-dashboard"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-3">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4>Profit In Percentage(%)</h4>
                                                    <h2 style="color: #48B047">{{$profit_percentage2}}</h2>
                                                </div>
                                                <div class="col-sm-4">
                                                    <i class="fa-solid fa-clipboard-check font-size-dashboard"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                                <h2 class="welcome-text">Total Expense</h2>
                                <div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mt-3">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h4>Total Expense (Tk)</h4>
                                                    <h2 style="color: #48B047">{{$expenses}}</h2>
                                                </div>
                                                <div class="col-sm-4">
                                                    <i class="fa-solid fa-chart-pie font-size-dashboard"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Design and Developed By<a href="http://upscaleitsolutions.com/" target="_blank"> Upscale IT Solutions.</a></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/Chart.roundedBarCharts.js')}}"></script>
    <script>    
    $(".alert").fadeOut(1000);
    </script>
    <!-- End custom js for this page-->
</body>

</html>

