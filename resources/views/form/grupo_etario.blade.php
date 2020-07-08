@if($crear)
<div class="form-group">
    <label>Descipción</label>
    <input type="text" name="descripcion" id="descripcion" class="form-control" required placeholder="Nombre"/>
</div>               

<div class="form-group">
    <label>Rango</label>
    <input type="text" name="rango" id="rango" class="form-control" required placeholder="Rango"/>
</div>                 
@endif

@if($editar)
<input type="hidden" id="id" name="id">

<div class="form-group">
    <label>Descipción</label>
    <input type="text" name="descripcion" id="descripcion_e" class="form-control" required placeholder="Nombre"/>
</div>               

<div class="form-group">
    <label>Rango</label>
    <input type="text" name="rango" id="rango_e" class="form-control" required placeholder="Rango"/>
</div>  
@endif