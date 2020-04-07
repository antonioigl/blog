@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('USUARIOS') }} <small class="text-gray">{{ __('Listado') }}</small> </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Inicio') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Usuarios') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Listado de usuarios') }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{route('admin.users.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> {{ __('Crear usuarios') }}</a>
            <table id="users-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Nombre') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Roles') }}</th>
                    <th>{{ __('Acciones') }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="{{route('admin.users.destroy', $user)}}" style="display: inline">
                                {{ csrf_field()  }} {{method_field('DELETE')}}
                                <button class="btn btn-xs btn-danger" onclick="return confirm('{{ __('¿Estás seguro de querer eliminar este usuarios?') }}')"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $('#users-table').DataTable();
        });
    </script>
@endpush
