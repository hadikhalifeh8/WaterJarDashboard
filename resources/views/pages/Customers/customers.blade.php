@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('customersTransl.Customers_List') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{ trans('customersTransl.Customers_List') }}</h4>
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
                        {{ trans('customersTransl.add_customer') }}
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('customersTransl.names_table')}}</th>
                                <th>{{trans('customersTransl.phone_table')}}</th>
                                <th>{{trans('customersTransl.driver_table')}}</th>
                                <th>{{trans('customersTransl.names_Towns_table')}}</th>
                                <th>{{trans('customersTransl.districts_table')}}</th>
                                <th>{{trans('customersTransl.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($customers as $V_customers)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $V_customers->name }}</td>
                                    <td>{{ $V_customers->phone }}</td>
                                    <td>{{ $V_customers->driver_rltn->name }}</td>
                                    <td>{{ $V_customers->towns_rltn->name }}</td>
                                    <td>{{ $V_customers->district_rltn->name }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $V_customers->id }}"
                                                title="{{ trans('customersTransl.edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $V_customers->id }}"
                                                title="{{ trans('customersTransl.delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $V_customers->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('customersTransl.update_customer') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{route('Customers.update','test')}}" method="post">
                                                    {{method_field('patch')}}
                                      @csrf
                                          

                                <div class="row">
                                <div class="col">
                                            <label for=""
                                                class="mr-sm-2">{{ trans('customersTransl.name_ar')}}
                                                :</label>
                                            <input class="form-control" type="text" name="name_ar" 
                                            value="{{$V_customers->getTranslation('name', 'ar')}}"
                                            
                                            required>
                                        </div>


                                        <div class="col">
                                            <label for=""
                                                class="mr-sm-2">{{ trans('customersTransl.name_en')}}
                                                :</label>
                                            <input class="form-control" type="text" name="name_en" 
                                            value="{{$V_customers->getTranslation('name', 'en')}}"
                                            required>

                                            <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{$V_customers->id}}">
                                        </div>

                                <div class="col">
                                    <label for=""
                                           class="mr-sm-2">{{ trans('customersTransl.phne_no') }}
                                        :</label>
                                    <input type="number" step="1" min="0" class="form-control" name="phone" 
                                    value="{{$V_customers->phone}}"
                                    onkeypress="return restrictChars(event)">
                                </div>
                            </div><br>


                            <div class="row">
                            
                            <div class="col">
                            <div class="form-group">
                                <label for="">{{ trans('customersTransl.town_name') }} :</label>
                                <select class="custom-select" name="town_id" onchange="console.log($(this).val())">
                                       <option value="{{ $V_customers->towns_rltn->id }}">
                                               {{ $V_customers->towns_rltn->name }}
                                         </option>
                                    @foreach($town as $V_towns)
                                        <option value="{{$V_towns->id}}">{{$V_towns->name}}</option>
                                    @endforeach
                                            
                                        </select>
                     
                            </div>
                            </div>




                            <div class="col">
                          
                                <label for="inputName">{{ trans('customersTransl.district_name') }} :</label>
                                <select class="custom-select" name="district_id">
                                  
                                <option
                                       value="{{ $V_customers->district_rltn->id }}">
                                       {{ $V_customers->district_rltn->name }}
                                 </option>
                                        </select>
                            
                            </div>
                        </div><br>


                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">{{ trans('customersTransl.driver_name') }} :</label>
                                <select class="custom-select" name="driver_id" onchange="console.log($(this).val())">
                                       <option value="{{ $V_customers->driver_rltn->id }}">
                                               {{ $V_customers->driver_rltn->name }}
                                         </option>
                                    @foreach($driver as $V_driver)
                                        <option value="{{$V_driver->id}}">{{$V_driver->name}}</option>
                                    @endforeach
                                            
                                        </select>
                     
                            </div>
                            </div>
                          </div><br>











                                                  
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('customersTransl.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('customersTransl.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $V_customers->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('customersTransl.delete_customer') }} : {{$V_customers->name}}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Customers.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    {{ trans('customersTransl.Warning_customer') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $V_customers->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('customersTransl.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('customersTransl.submit') }}</button>
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
                            {{ trans('customersTransl.add_customer') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Customers.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                

                                <div class="col">
                                            <label for=""
                                                class="mr-sm-2">{{ trans('customersTransl.name_ar')}}
                                                :</label>
                                            <input class="form-control" type="text" name="name_ar" />
                                        </div>


                                        <div class="col">
                                            <label for=""
                                                class="mr-sm-2">{{ trans('customersTransl.name_en')}}
                                                :</label>
                                            <input class="form-control" type="text" name="name_en" />
                                        </div>

                                <div class="col">
                                    <label for=""
                                           class="mr-sm-2">{{ trans('customersTransl.phne_no') }}
                                        :</label>
                                    <input type="number" step="1" min="0" class="form-control" name="phone" onkeypress="return restrictChars(event)">
                                </div>
                            </div><br>
                            <div class="row">
                            
                            <div class="col">
                            <div class="form-group">
                                <label for="">{{ trans('customersTransl.town_name') }} :</label>
                                <select class="custom-select" name="town_id" onchange="console.log($(this).val())">
                                        <option   selected disabled>{{ trans('customersTransl.choose_a_town') }}</option>
                                    @foreach($town as $V_towns)
                                        <option value="{{$V_towns->id}}">{{$V_towns->name}}</option>
                                    @endforeach
                                            
                                        </select>
                     
                            </div>
                            </div>




                            <div class="col">
                          
                                <label for="inputName">{{ trans('customersTransl.district_name') }} :</label>
                                <select class="custom-select" name="district_id">
                                  
                                            
                                        </select>
                            
                            </div>
                        </div><br>



                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">{{ trans('customersTransl.driver_name') }} :</label>
                                <select class="custom-select" name="driver_id" onchange="console.log($(this).val())">
                                        <option   selected disabled>{{ trans('customersTransl.choose_a_driver') }}</option>
                                    @foreach($driver as $V_driver)
                                        <option value="{{$V_driver->id}}">{{$V_driver->name}}</option>
                                    @endforeach
                                            
                                        </select>
                     
                            </div></div>
                            </div><br>



                           
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('customersTransl.close') }}</button>
                        <button type="submit"
                                class="btn btn-success">{{ trans('customersTransl.submit') }}</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>








    <!-- row closed -->
@endsection
@section('js')
   



<!-- //-- START on change a tannourine Product get the price L.L and price $ that belongs to the town -->

<script>
        
    $(document).ready(function () {
        $('select[name="town_id"]').on('change', function () {
            var town_id = $(this).val();
            if (town_id) {
                $.ajax({
                    url: "{{ URL::to('Get_district') }}/" + town_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="district_id"]').empty();
                        $('select[name="district_id"]').append('<option selected disabled >Choose...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="district_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<!-- //-- End on change a tannourine Product get the price L.L and price $ that belongs to the town -->





<!-- ---------- -- START GET TANNOURINE PRICE_LIRA ----------- -------------- -->
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
                        $('#tann_price_Lira').val(data);
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






<!-- ---------- -- START GET TANNOURINE PRICE_DOLLAR ----------- -------------- -->
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
                        $('#tann_price_Dollar').val(data);
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







<!-- ---------- -- START GET SEREPTA PRICE_LIRA ----------- -------------- -->
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
                        $('#serep_price_Lira').val(data);
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



<!-- ---------- -- START GET SEREPTA PRICE_DOLLAR ----------- -------------- -->
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
                        $('#serep_price_Dollar').val(data);
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