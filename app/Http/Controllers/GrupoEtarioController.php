<?php

namespace App\Http\Controllers;

use App\Models\GrupoEtario;

use Illuminate\Http\Request;

class GrupoEtarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos=GrupoEtario::all();

        if (request()->ajax()) {
            $grupos = GrupoEtario::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($grupos) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-grupos', compact('grupos'));
            }
        }
        return view('grupo_etarios.index', compact('grupos'));
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
       $exito= GrupoEtario::create($request->all());
        if($exito){
            return response()->json(['success' => 'GRUPO ETARIO CREADO CON EXITO!']);
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
            $exito=GrupoEtario::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'GRUPO ETARIO ACTUALIZADA CORRECTAMENTE']);
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
        $grupo = GrupoEtario::findOrFail($id);

        if ($grupo->estado==1) {
            $grupo->update(['estado' => 0]);
        } else {
            $grupo->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE GRUPO ETARIO ACTUALIZADO CON EXITO!']);
    }
}
