@if($crear)
<div class="form-group">
    <label>Nombre (*)</label>
    <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre"/>
</div>               

<div class="form-group">
    <label>Nit (*)</label>
    <input type="text" name="nit" id="nit" class="form-control" required placeholder="Nombre"/>
</div>   

<div class="form-group">
    <label>Contacto (*)</label>
    <input type="text" name="contacto" id="contacto" class="form-control" required placeholder="Nombre"/>
</div>  

<div class="form-group">
    <label>Correo </label>
    <input type="email" name="correo" id="correo" class="form-control"  placeholder="Nombre"/>
</div> 

<div class="form-group">
    <label>Teléfono </label>
    <input type="number" name="telefono" id="telefono" class="form-control"  placeholder="Nombre"/>
</div>  

<div class="form-group">
    <label>Dirección </label>
    <input type="text" name="direccion" id="direccion" class="form-control"  placeholder="Nombre"/>
</div>  

<div class="form-group">
    <label>Municipio</label>
    <div>
        <select name="municipio_id" id="municipio_id" class="form-control">
            @foreach ($municipios as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>  

@endif

@if($editar)
<input type="hidden" id="id" name="id">


<div class="form-group">
    <label>Nombre (*)</label>
    <input type="text" name="nombre" id="nombre_e" class="form-control" required placeholder="Nombre"/>
</div>               

<div class="form-group">
    <label>Nit (*)</label>
    <input type="text" name="nit" id="nit_e" class="form-control" required placeholder="Nombre"/>
</div>   

<div class="form-group">
    <label>Contacto (*)</label>
    <input type="text" name="contacto" id="contacto_e" class="form-control" required placeholder="Nombre"/>
</div>  

<div class="form-group">
    <label>Correo </label>
    <input type="email" name="correo" id="correo_e" class="form-control"  placeholder="Nombre"/>
</div> 

<div class="form-group">
    <label>Teléfono </label>
    <input type="number" name="telefono" id="telefono_e" class="form-control"  placeholder="Nombre"/>
</div>  

<div class="form-group">
    <label>Dirección </label>
    <input type="text" name="direccion" id="direccion_e" class="form-control"  placeholder="Nombre"/>
</div>  

<div class="form-group">
    <label>Municipio</label>
    <div>
        <select name="municipio_id" id="municipio_id_e" class="form-control">
            @foreach ($municipios as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>
@endif