<div>
  <div class="d-flex">
    <div class=" me-4">
      <h1>REGISTRO DE HORAS:</h1>
    </div>


    <div style="display: flex; gap: 20px;">
      <div>
        <a class="btn btn-outline-success mt-2 ml-4" href="{{ route('hora.create', ['id' => $user->id]) }}">Crear</a>
      </div>
    </div>
    <div>
      <a class="btn btn-outline-danger mt-2 ml-4" href="{{route('hora.index')}}">Atras</a>
    </div>
  </div>

  <table class="table table-sm align-middle table-hover" style="align-items: center w-50">
    <thead class=" thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col" style="width: 35%">Nombre</th>
        <th scope="col">Fecha</th>
        <th scope="col">Hora Inicio</th>
        <th scope="col">Hora Final</th>
        <th scope="col">Total Horas</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody style="">
      @foreach ($horas as $hora)
      <tr>
        <th scope="row">{{ $loop->index + 1 }}</th>
        <td>{{ $hora->user->name }}</td>
        <td>{{$hora->fecha}}</td>
        <td>{{$hora->hora_inicio}}</td>
        <td>{{$hora->hora_final}}</td>
        <td>{{$hora->hora_total}}</td>
        <td>
          <a class="btn btn-outline-warning mt-1 ml-2" style="ali"
            href="{{route('hora.update', ['id' => $hora->id])}}">Editar</a>
        </td>
        @can('admin.horas.destroy')
        <td>
          <button class="btn btn-outline-danger mt-1 ml-2" style="ali" data-toggle="modal"
            data-target="#modalBorrarHora{{$hora->id}}">Eliminar
          </button>
          <x-modal-delete id="modalBorrarHora{{$hora->id}}" wire:click="delete({{$hora->id}})" />
        </td>

        @endcan
      </tr>
      @endforeach
    </tbody>
  </table>

</div>