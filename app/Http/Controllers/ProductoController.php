<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Unidad;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::all();
        $categorias=Categoria::where('estado', 1)->get();
        $unidades=Unidad::where('estado', 1)->get();

        if (request()->ajax()) {
            $productos = Producto::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($productos) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-productos', compact('productos'));
            }
        }
        return view('productos.index', compact('productos', 'categorias', 'unidades'));
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
       $exito= Producto::create($request->all());
        if($exito){
            return response()->json(['success' => 'PRODUCTO CREADO CON EXITO!']);
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
            $exito=Producto::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'PRODUCTO ACTUALIZADO CORRECTAMENTE']);
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
        $producto = Producto::findOrFail($id);

        if ($producto->estado==1) {
            $producto->update(['estado' => 0]);
        } else {
            $producto->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE PRODUCTO ACTUALIZADO CON EXITO!']);
    }
}
