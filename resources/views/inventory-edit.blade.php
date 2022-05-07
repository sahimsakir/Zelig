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
                               
                                <form class="form-sample" method="post">
                                    @csrf
                                    @foreach ($inventory as $i)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 ">Name/ID*</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" name="name" placeholder="Enter Name/ID" value="{{$i->inventory_name}}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Purchase Date</label>
                                                <div class="col-sm-12">
                                                    <input type="date" placeholder="dd/mm/yy" name="date" class="form-control" value="{{$i->purchase_date}}" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Purchase Cost</label>
                                                <div class="col-sm-12">
                                                <input type="number" placeholder="Enter Purchase Cost" name="cost" value="{{$i->purchase_cost}}" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Enter Perpous</label>
                                                <div class="col-sm-12">
                                                   <input type="text" placeholder="Enter perpous" name="perpous" value="{{$i->purchase_perpous}}"class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Select Dept</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control " name="department" required>
                                                        <option value="{{$i->department_name}}">{{$i->department_name}}</option>
                                                        @foreach($department as $j)
                                                        @if($j->department_name==$i->department_name)
                                                        @else
                                                        <option value="{{$j->department_name}}">{{$j->department_name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-sm-12">Quantity</label>
                                                    <div class="col-sm-12">
                                                   <input type="text" placeholder="Enter perpous" name="quantity" class="form-control" value="{{$i->inventory_quantity}}" required />
                                                </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-sm-12">Unit</label>
                                                    <div class="col-sm-12">
                                                   <select class="form-control " name="unit" required>
                                                    <option value="{{$i->unit_name}}">{{$i->unit_name}}</option>
                                                        @foreach($unit as $k)
                                                        @if($k->unit_name==$i->unit_name)
                                                        @else
                                                        <option value="{{$k->unit_name}}">{{$k->unit_name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 ">Details</label>
                                                <div class="col-sm-9">
                                                    <textarea name="detail" id="" cols="40" rows="10" value="{{$i->detail}}" required>{{$i->detail}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-sm-12">Balance</label>
                                                    <div class="col-sm-12">
                                                   <input type="number" placeholder="Enter perpous" name="balance" value="{{$i->balance}}" class="form-control" required />
                                                </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-sm-12">Used</label>
                                                    <div class="col-sm-12">
                                                    <input type="number" placeholder="Enter perpous" name="used"  value="{{$i->used}}" class="form-control" required />
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <button type="submit" class="btn btn-primary mb-2 btn-sm">Submit</button>
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

