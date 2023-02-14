@php
    $edit = !is_null($dataTypeContent->getKey());
    $add = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .wrapper {
            display: inline-flex;
            background: #fff;
            height: 100px;
            width: 300px;
            align-items: center;
            justify-content: space-evenly;
            border-radius: 5px;
            padding: 16px 12px;
            box-shadow: 5px 5px 30px rgba(87, 85, 85, 0.2);
        }

        .wrapper .option {
            background: #fff;
            height: 60%;
            width: 60%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
            border-radius: 5px;
            cursor: pointer;
            padding: 0 6px;
            border: 2px solid lightgrey;
            transition: all 0.3s ease;
        }


        input[type="radio"] {
            display: none;
        }

        #option-1:checked:checked~.option-1,
        #option-2:checked:checked~.option-2 {
            border-color: #566474;
            background: #6e7883;
        }

        #option-1:checked:checked~.option-1 .dot,
        #option-2:checked:checked~.option-2 .dot {
            background: #fff;
        }

        #option-1:checked:checked~.option-1 .dot::before,
        #option-2:checked:checked~.option-2 .dot::before {
            opacity: 1;
            transform: scale(1);
        }

        .wrapper .option span {
            font-size: 16px;
            color: #808080;
        }

        #option-1:checked:checked~.option-1 span,
        #option-2:checked:checked~.option-2 span {
            color: #fff;
        }
        .display{
            display:none;
        }
    </style>
@stop

@section('page_title', __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' .
    $dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' . $dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="row"></div>
                <div class="panel panel-bordered container">
                    <!-- form start -->

                            @if($edit)
                            <form action="{{ route('editBanner') }}" method="post"  	enctype="multipart/form-data">
                        @csrf
                     <input type="hidden" name="id" value="{{$dataTypeContent->id}}">
                        <div class="wrapper">
                            <input type="radio" name="type" id="option-1" onclick="showDivStatic()" value="static" {{$dataTypeContent->type == 'static' ?  'checked' : '' }} >
                            <input type="radio" name="type" id="option-2" onclick="showDivDynamic()" value="dynamic" {{$dataTypeContent->type == 'dynamic' ?  'checked' : '' }}>
                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>static</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <div class="dot"></div>
                                <span>dynamic</span>
                            </label>
                        </div>
                         
                        <div id="static" class="{{$dataTypeContent->type == 'dynamic' ?  'display' : '' }}">
                            @if($dataTypeContent->static_image)
                        <img src="{{asset('storage/'.$dataTypeContent->static_image)}}" width="100px" height="100px">
                        @endif
                            <div class="form-group">
                               <input id="file" class="form-control" type="file" name="static_image" value=""
                                    hidden />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">url</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="url" name="static_url" value="{{$dataTypeContent->static_url}}">
                            </div>
                        </div> 
                        <div id="dynamic" class="{{$dataTypeContent->type == 'static' ?  'display' : '' }}">
                        @if($dataTypeContent->dynamic_image)
                        <img src="{{asset('storage/'.$dataTypeContent->dynamic_image)}}" width="100px" height="100px">
                        @endif
                            <div class="form-group">
                                
                              <input id="file" class="form-control" type="file" name="dynamic_image" value=""
                                    hidden />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="title" name="title" value="{{$dataTypeContent->title}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">subtitle</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="subtitle" name="subtitle" value="{{$dataTypeContent->subtitle}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">button text</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="button text" name="button_text" value="{{$dataTypeContent->button_text}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">button url</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="button url" name="button_url" value="{{$dataTypeContent->button_url}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">subtitle</label>
                                <input type="color" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="color" name="background_color" value="{{$dataTypeContent->background_color}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                            @else

                    <form action="{{ route('addBanner') }}" method="post"  	enctype="multipart/form-data">
                        @csrf
                       
                        <div class="wrapper">
                            <input type="radio" name="type" id="option-1" onclick="showDivStatic()" value="static" checked>
                            <input type="radio" name="type" id="option-2" onclick="showDivDynamic()" value="dynamic">
                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>static</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <div class="dot"></div>
                                <span>dynamic</span>
                            </label>
                        </div>

                        <div id="static">
                            <div class="form-group">
                                <label for="file" class="w-100">
                                    <div class="btn blue-bg text-white w-100"><span class="fa fa-image mx-2"></span>upload a
                                        image</div>
                                </label>
                                <input id="file" class="form-control" type="file" name="static_image" value=""
                                    hidden />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">url</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="url" name="static_url" value="{{$dataTypeContent->static_url}}">
                            </div>
                        </div>
                        <div id="dynamic" style="display:none;">

                            <div class="form-group">
                                <label for="file" class="w-100">
                                    <div class="btn blue-bg text-white w-100"><span class="fa fa-image mx-2"></span>upload a
                                        image</div>
                                </label>
                                <input id="file" class="form-control" type="file" name="dynamic_image" value=""
                                    hidden />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">subtitle</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="subtitle" name="subtitle">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">button text</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="button text" name="button_text">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">button url</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="button url" name="button_url">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">subtitle</label>
                                <input type="color" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="color" name="background_color">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                        data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger"
                        id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        function showDivStatic() {
            document.getElementById('dynamic').style.display = "none";
            document.getElementById('static').style.display = "block";
        }

        function showDivDynamic() {
            document.getElementById('dynamic').style.display = "block";
            document.getElementById('static').style.display = "none";
        }
    </script>
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
            return function() {
                $file = $(this).siblings(tag);

                params = {
                    slug: '{{ $dataType->slug }}',
                    filename: $file.data('file-name'),
                    id: $file.data('id'),
                    field: $file.parent().data('field-name'),
                    multi: isMulti,
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text(params.filename);
                $('#confirm_delete_modal').modal('show');
            };
        }

        $('document').ready(function() {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function(idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: ['YYYY-MM-DD']
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({
                    "editing": true
                });
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function() {
                $.post('{{ route('voyager.' . $dataType->slug . '.media.remove') }}', params, function(
                    response) {
                    if (response &&
                        response.data &&
                        response.data.status &&
                        response.data.status == 200) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() {
                            $(this).remove();
                        })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop
