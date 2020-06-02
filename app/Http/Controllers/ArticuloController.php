<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $authUser=Auth::user();
        $role = $authUser->getRoleNames();

        if($role[0]=='empleado'){ 
            $articulos = Articulo::paginate(5);

            return view('articulos.index',compact('articulos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        if($role[0]=='cliente'){ 

            $arrayIDarticulos = Articulo::pluck('id');
            $articulos = Articulo::pluck('titulo');
            $precios = Articulo::pluck('costo');
            $tipos = Articulo::pluck('tipo_articulo');

            return view('articulos.index',compact('arrayIDarticulos','articulos','precios','tipos'));
        }

        

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
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


        Articulo::create($request->all());

    
        return redirect()->route('articulos.index')
                        ->with('success','Se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit',compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'tipo_articulo' => 'required',
            'titulo' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'genero' => 'required',
            'costo' => 'required',
        ]);
        
        $articulo->update($request->all());

        return redirect()->route('articulos.index')
                        ->with('success','Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
  
        return redirect()->route('articulos.index')
                        ->with('success','Se ha eliminado correctamente');
    }
}
