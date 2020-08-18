<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;
use App\Models\CodigoMenu;
use App\Models\Institucion;
use App\Models\Producto;
use App\Models\GrupoEtario;
use App\Models\Sede;
use Carbon\Carbon;

class PedidoMenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones=Institucion::where('estado', '1')->get();
        return view('pedidomen.index', compact('instituciones'));
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
        //
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
        //
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
            $date = Carbon::now();
            $date = $date->format('d-m-Y');
            $institucion=Institucion::find($request->institucion_id);
            $sede=Sede::find($request->sede_id);
            $grupos=GrupoEtario::all();
            $menus_id=CodigoMenu::all();
            $productos = Producto::all();
            $beneficiarios=Beneficiario::where('sede_id', $request->sede_id)->get();


            return response()->view('ajax.filtro-pedido', compact( 'menus_id', 'productos',
            'grupos', 'date',  'institucion', 'sede', 'beneficiarios'));
        }

    }
}
