@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('POSTS') }} <small class="text-gray">{{ __('Crear publicación') }}</small> </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="nav-icon fas fa-home"></i> {{ __('Inicio') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}"><i class="nav-icon fas fa-list"></i> {{ __('Posts') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Crear') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <form method="post" action="{{route('admin.posts.store')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">{{ __('Título de la publicación') }}</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Ingresa aquí el título de la publicación') }}">
                        </div>
                        <div class="form-group">
                            <label for="body">{{ __('Contenido de la publicación') }}</label>
                            <textarea rows="10" class="form-control" id="body" name="body" placeholder="{{ __('Ingresa el contenido completo de la publicación') }}"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="published_at">{{ __('Fecha de la publicación') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="published_at" id="published_at">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label for="category">{{ __('Categorías') }}</label>
                            <select type="date" class="form-control" name="category" id="category">
                                <option value="">{{ __('Selecciona una categoría') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">{{ __('Etiquetas') }}</label>
                            <select class="form-group select2bs4" name="tags[]" id="tags" multiple="multiple" data-placeholder="{{ __('Selecciona una o más etiquetas') }}" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">{{ __('Extracto de la publicación') }}</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" placeholder="{{ __('Ingresa un extracto de la publicación') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Guardar publicación') }}</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>
@stop

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push('scripts')
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <!-- Select2 -->
    <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $('#tags').select2({
            theme: 'bootstrap4'
        });
        CKEDITOR.replace( 'body' );
    </script>
@endpush
