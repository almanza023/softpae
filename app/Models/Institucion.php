<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table = 'instituciones';

    protected $fillable = [
        'municipio_id', 'nombre', 'nit', 'contacto', 'correo', 'telefono', 'direccion', 'estado'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }

    public function setContactoAttribute($value)
    {
        $this->attributes['contacto'] = ucwords($value);
    }

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }

    public function beneficiarios()
    {
        return $this->hasMany('App\Beneficiarios');
    }
 
    

    
}
