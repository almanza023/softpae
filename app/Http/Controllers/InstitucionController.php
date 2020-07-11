<?php

namespace App\Http\Controllers;


use App\Models\Institucion;
use App\Models\Municipio;
use App\Models\Sede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones=Institucion::all();
        if (request()->ajax()) {
            $instituciones=Institucion::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($instituciones) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-instituciones', compact('instituciones'));
            }
        }
        return view('instituciones.index', compact('instituciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios=Municipio::all();
        return view('instituciones.create', compact('municipios'));


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
        $institucion= Institucion::create($request->all());
        $sede = new Sede();
        $sede->institucion_id=$institucion->id;                 
        $sede->nombre='PRINCIPAL';             
        $sede->save();
            
        if($request->sedes==1){
            $sedes=$request->nombres_sedes;   
            for ($i = 0; $i < (count($sedes)); $i++) {                    
                $sede = new Sede();
                $sede->institucion_id=$institucion->id;                 
                $sede->nombre=$sedes[$i];             
                $sede->save();       
            }
        }
          

           DB::commit();
           return response()->json(['success' => 'INSTITUCION CREADA EXTIOSAMENTE.']);
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
            $exito=Institucion::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'INSTITUCION ACTUALIZADA CORRECTAMENTE']);
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
        $institucion = Institucion::findOrFail($id);

        if ($institucion->estado==1) {
            $institucion->update(['estado' => 0]);
        } else {
            $institucion->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE INSTITUCION ACTUALIZADO CON EXITO!']);
    }

    public function getSedes($id)
    {
       
        if(request()->ajax()){
            $resul=Sede::where('institucion_id', $id)->get();
            return response()->json($resul);
        }
    }
}
