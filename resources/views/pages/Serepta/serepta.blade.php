@extends('layouts.master')
@section('css')
    


@section('title')
    {{ trans('sereptaTransl.serepta_List') }} 
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{ trans('sereptaTransl.serepta_List') }}</h4>
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

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('sereptaTransl.Add_product') }}
            </button>
            <br><br>

              



            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                           
                            <th>#</th>
                            <th> {{ trans('sereptaTransl.names_table') }}</th>
                            <th> {{ trans('sereptaTransl.price_lira') }}</th>
                            <th> {{ trans('sereptaTransl.price_dollar') }}</th>

                            <th> {{ trans('sereptaTransl.process') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                

                        <?php $i = 0; ?>

                        @foreach ($serepta as $V_serepta)
                            <tr>
                                <?php $i++; ?>
                               
                                <td>{{ $i }}</td>
                                <td>{{$V_serepta->name}}</td>
                                <td>{{$V_serepta->price_Lira}}</td>
                                <td>{{$V_serepta->price_Dollar}}</td>

                                
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$V_serepta->id}}"
                                        title="{{ trans('sereptaTransl.edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$V_serepta->id}}"
                                        title="{{ trans('sereptaTransl.delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{$V_serepta->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('sereptaTransl.update_product') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{route('Serepta.update', 'test')}}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                   
                                                    

                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('sereptaTransl.name_ar') }}
                                                            :</label>
                                                        <input id="text" type="text" name="name_ar"
                                                               class="form-control"
                                                               value="{{$V_serepta->getTranslation('name','ar')}}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{$V_serepta->id}}">
                                                    </div>


                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('sereptaTransl.name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$V_serepta->getTranslation('name','en')}}" 
                                                               name="name_en" required>
                                                    </div>
                                                    
                                                </div><br>

                                                <div class="modal-body">

                                                <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('sereptaTransl.price_lira') }}
                                                :</label>
                                            <input class="form-control" value="{{$V_serepta->price_Lira}}" type="number" min="0" name="price_Lira" required onkeypress="return restrictChars(event)" />
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('sereptaTransl.price_dollar') }}
                                                :</label>
                                            <input class="form-control" step="0.1"  value="{{$V_serepta->price_Dollar}}" type="number" min="0" name="price_Dollar" required onkeypress="return restrictChars(event)" />
                                        </div>

                                                </div><br>
                                                
                                                <div class="col">
                     
                        </div>
                                               
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('sereptaTransl.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ trans('sereptaTransl.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{$V_serepta->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('sereptaTransl.delete_product') }} : {{$V_serepta->name}}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('Serepta.destroy', 'test')}}"
                                                  method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('sereptaTransl.Warning_districts') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{$V_serepta->id}}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('sereptaTransl.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('sereptaTransl.submit') }}</button>
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


<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ trans('sereptaTransl.Add_product') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{route('Serepta.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Serepta">
                                <div data-repeater-item>
                                    <div class="row">


                                    <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('sereptaTransl.name_ar') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_ar" />
                                        </div>

                                
                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('sereptaTransl.name_en') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_en" />
                                        </div>



                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('sereptaTransl.price_lira') }}
                                                :</label>
                                            <input class="form-control" type="number" min="0" name="price_Lira" onkeypress="return restrictChars(event)" />
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('sereptaTransl.price_dollar') }}
                                                :</label>
                                            <input class="form-control" step="any" type="number" min="0" name="price_Dollar" onkeypress="return restrictChars(event)" />
                                        </div>

                                   

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('sereptaTransl.processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('sereptaTransl.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('sereptaTransl.add_row') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('sereptaTransl.close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('sereptaTransl.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
</div>



<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('My_Classes_trans.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    {{ trans('My_Classes_trans.Warning_Grade') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
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