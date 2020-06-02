<?php

namespace App\Http\Controllers;

use App\Orden;
use App\OrdenesArticulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Orden::with('articulos.articulo')->where('user_id',Auth::id())->paginate(5);

        return view('compras.index',compact('compras'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compras.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_articulo' => 'required',
            'titulo' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'genero' => 'required',
            'costo' => 'required',
        ]);


        Compra::create($request->all());

    
        return redirect()->route('compras.index')
                        ->with('success','Se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $orden)
    {
        
        session_start();
        $total=$_SESSION['total'];
        $arrayIDs=$_SESSION['arrayIDs'];
        $arrayCantidad=$_SESSION['arrayCantidad'];
          
        $caracteres_validos = '0123456789abcdefghijklmnopqrstuvwxyz';
        $codigo_orden = substr(str_shuffle($caracteres_validos), 0, 15);


        Orden::create(
             [
                'codigo_orden' => $codigo_orden,
                'user_id' => Auth::id(),
                'total' => $total,
             ]
        );

        $orden = Orden::where('codigo_orden', $codigo_orden)->first();
        $orden_id = $orden->id;


        for ($i=0; $i < count($arrayIDs); $i++) { 
            if($arrayCantidad[$i]>0){
                OrdenesArticulos::create(
                    [
                        'orden_id' => $orden_id,
                        'articulo_id' => $arrayIDs[$i],
                        'cantidad' => $arrayCantidad[$i],
                    ]
                );
            }
                
        }

        unset($_SESSION['arrayIDarticulos']);
        unset($_SESSION['arrayCantidad']);
        unset($_SESSION['arrayIDs']);
        unset($_SESSION['total']);
        unset($_SESSION['cantidad']);
        unset($_SESSION['precios']);
        unset($_SESSION['carrito']);

        return redirect()->route('compras.index')
                        ->with('success','Se ha creado correctamente.');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orden $orden)
    {
        //
    }
}
