@extends('layouts.app')
  
@section('content')
    <div class="container">
        @role('empleado')
            <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Nuevo artículo</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-end mb-1">
                        <div class="pull-right">
                            <a class="btn btn-info text-white" href="{{ route('articulos.index') }}"> Regresar</a>
                        </div>
                    </div>
            </div>
                
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error</strong> Ha ocurrido un error con los datos ingresados.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
                
            <form class="col-md-6" action="{{ route('articulos.store') }}" method="POST">
                    @csrf
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tipo artículo:</strong>
                                <select class="form-control" name="tipo_articulo">
                                    <option value="Libro físico">Libro físico</option> 
                                    <option value="Libro digital" >Libro digital</option>
                                    <option value="Audiolibro" >Audiolibro</option>
                                    <option value="Revistas" >Revistas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Título:</strong>
                                <input type="text" name="titulo" class="form-control" placeholder="Título">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Autor:</strong>
                                <input type="text" name="autor" class="form-control" placeholder="Autor">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Editorial:</strong>
                                <input type="text" name="editorial" class="form-control" placeholder="Editorial">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Género:</strong>
                                <select class="form-control" name="genero" >
                                    <option value="Ficción" >Ficción</option> 
                                    <option value="No ficción"  >No ficción</option>
                                    <option value="Biografías"  >Biografías</option>
                                    <option value="Negocios"  >Negocios</option>
                                    <option value="Poesía">Poesía</option>
                                    <option value="Romance" >Romance</option>
                                    <option value="Histórico"  >Histórico</option>
                                    <option value="Religioso"  >Religioso</option>
                                    <option value="Fantasía"  >Fantasía</option>
                                    <option value="Misterio"  >Misterio</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Costo:  (MXN)</strong>
                                <input type="number" min="0.00" max="10000.00" step="0.01" name="costo" class="form-control" placeholder="Costo">
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