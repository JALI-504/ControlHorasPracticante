<div>
    <div class="d-flex">
      <div class=" me-4">
        <h1>Carreras de Centros Educativos </h1>
      </div>
      @can('admin.carreras.carrera.create')
     <div>
      <a class="btn btn-outline-success mt-2 ml-4" 
      href="{{route('carrera.create')}}"
       >Crear</a>
    </div>
    @endcan
    </div>

    <div>
      <div class="input-group" style="margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 10px; width: 98%">
        <input type="text" id="searchInput" class="form-control input-group-lg" placeholder="Buscar por nombre">
        <div class="input-group-append">
            <span class="input-group-text" style="margin-bottom: 0px">
                <i class="fas fa-search fa-m"></i>
            </span>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function() {
          $('#searchInput').on('keyup', function() {
              var value = $(this).val().toLowerCase();
              $('table tbody tr').filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
              });
          });
      });
  </script>
    </div>
      
    <table class="table table-sm align-middle table-hover" style="align-items: center w-50">
      <thead class=" thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col" style="width: 60%">Carrera</th>
            @can('admin.carreras.carrera.update')      
            <th scope="col">Editar</th>
            @endcan
            @can('admin.carreras.destroy')      
            <th scope="col">Eliminar</th>
            @endcan
          </tr>
        </thead>
        <tbody class="table">
          @foreach ($carreras as $carrera)
          <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{$carrera->carrera}}</td> 
            @can('admin.carreras.carrera.update')      
            <td>
              <a class="btn btn-outline-warning mt-1 ml-2" style="ali" 
              href="{{route("carrera.update", ['id' => $carrera->id])}}"
              >Editar</a>
            </td> 
            @endcan
            @can('admin.carreras.destroy')      
            <td>  
              <button class="btn btn-outline-danger mt-1 ml-2" style="ali"
            data-toggle="modal"
            data-target="#exampleModal{{ $carrera->id }}">Eliminar</button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $carrera->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-black" id="exampleModalLabel" style="color: black">Eliminar Carrera</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="color: black">
                    <p>¿Desea eliminar esta carrera?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-danger"
                    wire:click="delete({{ $carrera->id }})">Eliminar</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- Fin del Modal --}}
          </td>
            </td>
            @endcan
            </td>
          </tr>
          @endforeach
        </tbody>
    </table> 
  </div>
