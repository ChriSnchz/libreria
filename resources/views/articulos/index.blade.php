@extends('layouts.app')

@section('content')
    <div class="container">
        @role('empleado')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Artículos</h2>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-end mb-1">
                    <div class="pull-right">
                        <a class="btn btn-info text-white" href="{{ route('articulos.create') }}"> Nuevo</a>
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
                    <th>Editorial</th>
                    <th>Género</th>
                    <th>Costo</th>
                    <th width="280px">Acción</th>
                </tr>
                @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $articulo->tipo_articulo }}</td>
                    <td>{{ $articulo->titulo }}</td>
                    <td>{{ $articulo->autor }}</td>
                    <td>{{ $articulo->editorial }}</td>
                    <td>{{ $articulo->genero }}</td>
                    <td>${{ $articulo->costo }}</td>
                    <td>
                        <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">

                            <a class="btn btn-success" href="{{ route('articulos.edit',$articulo->id) }}">Modificar</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        
            {!! $articulos->links() !!}
        @endrole
        @role('2')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Catálogo</h2>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-end mb-1">
                    <div class="pull-right">
                        <a class="btn btn-info text-white" href="{{ route('articulos.create') }}"> Nuevo</a>
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
                    <th>Editorial</th>
                    <th>Género</th>
                    <th>Costo</th>
                    <th width="280px">Acción</th>
                </tr>
                @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $articulo->tipo_articulo }}</td>
                    <td>{{ $articulo->titulo }}</td>
                    <td>{{ $articulo->autor }}</td>
                    <td>{{ $articulo->editorial }}</td>
                    <td>{{ $articulo->genero }}</td>
                    <td>${{ $articulo->costo }}</td>
                    <td>
                        <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">

                            <a class="btn btn-success" href="{{ route('articulos.edit',$articulo->id) }}">Modificar</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        
            {!! $articulos->links() !!}
        @endrole
        @role('cliente')
        <?php 
            session_start();

            if ( !isset($_SESSION["total"]) ) {
            $_SESSION["total"] = 0;
            for ($i=0; $i< count($articulos); $i++) {
                $_SESSION["cantidad"][$i] = 0;
            $_SESSION["precios"][$i] = 0;
            }
            }

            /**Reinicar */
            if ( isset($_GET['reset']) )
            {
            if ($_GET["reset"] == 'true')
            {
            unset($_SESSION["cantidad"]);
            unset($_SESSION["precios"]);
            unset($_SESSION["total"]); 
            unset($_SESSION["carrito"]); 
            }
            }

            /**Agregar */
            if ( isset($_GET["add"]) )
            {
            $i = $_GET["add"];
            $cantidad = $_SESSION["cantidad"][$i] + 1;
            $_SESSION["precios"][$i] = $precios[$i] * $cantidad;
            $_SESSION["carrito"][$i] = $i;
            $_SESSION["cantidad"][$i] = $cantidad;
            }

            /**Eliminar */
            if ( isset($_GET["delete"]) )
            {
            $i = $_GET["delete"];
            $cantidad = $_SESSION["cantidad"][$i];
            $cantidad--;
            $_SESSION["cantidad"][$i] = $cantidad;
            
            if ($cantidad == 0) {
                $_SESSION["precios"][$i] = 0;
                unset($_SESSION["carrito"][$i]);
            }
            else
            {
            $_SESSION["precios"][$i] = $precios[$i] * $cantidad;
            }
            }
            ?>
        <div class="container">
            <div class="row">
                <div class="col-md-7">	
                    <h2>Listado de todos los artículos</h2>
                    <table >
                    <tr>
                    <th>Artículo</th>
                    <th width="10px">&nbsp;</th>
                    <th>Precio</th>
                    <th width="5px">&nbsp;</th>
                    <th>Tipo</th>
                    <th width="10px">&nbsp;</th>
                    <th>Acción</th>
                    </tr>
				<?php
                    for ($i=0; $i< count($articulos); $i++) {
                    ?>
                    <tr>
                    <td><?php echo($articulos[$i]); ?></td>
                    <td width="10px">&nbsp;</td>
                    <td><?php echo($precios[$i]); ?></td>
                    <td width="5px">&nbsp;</td>
                    <td><?php echo($tipos[$i]); ?></td>
                    <td width="10px">&nbsp;</td>
                    <td><a class="btn btn-success btn-sm" href="?add=<?php echo($i); ?>"><small>Agregar al carrito</small></a></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                    <td colspan="5"></td>
                    </tr>
                    <tr>
                    <td colspan="5"><a class="btn btn-info  btn-sm" href="?reset=true">Vaciar carrito</a></td>
                    </tr>
                </table>
                <?php
                if ( isset($_SESSION["carrito"]) ) {
                ?>
            </div>
            <div class="col-md-5">
                <h2>Mi carrito</h2>
                <table>
                    <tr>
                    <th>Artículo</th>
                    <th width="10px">&nbsp;</th>
                    <th>Cantidad</th>
                    <th width="10px">&nbsp;</th>
                    <th>Precio</th>
                    <th width="10px">&nbsp;</th>
                    <th>Acción</th>
                    </tr>
                    <?php
                    $total = 0;
                    foreach ( $_SESSION["carrito"] as $i ) {
                    ?>
                    <tr>
                    <td><?php echo( $articulos[$_SESSION["carrito"][$i]] ); ?></td>
                    <td width="10px">&nbsp;</td>
                    <td><?php echo( $_SESSION["cantidad"][$i] ); ?></td>
                    <td width="10px">&nbsp;</td>
                    <td><?php echo( $_SESSION["precios"][$i] ); ?></td>
                    <td width="10px">&nbsp;</td>
                    <td><a style="font-size:10px" class="btn btn-danger  btn-sm" href="?delete=<?php echo($i); ?>">Eliminar</a></td>
                    </tr>
                    <?php
                    $total = $total + $_SESSION["precios"][$i];
                    }
                    
                    $_SESSION["total"] = $total;
                    $_SESSION["arrayIDs"] = $arrayIDarticulos;
                    $_SESSION["arrayCantidad"] = $_SESSION['cantidad'];
                    ?>
                    <tr>
                    <td colspan="7"><b>Total : $ <?php echo($total); ?> MXN</b></td>
                    </tr>
                </table>
                <a class="btn btn-success btn-sm" href="{{ route('compras.edit',0) }}">Comprar</a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
        @endrole
    </div>
@endsection
