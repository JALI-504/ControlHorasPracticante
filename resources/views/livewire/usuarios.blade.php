<div>
  <div>
    <div class="d-flex">
      <div class="me-4">
          <h1>Usuarios</h1>
      </div>
  
      <div class="input-group" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
        <input type="text" id="searchInput" class="form-control input-group-lg" placeholder="Buscar por nombre">
        <div class="input-group-append">
            <span class="input-group-text" style="margin-bottom: 8px">
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
          <th scope="col">Nombre</th>
          <th scope="col">cuenta</th>
          <th scope="col">Telefono</th>
          <th scope="col">Email</th>
          {{-- <th scope="col">Residencia</th> --}}
          <th scope="col">Editar</th>
          @can('admin.usuarios.usuario.roles')
          <th scope="col">Roles</th>
          @endcan
          @can('admin.usuarios.destroy')
          <th scope="col">Eliminar</th>
          @endcan
        </tr>
      </thead>
      <tbody class="table">
        @foreach ($users as $user)
        {{-- @if ($user->id == auth()->user()->id) --}}
        @if (auth()->user()->hasRole('Admin') || $user->id == auth()->user()->id)
        <tr>
          <th scope="row">{{ $loop->index + 1 }}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->cuenta}}</td>
          <td>{{$user->tel}}</td>
          <td>{{$user->email}}</td>
          {{-- <td>{{$user->residencia}}</td> --}}
          <td>
            <a class="btn btn-outline-warning mt-1 ml-2" style="ali" href="{{route("usuario.update", ['id'=>
              $user->id])}}">
  
              Editar</a>
          </td>
  
          @can('admin.usuarios.usuario.roles')
          <td>
            <a class="btn btn-outline-primary mt-1 ml-2" style="ali"
              href="{{route('usuario.roles', ['id' => $user->id])}}">
              Roles
            </a>
          </td>
          @endcan
  
          @can('admin.usuarios.destroy')
         <td>
           <button class="btn btn-outline-danger mt-1 ml-2" style="ali"
            data-toggle="modal"
            data-target="#exampleModal{{ $user->id }}">Desactivar</button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-black" id="exampleModalLabel" style="color: black">Desactivar Usuario</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="color: black">
                    <p>¿Desea desactivar este usuario?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-danger"
                    wire:click="estadoUser({{ $user->id }})">Desactivar</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- Fin del Modal --}}
            </td>
            @endcan
         
          </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>