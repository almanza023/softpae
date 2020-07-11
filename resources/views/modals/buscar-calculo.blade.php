<div id="BuscarCalculo" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Consulta de Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="form_buscar" action="{{ route('buscar.calculos') }}" method="get">
                    @csrf
                   
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
                        <label>Fecha (*)</label>
                        <div>
                            <input type="text" name="daterange"  class="form-control" />
                            <input type="hidden" name="inicio" id="inicio">
                            <input type="hidden" name="final" id="final">
                        </div>
                    </div>
                    
                 
            </div>
            <div class="modal-footer">
                <button type="button" id="buscar" class="btn btn-primary waves-effect waves-light">
                    Buscar
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </form> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->