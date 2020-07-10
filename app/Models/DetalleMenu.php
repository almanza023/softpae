<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleMenu extends Model
{
    protected $table = 'detalle_menus';

    protected $fillable = [
        'menu_id', 'producto_id', 'cantidad', 'estado'
         
    ];   

    

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Models\Producto');
    }


    
  
    
 
    

    
}
