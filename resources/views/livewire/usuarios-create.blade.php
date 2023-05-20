<div>
  {{-- Stop trying to control. --}}
  <div class="d-flex justify-content-center align-items-center" style="height: 120vh;">
    <div class="align-self-center">
      <form>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="name" class="form-control @error(" nombre") is-invalid @enderror" id="nombre"
            wire:model.lazy="nombre">

          @error("nombre")
          <small class="text-danger">{{$message}}</small>
          @enderror

        </div>

        <div class="form-group">
          <label for="cuenta">No. Cuenta</label>
          <input type="text" class="form-control @error(" cuenta") is-invalid @enderror" id="cuenta"
            wire:model.lazy="cuenta">

          @error("cuenta")
          <small class="text-danger">{{$message}}</small>
          @enderror

        </div>

        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="tel" class="form-control @error(" telefono") is-invalid @enderror" maxlength="8" max="99999999"
            id="telefono" wire:model.lazy="telefono">

          @error("telefono")
          <small class="text-danger">{{$message}}</small>
          @enderror

        </div>
        <div class="form-group">
          <label for="email">Correo Electronico</label>
          <input type="email" class="form-control @error(" email") is-invalid @enderror" id="email"
            wire:model.lazy="email">

          @error("email")
          <small class="text-danger">{{$message}}</small>
          @enderror

        </div>

        <div class="form-group">
          <label for="residencia">Residencia</label>
          <input type="text" class="form-control @error(" residencia") is-invalid @enderror" id="residencia"
            wire:model.lazy="residencia">

          @error("residencia")
          <small class="text-danger">{{$message}}</small>
          @enderror

        </div>



        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" class="form-control @error(" password") is-invalid @enderror" id="password"
            wire:model.lazy="password">

          @error("password")
          <small class="text-danger">{{$message}}</small>
          @enderror

        </div>

        {{-- Select para Carreras --}}

        <div class="form-group">
          <label for="carrera">Carreras</label>
          <br>
          <select class="form-select btn btn-outline-secondary" aria-label="Default select example" wire:model="carrera"
            style="margin-left: 30px; width: 350px">
            <option selected>Seleccione</option>
            @foreach ($carreras as $carrera)
            <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>
            @endforeach
          </select>

          @error("carrera")
          <small class="text-danger">{{$message}}</small>
          @enderror

        </div>

        <div style="display: flex; gap: 20px;">
          <div style="margin-left: 30px; margin-top: 20px">
            <button type="button" class="btn btn-outline-success" style="width: 150px"
              wire:click.prevent="guardar_usuario">{{$this->edit == true ? "Actualizar" : "Guardar"}}</button>
          </div>

          <div style="margin-left: 30px; margin-top: 20px">
            <a type="button" class="btn btn-outline-danger" style="width: 150px" href="{{route('inicio')}}">Cancelar</a>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>