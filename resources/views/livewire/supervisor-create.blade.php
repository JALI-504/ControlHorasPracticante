<div>
    {{-- Stop trying to control. --}}

    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="align-self-center">

          <h1>Registro de Supervisores</h1>
            <form>
                <div class="form-group">
                    <label for="nombre_sup">Nombre del Supervisor</label>
                    <input type="text" class="form-control @error("nombre_sup") is-invalid @enderror" id="nombre_sup" wire:model.lazy="nombre_sup">

                    @error("nombre_sup")
                      <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>
                  <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control @error("telefono") is-invalid @enderror"
                    maxlength="8"
                    max="99999999"
                    id="telefono" wire:model.lazy="telefono">

                    @error("telefono")
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control @error("email") is-invalid @enderror" id="email"  wire:model.lazy="email">

                  @error("email")
                  <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>

                {{-- Sellec para centro --}}

                {{-- <div class="form-group">
                  <label for="centro">Centro</label>
                  <br>
                  <select class="form-select btn btn-outline-secondary" aria-label="Default select example" 
                  wire:model="centro" style="margin-left: 30px; width: 350px">
                    <option selected>Seleccione</option>
                    @foreach ($centros as $centro)
                      <option value="{{$centro->id}}">{{$centro->nombre_centro}}</option>
                    @endforeach
                  </select>

                  @error("centro")
                    <small class="text-danger">{{$message}}</small>
                  @enderror

                </div> --}}

                {{-- Select para  carreras --}}

                <div class="form-group">
                  <label for="carrera">Carreras</label>
                  <br>
                  <select class="form-select btn btn-outline-secondary" aria-label="Default select example" 
                  wire:model="carrera" style="margin-left: 30px; width: 350px">
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
                        wire:click.prevent="guardar_sup">{{$this->edit == true ? "Actualizar" : "Guardar"}}</button>
                    </div>
          
                    <div style="margin-left: 30px; margin-top: 20px">
                      <a type="button" class="btn btn-outline-danger" style="width: 150px" href="{{route('sup.index')}}">Cancelar</a>
                    </div>
                  </div>
                  
            </form>
        </div>
      </div>
</div>


</div>
