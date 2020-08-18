<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //para dar acceso solo a los que esten logueados
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $usuarios=User::all();
      
        if (request()->ajax()) {
            $usuarios = User::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($usuarios) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-usuarios', compact('usuarios'));
            }
        }
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         
       $exito= User::create([
        'nombres' => $request['nombres'],
        'apellidos' => $request['apellidos'],
        'direccion' => $request['direccion'],
        'telefono' => $request['telefono'],
        'correo' => $request['correo'],
        'usuario' => $request['usuario'],
        'password' => bcrypt($request['password']),
        'rol' => $request['rol'],
    ]);
        if($exito){
            return response()->json(['success' => 'USUARIO CREADO CON EXITO!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       if (request()->ajax()) {
            $exito=User::findOrFail($request->id)->update([
                'nombres' => $request['nombres'],
                'apellidos' => $request['apellidos'],
                'direccion' => $request['direccion'],
                'telefono' => $request['telefono'],
                'correo' => $request['correo'],
                'usuario' => $request['usuario'],
                'password' => bcrypt($request['password']),
                'rol' => $request['rol']
            ] );
            if($exito){
                return response()->json(['success' => 'USUARIO ACTUALIZADO CORRECTAMENTE']);
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function change($id)
    {
        $usuarios = User::findOrFail($id);

        if ($usuarios->estado==1) {
            $usuarios->update(['estado' => 0]);
        } else {
            $usuarios->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE USUARIO ACTUALIZADO CON EXITO!']);
    }
}
