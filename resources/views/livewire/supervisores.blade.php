
<div>
    <div class="d-flex">
      <div class=" me-4">
        <h1>Supervisorervisor de Carrera</h1>
      </div>
      @can('admin.supervisores.sup.create')
     <div>
      <a class="btn btn-outline-success mt-2 ml-4" 
      href="{{route('sup.create')}}"
       >Crear</a>
    </div>
    @endcan
    </div>
      
    <table class="table table-sm align-middle table-hover" style="align-items: center w-50">
        <thead class=" thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
            @can('admin.supervisores.sup.update')      
            <th scope="col">Editar</th>
            @endcan
            @can('admin.supervisores.destroy')      
            <th scope="col">Eliminar</th>
            @endcan
          </tr>
        </thead>
        <tbody class="table">
          @foreach ($supervisors as $supervisor)
          <tr>
      
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{$supervisor->nombre_sup}}</td>
            <td>{{$supervisor->tel}}</td>
            <td>{{$supervisor->email}}</td>  
            @can('admin.supervisores.sup.update')      
            <td>
              <a class="btn btn-outline-warning mt-1 ml-2" style="ali" 
              href="{{route("sup.update", ['id' => $supervisor->id])}}"
              >Editar</a>
            </td>
            @endcan
            @can('admin.supervisores.destroy')      
            <td>  
              <button class="btn btn-outline-danger mt-1 ml-2" style="ali"
              data-toggle="modal"
              data-target="#exampleModal{{ $supervisor->id }}">Eliminar</button>
  
              <!-- Modal -->
              <div class="modal fade" id="exampleModal{{ $supervisor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-black" id="exampleModalLabel" style="color: black">Eliminar Supervisor</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="color: black">
                      <p>¿Desea eliminar este supervisor?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-outline-danger"
                      wire:click="delete({{ $supervisor->id }})">Eliminar</button>
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
