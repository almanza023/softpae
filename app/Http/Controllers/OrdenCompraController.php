<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Producto;

use App\Models\OrdenCompra;
use\App\Models\DetalleCompra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;

class OrdenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $compras=DB::table('orden_compras as oc')
        ->join('proveedores as p','oc.proveedor_id','=','p.id')
        ->join('users as u','oc.usuario_id','=','u.id')
        ->join('detalles_compras as dc','oc.id','=','dc.compra_id')
        ->select('oc.id','oc.fecha','p.nombre','oc.estado','oc.total')
        ->orderBy('oc.id','desc')
        ->groupBy('oc.id','oc.fecha','p.nombre','oc.estado','oc.total')
        ->paginate(10);
        return view('compras.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores=Proveedor::all();
        $productos=Producto::where('estado', 1)->get();
         if (request()->ajax()) {
              $proveedores=Proveedor::all();
             /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
             if (count($proveedores) == 0) {
                 return response()->json(['warning' => 'Error en el servidor']);
             } else {
                 return response()->view('tablas.tb-compras', compact('proveedores'));
             }
         }
         return view('compras.create', compact('proveedores','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
			DB::beginTransaction();
			$compra=new OrdenCompra;
            $compra->proveedor_id=$request->get('id_proveedor');
            $compra->usuario_id=$request->get('id_usuario');
			$compra->total=$request->get('total_venta');
			$hora=Carbon::now('America/Bogota');
			$compra->fecha=$hora;
			$compra->save();

			$idarticulo=$request->get('idarticulo');
			$cantidad=$request->get('cantidad');
			$precio=$request->get('precio');

			$cont = 0;

			while ($cont < count($idarticulo)) {
				$detalle=new DetalleCompra();
				$detalle->compra_id=$compra->id;
				$detalle->producto_id=$idarticulo[$cont];
				$detalle->cantidad=$cantidad[$cont];
				$detalle->precio=$precio[$cont];
				$detalle->save();
				$cont=$cont+1;
			}

            DB::commit();
            //return response()->json(['success' => 'ORDEN DE COMPRA REGISTRADA CON EXITO']);
		} catch (Exception $e) {
			DB::rollback();
		}
        return Redirect::to('compras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra=DB::table('orden_compras as oc')
        ->join('proveedores as p','oc.proveedor_id','=','p.id')
        ->join('detalles_compras as dc','oc.id','=','dc.compra_id')
        ->select('oc.id','oc.fecha','p.nombre','oc.estado','oc.total')
		->where('oc.id','=',$id)
        ->first();

		$detalles=DB::table('detalles_compras as dc')
		->join('productos as pro', 'pro.id','=','dc.producto_id')
		->select('pro.nombre as producto','dc.cantidad','dc.precio')
		->where('dc.compra_id','=',$id)
		->get();
		return view('compras.show',["compra"=>$compra,"detalles"=>$detalles]);
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
        $compra=OrdenCompra::findOrFail($id);
		$compra->estado='0';
		$compra->update();
		return Redirect::to('compras');
    }


    public function reporte(Request $request,$id){
        $compra=DB::table('orden_compras as oc')
        ->join('proveedores as p','oc.proveedor_id','=','p.id')
        ->join('detalles_compras as dc','oc.id','=','dc.compra_id')
        ->select('oc.id','oc.fecha','p.nombre','oc.estado','oc.total')
		->where('oc.id','=',$id)
        ->first();

		$detalles=DB::table('detalles_compras as dc')
		->join('productos as pro', 'pro.id','=','dc.producto_id')
		->select('pro.nombre as producto','dc.cantidad','dc.precio')
		->where('dc.compra_id','=',$id)
        ->get();

        $numcompra=OrdenCompra::select('id')->where('id',$id)->get();
        
        
        $pdf=\PDF::loadView('compras.reporte',compact('compra', 'detalles'));
        return $pdf->download('compra-'.$numcompra[0]->id.'.pdf');
    }
}
