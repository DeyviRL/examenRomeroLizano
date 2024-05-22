<div class="modal-content">
    <form id="formUpdate" action="{{$tipoComprobante->id ? route('tipoComprobante.update',$tipoComprobante) : route('tipoComprobante.store')}}"
     method="post">
    <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Tipo Comprobante</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        @if($tipoComprobante->id)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $tipoComprobante->id }}">
        @endif
        @csrf
        <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Ingrese el codigo" value="{{$tipoComprobante->codigo}}">
            <div id="msg_codigo"></div>

            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Ingrese el descripcion" value="{{$tipoComprobante->descripcion}}">
            <div id="msg_descripcion"></div>
        </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary" id="guardar"><span id="textoBoton">Guardar</span></button>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    </form>
</div>