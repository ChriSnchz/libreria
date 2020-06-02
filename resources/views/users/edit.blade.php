@extends('layouts.app')
   
@section('content')
    <div class="container">
        @role('admin')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Modificar empleado</h2>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-end mb-1">
                        <div class="pull-right">
                            <a class="btn btn-info text-white" href="{{ route('users.index') }}"> Regresar</a>
                        </div>
                </div>
            </div>
        
            @if ($errors->any())
                <div class="col-md-6 alert alert-danger">
                    <strong>Error</strong> Ha ocurrido un error con los datos ingresados<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <form class="col-md-6" action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Correo:</strong>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Correo">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
        
            </form>
        @endrole
        @role('empleado')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Modificar cliente</h2>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-end mb-1">
                        <div class="pull-right">
                            <a class="btn btn-info text-white" href="{{ route('users.index') }}"> Regresar</a>
                        </div>
                </div>
            </div>
        
            @if ($errors->any())
                <div class="col-md-6 alert alert-danger">
                    <strong>Error</strong> Ha ocurrido un error con los datos ingresados<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <form class="col-md-6" action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Correo:</strong>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Correo">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
        
            </form>
        @endrole
    </div>
@endsection