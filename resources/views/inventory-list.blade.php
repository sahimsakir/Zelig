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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List of items</h4>
                                <div class="text-left">
                                    <form class="row row-cols-lg-auto g-3 align-items-center">
                                        <div class="col-12">
                                            <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="myInput" id="inlineFormInputGroupUsername" placeholder="Inventory Name">
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="table-responsive pt-2">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Name/ID
                                                </th>
                                                <th>
                                                   Weight
                                                </th>
                                                <th>
                                                    Department
                                                </th>
                                                <th>
                                                    Details
                                                </th>
                                            </tr>
                                        </thead>
                                        <input type="hidden" value="{{$sl=0}}"/> 
                                        <tbody id="myTable">
                                            @foreach($inventory as $i)
                                            <tr>
                                                <td>
                                                    {{$sl +=1}}
                                                </td>
                                                <td>
                                                    {{$i->inventory_name}}
                                                </td>
                                                <td>
                                                    {{$i->inventory_quantity}}
                                                </td>
                                                <td>
                                                    {{$i->department_name}}
                                                </td>
                                                <td>
                                                     <a href="/edit-inventory/{{$i->id}}" class="btn btn-primary btn-sm">See Details</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$inventory->links()}}
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
    <!-- End custom js for this page-->
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            
        });
    </script>
</body>

</html>

