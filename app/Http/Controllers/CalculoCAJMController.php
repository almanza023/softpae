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
use App\Models\Sede;
use App\Models\TipoComplemento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculoCAJMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones=Institucion::all();
        $grupos=GrupoEtario::where('estado', '1')->get();
        $jornadas=Jornada::where('estado', '1')->get();
        $tipos=TipoComplemento::where('estado', '1')->get();
        return view('cajm.index', compact('grupos', 'jornadas', 'tipos','instituciones'));
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
            $descontar=$request->descontar;
            $jornada_id=$request->jornada_id;
            $tipo_complemento=$request->tipo_id;
            $grupo_id=$request->grupo_id;
            $date1=$request->date1;
            $date2=$request->date2;
            $sede_id=$request->sede_id;
            $productos = Producto::all();
            $menus_id=CodigoMenu::where('jornada_id', $request->jornada_id)
            ->get();
            $menus=Menu::filtrocajm($request->jornada_id, $request->grupo_id, $date1, $date2) ;

            if($sede_id>0){
                $total_ben=Beneficiario::getCantidadInstitucion($jornada_id, $tipo_complemento, $grupo_id, $sede_id);
            }
            return response()->view('ajax.filtro-cajm', compact('menus', 'menus_id',
            'productos', 'jornada_id','grupo_id','tipo_complemento','date1',
            'date2','total_ben', 'descontar', 'sede_id', 'date1', 'date2'));
        }

    }
}
