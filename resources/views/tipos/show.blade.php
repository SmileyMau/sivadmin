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
                    <li class="breadcrumb-item"><a href="{{route('sesiones.index')}}">Lista de Bienes</a></li>
                    <li class="breadcrumb-item active">Ver bien</li>
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
                    <div class="form-group">
                       
                    </div>
                </div>

                <div class="">
                    <br>
                    <h4 class="text-center">Información del tipo</h4>
                    <hr>
                    <div class=" overflow-hidden ">
                        <div class="row gy-5 " style="font-size: 20px">

                            <div class="col-6">
                                <div class="p-3  "><b>Descripcion:</b> {{$show->descripcion}}</div>
                            </div>
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