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
                               <h3>Enter Your Attendance</h3>
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
                                <form class="form-sample" action="/activites/attendance" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="id"/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 "> Enter Date</label>
                                                <div class="col-sm">
                                                    <input type="date" class="form-control"  placeholder="Enter Date"  name="attendance_date" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Enter Time</label>
                                                <div class="col-sm-12">
                                                    <input type="time" placeholder="dd/mm/yy" class="form-control" name="attendance_time" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             
                                     <button type="submit" class="btn btn-primary mb-2 btn-sm">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                               <h3>Request A leave</h3>
                                <form class="form-sample" action="/activites/leave" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="id"/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 "> From</label>
                                                <div class="col-sm">
                                                    <input type="date" class="form-control"  placeholder="Enter Date"  name="fromdate" id="fromdate" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">to</label>
                                                <div class="col-sm-12">
                                                    <input type="date" placeholder="dd/mm/yy" class="form-control" name="todate" id="todate"required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 "> Total Days</label>
                                                <div class="col-sm">
                                                    <input type="number" id="totaldays" name="totaldays" class="form-control"  placeholder="Total Days 7" readonly  />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Type of leave</label>
                                                <div class="col-sm-12">
                                                    
                                                    <select class="form-control " name="leave_type" required>
                                                        <option>select</option>
                                                        @foreach ($type as $i)
                                                        <option value="{{$i->type_name}}">{{$i->type_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             <h4>Emergency Contact</h4>
                                       <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 "> Name</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control"  placeholder="Enter Name" name="emergency_contact" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Phone Number</label>
                                                <div class="col-sm-12">
                                                    <input type="text" placeholder="000-00000000" class="form-control" name="number" required />
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-md-12">
                                           <label class="col-sm-12">Address</label>
                                            <textarea name="address" id="" cols="30" rows="10"></textarea>
                                       </div>
                                    </div>
                                     <button type="submit" id="leave" class="btn btn-primary mb-2 btn-sm">Submit</button>
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
    <script>
        var submit = document.querySelector('#leave');
        var date1 = document.querySelector('#fromdate');
        var date2 = document.querySelector('#todate');
        var totaldays = document.querySelector('#totaldays');
        
        submit.addEventListener("click",()=>{
            let fromDate = new Date(document.querySelector('#fromdate').value);
            let toDate = new Date(document.querySelector('#todate').value);

            if(fromDate.getTime() && toDate.getTime()){
                let timeDiff = toDate.getTime() - fromDate.getTime();
                let days = timeDiff / (1000 * 3600 * 24);
                totaldays.value = days;
            }

        });

        
        
    </script>
</body>

</html>

