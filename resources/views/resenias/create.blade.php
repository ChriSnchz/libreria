@extends('layouts.app')
  
@section('content')
    <div class="container">
        @role('cliente')
            <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Nueva reseña</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-end mb-1">
                        <div class="pull-right">
                            <a class="btn btn-info text-white" href="{{ route('resenias.index') }}"> Regresar</a>
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
                
            <form class="col-md-6" action="{{ route('resenias.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Artículo:</strong>
                                <select class="form-control" name="articulo_id">
                                    @foreach ($articulos as $articulo)
                                        <option value="{{ $articulo->id }}" > {{ $articulo->titulo }} </option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="file">Enviar reseña:</label>
                                <input type="file" class="form-control-file" name="file">    
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