<?php

namespace App\Http\Controllers;


use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores=Proveedor::all();

        if (request()->ajax()) {
            $proveedores = Proveedor::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($proveedores) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-proveedores', compact('proveedores'));
            }
        }
        return view('proveedores.index', compact('proveedores'));
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
       $exito= Proveedor::create($request->all());
        if($exito){
            return response()->json(['success' => 'PROVEEDOR CREADO CON EXITO!']);
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
            $exito=Proveedor::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'PROVEEDOR ACTUALIZADO CORRECTAMENTE']);
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
        $unidad = Proveedor::findOrFail($id);

        if ($unidad->estado==1) {
            $unidad->update(['estado' => 0]);
        } else {
            $unidad->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE PROVEEDOR ACTUALIZADO CON EXITO!']);
    }
}
