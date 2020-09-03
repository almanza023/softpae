<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'jornada_id', 'tipo_complemento_id', 'grupo_etario_id', 'fecha', 'estado'

    ];





    public function jornada()
    {
        return $this->belongsTo('App\Models\Jornada');
    }

    public function tipo_complemento()
    {
        return $this->belongsTo('App\Models\TipoComplemento');
    }

    public function codigo()
    {
        return $this->belongsTo('App\Models\TipoComplemento');
    }

    public function detalle()
    {
        return $this->belongsTo('App\Models\DetalleMenu');
    }



    public static function filtro($jornada, $grupo){
        $resul = DB::table('detalle_menus as dm')
        ->join('menus as m', 'm.id', '=', 'dm.menu_id')
        ->join('productos as p', 'p.id', '=', 'dm.producto_id')
        ->join('grupo_etarios as ge', 'ge.id', '=', 'dm.grupo_etario_id')
        ->select("p.nombre as producto", "ge.rango", "dm.cantidad", "m.id", 'dm.producto_id as producto_id')
        ->where('m.jornada_id', $jornada)
        ->where('dm.grupo_etario_id', $grupo)
        ->orderBy('m.id', 'asc')
        ->get();
        return $resul;
    }

    public static function filtrocajm($jornada, $grupo, $date1, $date2){
        $resul = DB::table('detalle_menus as dm')
        ->join('menus as m', 'm.id', '=', 'dm.menu_id')
        ->join('productos as p', 'p.id', '=', 'dm.producto_id')
        ->join('calculos as c', 'c.jornada_id', '=', 'm.jornada_id')
        ->join('grupo_etarios as ge', 'ge.id', '=', 'dm.grupo_etario_id')
        ->select("p.nombre as producto", "ge.rango", "dm.cantidad", "m.id", 'dm.producto_id as producto_id')
        ->where('m.jornada_id', $jornada)
        ->where('dm.grupo_etario_id', $grupo)
        ->where('c.inicio', $date1)
        ->where('c.final', $date2)
        ->orderBy('m.id', 'asc')
        ->get();
        return $resul;
    }


    public static function obtenerFilas($jornada, $grupo){

        $resul = DB::table('menus as m')
        ->where('m.jornada_id', $jornada)
        ->where('m.grupo_etario_id', $grupo)
        ->select(DB::raw('count(*) as cantidad'))
        ->first();
        return $resul->cantidad;
    }

    public static function getAllId($id){
        $resul = DB::table('detalle_menus as dm')
        ->join('menus as m', 'm.id', '=', 'dm.menu_id')
        ->join('productos as p', 'p.id', '=', 'dm.producto_id')
        ->join('grupo_etarios as ge', 'ge.id', '=', 'dm.grupo_etario_id')
        ->select( "ge.id as grupo_id", "dm.cantidad", "m.id", 'dm.producto_id as producto_id')
        ->where('m.id', $id)
        ->orderBy('m.id', 'asc')
        ->get();
        return $resul;
    }

    public static function getBySedeByJornada ($sede, $jornada){
        return DB::select("SELECT b.tipo_complemento_id,  sum(b.cantidad) AS total, b.grupo_etario_id FROM beneficiarios b
        INNER JOIN sedes s ON s.id=b.sede_id
        INNER JOIN instituciones i ON i.id=s.institucion_id
        WHERE s.id=? AND b.jornada_id=? GROUP BY b.grupo_etario_id,  b.tipo_complemento_id ORDER BY b.grupo_etario_id", [$sede, $jornada]);
    }









}
