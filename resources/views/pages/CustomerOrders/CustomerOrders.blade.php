@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('customers_OrdersTransl.Customers_Orders_List') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{ trans('customers_OrdersTransl.Customers_Orders_List') }}</h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('customers_OrdersTransl.add_customer_order') }}
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('customers_OrdersTransl.driver_table')}}</th>
                                <th>{{trans('customers_OrdersTransl.customer_table')}}</th>
                                <th>{{trans('customers_OrdersTransl.town_table')}}</th>
                                <th>{{trans('customers_OrdersTransl.districts_table')}}</th>
                                <th>{{trans('customers_OrdersTransl.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($customerOrders as $customerOrders)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $customerOrders->driver_rltn->name }}</td>
                                    <td>{{ $customerOrders->customer_rltn->name }}</td>
                                    <td>{{ $customerOrders->towns_rltn->name }}</td>
                                    <td>{{ $customerOrders->district_rltn->name }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $customerOrders->id }}"
                                                title="{{ trans('customers_OrdersTransl.edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $customerOrders->id }}"
                                                title="{{ trans('customers_OrdersTransl.delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $customerOrders->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('customers_OrdersTransl.update_customer') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{route('CustomerOrders.update','test')}}" method="post">
                                                    {{method_field('patch')}}
                                      @csrf
                                          


                     <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{$customerOrders->id}}">


                                                    <div class="row">
							<div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('customers_OrdersTransl.driver_name') }}
                                                :</label>
                                <input class="form-control" type="text"  name="driver_name"  value="{{$customerOrders->driver_rltn->name}}"  readonly>
                                <input class="form-control" type="hidden" name="driver_id"  value="{{ $customerOrders->driver_rltn->id}}">
                            </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('customers_OrdersTransl.customer') }}
                                                :</label>
                                <input class="form-control" type="text" name="customer_name"  value="{{$customerOrders->customer_rltn->name}}" readonly>
                                <input class="form-control" type="hidden" name="customer_id"  value="{{$customerOrders->customer_rltn->id}}">
                                       
                                </div>
                        </div><br>                                


                            
                            <br>


                            <div class="row">
							<div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('customers_OrdersTransl.town') }}
                                                :</label>
                                <input class="form-control" type="text"  name="town_name" id="town_name" value="{{$customerOrders->towns_rltn->name}}"  readonly>
                                <input class="form-control" type="hidden" name="town_id" id="town_id" value="{{ $customerOrders->towns_rltn->id}}">
                            </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('customers_OrdersTransl.district_name') }}
                                                :</label>
                                <input class="form-control" type="text" name="district_name"  id="district_name" value="{{$customerOrders->district_rltn->name}}" readonly>
                                <input class="form-control" type="hidden" name="district_id" id="district_id" value="{{$customerOrders->district_rltn->id}}">
                                       
                                </div>
                        </div><br>







                    
                    
                    <br>

                    <div class="row">
                        <div class="col">
                             <label for="Name"
                              class="mr-sm-2">{{ trans('customers_OrdersTransl.serepta_name') }}
                              :</label>
                             <input class="form-control" type="text"  name="serepta_"  value="{{ isset($customerOrders->serepta_rltn) ? $customerOrders->serepta_rltn->name : '' }}"  readonly>
                         <input class="form-control" type="hidden" name="serepta"  value="{{ $customerOrders->serepta_rltn ? $customerOrders->serepta_rltn->id : '' }}">
                            </div>

                    <div class="col">
                                   <label for="Name"
                                      class="mr-sm-2">{{ trans('customers_OrdersTransl.serep_price_Lira') }}
                                         :</label>
                                       <input class="form-control" step="any" type="number" value="{{$customerOrders->srpta_price_Lira}}"
                                        min="0" name="serep_price_Lira"
                                        
                                            onkeypress="return restrictChars(event)" >
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('customers_OrdersTransl.serep_price_Dollar') }}
                                                :</label>
                                            <input class="form-control" step="any" type="number" min="0" value="{{$customerOrders->srpta_price_Dollar}}"
                                             name="serep_price_Dollar"
                                            
                                             onkeypress="return restrictChars(event)" />
                                        </div>
                           
                    </div>






                              
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('customers_OrdersTransl.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('customers_OrdersTransl.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $customerOrders->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('customers_OrdersTransl.delete_Customer_Order') }} : {{$customerOrders->name}}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('CustomerOrders.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    {{ trans('customers_OrdersTransl.Warning_customer') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $customerOrders->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('customers_OrdersTransl.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('customers_OrdersTransl.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            {{ trans('customers_OrdersTransl.add_customer_order') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('CustomerOrders.store') }}" method="POST">
                            @csrf


					<div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">{{ trans('customers_OrdersTransl.driver_name') }} :</label>
                                <select class="custom-select" name="driver_id" onchange="console.log($(this).val())">
                                        <option   selected disabled>{{ trans('customers_OrdersTransl.choose_a_driver') }}</option>
                                    @foreach($driver as $V_driver)
                                        <option value="{{$V_driver->id}}">{{$V_driver->name}}</option>
                                    @endforeach
                                            
                                        </select>
                     
                            </div></div>
                            </div><br>


							<div class="row">
                            <div class="col">
                            <label for="inputName">{{ trans('customers_OrdersTransl.customer') }} :</label>
                                <select class="custom-select" name="customer_id">             
                                </select>
                            </div>
                            </div><br>


                         
                            <div class="row">
							<div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('customers_OrdersTransl.town') }}
                                                :</label>
                                <input class="form-control" type="text"  name="town_name" id="towns_name"  readonly />
                                <input class="form-control" type="hidden" name="town_id" id="towns_id">
                            </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('customers_OrdersTransl.district_name') }}
                                                :</label>
                                <input class="form-control" type="text" name="district_name"   id="districts_name" readonly />
                                <input class="form-control" type="hidden" name="district_id" id="districts_id">
                                       
                                </div>
                        </div><br>







                    
                    
                    <br>

                    <div class="row">
                            <div class="col-md-5">
                            <div class="form-group">
                                <label for="">{{ trans('customers_OrdersTransl.serepta_name') }} :</label>
                                <select class="custom-select" name="serepta" onchange="console.log($(this).val())">
                                        <option   selected disabled>{{ trans('customers_OrdersTransl.choose_a_product') }}</option>
                                    @foreach($serepta as $V_serepta)
                                        <option value="{{$V_serepta->id}}">{{$V_serepta->name}}</option>
                                    @endforeach
                                            
                                        </select>
                     
                            </div>
                    </div>

                    <div class="col">
                                   <label for="Name"
                                      class="mr-sm-2">{{ trans('customers_OrdersTransl.serep_price_Lira') }}
                                         :</label>
                                       <input class="form-control" step="any" type="number"
                                        min="0" name="serep_price_Lira"
                                        id="serep_price_Lira_s"
                                            
                                            
                                            onkeypress="return restrictChars(event)" >
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('customers_OrdersTransl.serep_price_Dollar') }}
                                                :</label>
                                            <input class="form-control" step="any" type="number" min="0" name="serep_price_Dollar"
                                            id="serep_price_Dollar_s"
                                             onkeypress="return restrictChars(event)" />
                                        </div>
                           
                    </div>
                           


                            


                           
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('customers_OrdersTransl.close') }}</button>
                        <button type="submit"
                                class="btn btn-success">{{ trans('customers_OrdersTransl.submit') }}</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>








    <!-- row closed -->
