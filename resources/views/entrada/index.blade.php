@extends('admin.main')
@section('contenido')
 <!--CONTENIDO-->
      <!-- TABLA -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col-md-12 -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="m-0">ENTRADAS <button class="btn btn-primary" onclick="nuevo()"><i class="fas fa-file"></i> Nuevo</button> <a href=""
                      class="btn btn-success"><i class="fas fa-file-csv"></i> CSV</a></h5>
                </div>
                <div class="card-body">
                  <div>
                    <form action="{{ route('entrada.index') }}" method="get">
                      <div class="input-group">
                          <input name="texto" type="text" class="form-control" value="{{ $texto }}">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Buscar</button>                      
                          </div>
                      </div>
                    </form>
                  </div>
                  <div class="mt-2">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                          <tr>
                            <th width="5%">ID</th>                            
                            <th width="20%">PLACA</th>                            
                            <th width="25%">FECHA</th>                            
                            <th width="20%">CREADO</th>
                            <th width="20%">ACTUALIZADO</th>
                            <th width="10%">OPCIONES</th>   
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($entradas as $entrada)
                          <tr>
                            <td>{{ $entrada->id }}</td>
                            <td>{{ $entrada->placa }}</td>
                            <td>{{ $entrada->fecha }}</td>
                            <td>{{ $entrada->created_at }}</td>
                            <td>{{ $entrada->updated_at }}</td>
                            <td>
                              <button type="button" class="btn btn-warning btn-sm editar" onclick="editar('{{ $entrada->id }}')">
                                <i class="fas fa-edit"></i>
                              </button>
                              <button type="button" class="btn btn-danger btn-sm eliminar" onclick="eliminar('{{ $entrada->id }}')">
                                <i class="fas fa-trash"></i>
                              </button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $entradas->appends(["texto" => $texto])->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-md-12 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- FIN TABLA -->
      <!--MODAL UPDATE-->
      <div class="modal fade" id="modal-update">
        <div class="modal-dialog modal-lg">
        </div>
      </div>
      <!--FIN MODAL UPDATE-->
<!--FIN CONTENIDO-->
@endsection
@push('scripts')
  <script>
    function nuevo(){
      $.ajax({
            method: 'get',
            url: `{{url('entrada/create')}}`,
            success: function(res){
              $('#modal-update').find('.modal-dialog').html(res);
              $("#textoBoton").text("Guardar");
              $('#modal-update').modal("show");
              guardar();
            }
          });
    }
    function editar(id){
      $.ajax({
            method: 'get',
            url: `{{url('entrada')}}/${id}/edit`,
            success: function(res){
              $('#modal-update').find('.modal-dialog').html(res);
              $("#textoBoton").text("Actualizar");
              $('#modal-update').modal("show");
              guardar();
            }
          });
    }
    function guardar(){
        $('#formUpdate').on('submit',function(e){
          e.preventDefault();
          const _form= this;
          const formData=new FormData(_form);
          const url= this.getAttribute('action');
          $.ajax({
            method: 'POST',
            url,
            headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function(res){
              window.location.reload();
              $('#modal-update').modal("hide");
              Swal.fire({
                  icon: res.status,
                  title: res.message,
                  showConfirmButton: false,
                  timer: 1500
              });
            },
            error: function (res){
              let errors = res.responseJSON?.errors;
              $(_form).find(`[name]`).removeClass('is-invalid');
              $(_form).find('.invalid-feedback').remove();
              if(errors){
                for(const [key, value] of Object.entries(errors)){
                    $(_form).find(`[name='${key}']`).addClass('is-invalid')
                    $(_form).find(`#msg_${key}`).parent().append(`<span class="invalid-feedback">${value}</span>`);
                }
              }
            }
          });
        })
    }
    function eliminar(id) {
      Swal.fire({
            title: 'Eliminar registro',
            text: "¿Esta seguro de querer eliminar el registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
          }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    method: 'DELETE',
                    url: `{{url('entrada')}}/${id}`,
                    headers:{
                      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res){
                      window.location.reload();
                      Swal.fire({
                          icon: res.status,
                          title: res.message,
                          showConfirmButton: false,
                          timer: 1500
                      });
                    },
                    error: function (res){

                    }
                });
              }
          })
        
      }
  </script>
@endpush
