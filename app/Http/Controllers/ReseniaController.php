<?php

namespace App\Http\Controllers;

use App\Resenia;
use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class ReseniaController extends Controller
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
        $resenias ='';

        if($role[0]=='empleado'){ 
            $resenias = Resenia::with('usuario','articulo')->paginate(5);;
        }
        if($role[0]=='cliente'){ 
            $resenias = Resenia::with('articulo')->where('user_id',Auth::id())->paginate(5);
        }

        return view('resenias.index',compact('resenias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulos = Articulo::get();
        return view('resenias.create',compact('articulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $ext = $request->file->getClientOriginalExtension();
        $date=date_create();
        $nombre_archivo='resenia_'.date_format($date,"YmdHis").'.'.$ext;

        $request->file->storeAs('files_resenias',$nombre_archivo);
         $request->validate([
            'articulo_id' => 'required',
            'file' => 'required',
        ]);

        $resenia = Resenia::create(
             [
                'user_id' => Auth::id(),
                'articulo_id' => $request->articulo_id,
                'nombre_archivo' => $nombre_archivo,
             ]
        );
   
        return redirect()->route('resenias.index')
                        ->with('success','Se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resenia  $resenia
     * @return \Illuminate\Http\Response
     */
    public function show(Resenia $resenia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resenia  $resenia
     * @return \Illuminate\Http\Response
     */
    public function edit(Resenia $resenia)
    {

        $filename = $resenia->nombre_archivo;
        $file_path = storage_path() .'/app/files_resenias/'. $filename;
 
        //dd($file_path);
        if (file_exists($file_path))
        {
            return Response::download($file_path, $filename, [
                'Content-Length: '. filesize($file_path)
            ]);
        }
        else
        {
            exit('El archivo solicitado no está disponible');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resenia  $resenia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resenia $resenia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resenia  $resenia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resenia $resenia)
    {
        $resenia->delete();
  
        return redirect()->route('resenias.index')
                        ->with('success','Se ha eliminado correctamente');
    }
}
