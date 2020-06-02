@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @role('admin')
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/menu/1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Empleados</h5>
                        <p class="card-text">En esta sección puedes visualizar y modificar nuestro registro de users.</p>
                        <a href="{{ url('/users') }}" class="btn btn-primary">Ir a Empleados</a>
                    </div>
                </div>
            </div>
        </div>
    @endrole

    @role('cliente')
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/menu/3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Catálogo</h5>
                        <p class="card-text">En esta sección puedes visualizar nuestro catálogo de artículos.</p>
                        <a href="{{ url('/articulos') }}" class="btn btn-primary">Ir a catalogo</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/menu/4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Mis compras</h5>
                        <p class="card-text">En esta sección puedes visualizar tu registro de compras.</p>
                        <a href="{{ url('/compras') }}" class="btn btn-primary">Ir a compras</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/menu/5.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Mis reseñas</h5>
                        <p class="card-text">En esta sección puedes visualizar tu registro de reseñas.</p>
                        <a href="{{ url('/resenias') }}" class="btn btn-primary">Ir a reseñas</a>
                    </div>
                </div>
            </div>
        </div>
    @endrole

    @role('empleado')
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/menu/2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Clientes</h5>
                            <p class="card-text">En esta sección puedes visualizar y modificar nuestro registro de clientes.</p>
                            <a href="{{ url('/users') }}" class="btn btn-primary">Ir a clientes</a>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/menu/3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Articulos</h5>
                        <p class="card-text">En esta sección puedes visualizar y modificar nuestro registro de artículos.</p>
                        <a href="{{ url('/articulos') }}" class="btn btn-primary">Ir a artículos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="assets/menu/5.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Reseñas</h5>
                        <p class="card-text">En esta sección puedes visualizar las reseñas de los artículos.</p>
                        <br>
                        <a href="{{ url('/resenias') }}" class="btn btn-primary">Ir a reseñas</a>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    
</div>
@endsection
