<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $table = 'beneficiarios';

    protected $fillable = [
        'institucion_id', 'jornada_id', 'grupo_etario_id', 'tipo_complemento_id', 'cantidad', 
         'estado'
    ];

    

    public function institucion()
    {
        return $this->belongsTo('App\Institucion');
    }

    public function jornada()
    {
        return $this->belongsTo('App\Jornada');
    }

    public function grupo_etario()
    {
        return $this->belongsTo('App\GrupoEtario');
    }

    public function tipo_complemento()
    {
        return $this->belongsTo('App\TipoComplemento');
    }
 
    

    
}
