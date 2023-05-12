<div>
    <div class="d-flex">
      <div class=" me-4">
        <h1>PRACTICANTES</h1>
      </div>
      <!-- <div>
        <a class="btn btn-outline-success mt-2 ml-4" 
         {{-- href="{{route('hp.create')}}" --}}
         >Crear</a>
      </div>
    </div>
      
    <table class="table table-dark table-sm align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
            <th scope="col">Residencia</th>
            <th scope="col">Carrera</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          {{-- @foreach ($usuarios as $usuario) --}}
          <tr>
            {{--      --}}
            <td>
              <a class="btn btn-outline-warning mt-1 ml-2" style="ali" 
              {{-- href="{{route("hp.update", ['id' => $practicante->id])}}" --}}
              >Editar</a>
            </td>
            <td>
              
              <button class="btn btn-outline-danger mt-1 ml-2" style="ali" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</button>
                
              <!-- Modal -->
            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-black" id="exampleModalLabel" style="color: black">Eliminar practicante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body"  style="color: black">
                    <p>Modal body text goes here.</p> 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-primary"
                     {{-- wire:click="delete({{$usuario ->id}})" --}}
                     >Eliminar</button>
                  </div>
                </div>
              </div>
            </div>
  
            </td>
          </tr>
          {{-- @endforeach --}}
        </tbody>
    </table> -->
    <!-- {{-- <livewire:user-table /> --}} --> 
  </div>
  