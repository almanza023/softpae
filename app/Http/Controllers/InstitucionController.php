<?php

namespace App\Http\Controllers;


use App\Models\Institucion;
use App\Models\Municipio;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones=Institucion::all();
        $municipios=Municipio::all();
        

        if (request()->ajax()) {
            $instituciones=Institucion::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($instituciones) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-instituciones', compact('instituciones'));
            }
        }
        return view('instituciones.index', compact('instituciones', 'municipios'));
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
    
       $exito= Institucion::create($request->all());
        if($exito){
            return response()->json(['success' => 'INSTITUCION CREADA CON EXITO!']);
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
            $exito=Institucion::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'INSTITUCION ACTUALIZADA CORRECTAMENTE']);
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
        $institucion = Institucion::findOrFail($id);

        if ($institucion->estado==1) {
            $institucion->update(['estado' => 0]);
        } else {
            $institucion->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE INSTITUCION ACTUALIZADO CON EXITO!']);
    }
}
