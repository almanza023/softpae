<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    
 
    

    
}
