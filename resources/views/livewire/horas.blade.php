<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="d-flex">
        <div class=" me-4">
          <h1>CONTROL DE HORAS:</h1>
        </div>
      </div>

      <div>
        <div class="input-group" style="margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 10px; width: 98%">
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

@php
    use App\Models\Hora;
    $totalHoras = Hora::getTotalSumaHoras();
@endphp
      <table class="table table-sm align-middle table-hover" style="align-items: center w-50">
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
    
       @php
            $horaUsuario = $totalHoras->firstWhere('user_id', $user->id);
            $primeraFecha = $horas->where('user_id', $user->id)->min('fecha');
      $ultima_fecha = $horas->where('user_id', $user->id)->max('fecha');
 
        @endphp
          <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $primeraFecha }}</td>
            <td>{{ $ultima_fecha }}</td>         
            <td>{{ round(($user->totalHorasAcumuladas()))}}</td>
            <td>
              <a class="btn btn-outline-primary mt-1 ml-2" style="ali" href="{{ route('hora.create') }}">Asignar</a>

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