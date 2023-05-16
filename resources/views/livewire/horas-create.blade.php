<div>
    {{-- Do your work, then step back. --}}
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="align-self-center">

          <h1>Registrar Horas</h1>
            <form>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control @error("fecha") is-invalid @enderror" id="fecha" wire:model.lazy="fecha">

                    @error("fecha")
                      <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>
                  <div class="form-group">
                    <label for="hora_inicio">Hora de Inicio</label>
                    <input type="time" class="form-control @error("hora_inicio") is-invalid @enderror"
                    maxlength="8"
                    max="99999999"
                    id="hora_inicio" wire:model.lazy="hora_inicio">

                    @error("hora_inicio")
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>
                <div class="form-group">
                  <label for="hora_final">Hora Final</label>
                  <input type="time" class="form-control @error("hora_final") is-invalid @enderror" id="hora_final"  wire:model.lazy="hora_final">

                  @error("hora_final")
                  <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="horas_total">Horas Totales</label>
                    <input type="text" class="form-control @error("horas_total") is-invalid @enderror" id="horas_total" value="{{$this->total_horas}}" disabled>

                    @error("horas_total")
                      <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>

                <div style="display: flex; gap: 20px;">
                    <div style="margin-left: 30px; margin-top: 20px">
                        <button type="button" class="btn btn-outline-success" style="width: 150px"
                            wire:click.prevent="guardar_hora">{{$this->edit == true ? "Actualizar" :
                            "Guardar"}}</button>
                    </div>

                    <div style="margin-left: 30px; margin-top: 20px">
                        <a type="button" class="btn btn-outline-danger" style="width: 150px"
                            href="{{route('hora.index')}}">Cancelar</a>
                    </div>
                </div>
                  
            </form>
        </div>
      </div>
</div>

</div>
