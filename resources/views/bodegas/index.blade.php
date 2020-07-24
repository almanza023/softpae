@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Bodegas
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE BODEGAS</h3>     
                <button type="button" class="btn btn-outline-info waves-effect waves-light" 
                data-toggle="modal" data-target="#ModalBodega">
                   <i class="fa fa-plus-circle"></i> Agregar Bodega 
                </button>
                </p>

               <div id="id_table">
                @include('tablas.tb-bodegas')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('bodegas.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-bodega')
@include('modals.edit-bodega')
@endsection

@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Bodega.js') }}"></script>
@endsection