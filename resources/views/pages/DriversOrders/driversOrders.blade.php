@extends('layouts.master')
@section('css')
    
@section('title')
    {{ trans('driversOrdersTransl.Drivers_Orders_List') }} 
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{ trans('driversOrdersTransl.Drivers_Orders_List') }}</h4>
        </div>
    </div>
</div>
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


            <br><br>

              



            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                           
                            <th>#</th>
                            <th> {{ trans('driversOrdersTransl.customer_table') }}</th>
                            <th> {{ trans('driversOrdersTransl.town_table') }}</th>
							<th> {{ trans('driversOrdersTransl.districts_table') }}</th>
							<th> {{ trans('driversOrdersTransl.total_price_table') }}</th>

                            

                            <th> {{ trans('driversOrdersTransl.process') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                

                        <?php $i = 0; ?>

                        @foreach ($driversOrders as $V_driversOrders)
                            <tr>
                                <?php $i++; ?>
                               
                                <td>{{ $i }}</td>
                                <td>{{$V_driversOrders->customer_name}}</td>
                                <td>{{$V_driversOrders->town_name}}</td>
                                <td>{{$V_driversOrders->district_name}}</td>
                                <td>{{$V_driversOrders->total_price}}</td>

                                
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$V_driversOrders->id}}"
                                        title="{{ trans('driversOrdersTransl.view') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$V_driversOrders->id}}"
                                        title="{{ trans('driversOrdersTransl.delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{$V_driversOrders->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('driversOrdersTransl.Drivers_Orders_List') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{route('Tannourine.update', 'test')}}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.driver_name') }}
                                                            :</label>
                                                        <input id="text" type="text" name="driver_name"
                                                               class="form-control"
                                                               value="{{$V_driversOrders->driver_name}}"
                                                               readonly>

                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{$V_driversOrders->id}}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.customer_name') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$V_driversOrders->customer_name}}" 
                                                               name="customer_name" readonly>
                                                    </div>
                                                    
                                                </div><br>


												<div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.town_name') }}
                                                            :</label>
                                                        <input id="text" type="text" name="town_name"
                                                               class="form-control"
                                                               value="{{$V_driversOrders->town_name}}"
                                                               readonly>

                                                    </div>
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.district_name') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$V_driversOrders->district_name}}" 
                                                               name="district_name" readonly>
                                                    </div>
                                                    
                                                </div><br>


												
												<div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.serepta_name') }}
                                                            :</label>
                                                        <input id="text" type="text" name="serepta_name"
                                                               class="form-control"
                                                               value="{{$V_driversOrders->serepta_name}}"
                                                               readonly>

                                                    </div>
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.srpta_price_Lira') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$V_driversOrders->srpta_price_Lira}}" 
                                                               name="srpta_price_Lira" readonly>
                                                    </div>
                                                    
                                                </div><br>


												<div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.qty_jar_in') }}
                                                            :</label>
                                                        <input id="text" type="text" name="qty_jar_in"
                                                               class="form-control"
                                                               value="{{$V_driversOrders->qty_jar_in}}"
                                                               readonly>

                                                    </div>
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.qty_jar_out') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$V_driversOrders->qty_jar_out}}" 
                                                               name="qty_jar_out" readonly>
                                                    </div>

													<div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.qty_previous_jars') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$V_driversOrders->qty_previous_jars}}" 
                                                               name="qty_previous_jars" readonly>
                                                    </div>
                                                    
                                                </div><br>


												<div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.total_jar') }}
                                                            :</label>
                                                        <input id="text" type="text" name="total_jar"
                                                               class="form-control"
                                                               value="{{$V_driversOrders->total_jar}}"
                                                               readonly>

                                                    </div>


													<div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.total_price_jars') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$V_driversOrders->total_price_jars}}" 
                                                               name="total_price_jars" readonly>
                                                    </div>
                                                    
                                                </div><br>
												
												

												<div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.old_debt') }}
                                                            :</label>
                                                        <input id="text" type="text" name="old_debt"
                                                               class="form-control"
                                                               value="{{$V_driversOrders->old_debt}}"
                                                               readonly>

                                                    </div>
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.new_debt') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$V_driversOrders->new_debt}}" 
                                                               name="new_debt" readonly>
                                                    </div>

                                                    
                                                </div><br>
												
												
												<div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.paid') }}
                                                            :</label>
                                                        <input id="text" type="text" name="paid"
                                                               class="form-control"
                                                               value="{{$V_driversOrders->paid}}"
                                                               readonly>

                                                    </div>
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.total_price') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$V_driversOrders->total_price}}" 
                                                               name="total_price" readonly>
                                                    </div>

                                                    
                                                </div><br>							


                                
												
												<br>
                                                
                                   
                                               
                                                <br><br>
<!-- 
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('driversOrdersTransl.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ trans('driversOrdersTransl.submit') }}</button>
                                                </div> -->
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



</div>




<div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('driversOrdersTransl.sumOfTotalPrice') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$toatalPrice}}" 
                                                               name="new_debt" readonly>
                                                    </div>


</div>

</div>

<!-- row closed -->
@endsection
@section('js')


<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });

</script>



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