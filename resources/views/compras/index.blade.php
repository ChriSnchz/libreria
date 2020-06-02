@extends('layouts.app')

@section('content')
    <div class="container">
        @role('cliente')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Compras</h2>
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
                    <th>Orden ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Artículos</th>
                </tr>
                @foreach ($compras as $compra)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $compra->codigo_orden }}</td>
                    <td>{{ $compra->created_at }}</td>
                    <td>$ {{ $compra->total }} MXN</td>
                    <td>
                        @foreach($compra->articulos as $articulo)
                            {{$articulo->articulo['titulo']}}<br>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </table>
        
            {!! $compras->links() !!}
        @endrole
    </div>
@endsection
