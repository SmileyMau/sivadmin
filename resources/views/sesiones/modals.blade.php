<!-- Modal dictamen-->
<div class="modal fade card-primary" id="dictamenModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Añadir Dictamen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('sesiones.store_dictamen')}}" enctype="multipart/form-data">
                    @method('post')
                    @csrf

                    <div class="mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Dictamen</b></span>
                            </div>
                            <select name="id_sesion_detalle" id="" class="form-control" required>
                                <option value="">Seleccionar...</option>
                                @foreach ($sesion_dets as $sesion_det)
                                    <option value="{{ $sesion_det->id }}">{{ $sesion_det->titulo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><b>Diputada/o</b></span>
                        </div>
                        <select name="id_user" id="" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            @foreach ($diputados as $diputado)
                                <option value="{{ $diputado->id }}">{{ strtoupper($diputado->name . ' '. $diputado->appaterno . ' '. $diputado->apmaterno) }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Archivo</b></span>
                            </div>
                            <input type="file" class="form-control" accept="application/pdf" name="archivo" id="" placeholder="Orden del dia" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>
                </form>
            </div>
        </div>     
    </div>
</div>

<!-- Modal Acuerdo Economico-->
<div class="modal fade card-primary" id="acuerdoModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Añadir Acuerdo Economico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('sesiones.store_acuerdo')}}" enctype="multipart/form-data">
                    @method('post')
                    @csrf

                    <div class="mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Acuerdo Economico</b></span>
                            </div>
                            <select name="id_sesion_detalle" id="" class="form-control" required>
                                <option value="">Seleccionar...</option>
                                @foreach ($sesion_dets_acuerdo as $sesion_det_acuerdo)
                                    <option value="{{ $sesion_det_acuerdo->id }}">{{ $sesion_det_acuerdo->titulo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><b>Diputada/o</b></span>
                        </div>
                        <select name="id_user" id="" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            @foreach ($diputados as $diputado)
                                <option value="{{ $diputado->id }}">{{ strtoupper($diputado->name . ' '. $diputado->appaterno . ' '. $diputado->apmaterno) }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Archivo</b></span>
                            </div>
                            <input type="file" class="form-control" accept="application/pdf" name="archivo" id="" placeholder="Orden del dia" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>
                </form>
            </div>
        </div>     
    </div>
</div>