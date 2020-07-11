<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table = 'instituciones';

    protected $fillable = [
        'municipio_id', 'nombre', 'nit', 'contacto', 'correo', 'telefono', 'direccion', 'sedes', 'estado'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper ($value);
    }

    public function setContactoAttribute($value)
    {
        $this->attributes['contacto'] = strtoupper ($value);
    }

    public function municipio()
    {
        return $this->belongsTo('App\Models\Municipio');
    }

    public function beneficiarios()
    {
        return $this->hasMany('App\Models\Beneficiarios');
    }
    public function sedes_institucion()
    {
        return $this->hasMany('App\Models\Sede');
    }
 
    

    
}
