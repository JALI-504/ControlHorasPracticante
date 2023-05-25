<div>
  <div class="d-flex">
    <div class=" me-4">
      <h1>Centro Educativo</h1>
    </div>
    @can('admin.centros.centro.create')
    <div>
      <a class="btn btn-outline-success mt-2 ml-4" href="{{route('centro.create')}}">Crear</a>
    </div>
    @endcan
  </div>

  <table class="table table-sm align-middle table-hover" style="align-items: center w-50">
    <thead class=" thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col" style="width: 60%">Centro</th>
        @can('admin.centros.centro.update')
        <th scope="col">Editar</th>
        @endcan
        @can('admin.centros.destroy')
        <th scope="col">Eliminar</th>
        @endcan
      </tr>
    </thead>
    <tbody class="table">
      @foreach ($centros as $centro)
      <tr>
        <th scope="row">{{ $loop->index + 1 }}</th>
        <td>{{$centro->nombre_centro}}</td>
        @can('admin.centros.centro.update')
        <td>
          <a class="btn btn-outline-warning mt-1 ml-2" style="ali" href="{{ route('centro.update', ['id' => $centro->id]) }}"
            >Editar</a>
        </td>
        @endcan
        @can('admin.centros.destroy')
        <td>
          <button class="btn btn-outline-danger mt-1 ml-2" style="ali"
          data-toggle="modal"
          data-target="#exampleModal{{ $centro->id }}">Eliminar</button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal{{ $centro->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-black" id="exampleModalLabel" style="color: black">Eliminar Centro</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="color: black">
                  <p>¿Desea eliminar este centro educativo?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-outline-danger"
                  wire:click="delete({{ $centro->id }})">Eliminar</button>
                </div>
              </div>
            </div>
          </div>
          {{-- Fin del Modal --}}
        </td>
        @endcan

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>