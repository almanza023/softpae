<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'tipo_complemento_id',
        'sede_id',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    public static function duplicados($sede, $tipo, $date1, $date2){
        return DB::table('pedidos')
        ->where('sede_id', $sede)
        ->where('tipo_complemento_id', $tipo)
        ->where('fecha_inicio', $date1)
        ->where('fecha_fin', $date2)
        ->get();
    }


}
