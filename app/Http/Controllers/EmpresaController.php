<?php

namespace App\Http\Controllers;


use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas=Empresa::all();

        if (request()->ajax()) {
            $empresas=Empresa::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($empresas) == 0) {
               // return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-empresas', compact('empresas'));
            }
        }
        return view('empresas.index', compact('empresas'));
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
      return redirect()->route('empresa.index');
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
            $exito=Empresa::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'DATOS ACTUALIZADOS EXITOSAMENTE']);
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
        $empresa = Empresa::findOrFail($id);

        if ($empresa->estado==1) {
            $empresa->update(['estado' => 0]);
        } else {
            $empresa->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE EMPRESA ACTUALIZADA CON EXITO!']);
    }
}
