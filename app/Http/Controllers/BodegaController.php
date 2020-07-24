<?php

namespace App\Http\Controllers;


use App\Models\Bodegam;
use App\Models\Municipio;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bodegas=Bodegam::all();
       $municipios=Municipio::where('estado', 1)->get();
        if (request()->ajax()) {
            $bodegas = Bodegam::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($bodegas) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-bodegas', compact('bodegas'));
            }
        }
        return view('bodegas.index', compact('bodegas','municipios'));
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
        $exito= Bodegam::create($request->all());
        if($exito){
            return response()->json(['success' => 'BODEGA CREADA CON EXITO!']);
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
            $exito=Bodegam::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'BODEGA ACTUALIZADA CORRECTAMENTE']);
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
        $bodegas = Bodegam::findOrFail($id);

        if ($bodegas->estado==1) {
            $bodegas->update(['estado' => 0]);
        } else {
            $bodegas->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE BODEGA ACTUALIZADO CON EXITO!']);
    }
}
