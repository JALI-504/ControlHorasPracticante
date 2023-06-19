<div>
    <div class="">
      <div class="me-4">
          <h1>Usuarios Desactivados</h1>
      </div>
  
      <div class="input-group" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
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

  <br>
  
    <table class="table table-sm align-middle table-hover" style="align-items: center w-50">
      <thead class=" thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">cuenta</th>
          <th scope="col">Telefono</th>
          <th scope="col">Email</th>
          <th scope="col">Activar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody class="table">
        @foreach ($users as $user)
        @if (auth()->user()->hasRole('Admin') || $user->id == auth()->user()->id)
        <tr>
          <th scope="row">{{ $loop->index + 1 }}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->cuenta}}</td>
          <td>{{$user->tel}}</td>
          <td>{{$user->email}}</td>
          <td>
            <button class="btn btn-outline-primary mt-1 ml-2" style="ali" data-toggle="modal"
            data-target="#exampleModal{{ $user->id }}" wire:click="activarUsuario({{ $user->id }})">
            Activar Usuario
        </button>
  
            <x-modal-delete id="exampleModal{{ $user->id }}" wire:click="delete({{ $user->id }})" />
          </td>
            @can('admin.usuarios.destroy')
          <td>
            <button class="btn btn-outline-danger mt-1 ml-2" style="ali" data-toggle="modal"
              data-target="#exampleModal{{ $user->id }}">Eliminar</button>
  
            <x-modal-delete id="exampleModal{{ $user->id }}" wire:click="delete({{ $user->id }})" />
          </td>
          @endcan
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>