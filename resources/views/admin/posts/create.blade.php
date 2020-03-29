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
    <form action="">
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
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="excerpt">{{ __('Extracto de la publicación') }}</label>
                                <textarea class="form-control" id="excerpt" name="excerpt" placeholder="{{ __('Ingresa un extracto de la publicación') }}"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div>
    </form>
@stop

