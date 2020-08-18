@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Empresa
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE EMPRESA</h3>
               <div id="id_table">
                @include('tablas.tb-empresas')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<form id="form_hidden" style="display:none" action="{{route('empresa.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.edit-empresa')
@endsection


@section('scripts')
<script>

</script>
<script src="{{ asset('js/Empresa.js') }}"></script>
@endsection
