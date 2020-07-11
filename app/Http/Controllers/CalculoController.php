<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Calculo;
use App\Models\CodigoMenu;
use App\Models\DetalleCalculo;
use App\Models\DetalleMenu;
use App\Models\GrupoEtario;
use App\Models\Institucion;
use App\Models\Jornada;
use App\Models\Menu;
use App\Models\Producto;
use App\Models\TipoComplemento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos=GrupoEtario::where('estado', '1')->get();
        $jornadas=Jornada::where('estado', '1')->get();
        $tipos=TipoComplemento::where('estado', '1')->get();
        return view('calculos.index', compact('grupos', 'jornadas', 'tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos=GrupoEtario::where('estado', '1')->get();
        $jornadas=Jornada::where('estado', '1')->get();
        $tipos=TipoComplemento::where('estado', '1')->get();
        return view('calculos.create', compact('grupos', 'jornadas', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       DB::beginTransaction();
       try {
        $cal= new Calculo();
        $cal->jornada_id=$request->jornada_id;
        $cal->inicio=$request->inicio;
        $cal->final=$request->final;
        $cal->save();
        
        $dias=$request->dia;
        $menus=$request->menu_id;
          
          for ($i = 0; $i < (count($dias)); $i++) {                    
              $detalle = new DetalleCalculo();
              $detalle->calculo_id=$cal->id;                 
              $detalle->menu_id=$menus[$i];                 
              $detalle->dia=$dias[$i];   
              $detalle->save();       
          }

           DB::commit();
           return response()->json(['success' => 'CALCULO REALIZADO CON EXITO']);
       } catch (\Exception $ex) {
           DB::rollback();
           return response()->json(['warning' => $ex->getMessage()]);
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

    public function buscar(Request $request)
    {
        $calculos=DetalleCalculo::getAllId($request->jornada_id, $request->inicio,  $request->final);
        
       return  response()->view('ajax.buscar-calculos', compact('calculos'));

    }
}
