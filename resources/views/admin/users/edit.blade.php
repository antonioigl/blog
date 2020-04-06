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
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="name">{{ __('Nombre:')  }}</label>
                            <input name="name" id="name" value="{{old('name', $user->name)}}" type="text"class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email:')  }}</label>
                            <input name="email" id="email" value="{{old('email', $user->email)}}" type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Contraseña:')  }}</label>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña">
                            <span class="help-block">{{ __('Dejar en blanco para no cambiar la contraseña') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">{{ __('Confirma la contraseña:')  }}</label>
                            <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Repite la contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Actualizar usuario') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">{{ __('Roles y permisos') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @foreach($roles as $id => $name)
                            <div class="checkbox">
                                <label for="">
                                    <input name="roles[]" type="checkbox" value="{{ $id }}" {{ $user->roles->contains($id) ? 'checked' : ''}}>
                                    {{ $name }}
                                </label>
                            </div>
                        @endforeach
                        <button class="btn btn-primary btn-block">{{__('Actualizar roles')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection