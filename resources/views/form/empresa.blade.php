@if($crear)

@endif

@if($editar)
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre_e" class="form-control" required placeholder="Nombre"/>
</div>

<div class="form-group">
    <label>Teléfono</label>
    <input type="number" name="telefono" id="telefono_e" class="form-control" required />
</div>

<div class="form-group">
    <label>Dirección (*)</label>
    <input type="text" name="direccion" id="direccion_e" class="form-control" required placeholder="Dirección"/>
</div>


<div class="form-group">
    <label>Correo (*)</label>
    <input type="email" name="correo" id="correo_e" class="form-control" required placeholder="Correo"/>
</div>

<div class="form-group">
    <label>Sitio web</label>
    <input type="text" name="web" id="web_e" class="form-control"  placeholder="Sitio web"/>
</div>

<div class="form-group">
    <label>Representante Legal</label>
    <input type="text" name="representante" id="representante_e" class="form-control"  placeholder="Representante Legal"/>
</div>

@endif
