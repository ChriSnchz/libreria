<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $nombreRol='';

        if($role[0]=='admin'){ /**Administrador visualiza empleados */
            $nombreRol= 'empleado';
        }
        if($role[0]=='empleado'){ /**Empleado visualiza clientes */
            $nombreRol= 'cliente';
        }

        $users = User::role($nombreRol)->latest()->paginate(5);

        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $authUser=Auth::user();
        $role = $authUser->getRoleNames();
        $nombreRol='';

        if($role[0]=='admin'){ /**Administrador crea empleados */
            $nombreRol= 'empleado';
        }
        if($role[0]=='empleado'){ /**Empleado crea clientes */
            $nombreRol= 'cliente';
        }

        $user = User::create(
             [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
             ]
        );

        
        $user->assignRole($nombreRol);
   
        return redirect()->route('users.index')
                        ->with('success','Se ha creado correctamente.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //return view('users.show',compact('user'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        User::where('id', $user->id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
             ]
        );
        return redirect()->route('users.index')
                        ->with('success','Se ha actualizado correctamente');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->route('users.index')
                        ->with('success','Se ha eliminado correctamente');
    }
}
