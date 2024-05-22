<div class="modal-content">
    <form id="formUpdate" action="{{ $estudiante->id ? route('estudiante.update', $estudiante->id) : route('estudiante.store') }}" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">{{ $estudiante->id ? 'Editar Estudiante' : 'Nuevo Estudiante' }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if($estudiante->id)
                @method('PUT')
                <input type="hidden" name="id" value="{{ $estudiante->id }}">
            @endif
            @csrf
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Ingrese código" value="{{ $estudiante->codigo }}">
                <div id="msg_codigo"></div>
            </div>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingrese nombres" value="{{ $estudiante->nombres }}">
                <div id="msg_nombres"></div>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingrese apellidos" value="{{ $estudiante->apellidos }}">
                <div id="msg_apellidos"></div>
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" name="edad" class="form-control" id="edad" placeholder="Ingrese edad" value="{{ $estudiante->edad }}">
                <div id="msg_edad"></div>
            </div>
            <div class="form-group">
                <label for="promedio">Promedio</label>
                <input type="number" name="promedio" class="form-control" id="promedio" placeholder="Ingrese promedio" value="{{ $estudiante->promedio }}">
                <div id="msg_promedio"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="guardar"><span id="textoBoton">{{ $estudiante->id ? 'Actualizar' : 'Guardar' }}</span></button>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
</div>