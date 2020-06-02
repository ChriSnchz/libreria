@extends('layouts.app')

@section('content')
    <div class="container">
        @role('cliente')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Reseñas</h2>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-end mb-1">
                    <div class="pull-right">
                        <a class="btn btn-info text-white" href="{{ route('resenias.create') }}"> Nuevo</a>
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
                    <th>Tipo</th>
                    <th>Título</th>
                    <th>Autor</th>
    
                    <th width="280px">Acción</th>
                </tr>
                @foreach ($resenias as $resenia)
                <tr>
                    <td>{{ ++$i }}</td>

                    <td>{{ $resenia->articulo->tipo_articulo }}</td>
                    <td>{{ $resenia->articulo->titulo }}</td>
                    <td>{{ $resenia->articulo->autor }}</td>

                    <td>
                        <form action="{{ route('resenias.destroy',$resenia->id) }}" method="POST">

                            <a class="btn btn-success" href="{{ route('resenias.edit',$resenia->id) }}">Descargar</a>     
                            @csrf

                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        
            {!! $resenias->links() !!}
        @endrole
        @role('empleado')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Reseñas</h2>
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
                    <th>Cliente</th>
                    <th>Tipo</th>
                    <th>Título</th>
                    <th>Autor</th>
    
                    <th width="280px">Acción</th>
                </tr>
                @foreach ($resenias as $resenia)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $resenia->usuario->name }}</td>
                    <td>{{ $resenia->articulo->tipo_articulo }}</td>
                    <td>{{ $resenia->articulo->titulo }}</td>
                    <td>{{ $resenia->articulo->autor }}</td>

                    <td>
                        <form action="{{ route('resenias.destroy',$resenia->id) }}" method="POST">

                            <a class="btn btn-success" href="{{ route('resenias.edit',$resenia->id) }}">Descargar</a>     
                            @csrf

                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        
            {!! $resenias->links() !!}
        @endrole
    </div>
@endsection
