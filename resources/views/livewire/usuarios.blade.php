
<div>
    <div class="d-flex">
      <div class=" me-4">
        <h1>Usuarios</h1>
      </div>
      <div>
        <a class="btn btn-outline-success mt-2 ml-4" 
        href="{{route('usuario.create')}}"
         >Crear</a>
      </div>
    </div>
      
    <table class="table table-sm align-middle table-hover" style="align-items: center w-50">
        <thead class=" thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">cuenta</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
            <th scope="col">Residencia</th>
            <th scope="col">Editar</th>
            <th scope="col">Roles</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody class="table">
          @foreach ($users as $user)
          <tr>
      
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->cuenta}}</td>
            <td>{{$user->tel}}</td>
            <td>{{$user->email}}</td>  
            <td>{{$user->residencia}}</td>    
            <td>
              <a class="btn btn-outline-warning mt-1 ml-2" style="ali" 
              href="{{route("usuario.update", ['id' => $user->id])}}"> 

              Editar</a>
            </td>

            <td>
              <a class="btn btn-outline-primary mt-1 ml-2" style="ali" 
                href="{{route('usuario.roles', ['id' => $user->id])}}"> 
                Roles
              </a>
            </td>
          
            <td>  
              <button class="btn btn-outline-danger mt-1 ml-2"
               style="ali" data-bs-toggle="modal" data-bs-target="#exampleModal"
               wire:click='delete({{$user->id}})'>Eliminar</button>
            </td>
  
            </td>
          </tr>
          @endforeach
        </tbody>
    </table> 
    {{-- <livewire:user-table /> --}}
  </div>
