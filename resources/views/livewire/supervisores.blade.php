
<div>
    <div class="d-flex">
      <div class=" me-4">
        <h1>Supervisorervisor de Carrera</h1>
      </div>
     <div>
      <a class="btn btn-outline-success mt-2 ml-4" 
      href="{{route('carrera.create')}}"
       >Crear</a>
    </div>
    </div>
      
    <table class="table table-sm align-middle table-hover" style="align-items: center w-50">
        <thead class=" thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody class="table">
          @foreach ($supervisors as $supervisor)
          <tr>
      
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{$supervisor->nombre_sup}}</td>
            <td>{{$supervisor->tel}}</td>
            <td>{{$supervisor->email}}</td>  
            <td>
              <a class="btn btn-outline-warning mt-1 ml-2" style="ali" 
              href="{{route("supervisor.update", ['id' => $supervisor->id])}}"
              >Editar</a>
            </td>
            <td>  
              <button class="btn btn-outline-danger mt-1 ml-2"
               style="ali" data-bs-toggle="modal" data-bs-target="#exampleModal"
               wire:click='delete({{$supervisor->id}})'>Eliminar</button>
            </td>
  
            </td>
          </tr>
          @endforeach
        </tbody>
    </table> 
  </div>
