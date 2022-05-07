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

                                <form class="form-sample" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @foreach ($sale as $i)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 ">Enter Product Name*</label>
                                                <div class="col-sm">
                                                    <input type="text" name="product_name" class="form-control" placeholder="Enter Name/ID" value="{{$i->product_name}}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Reference / Sales Number</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="reference" placeholder="Reference / Sales Number" class="form-control" value="{{$i->reference}}" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Enter Purchase Cost</label>
                                                <div class="col-sm-12">
                                                    <input type="number" name="purchase_cost" placeholder="Enter Purchase Cost" class="form-control" value="{{$i->purchase_cost}}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Enter sale date</label>
                                                <div class="col-sm-12">
                                                    <input type="date" name="sale_date" placeholder="Enter sale date" class="form-control" value="{{$i->sale_date}}" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Purchase From</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="purchase_from" placeholder="Enter purchase from" class="form-control" value="{{$i->purchase_from}}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-sm-12">Quantity</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" name="quantity" placeholder="Enter perpous" class="form-control" value="{{$i->quantity}}" required />
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
                                                <label class="col-sm-12">Deliverd to</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control " name="buyer" required>
                                                        <option value="{{$i->buyer_name}}">{{$i->buyer_name}}</option>
                                                        @foreach($buyer as $k)
                                                        @if($k->buyer_name==$i->buyer_name)
                                                        @else
                                                        <option value="{{$k->buyer_name}}">{{$k->buyer_name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-sm-12">Enter Sales Type</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control " name="sales_type" required>
                                                            <option value="{{$i->sales_type}}">{{$i->sales_type}}</option>
                                                            @foreach($sales_type as $j)
                                                            @if($j->sales_type==$i->sales_type)
                                                            @else
                                                            <option value="{{$j->sales_type}}">{{$j->sales_type}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-sm-12">Enter Dept</label>
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12">Payment Method</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control " name="payment" required>
                                                        <option value="{{$i->payment_name}}">{{$i->payment_name}}</option>
                                                        @foreach($payment as $j)
                                                        @if($j->payment_name==$i->payment_name)
                                                        @else
                                                        <option value="{{$j->payment_name}}">{{$j->payment_name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-sm-12">Enter Sales Ammount</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" name="sale_ammount" placeholder="Enter sales Ammount" class="form-control" value="{{$i->sale_ammount}}" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-sm-12">Enter Due Ammount</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" name="due_ammount" placeholder="Enter Due Ammount" class="form-control" value="{{$i->due_ammount}}" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-sm-12">Profit In Ammont</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" name="profit_ammount" placeholder="Enter perpous" class="form-control" value="{{$i->profit_ammount}}" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-sm-12">Profit In percentage(%)</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" name="profit_percentage" placeholder="Enter perpous" class="form-control" value="{{$i->profit_percentage}}" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-sm-12">Due</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control " name="due" required>
                                                            <option value="{{$i->due}}">{{$i->due}}</option>
                                                            @if ($i->due=='No')
                                                            <option value="Yes">Yes</option>
                                                            @else
                                                            <option value="No">No</option>
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-sm-12">Due Date</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" name="due_date" placeholder="Enter perpous" class="form-control" value="{{$i->due_date}}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div>
                                                <label for="formFileLg" class="form-label">Attach Document</label><br/>
                                                <a href="{{asset($i->attachment)}}"><img src="{{asset('assets/images/pdf.png')}}" alt="" width="50px" style="margin: 10px 0px;"> {{$i->attachment}}</a>
                                                <input type="file" class="form-control form-control-lg" name="attachment" id="formFileLg">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-sm-12">Remarks</label>
                                                    <div class="col-sm-12">
                                                        <textarea name="remarks" id="" cols="30" rows="5" value="{{$i->remarks}}">{{$i->remarks}}</textarea>
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

