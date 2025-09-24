@extends('admin')
@section ('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ver bien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('Guion.index')}}">Lista de Guiones</a></li>
                    <li class="breadcrumb-item active">Ver Guion</li>
                </ol>
            </div> 
        </div>
    </div>
</section>

<div class="m-3">
    <div class="">
        <div class="card-body text-muted">
            <div class="card card-outline card-celsh">
                <div class="card-header">
                    <h1 class="card-title"></h1>
                    <a href="{{route('Guion.texto')}}" class="btn btn-reasig float-right m-1 " >
                        Ver
                      </a>
                    <div class="form-group">
                       
                    </div>
                </div>

                <div class="">
                    <br>
                    <h4 class="text-center">Información del Guion</h4>
                    <hr>
                    <div class=" overflow-hidden ">
                        <div class="row gy-5 m-3" style="font-size: 20px">

                            {!! $show->texto !!}
                            
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section ('js')

@endsection