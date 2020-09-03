@extends('theme.main', ['tabla'=>true])
@section('titulo')
    proveedores
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE PROVEEDORES</h3>     
                <button type="button" class="btn btn-outline-info waves-effect waves-light" 
                data-toggle="modal" data-target="#ModalProveedor">
                   <i class="fa fa-plus-circle"></i> Agregar Proveedor 
                </button>
                </p>

               <div id="id_table">
                @include('tablas.tb-proveedores')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('proveedores.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-proveedor')
@include('modals.edit-proveedor')
@endsection

@section('scripts')
<script src="{{ asset('js/Proveedor.js') }}"></script>
@endsection