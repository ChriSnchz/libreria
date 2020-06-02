@extends('layouts.app')

@section('content')
    <div class="container">
        @role('admin')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Empleados</h2>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-end mb-1">
                    <div class="pull-right">
                        <a class="btn btn-info text-white" href="{{ route('users.create') }}"> Nuevo</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class=" col-md-6 alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th width="280px">Acción</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                            <a class="btn btn-success" href="{{ route('users.edit',$user->id) }}">Modificar</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        
            {!! $users->links() !!}
        @endrole
        @role('empleado')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Clientes</h2>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-end mb-1">
                    <div class="pull-right">
                        <a class="btn btn-info text-white" href="{{ route('users.create') }}"> Nuevo</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class=" col-md-6 alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th width="280px">Acción</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                            <a class="btn btn-success" href="{{ route('users.edit',$user->id) }}">Modificar</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        
            {!! $users->links() !!}
        @endrole
    </div>
@endsection
