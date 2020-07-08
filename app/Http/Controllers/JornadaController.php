<?php

namespace App\Http\Controllers;

use App\Models\Jornada;
use Illuminate\Http\Request;

class JornadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jornadas=Jornada::all();

        if (request()->ajax()) {
            $jornadas = Jornada::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($jornadas) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-jornadas', compact('jornadas'));
            }
        }
        return view('jornadas.index', compact('jornadas'));
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
       $exito= Jornada::create($request->all());
        if($exito){
            return response()->json(['success' => 'JORNADA CREADA CON EXITO!']);
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
            $exito=Jornada::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'JORNADA ACTUALIZADA CORRECTAMENTE']);
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
        $jornada = Jornada::findOrFail($id);

        if ($jornada->estado==1) {
            $jornada->update(['estado' => 0]);
        } else {
            $jornada->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE JORNADA ACTUALIZADA CON EXITO!']);
    }
}
