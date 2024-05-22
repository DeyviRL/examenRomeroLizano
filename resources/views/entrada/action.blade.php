<div class="modal-content">
    <form id="formUpdate" action="{{ route('entrada.store') }}" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">Nueva Entrada</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <label for="placa">Placa</label>
                <select name="placa" class="form-control" id="placa">
                    @foreach($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo->placa }}">{{ $vehiculo->placa }}</option>
                    @endforeach
                </select>
                <div id="msg_placa"></div>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="text" name="fecha" class="form-control" id="fecha" value="{{ date('Y-m-d H:i:s') }}" readonly>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
        </div>
    </form>
</div>