@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card card-header with-border">
                    <h3 class="card-title">
                        {{__('Datos personales')}}
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any)
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">{{ __('Nombre:')  }}</label>
                            <input name="name" id="name" value="{{old('name')}}" type="text"class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email:')  }}</label>
                            <input name="email" id="email" value="{{old('email')}}" type="email" class="form-control">
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Roles:')  }}</label>
                                @include('admin.roles.checkboxes')
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('Permisos:')  }}</label>
                                @include('admin.permissions.checkboxes')
                            </div>
                        </div>

                        <span class="help-block">
                            {{ __('La contraseña será generada y enviada al nuevo usuario vía email') }}
                        </span>

                        <button type="submit" class="btn btn-primary btn-block">{{ __('Crear usuario') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection