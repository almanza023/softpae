<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'jornada_id', 'tipo_complemento_id', 'fecha', 'estado'
         
    ];

    

    

    public function jornada()
    {
        return $this->belongsTo('App\Jornada');
    }

    public function tipo_complemento()
    {
        return $this->belongsTo('App\TipoComplemento');
    }

    public static function filtro($jornada, $tipo, $grupo){
        $resul = DB::table('detalle_menus as dm')
        ->join('menus as m', 'm.id', '=', 'dm.menu_id')
        ->join('productos as p', 'p.id', '=', 'dm.producto_id')
        ->join('grupo_etarios as ge', 'ge.id', '=', 'dm.grupo_etario_id')
        ->select("p.nombre as producto", "ge.rango", "dm.cantidad", "m.id", 'dm.producto_id as producto_id')
        ->where('m.jornada_id', $jornada)
        ->where('m.tipo_complemento_id', $tipo)
        ->where('dm.grupo_etario_id', $grupo)
        ->orderBy('m.id', 'asc')
        ->get();
        return $resul;
    }

    
 
    

    
}
