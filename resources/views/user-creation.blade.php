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

                    <div class="col-12 grid-margin">
                        <div class="card mb-5">
                            <div class="card-body ">

                                <form method="post" class="form-sample">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 ">User Name*</label>
                                                <div class="col-sm">
                                                    <input type="text" name="inputName" id="Name" class="form-control" placeholder="Enter Name" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Email</label>
                                                <div class="col-sm-12">
                                                    <input type="Email" name="email" id="Cell" placeholder="Enter Email" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check d-inline-block form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="Inventory" id="Inventory" class="form-check-input">
                                                    Inventory
                                                </label>
                                            </div>
                                            <div class="form-check d-inline-block form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="Sales" id="Sales" class="form-check-input">
                                                    Sales
                                                </label>
                                            </div>
                                            <div class="form-check d-inline-block form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="Expense" id="Expense" class="form-check-input">
                                                    Expense
                                                </label>
                                            </div>
                                            <div class="form-check d-inline-block form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="Report" id="Report" class="form-check-input">
                                                    Report
                                                </label>
                                            </div>
                                            <div class="form-check d-inline-block form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="Dashboard" id="Dashboard" class="form-check-input">
                                                    Dashboard
                                                </label>
                                            </div>
                                            <div class="form-check d-inline-block form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="User" id="User" class="form-check-input">
                                                    User
                                                </label>
                                            </div>
                                            <div class="form-check d-inline-block form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="Payroll" id="Payroll" class="form-check-input">
                                                    Payroll
                                                </label>
                                            </div>
                                            <div class="form-check d-inline-block form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="Request" id="Request" class="form-check-input">
                                                    Requetes
                                                </label>
                                            </div>
                                            <div class="form-check d-inline-block form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="Activites" id="Activites" class="form-check-input">
                                                    Activites
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2 btn-sm">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Design and Developed By<a href="http://upscaleitsolutions.com/" target="_blank"> Upscale IT Solutions.</a></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright ?? 2021. All rights reserved.</span>
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
    <!-- End custom js for this page-->
</body>

</html>

