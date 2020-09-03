<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Preorder;
use App\Models\Sede;
use Carbon\Carbon;

class PreorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        if($request->grupo_etario_id==1){

            $productos=$request->producto_id;
            for ($i=0; $i < count($productos); $i++) {
                $preorder=new Preorder();
                $preorder->producto_id=$productos[$i];
                $preorder->jornada_id=$request->jornada_id;
                $preorder->sede_id=$request->sede_id;
                $preorder->tipo_complemento_id=$request->tipo_complemento_id;
                $preorder->cantidad1=$request->cantidad[$i];
                $preorder->save();
            }
            return response()->json(['success' => 'DATOS AGREGADOS EXITOSAMENTE.']);

        }else {

            $productos=$request->producto_id;
            for ($i=0; $i < count($productos); $i++) {
                $preorder=Preorder::where('producto_id', $productos[$i])
                ->where('sede_id', $request->sede_id)
                ->where('jornada_id', $request->jornada_id)->first();

                if($request->grupo_etario_id==2){
                    $preorder->cantidad2=$request->cantidad[$i];
                    $preorder->save();
                }
                if($request->grupo_etario_id==3){
                    $preorder->cantidad3=$request->cantidad[$i];
                    $preorder->save();
                }


            }
            return response()->json(['success' => 'DATOS AGREGADOS EXITOSAMENTE.']);


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




}
