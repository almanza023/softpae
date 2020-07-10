@extends('theme.main', ['tabla'=>true])
@section('titulo')
    Calculos
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h3 class="mt-0 header-title text-center">MODÚLO DE CALCULOS</h3>     
                <a href="{{ route('calculos.create') }}" class="btn btn-primary waves-effect waves-light" 
                >
                   <i class="fa fa-newspaper"></i> CREAR 
                </a>
                </p>

               

            </div>
        </div>
    </div>
    <!-- end col -->
    
</div>


@endsection


@section('scripts')


@endsection