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
    @if($post->photos->count())
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="row">
                        @foreach($post->photos as $photo)
                            <form action="{{route('admin.photos.destroy', $photo)}}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <div class="col-md-2">
                                    <button class="btn btn-danger btn-xs" style="position: absolute">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <img class="img-responsive" src="{{ url($photo->url) }}" alt="">
                                </div>
                            </form>
                        @endforeach
                    </div>
            </div>
            </div>
        </div>
    @endif

    <form method="post" action="{{route('admin.posts.update', $post)}}">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label {{ $errors->has('title') ? 'class=text-red' : '' }} for="title">{{ __('Título de la publicación*') }}</label>
                                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{old('title', $post->title)}}" id="title" name="title" placeholder="{{ __('Ingresa aquí el título de la publicación') }}">
                                {!! $errors->first('title', '<span class="error invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label {{ $errors->has('body') ? 'class=text-red' : '' }} for="body">{{ __('Contenido de la publicación*') }}</label>
                                <textarea rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" id="body" name="body" placeholder="{{ __('Ingresa el contenido completo de la publicación') }}">{{old('body', $post->body)}}</textarea>
                                {!! $errors->first('body', '<span class="error invalid-feedback">:message</span>') !!}
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
                                    <input type="date" class="form-control" value="{{old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : null)}}" name="published_at" id="published_at">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label {{ $errors->has('category') ? 'class=text-red' : '' }} for="category">{{ __('Categorías*') }}</label>
                                <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" id="category">
                                    <option value="">{{ __('Selecciona una categoría') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('category', '<span class="error invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label {{ $errors->has('tags') ? 'class=text-red' : '' }} for="tags">{{ __('Etiquetas*') }}</label>
                                <select class="form-control select2bs4 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple="multiple" data-placeholder="{{ __('Selecciona una o más etiquetas') }}" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tags', '<span class="error invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label {{ $errors->has('excerpt') ? 'class=text-red' : '' }} for="excerpt">{{ __('Extracto de la publicación*') }}</label>
                                <textarea class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" id="excerpt" name="excerpt" placeholder="{{ __('Ingresa un extracto de la publicación') }}">{{ old('excerpt', $post->excerpt) }}</textarea>
                                {!! $errors->first('excerpt', '<span class="error invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <div class="dropzone"></div>
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
    <!-- Dropzone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push('scripts')
    <!-- Dropzone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <!-- Select2 -->
    <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $('#tags').select2({
            theme: 'bootstrap4'
        });

        CKEDITOR.replace( 'body' );
        CKEDITOR.config.height = 315;

        var myDropzone = new Dropzone('.dropzone', {
            url: '/admin/posts/{{$post->url}}/photos',
            paramName: 'photo',
            acceptedFiles: 'image/*',
            maxFilesize: 2,
            // maxFiles: 2,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            'dictDefaultMessage': '{{ __('Arrastra las fotos aquí para subirlas') }}'
        });

        myDropzone.on('error', function (file, res) {
            var msg = res['errors'].photo[0];
            $('.dz-error-message:last > span').text(msg);
        });

        Dropzone.autoDiscover = false;

    </script>
@endpush
