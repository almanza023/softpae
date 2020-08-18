<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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


    public static function getCantidadInstitucion($jornada_id, $tipo_complemento, $grupo_id, $institucion_id){
        return DB::table('instituciones as i')
           ->join('sedes as s','i.id','=','s.institucion_id')
           ->join('beneficiarios as b','b.sede_id','=','s.id')
           ->where('b.jornada_id',$jornada_id)
           ->where('b.tipo_complemento_id',$tipo_complemento)
           ->where('b.grupo_etario_id',$grupo_id)
           ->where('i.id',$institucion_id)
           ->sum('b.cantidad');
    }

    public static function getCantidadTotal($jornada_id, $tipo_complemento, $grupo_id){
        return DB::table('instituciones as i')
           ->join('sedes as s','i.id','=','s.institucion_id')
           ->join('beneficiarios as b','b.sede_id','=','s.id')
           ->where('b.jornada_id',$jornada_id)
           ->where('b.tipo_complemento_id',$tipo_complemento)
           ->where('b.grupo_etario_id',$grupo_id)
           ->sum('b.cantidad');
    }




}
