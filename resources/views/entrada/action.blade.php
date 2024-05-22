<div class="modal-content">
    <form id="formUpdate" action="{{ $entrada->id ? route('entrada.update', $entrada->id) : route('entrada.store') }}" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">{{ $entrada->id ? 'Editar Entrada' : 'Nueva Entrada' }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if($entrada->id)
                @method('PUT')
                <input type="hidden" name="id" value="{{ $entrada->id }}">
            @endif
            @csrf
            <div class="form-group">
                <label for="vehiculo_id">Vehículo</label>
                <select name="vehiculo_id" class="form-control" id="vehiculo_id">
                    @foreach($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo->id }}" {{ $vehiculo->id == $entrada->vehiculo_id ? 'selected' : '' }}>{{ $vehiculo->placa }}</option>
                    @endforeach
                </select>
                <div id="msg_vehiculo_id"></div>
            </div>
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Ingrese título" value="{{ $entrada->titulo }}">
                <div id="msg_titulo"></div>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Ingrese descripción">{{ $entrada->descripcion }}</textarea>
                <div id="msg_descripcion"></div>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Ingrese cantidad" value="{{ $entrada->cantidad }}">
                <div id="msg_cantidad"></div>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="text" name="fecha" class="form-control" id="fecha" value="{{ $entrada->fecha }}" disabled>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="guardar"><span id="textoBoton">{{ $entrada->id ? 'Actualizar' : 'Guardar' }}</span></button>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
</div>
