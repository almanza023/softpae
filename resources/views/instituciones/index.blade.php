@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Instituciones
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE INSTITUCIONES</h3>     
                <a href="{{ route('instituciones.create') }}" class="btn btn-primary waves-effect waves-light" 
              >
                   <i class="fa fa-newspaper"></i> CREAR 
            </a><br>
                

               <div id="id_table">
                @include('tablas.tb-instituciones')
               </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('instituciones.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>

@endsection


@section('scripts')
<script>
    
</script>
<script src="{{ asset('js/Institucion.js') }}"></script>
@endsection