@extends('layouts.app')
   
@section('content')
    <div class="container">
        @role('empleado')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Modificar artículo</h2>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-end mb-1">
                        <div class="pull-right">
                            <a class="btn btn-info text-white" href="{{ route('articulos.index') }}"> Regresar</a>
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
        
            <form class="col-md-6" action="{{ route('articulos.update',$articulo->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tipo artículo:</strong>
                            <?php  $opcionesArticulos = array('Libro físico','Libro digital','Audiolibro','Revistas'); ?>
                            <select class="form-control" name="tipo_articulo">
                                @foreach ($opcionesArticulos as $opcion)
                                    <option value="{{ $opcion }}" {{ ( $opcion == $articulo->tipo_articulo) ? 'selected' : '' }}> {{ $opcion }} </option>
                                @endforeach    
                            </select>
          
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Título:</strong>
                            <input type="text" name="titulo" value="{{ $articulo->titulo }}" class="form-control" placeholder="Título">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Autor:</strong>
                            <input type="text" name="autor" value="{{ $articulo->autor }}" class="form-control" placeholder="Autor">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Editorial:</strong>
                            <input type="text" name="editorial" value="{{ $articulo->editorial }}" class="form-control" placeholder="Editorial">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Género:</strong>
                            <?php  $opcionesGenero = array('Ficción','No ficción','Biografías','Negocios','Poesía','Romance','Histórico','Religioso','Fantasía','Misterio'); ?>
                            <select class="form-control" name="genero">
                                @foreach ($opcionesGenero as $opciong)
                                    <option value="{{ $opciong }}" {{ ( $opciong == $articulo->genero) ? 'selected' : '' }}> {{ $opciong }} </option>
                                @endforeach    
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Costo:  (MXN)</strong>
                            <input type="number" min="0.00" max="10000.00" step="0.01" name="costo" value="{{ $articulo->costo }}" class="form-control" placeholder="Costo">
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