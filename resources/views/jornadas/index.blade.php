@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Jornadas
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE JORNADAS</h3>     
                <button type="button" class="btn btn-primary waves-effect waves-light" 
                data-toggle="modal" data-target="#CreteJornada">
                   <i class="fa fa-newspaper"></i> CREAR 
                </button>
                </p>

               <div id="id_table">
                @include('tablas.tb-jornadas')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('jornadas.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@include('modals.create-jornada')
@include('modals.edit-jornada')
@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Jornada.js') }}"></script>
@endsection