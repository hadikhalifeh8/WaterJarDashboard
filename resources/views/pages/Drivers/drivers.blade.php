@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('driversTransl.Drivers_List') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{ trans('driversTransl.Drivers_List') }}</h4>
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
                        {{ trans('driversTransl.add_driver') }}
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('driversTransl.names_table')}}</th>
                                <th>{{trans('driversTransl.phone_table')}}</th>
                                <!-- <th>{{trans('driversTransl.customer_table')}}</th> -->
                                
                                <th>{{trans('driversTransl.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($drivers as $V_drivers)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $V_drivers->name }}</td>
                                    <td>{{ $V_drivers->phone }}</td>
                                
                                   

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $V_drivers->id }}"
                                                title="{{ trans('driversTransl.edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $V_drivers->id }}"
                                                title="{{ trans('driversTransl.delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $V_drivers->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('driversTransl.update_driver') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{route('Drivers.update','test')}}" method="post">
                                                    {{method_field('patch')}}
                                      @csrf
                                          

                                <div class="row">
                                <div class="col">
                                            <label for=""
                                                class="mr-sm-2">{{ trans('driversTransl.name_ar')}}
                                                :</label>
                                            <input class="form-control" type="text" name="name_ar" 
                                            value="{{$V_drivers->getTranslation('name', 'ar')}}"
                                            
                                            required>
                                        </div>


                                        <div class="col">
                                            <label for=""
                                                class="mr-sm-2">{{ trans('driversTransl.name_en')}}
                                                :</label>
                                            <input class="form-control" type="text" name="name_en" 
                                            value="{{$V_drivers->getTranslation('name', 'en')}}"
                                            required>

                                            <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{$V_drivers->id}}">
                                        </div>

                            
                            </div><br>

                            <div class="row">

                            <div class="col">
                                    <label for=""
                                           class="mr-sm-2">{{ trans('driversTransl.phne_no') }}
                                        :</label>
                                    <input type="number" step="1" min="0" class="form-control" name="phone" 
                                    value="{{$V_drivers->phone}}" required> 
                                </div>

                                <div class="col">
                                    <label for=""
                                           class="mr-sm-2">{{ trans('driversTransl.password') }}
                                        :</label>
                                    <input type="password"  class="form-control" name="password" value="{{$V_drivers->password}}" required>
                                </div>


                            </div><br>


                            

                            <br><br>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('driversTransl.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('driversTransl.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                 <!-- delete_modal_Grade -->
               <div class="modal fade" id="delete{{ $V_drivers->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                   id="exampleModalLabel">
                                   {{ trans('driversTransl.delete_customer') }} : {{$V_drivers->name}}
                               </h5>
                               <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                              <div class="modal-body">
                                 <form action="{{route('Drivers.destroy','test')}}" method="post">
                                     {{method_field('Delete')}}
                                     @csrf
                                    {{ trans('driversTransl.Warning_driver') }}
                                     <input id="id" type="hidden" name="id" class="form-control"
                                            value="{{ $V_drivers->id }}">
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary"
                                                 data-dismiss="modal">{{ trans('driversTransl.close') }}</button>
                                         <button type="submit"
                                                 class="btn btn-danger">{{ trans('driversTransl.submit') }}</button>
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
                            {{ trans('driversTransl.add_driver') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Drivers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                

                                <div class="col">
                                            <label for=""
                                                class="mr-sm-2">{{ trans('driversTransl.name_ar')}}
                                                :</label>
                                            <input class="form-control" type="text" name="name_ar" />
                                        </div>


                                        <div class="col">
                                            <label for=""
                                                class="mr-sm-2">{{ trans('driversTransl.name_en')}}
                                                :</label>
                                            <input class="form-control" type="text" name="name_en" />
                                        </div>

                               
                            </div><br>
                            <div class="row">
                            
                            <div class="col">
                                    <label for=""
                                           class="mr-sm-2">{{ trans('driversTransl.phne_no') }}
                                        :</label>
                                    <input type="number" step="1" min="0" class="form-control" name="phone" onkeypress="return restrictChars(event)">
                                </div>


                                <div class="col">
                                    <label for=""
                                           class="mr-sm-2">{{ trans('driversTransl.password') }}
                                        :</label>
                                    <input type="text"  class="form-control" name="password">
                                </div>
           
                        </div><br>



                          

                            <br><br>
                         
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('driversTransl.close') }}</button>
                        <button type="submit"
                                class="btn btn-success">{{ trans('driversTransl.submit') }}</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>








    <!-- row closed -->
@endsection
@section('js')


<!-- Select 2 Multiple -->
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
<!-- Select 2 Multiple -->








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