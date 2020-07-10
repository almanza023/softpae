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

    public static function filtro($jornada, $tipo, $grupo){
        $resul = DB::table('detalle_menus as dm')
        ->join('menus as m', 'm.id', '=', 'dm.menu_id')
        ->join('productos as p', 'p.id', '=', 'dm.producto_id')        
        ->select("p.nombre as producto", "dm.cantidad", "m.id", 'dm.producto_id as producto_id')
        ->where('m.jornada_id', $jornada)
        ->where('m.tipo_complemento_id', $tipo)
        ->where('m.grupo_etario_id', $grupo)
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
   

    
 
    

    
}
