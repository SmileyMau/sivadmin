@extends('admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Asunto #{{ $asunto->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Asuntos.index') }}">Lista de Asuntos</a></li>
                        <li class="breadcrumb-item active">Asunto #{{ $asunto->id }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Asunto <span class="badge badge-primary " style="font-size: 12px;">No. {{ $asunto->no_oficio }}</span></h3>
                            <div class="card-tools ml-auto">

                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                            <!-- Item Card 1 -->
                            <div class=" p-3 list-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    
                                </div>
                                <h5 class=" font-weight-bold mb-1">{{ $asunto->usuario->name . ' ' . $asunto->usuario->appaterno . ' ' . $asunto->usuario->apmaterno }}</h5>
                                <h5 class=" font-weight-bold mb-1">{{ $asunto->titulo }}</h5>
                                <h6 class=" font-weight-bold mb-1">{{ $asunto->descripcion }}</h6>
                                <p class="text-xs text-muted mb-3">{{ $asunto->observacion }}</p>
                               
                            </div>
                            <div class="card-tools ml-auto pr-3" >
                               <p class="text-xs text-muted ">{{ $asunto->fecha }}</p>
                            </div>
                            
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Informes</h3>
                            <div class="card-tools ml-auto">
                               
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <!-- Item Card 1 -->
                            @foreach ($diputados as $diputado)
                            <div class="card p-1 list-card">
                                <div class="d-flex justify-content-between align-items-start ">
                                    <span class="badge  " style="font-size: 15px;">{{ strtoupper($diputado->user->name . ' ' . $diputado->user->appaterno . ' ' . $diputado->user->apmaterno) }}</span>
                                    <div class="btn-group">
                                        
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row pl-5  pr-5">
                <div class="col-lg-12">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Archivo</h3>

                        </div>
                        <!-- Item Card 1 -->
                        <div class=" p-3 list-card">
                            
                            <iframe src="{{url('storage/'.substr($asunto->archivo,7))}}" frameborder="0" width="100%" height="900px"></iframe>
                            
                        </div>
                            
                    </div>
                </div>
                
            </div>
        </div>

</div>
</section>

</div>

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>




@endsection