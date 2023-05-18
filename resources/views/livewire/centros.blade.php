
<div>
    <div class="d-flex">
      <div class=" me-4">
        <h1>Centro Educativo</h1>
      </div>
      @can('admin.centros.centro.create')
     <div>
      <a class="btn btn-outline-success mt-2 ml-4" 
      href="{{route('centro.create')}}"
       >Crear</a>
    </div>
    @endcan
    </div>
      
    <table class="table table-sm align-middle table-hover" style="align-items: center w-50">
        <thead class=" thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col" style="width: 60%">Centro</th>
            @can('Admin')
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
             @endcan
          </tr>
        </thead>
        <tbody class="table">
          @foreach ($centros as $centro)
          <tr>
      
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{$centro->nombre_centro}}</td>  
             @can('Admin')
            <td>
              <a class="btn btn-outline-warning mt-1 ml-2" style="ali" 
              href="{{route("centro.update", ['id' => $centro->id])}}"
              >Editar</a>
            </td>
          
            <td>  
              <button class="btn btn-outline-danger mt-1 ml-2"
               style="ali" data-bs-toggle="modal" data-bs-target="#exampleModal"
               wire:click='delete({{$centro->id}})'>Eliminar</button>
            </td>
            @endcan
  
            </td>
          </tr>
          @endforeach
        </tbody>
    </table> 
  </div>
