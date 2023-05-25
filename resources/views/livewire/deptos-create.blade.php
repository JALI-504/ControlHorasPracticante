<div>
  {{-- The whole world belongs to you. --}}
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="align-self-center">

      <h1>Registro de Departamentos</h1>
      <form>
        <div class="form-group">
          <label for="nombreDepto">Nombre del Departamento</label>
          <input type="text" class="form-control @error(" nombreDepto") is-invalid @enderror" id="nombreDepto"
            wire:model.lazy="nombreDepto">

          @error("nombreDepto")
          <small class="text-danger">{{$message}}</small>
          @enderror

        </div>

        <div class="form-group">
          <label for="nombreCargo">Nombre del Cargo</label>
          <input type="text" class="form-control @error(" nombreCargo") is-invalid @enderror" id="nombreCargo"
            wire:model.lazy="nombreCargo">

          @error("nombreCargo")
          <small class="text-danger">{{$message}}</small>
          @enderror

        </div>

        <div style="display: flex; gap: 20px;">
          <div style="margin-left: 30px; margin-top: 20px">
            <button type="button" class="btn btn-outline-success" style="width: 150px"
              wire:click.prevent="guardar_depto">{{$this->edit == true ? "Actualizar" : "Guardar"}}</button>
          </div>

          <div style="margin-left: 30px; margin-top: 20px">
            <a type="button" class="btn btn-outline-danger" style="width: 150px"
              href="{{route('depto.index')}}">Cancelar</a>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>