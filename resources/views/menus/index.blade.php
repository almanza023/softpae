@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Menús
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE MENÚS</h3>     
                <a href="{{ route('menus.create') }}" class="btn btn-primary waves-effect waves-light" 
                >
                   <i class="fa fa-newspaper"></i> CREAR 
                </a>
                </p>

               

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>
<form id="form_hidden" style="display:none" action="{{route('productos.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>

@endsection


@section('scripts')


@endsection