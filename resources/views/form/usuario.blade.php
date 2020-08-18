@if($crear)
<div class="form-group">
    <label>Nombres</label>
    <input type="text" name="nombres" id="nombres" class="form-control" required />
</div>               

<div class="form-group">
    <label>Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" class="form-control" required />
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
<div class="form-group">
    <label>Usuario</label>
    <input type="text" name="usuario" id="usuario" class="form-control" required />
</div> 
<div class="form-group">
    <label>Contraseña</label>
    <input type="text" name="password" id="password" class="form-control" required />
</div> 
<div class="form-group">
    <label>Tipo de Usuario</label>
    <div>
        <select name="rol" id="rol" class="form-control">
                <option value="1">Administrador</option>
                <option value="2">Estandar</option>
        </select>
    </div>
</div> 
@endif

@if($editar)
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label>Nombres</label>
    <input type="text" name="nombres" id="nombres_e" class="form-control" required />
</div>               

<div class="form-group">
    <label>Apellidos</label>
    <input type="text" name="apellidos" id="apellidos_e" class="form-control" required />
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
<div class="form-group">
    <label>Usuario</label>
    <input type="text" name="usuario" id="usuario_e" class="form-control" required />
</div> 
<div class="form-group">
    <label>Contraseña</label>
    <input type="text" name="password" id="password_e" class="form-control" required />
</div>
<div class="form-group">
    <label>Tipo de Usuario</label>
    <div>
        <select name="rol" id="rol_e" class="form-control">
                <option value="1">Administrador</option>
                <option value="2">Estandar</option>
        </select>
    </div>
</div> 
@endif