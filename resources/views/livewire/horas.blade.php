<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="d-flex">
        <div class=" me-4">
          <h1>CONTROL DE HORAS:</h1>
        </div>
      </div>
        
      <table class="table table-sm align-middle table-hover" style="align-items: center w-50; align-content: center">
        <thead class=" thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col" style="width: 35%">Nombre</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Facha Actual</th>
            <th scope="col">Total Horas</th>
            <th scope="col">Asignar Horas</th>
            <th scope="col">Registro</th>
            @can('Admin')
            <th scope="col">Eliminar</th>
            @endcan
          </tr>
        </thead>
        <tbody style="">
          @foreach ($users as $user)
           @if (auth()->user()->hasRole('Admin') || $user->id == auth()->user()->id)
          <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $user->name }}</td>
            <td></td>
            <td></td>   
            <td>{{ \App\Models\Hora::getTotalHoras() }}</td>
            <td>
              <a class
              ="btn btn-outline-primary mt-1 ml-2" style="ali" href="{{route('hora.create')}}"
              >Asignar</a>
            </td>
            <td>
              <a class
              ="btn btn-outline-warning mt-1 ml-2" style="ali" href="{{route('hora.registro', ['id' => $user->id])}}"
              >Registro</a>
            </td>
            @can('Admin')
            <td>
              
              <button class="btn btn-outline-danger mt-1 ml-2" style="ali" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</button>
                
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-black" id="exampleModalLabel" style="color: black">Eliminar hora</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body"  style="color: ">
                    <p>¿Desea eliminar el regitro de horas?</p> 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-primary" wire:click="delete({{$user->id}})">Eliminar</button>
                  </div>
                </div>
              </div>
            </div>
            </td>
             @endcan
          </tr>
          @endif
          @endforeach
        </tbody>
    </table>

</div>