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
                    <h3 class="card-title">{{ __('Roles') }}</h3>
                </div>
                <div class="card-body">
                    @role('Admin')
                        <form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            @include('admin.roles.checkboxes')
                            <button class="btn btn-primary btn-block">{{__('Actualizar roles')}}</button>
                        </form>
                    @else
                        <ul class="list-group">
                            @forelse($user->roles as $role)
                                <li class="list-group-item">
                                    {{ $role->name }}
                                </li>
                            @empty
                                <li class="list-group-item">
                                    {{ __('No tiene roles') }}
                                </li>
                            @endforelse
                        </ul>
                    @endrole
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">{{ __('Permisos') }}</h3>
                </div>
                <div class="card-body">
                    @role('Admin')
                        <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            @include('admin.permissions.checkboxes')
                            <button class="btn btn-primary btn-block">{{__('Actualizar permisos')}}</button>
                        </form>
                    @else
                        <ul class="list-group">
                            @forelse($user->permissions as $permission)
                                <li class="list-group-item">
                                    {{ $permission->name }}
                                </li>
                            @empty
                                <li class="list-group-item">
                                    {{ __('No tiene permisos') }}
                                </li>
                            @endforelse
                        </ul>
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection