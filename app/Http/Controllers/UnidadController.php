<?php

namespace App\Http\Controllers;


use App\Models\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades=Unidad::all();

        if (request()->ajax()) {
            $unidades = Unidad::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($unidades) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-unidades', compact('unidades'));
            }
        }
        return view('unidades.index', compact('unidades'));
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
       $exito= Unidad::create($request->all());
        if($exito){
            return response()->json(['success' => 'UNIDAD DE MEDIDAD CREADA CON EXITO!']);
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
            $exito=Unidad::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'UNIDAD DE MEDIDA ACTUALIZADA CORRECTAMENTE']);
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
        $unidad = Unidad::findOrFail($id);

        if ($unidad->estado==1) {
            $unidad->update(['estado' => 0]);
        } else {
            $unidad->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE UNIDAD DE MEDIDA ACTUALIZADA CON EXITO!']);
    }
}
