@extends('layouts.master')
@section('css')

@section('title')
{{ trans('driversTransl.Drivers_Returned_Jars') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('driversTransl.Drivers_Returned_Jars') }}</h4>
        </div>
        <!-- <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div> -->
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
            <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">{{ trans('customers_OrdersTransl.driver_name') }} :</label>
                                <select class="custom-select" name="driver_id" onchange="console.log($(this).val())">
                                        <option   selected disabled>{{ trans('customers_OrdersTransl.choose_a_driver') }}</option>
                                        @foreach($drivers as $V_drivers)
                                        <option value="{{$V_drivers->id}}">{{$V_drivers->name}}</option>
                                    @endforeach
                                            
                                        </select>
                     
                            </div></div>
                            </div><br>

                            <div class="row">


                                            <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversTransl.qty_Jars_Load') }}
                                                            :</label>
                                                     

                                                               <input class="form-control" type="text"  name="totalJars" id="totalJar_s"  readonly />
                                                  

                                                    </div>

                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversTransl.Quantity_Jar_In') }}
                                                            :</label>
                                                        <input class="form-control"  type="text" name="qty_jar_in" id="qty_jar_in_S"  readonly/>

                                                    </div>
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversTransl.Quantity_Jar_Out') }}
                                                            :</label>
                                                        <input class="form-control" type="text"  name="qty_jar_out" id="qty_jar_out_S" readonly/>
                                                    </div>

													<div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversTransl.qty_Jars_returned_Fill') }}
                                                            :</label>
                                                        <input class="form-control" type="text"  name="sum_qty_of_fills_jars_returned" id="Sum_qty_jars_Fill_returned" readonly/>
                                                    </div>
                                                    
                                                </div><br>
                            
                <p>Page content goes here<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>

           
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')


<script>
    $(document).ready(function () {
        $('select[name="driver_id"]').on('change', function () {
            var driver_id = $(this).val();
            if (driver_id) {
                $.ajax({
                    url: "{{ URL::to('Get_JarsLoad') }}/" + driver_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
						$('#totalJar_s').val(data);
					//	$('#town_name').val(data.town_name); // Assuming the town_name is returned along with the town ID
                      
                    },
                    error: function (xhr, status, error) {
                        // console.log(error);
						console.log("XHR Status: " + status);
                        console.log("Error: " + error);
                        console.log(xhr.responseText);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<!-- -------------------------------------------------------------------------------------------->
<script>
    $(document).ready(function () {
        $('select[name="driver_id"]').on('change', function () {
            var driver_id = $(this).val();
            if (driver_id) {
                $.ajax({
                    url: "{{ URL::to('Get_JarsIn') }}/" + driver_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
						$('#qty_jar_in_S').val(data);
					//	$('#town_name').val(data.town_name); // Assuming the town_name is returned along with the town ID
                      
                    },
                    error: function (xhr, status, error) {
                        // console.log(error);
						console.log("XHR Status: " + status);
                        console.log("Error: " + error);
                        console.log(xhr.responseText);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<!-- -------------------------------------------------------------------------------------------->
<script>
    $(document).ready(function () {
        $('select[name="driver_id"]').on('change', function () {
            var driver_id = $(this).val();
            if (driver_id) {
                $.ajax({
                    url: "{{ URL::to('Get_JarsOut') }}/" + driver_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
						$('#qty_jar_out_S').val(data);
					//	$('#town_name').val(data.town_name); // Assuming the town_name is returned along with the town ID
                      
                    },
                    error: function (xhr, status, error) {
                        // console.log(error);
						console.log("XHR Status: " + status);
                        console.log("Error: " + error);
                        console.log(xhr.responseText);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<!-- -------------------------------------------------------------------------------------------->
<script>
    $(document).ready(function () {
        $('select[name="driver_id"]').on('change', function () {
            var driver_id = $(this).val();
            if (driver_id) {
                $.ajax({
                    url: "{{ URL::to('Get_SumQtyOfJarsFillsReturned') }}/" + driver_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
						$('#Sum_qty_jars_Fill_returned').val(data);
					//	$('#town_name').val(data.town_name); // Assuming the town_name is returned along with the town ID
                      
                    },
                    error: function (xhr, status, error) {
                        // console.log(error);
						console.log("XHR Status: " + status);
                        console.log("Error: " + error);
                        console.log(xhr.responseText);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>





@endsection