@endsection
@section('js')
   

















<!-- ---------- For Add -- START on change a Customer get the Town Directly that belongs to their Customer ------ -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="customer_id"]').on('change', function () {
            var customer_id = $(this).val();
            if (customer_id) {
                $.ajax({
                    url: "{{ URL::to('Get_town') }}/" + customer_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
						$('#towns_id').val(data.town_id);
						$('#towns_name').val(data.town_name); // Assuming the town_name is returned along with the town ID
                      
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
<!-- ---------- -- END on change a Customer get the Town Directly that belongs to their Customer ------ -------------- -->


<!-- ----------For Add -- START on change a Customer get the District that belongs to their Customer ------ -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="customer_id"]').on('change', function () {
            var customer_id = $(this).val();
            if (customer_id) {
                $.ajax({
                    url: "{{ URL::to('Get_district_s') }}/" + customer_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
						 $('#districts_id').val(data.district_id);
						$('#districts_name').val(data.district_name); // Assuming the town_name is returned along with the town ID
                        
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
<!-- ---------- -- END on change a Customer get the District that belongs to their Customer ------ -------------- -->





<!-- ----------For Add -- START GET TANNOURINE PRICE_LIRA ----------- -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="tannourine"]').on('change', function () {
            var tannourine = $(this).val();
            if (tannourine) {
                $.ajax({
                    url: "{{ URL::to('Get_tannourine_price_Lira') }}/" + tannourine,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#tann_price_Lira_s').val(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- ---------- -- END GET TANNOURINE PRICE_LIRA ----------- -------------- -->







<!-- ----------For Add -- START GET TANNOURINE PRICE_DOLLAR ----------- -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="tannourine"]').on('change', function () {
            var tannourine = $(this).val();
            if (tannourine) {
                $.ajax({
                    url: "{{ URL::to('Get_tannourine_price_Dollar') }}/" + tannourine,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#tann_price_Dollar_s').val(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- ---------- -- END GET TANNOURINE PRICE_DOLLAR ----------- -------------- -->







<!-- ----------for Add -- START GET SEREPTA PRICE_LIRA ----------- -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="serepta"]').on('change', function () {
            var serepta = $(this).val();
            if (serepta) {
                $.ajax({
                    url: "{{ URL::to('Get_Serepta_price_Lira') }}/" + serepta,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#serep_price_Lira_s').val(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- ---------- -- END GET SEREPTA PRICE_LIRA ----------- -------------- -->



<!-- ----------for Add -- START GET SEREPTA PRICE_DOLLAR ----------- -------------- -->
<script>
    $(document).ready(function () {
        $('select[name="serepta"]').on('change', function () {
            var serepta = $(this).val();
            if (serepta) {
                $.ajax({
                    url: "{{ URL::to('Get_Serepta_price_Dollar') }}/" + serepta,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#serep_price_Dollar_s').val(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- ---------- -- END GET SEREPTA PRICE_DOLLAR ----------- -------------- -->






<script>  
// Deny Characters + - * / in numbers textform
        function restrictChars(event) {
            var charCode = event.which || event.keyCode;
            var charTyped = String.fromCharCode(charCode);

            // Allow backspace, delete, left arrow, right arrow, and numbers (0-9)
            if (charCode == 8 || charCode == 46 || charCode == 37 || charCode == 39 || (charCode >= 48 && charCode <= 57)) {
                return true;
            }
            // Deny specific characters: +, -, *, /
            else if (charTyped == '+' || charTyped == '-' || charTyped == '*' || charTyped == '/') {
                event.preventDefault();
                return false;
            }
            else {
                event.preventDefault();
                return false;
            }
        }
    </script>



@endsection