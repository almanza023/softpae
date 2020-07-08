<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleMenu extends Model
{
    protected $table = 'detalle_menus';

    protected $fillable = [
        'menu_id', 'grupo_etario_id', 'producto_id', 'cantidad', 'estado'
         
    ];   

    

    public function menus()
    {
        return $this->belongsToMany('App\Menu');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto');
    }

    public function grupo_etarios()
    {
        return $this->belongsToMany('App\GrupoEtario');
    }

    
 
    

    
}
