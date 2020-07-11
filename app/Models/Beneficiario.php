<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $table = 'beneficiarios';

    protected $fillable = [
        'sede_id', 'jornada_id', 'grupo_etario_id', 'tipo_complemento_id', 'cantidad', 
         'estado'
    ];

    

    public function sede()
    {
        return $this->belongsTo('App\Models\Sede');
    }

    public function jornada()
    {
        return $this->belongsTo('App\Models\Jornada');
    }

    public function grupo_etario()
    {
        return $this->belongsTo('App\Models\GrupoEtario');
    }

    public function tipo_complemento()
    {
        return $this->belongsTo('App\Models\TipoComplemento');
    }
 
    

    
}
