<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;
use App\Models\CodigoMenu;
use App\Models\DetallePedido;
use App\Models\Institucion;
use App\Models\Producto;
use App\Models\GrupoEtario;
use App\Models\Pedido;
use App\Models\Preorder;
use App\Models\Sede;
use App\Models\TipoComplemento;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PedidoMenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pedidos=Pedido::all();
        return view('pedidomen.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instituciones = Institucion::where('estado', '1')->get();
        $tipos = TipoComplemento::where('estado', '1')->get();
        return view('pedidomen.create', compact('instituciones', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  {


        $validar=Pedido::duplicados($request->sede_id, $request->tipo_id, $request->inicio, $request->final);


        if(count($validar)>0){
            return response()->json(['warning' => 'YA EXISTE UN PEDIDO PARA LA SEDE Y LAS FECHAS SELECCIONADAS']);
        }else {
            DB::beginTransaction();
        try {
            $pedido=new Pedido();
            $pedido->tipo_complemento_id=$request->tipo_id;
            $pedido->sede_id=$request->sede_id;
            $pedido->fecha_inicio=$request->inicio;
            $pedido->fecha_fin=$request->final;
            $pedido->save();
            //Crear Detalles
            $productos = $request->producto_id;

            for ($i = 0; $i < (count($productos)); $i++) {
                $detalle = new DetallePedido();
                $detalle->pedido_id = $pedido->id;
                $detalle->producto_id = $productos[$i];
                $detalle->cantidad1 = $request->cantidad1[$i];
                $detalle->cantidad2 = $request->cantidad2[$i];
                $detalle->cantidad3 = $request->cantidad3[$i];
                $detalle->total = $request->total[$i];
                $detalle->save();
            }

            DB::commit();
            return response()->json(['success' => 'PEDIDO REGISTRADO EXITOSAMENTE COD:#' . $pedido->id]);
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(['warning' => $ex->getMessage()]);
        }
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
        $pedido=Pedido::find($id);
        $beneficiarios = Beneficiario::where('sede_id', $pedido->sede_id)->get();
        return view('pedidomen.show', compact('pedido', 'beneficiarios'));
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
            $sede_id = $request->sede_id;
            $tipo_id = $request->tipo_id;
            $inicio = $request->inicio;
            $final = $request->final;

            $date = Carbon::now();
            $date = $date->format('d-m-Y');


            $preorders = DB::table('preorders as p')
                ->join('productos as pro', 'pro.id', '=', 'p.producto_id')
                ->select('pro.id', 'pro.nombre', 'p.cantidad1', 'p.cantidad2', 'p.cantidad3')
                ->where('p.sede_id', $sede_id)
                ->where('p.fecha_inicio', $inicio)
                ->where('p.fecha_final', $final)
                ->get();


            $institucion = Institucion::find($request->institucion_id);
            $sede = Sede::find($request->sede_id);

            $menus_id = CodigoMenu::all();

            $beneficiarios = Beneficiario::where('sede_id', $request->sede_id)->get();


            return response()->view('ajax.filtro-pedido', compact(
                'menus_id',
                'preorders',
                'date',
                'institucion',
                'sede',
                'beneficiarios',
                'sede_id',
                'tipo_id',
                'inicio',
                'final'
            ));
        }
    }
}
