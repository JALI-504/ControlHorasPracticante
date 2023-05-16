<div>

    {{-- The Master doesn't talk, he acts. --}}

    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="align-self-center">

            <h1>Registro de Carreras dsegun el Centro Educativo</h1>
            <form>
                <div class="form-group">
                    <label for="carrera">Nombre de la Carrera</label>
                    <input type="text" class="form-control @error(" carrera") is-invalid @enderror" id="carrera"
                        wire:model.lazy="carrera">

                    @error("carrera")
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="centro">Centro</label>
                    <select class="form-select" aria-label="Default select example" wire:model="centro">
                        <option selected>Seleccione</option>
                        @foreach ($centros as $centro)
                        <option value="{{$centro->id}}">{{$centro->nombre_centro}}</option>
                        @endforeach
                    </select>

                    @error("centro")
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>


                <div style="display: flex; gap: 20px;">
                    <div style="margin-left: 30px; margin-top: 20px">
                        <button type="button" class="btn btn-outline-success" style="width: 150px"
                            wire:click.prevent="guardar_carrera">{{$this->edit == true ? "Actualizar" :
                            "Guardar"}}</button>
                    </div>

                    <div style="margin-left: 30px; margin-top: 20px">
                        <a type="button" class="btn btn-outline-danger" style="width: 150px"
                            href="{{route('carrera.index')}}">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


</div>

</div>