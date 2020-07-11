<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CodigoMenu extends Model
{
    protected $table = 'codigo_menus';

    protected $fillable = [
        'jornada_id', 'grupo_etario_id', 'menu_id', 'codigo', 'estado'
         
    ];

    

    

    public function jornada()
    {
        return $this->belongsTo('App\Models\Jornada');
    }

    
    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public static function getMenus($jornada){

        $resul = CodigoMenu::where('jornada_id', $jornada)
        ->orderBy('codigo', 'asc')-> get();
        return $resul;
    }

   
    
 
    

    
}
