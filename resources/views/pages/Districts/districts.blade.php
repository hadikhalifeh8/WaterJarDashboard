@extends('layouts.master')
@section('css')
  


@section('title')
    {{ trans('districtsTransl.districts_List') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{ trans('districtsTransl.districts_List') }}</h4>
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
                {{ trans('districtsTransl.Add_district') }}
            </button>
            <br><br>

              



            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                           
                            <th>#</th>
                            <th> {{ trans('districtsTransl.names_table') }}</th>
                            <th> {{ trans('districtsTransl.names_Towns_table') }}</th>
                            <th> {{ trans('districtsTransl.process') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                

                        <?php $i = 0; ?>

                        @foreach ($districts as $V_districts)
                            <tr>
                                <?php $i++; ?>
                               
                                <td>{{ $i }}</td>
                                <td>{{$V_districts->name}}</td>
                                <td>{{$V_districts->towns_rltn->name}}</td>

                                
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$V_districts->id}}"
                                        title="{{ trans('townsTransl.edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$V_districts->id}}"
                                        title="{{ trans('townsTransl.delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{$V_districts->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('districtsTransl.update_districts') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{route('Districts.update', 'test')}}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('districtsTransl.name_ar') }}
                                                            :</label>
                                                        <input id="text" type="text" name="name_ar"
                                                               class="form-control"
                                                               value="{{$V_districts->getTranslation('name','ar')}}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{$V_districts->id}}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ trans('districtsTransl.name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$V_districts->getTranslation('name','en')}}" 
                                                               name="name_en" required>
                                                    </div>

                                                    
                                                </div><br>
                                                
                                                <div class="col">
                            <div class="form-group">
                                <label for="">{{ trans('districtsTransl.town') }}</label>
                                <select class="custom-select" name="town">
                                <option value="{{ $V_districts->towns_rltn->id }}">
                                               {{ $V_districts->towns_rltn->name }}
                                         </option>
                                    @foreach($towns as $V_towns)
                                        <option value="{{$V_towns->id}}">{{$V_towns->name}}</option>
                                    @endforeach
                                            
                                        </select>
                     
                            </div>
                        </div>
                                               
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('districtsTransl.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ trans('districtsTransl.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{$V_districts->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('districtsTransl.delete_district') }} : {{$V_districts->name}}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('Districts.destroy', 'test')}}"
                                                  method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('districtsTransl.Warning_districts') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{$V_districts->id}}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('districtsTransl.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('districtsTransl.submit') }}</button>
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
                    {{ trans('districtsTransl.Add_district') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{route('Districts.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Districts">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('townsTransl.name_ar') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_ar" />
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('townsTransl.name_en') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_en" />
                                        </div>





                                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="inputName">{{ trans('districtsTransl.town') }}</label>
                                <select class="custom-select" name="town">
                                        <option   selected disabled>{{ trans('districtsTransl.choose_a_town') }}</option>
                                    @foreach($towns as $V_towns)
                                        <option value="{{$V_towns->id}}">{{$V_towns->name}}</option>
                                    @endforeach
                                            
                                        </select>
                     
                            </div>
                        </div>

                                        


                                   

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('townsTransl.processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('townsTransl.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('townsTransl.add_row') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('townsTransl.close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('townsTransl.submit') }}</button>
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

@endsection