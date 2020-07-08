<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\DetalleMenu;
use App\Models\GrupoEtario;
use App\Models\Institucion;
use App\Models\Jornada;
use App\Models\Menu;
use App\Models\Producto;
use App\Models\TipoComplemento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinutaController extends Controller
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
        return view('minutas.index', compact('grupos', 'jornadas', 'tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       
       
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

    public function filtro(Request $request)
    {
        
        if (request()->ajax()) {
            $menus=Menu::filtro($request->jornada_id,  $request->tipo_id, $request->grupo_id);
            return response()->view('ajax.filtro-menu', compact('menus'));
        }

    }
}
