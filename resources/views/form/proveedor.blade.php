@if($crear)
<div class="form-group">
    <label>Tipo</label>
    <div>
        <select name="tipo" id="tipo" class="form-control">
                <option value="1">Juridico</option>
                <option value="2">Natural</option>
        </select>
    </div>
</div> 
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" required />
</div>               

<div class="form-group">
    <label>Nit/CC</label>
    <input type="text" name="nit" id="nit" class="form-control" required />
</div> 

<div class="form-group">
    <label>Direccion</label>
    <input type="text" name="direccion" id="direccion" class="form-control" required />
</div> 
<div class="form-group">
    <label>Telefono</label>
    <input type="number" name="telefono" id="telefono" class="form-control" required />
</div> 
<div class="form-group">
    <label>Correo</label>
    <input type="text" name="correo" id="correo" class="form-control" required />
</div>

@endif

@if($editar)
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label>Tipo</label>
    <div>
        <select name="tipo" id="tipo_e" class="form-control">
                <option value="1">Juridico</option>
                <option value="2">Natural</option>
        </select>
    </div>
</div> 
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre_e" class="form-control" required />
</div>               

<div class="form-group">
    <label>Nit/CC</label>
    <input type="text" name="nit" id="nit_e" class="form-control" required />
</div> 

<div class="form-group">
    <label>Direccion</label>
    <input type="text" name="direccion" id="direccion_e" class="form-control" required />
</div> 
<div class="form-group">
    <label>Telefono</label>
    <input type="number" name="telefono" id="telefono_e" class="form-control" required />
</div> 
<div class="form-group">
    <label>Correo</label>
    <input type="text" name="correo" id="correo_e" class="form-control" required />
</div>
@endif