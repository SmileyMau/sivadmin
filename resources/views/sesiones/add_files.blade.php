@extends('admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Informacion y Archivos de la Sesión -- </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Lista de Sesiones</a></li>
                        <li class="breadcrumb-item active">Informacion y Archivos</li>
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
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Dictámenes</h3>
                            <div class="card-tools ml-auto">
                                <button class="btn btn-sm btn-outline-primary font-weight-bold" data-toggle="modal" data-target="#dictamenModal" type="button">
                                    <i class="fas fa-plus mr-1"></i> Añadir
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            @foreach ($dictamenes as $dictamen)
                                <div class="card p-3 list-card">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <span class="badge badge-primary " style="font-size: 10px;">#{{ $dictamen->id }}</span>
                                        <div class="btn-group">
                                            <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                    class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <h5 class="text-xs font-weight-bold mb-1">{{ $dictamen->name . ' ' . $dictamen->appaterno . ' ' . $dictamen->apmaterno }}</h5>
                                    <p class="text-xs text-muted mb-3">{{ $dictamen->titulo }} </p>
                                    <div class="text-xs text-danger font-weight-bold">
                                        <i class="fas fa-file-pdf mr-2"></i> <a href="{{url('storage/'.substr($dictamen->archivo,7))}}" target="_blank">Ver PDF</a>
                                    </div>
                                </div>
                            @endforeach
                           
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Acuerdos Económicos</h3>
                            <div class="card-tools ml-auto">
                                <button class="btn btn-sm btn-outline-primary font-weight-bold" type="button" data-toggle="modal" data-target="#acuerdoModal">
                                    <i class="fas fa-plus mr-1"></i> Añadir
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <!-- Item Card 1 -->
                            <div class="card p-3 list-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge badge-primary " style="font-size: 10px;">#001</span>
                                    <div class="btn-group">
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                <h5 class="text-xs font-weight-bold mb-1">Descripción del Dictamen</h5>
                                <p class="text-xs text-muted mb-3">Resumen breve del contenido del dictamen para
                                    facilitar la lectura rápida en dispositivos móviles.</p>
                                <div class="text-xs text-danger font-weight-bold">
                                    <i class="fas fa-file-pdf mr-2"></i> dictamen_final_v1.pdf
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">INICIATIVAS</h3>
                            <div class="card-tools ml-auto">
                                <button class="btn btn-sm btn-outline-primary font-weight-bold" type="button">
                                    <i class="fas fa-plus mr-1"></i> Añadir
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <!-- Item Card 1 -->
                            <div class="card p-3 list-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge badge-primary " style="font-size: 15px;">#001</span>
                                    <div class="btn-group">
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                <h5 class="text-xs font-weight-bold mb-1">Descripción del Dictamen</h5>
                                <p class="text-xs text-muted mb-3">Resumen breve del contenido del dictamen para
                                    facilitar la lectura rápida en dispositivos móviles.</p>
                                <div class="text-xs text-danger font-weight-bold">
                                    <i class="fas fa-file-pdf mr-2"></i> dictamen_final_v1.pdf
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Acuerdos de Junta de Gobierno</h3>
                            <div class="card-tools ml-auto">
                                <button class="btn btn-sm btn-outline-primary font-weight-bold" type="button">
                                    <i class="fas fa-plus mr-1"></i> Añadir
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <!-- Item Card 1 -->
                            <div class="card p-3 list-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge badge-primary " style="font-size: 15px;">#001</span>
                                    <div class="btn-group">
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                <h5 class="text-xs font-weight-bold mb-1">Descripción del Dictamen</h5>
                                <p class="text-xs text-muted mb-3">Resumen breve del contenido del dictamen para
                                    facilitar la lectura rápida en dispositivos móviles.</p>
                                <div class="text-xs text-danger font-weight-bold">
                                    <i class="fas fa-file-pdf mr-2"></i> dictamen_final_v1.pdf
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Diario de debates</h3>
                            <div class="card-tools ml-auto">
                                <button class="btn btn-sm btn-outline-primary font-weight-bold" type="button">
                                    <i class="fas fa-plus mr-1"></i> Añadir
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <!-- Item Card 1 -->
                            <div class="card p-3 list-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge badge-primary " style="font-size: 10px;">#001</span>
                                    <div class="btn-group">
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                <h5 class="text-xs font-weight-bold mb-1">Descripción del Dictamen</h5>
                                <p class="text-xs text-muted mb-3">Resumen breve del contenido del dictamen para
                                    facilitar la lectura rápida en dispositivos móviles.</p>
                                <div class="text-xs text-danger font-weight-bold">
                                    <i class="fas fa-file-pdf mr-2"></i> dictamen_final_v1.pdf
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Asuntos Generales</h3>
                            <div class="card-tools ml-auto">
                                <button class="btn btn-sm btn-outline-primary font-weight-bold" type="button">
                                    <i class="fas fa-plus mr-1"></i> Añadir
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <!-- Item Card 1 -->
                            <div class="card p-3 list-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge badge-primary " style="font-size: 10px;">#001</span>
                                    <div class="btn-group">
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                <h5 class="text-xs font-weight-bold mb-1">Descripción del Dictamen</h5>
                                <p class="text-xs text-muted mb-3">Resumen breve del contenido del dictamen para
                                    facilitar la lectura rápida en dispositivos móviles.</p>
                                <div class="text-xs text-danger font-weight-bold">
                                    <i class="fas fa-file-pdf mr-2"></i> dictamen_final_v1.pdf
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Informes</h3>
                            <div class="card-tools ml-auto">
                                <button class="btn btn-sm btn-outline-primary font-weight-bold" type="button">
                                    <i class="fas fa-plus mr-1"></i> Añadir
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <!-- Item Card 1 -->
                            <div class="card p-3 list-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge badge-primary " style="font-size: 10px;">#001</span>
                                    <div class="btn-group">
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="btn btn-link btn-xs text-muted" type="button"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                <h5 class="text-xs font-weight-bold mb-1">Descripción del Dictamen</h5>
                                <p class="text-xs text-muted mb-3">Resumen breve del contenido del dictamen para
                                    facilitar la lectura rápida en dispositivos móviles.</p>
                                <div class="text-xs text-danger font-weight-bold">
                                    <i class="fas fa-file-pdf mr-2"></i> dictamen_final_v1.pdf
                                </div>
                            </div>
                            
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

@include('sesiones.modals')



@endsection