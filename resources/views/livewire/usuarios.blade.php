<div>
  <div class="d-flex">
    <div class=" me-4">
      <h1>Usuarios</h1>
    </div>

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