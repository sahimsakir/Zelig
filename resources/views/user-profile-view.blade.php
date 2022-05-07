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
                                <h2>User Profile</h2>
                                <form class="form-sample"method="post" enctype="multipart/form-data">
                                    @csrf
                                    @foreach ($user as $i)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 ">Employee Name*</label>
                                                <div class="col-sm">
                                                    <input type="text" name="name" value="{{$i->name}}"class="form-control" placeholder="Enter Name/ID" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">DOB</label>
                                                <div class="col-sm-12">
                                                    <input type="date"  name="dob" value="{{$i->dob}}" placeholder="" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Enter NID Number</label>
                                                <div class="col-sm-12">
                                                    <input type="text"  name="nid" value="{{$i->nid}}" placeholder="00000" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Enter Phone Number</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="phone_number" value="{{$i->phone_number}}" placeholder="00000" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Designation</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="designation" value="{{$i->designation}}" placeholder="Senior Executive" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Department</label>
                                                <div class="col-sm-12">
                                                   <select class="form-control " name="department" required>
                                                        <option value="{{$i->department_name}}">{{$i->department_name}}</option>
                                                        @foreach ($department as $j)
                                                        @if($j->department_name == $i->department_name)
                                                        @else
                                                        <option value="{{$j->department_name}}">{{$j->department_name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div>
                                                <label for="formFileLg" class="form-label">Attach Document PDF</label>
                                                <a href="{{asset($i->attachment)}}"><img src="{{asset('assets/images/pdf.png')}}"  class="d-block img-responsive" alt="" width="73px" style="margin: 10px 0px;"> <p>{{$i->attachment}}</p> </a>
                                            </div>
                                         </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="formFileLg" class="form-label">User Image(png/jpg)</label>
                                                    <img src="{{asset($i->image)}}" class="d-block img-responsive" alt="" width="100px" style="margin: 10px 0px;">
                                                </div>
                                            </div>
                                        <div class="col-md-6">
                                            <div>
                                                <label for="formFileLg" class="form-label">Attendance Details</label>
                                                <a href="/pdf/{{$i->id}}" class="d-block">Click Here to see Leave Document</a>
                                            </div>
                                        
                                               
                                <div class="col-lg-12 grid-margin stretch-card mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Leave Details</h4>
                                         
                                            <div class="table-responsive pt-2">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                #
                                                            </th>
                                                            <th>
                                                               Leave Type
                                                            </th>
                                                            <th>
                                                               Remaining Leave
                                                            </th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <input type="hidden" value="{{$sl=0}}"/>
                                                        @foreach ($leave as $j)
                                                        <tr>
                                                            <td>
                                                                {{$sl +=1}}
                                                            </td>
                                                            <td>
                                                               {{$j->type_name}}
                                                            </td>
                                                            <td>
                                                                {{$remains = 12 - $j->total_days}}
                                                            </td>
                                                            
                                                        </tr>
                                                        @endforeach
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                       
                                        </div>
                                    </div>
                                </div>
                                            </div>
                                        </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary mb-2 btn-sm">Save</button>
                                    </div>
                                    @endforeach
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
</body>

</html>

