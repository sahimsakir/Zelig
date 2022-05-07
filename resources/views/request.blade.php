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
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="alert-box mb-2 mt-2">
                                    @if(Session::get('success'))
                                        <div class="alert alert-success mt-3">
                                            {{ Session::get('success') }}
                                        </div>
                                        
                                    @endif
    
                                    @if(Session::get('fail'))
                                        <div class="alert alert-danger mt-3">
                                            {{ Session::get('fail') }}
                                        </div>
                                    @endif
                                </div>
                                @foreach ($leave as $i)
                                @if ($i->status=="pending")
                                <div class="alert alert-primary mb-3" role="alert">
                                    <h3>{{$i->name}} is requesting a leave</h3>
                                    <div class="text-right">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$i->id}}">
                                            See Details
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$i->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{$i->id}}">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <p>{{$i->name}} is requesting leave</p>
                                                       <p>Date : {{$i->from_date}} - {{$i->to_date}}</p>
                                                       <p>Total days : {{$i->total_days}}</p>
                                                       <p>Type of leave : {{$i->type_name}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                        <form action="/request/approve/{{$i->id}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="/request/approve/{{$i->id}}" method="post">
                                            @csrf
                                            <button  type="submit" class="btn btn-primary btn-sm">Approve</button>
                                        </form>
                                        <form action="/request/reject/{{$i->id}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                        
                                    </div>
                                </div>
                                @endif
                                @endforeach
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
    <!-- End custom js for this page-->
</body>

</html>

