@if($crear)



<div class="form-group">
    <label>Institución (*)</label>
    <div>
        <select name="institucion_id" id="institucion_id" class="form-control">
            @foreach ($instituciones as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>  

<div class="form-group">
    <label>Jornada (*)</label>
    <div>
        <select name="jornada_id" id="jornada_id" class="form-control">
            @foreach ($jornadas as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label>Grupo Etario (*)</label>
    <div>
        <select name="grupo_etario_id" id="grupo_etario_id" class="form-control">
            @foreach ($grupos as $item)
                <option value="{{ $item->id }}">{{ $item->rango }}</option>$
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label>Tipo Complemento (*)</label>
    <div>
        <select name="tipo_complemento_id" id="tipo_complemento_id" class="form-control">
            @foreach ($tipos as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label>Cantidad </label>
    <input type="number" name="cantidad" id="cantidad" required class="form-control" />
</div>  
@endif

@if($editar)
<input type="hidden" id="id" name="id">


<div class="form-group">
    <label>Institución (*)</label>
    <div>
        <select name="institucion_id" id="institucion_id_e" class="form-control">
            @foreach ($instituciones as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>  

<div class="form-group">
    <label>Jornada (*)</label>
    <div>
        <select name="jornada_id" id="jornada_id_e" class="form-control">
            @foreach ($jornadas as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label>Grupo Etario (*)</label>
    <div>
        <select name="grupo_etario_id" id="grupo_etario_id_e" class="form-control">
            @foreach ($grupos as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label>Tipo Complemento (*)</label>
    <div>
        <select name="tipo_complemento_id" id="tipo_complemento_id_e" class="form-control">
            @foreach ($tipos as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label>Cantidad </label>
    <input type="number" name="cantidad" id="cantidad_e" required class="form-control" />
</div>  
@endif