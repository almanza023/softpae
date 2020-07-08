<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\GrupoEtario;
use App\Models\Institucion;
use App\Models\Jornada;
use App\Models\TipoComplemento;

use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiarios=Beneficiario::all();
        $instituciones=Institucion::where('estado', 1)->get();
        $jornadas=Jornada::where('estado', 1)->get();
        $grupos=GrupoEtario::where('estado', 1)->get();
        $tipos=TipoComplemento::where('estado', 1)->get();
        

        if (request()->ajax()) {
            $beneficiarios=Beneficiario::all();

            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($instituciones) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-beneficiarios', compact('beneficiarios'));
            }
        }
        return view('beneficiarios.index', compact('beneficiarios', 'instituciones', 'jornadas',
                   'grupos', 'tipos'));
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
    
       $exito= Beneficiario::create($request->all());
        if($exito){
            return response()->json(['success' => 'DATOS REGISTRADOS CON EXITO!']);
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
            $exito=Beneficiario::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'DATOS ACTUALIZADOS CORRECTAMENTE']);
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
        $beneficiario = Beneficiario::findOrFail($id);

        if ($beneficiario->estado==1) {
            $beneficiario->update(['estado' => 0]);
        } else {
            $beneficiario->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO  ACTUALIZADO CON EXITO!']);
    }
}
