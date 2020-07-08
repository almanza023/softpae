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

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=Producto::all();
        $grupos=GrupoEtario::where('estado', '1')->get();
        $jornadas=Jornada::where('estado', '1')->get();
        $tipos=TipoComplemento::where('estado', '1')->get();
        return view('menus.create', compact('productos', 'grupos', 'jornadas', 'tipos'));
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
                $menu= new Menu();
                $menu->tipo_complemento_id=$request->tipo_id;
                $menu->jornada_id=$request->jornada_id;
                $menu->save();
              
                //Crear Detalles
                $producto=$request->producto_id;
                $grupo=$request->grupo_etario_id;
                
                for ($i = 0; $i < (count($grupo)); $i++) {

                    
                    $detalle = new DetalleMenu();
                    $detalle->menu_id=$menu->id;
                    $detalle->grupo_etario_id=$grupo[$i];
                   
                    $detalle->cantidad=$request->can[$i];
                    for($a = 0; $a < (count($producto)); $a++){
                        $detalle->producto_id=$producto[$a];
                    }
                    $detalle->save();
                    

                    
                }

                 DB::commit();
                 return response()->json(['success' => 'DATOS ALMACENADOS']);
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
        $menu = Menu::findOrFail($id);

        if ($menu->estado==1) {
            $menu->update(['estado' => 0]);
        } else {
            $menu->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO  ACTUALIZADO CON EXITO!']);
    }
}
