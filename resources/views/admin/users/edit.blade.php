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
                            <input name="name" value="{{old('name', $user->name)}}" type="text"class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email:')  }}</label>
                            <input name="email" value="{{old('email', $user->email)}}" type="email" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Actualizar usuario') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection