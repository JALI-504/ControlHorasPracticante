<div>
    {{-- The whole world belongs to you. --}}
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="align-self-center">

          <h1>Registro de Centros</h1>
            <form>
                <div class="form-group">
                    <label for="nombre_centro">Nombre del Centro</label>
                    <input type="text" class="form-control @error("nombre_centro") is-invalid @enderror" id="nombre_centro" wire:model.lazy="nombre_centro">

                    @error("nombre_centro")
                      <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>


                <div style="display: flex; gap: 20px;">
                    <div style="margin-left: 30px; margin-top: 20px">
                      <button type="button" class="btn btn-outline-success" style="width: 150px"
                        wire:click.prevent="guardar_centro">{{$this->edit == true ? "Actualizar" : "Guardar"}}</button>
                    </div>
          
                    <div style="margin-left: 30px; margin-top: 20px">
                      <a type="button" class="btn btn-outline-danger" style="width: 150px" href="{{route('centro.index')}}">Cancelar</a>
                    </div>
                  </div>
                  
            </form>
        </div>
      </div>
</div>


</div>
