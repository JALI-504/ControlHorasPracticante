<div>
    {{-- Stop trying to control. --}}
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="align-self-center">
            <form>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    {{-- <input type="name" class="form-control @error("name") is-invalid @enderror" id="name" wire:model="name" style="width: 50vh"> --}}
                    <input type="text" class="form-control @error("cuenta") is-invalid @enderror" id="cuenta" 
                    value="{{ $name }}" wire:model.defer="name">

                    @error("name")
                      <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>
                  <div>
                </div>
                

                <div class="form-group">
                    <label for="cuenta">No. Cuenta</label>
                    {{-- <input type="text" class="form-control @error("cuenta") is-invalid @enderror" id="cuenta" wire:model="cuenta"> --}}
                    <input type="text" class="form-control @error("cuenta") is-invalid @enderror" id="cuenta" 
                    value="{{ $cuenta }}" wire:model.defer="cuenta">
                   

                    @error("cuenta")
                      <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>

                  <div class="form-group">
                    <label for="tel">Telefono</label>
                    {{-- <input type="tel" class="form-control @error("tel") is-invalid @enderror"
                    maxlength="8"
                    max="8"
                    id="tel" wire:model="tel"> --}}
                    <input type="text" class="form-control @error("cuenta") is-invalid @enderror" id="cuenta" 
                    value="{{ $tel }}" wire:model.defer="tel">

                    @error("tel")
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>
                <div class="form-group">
                  <label for="email">Correo Electronico</label>
                  {{-- <input type="email" class="form-control @error("email") is-invalid @enderror" id="email"  wire:model="email"> --}}
                  <input type="text" class="form-control @error("cuenta") is-invalid @enderror" id="cuenta" 
                    value="{{ $email }}" wire:model.defer="email">

                  @error("email")
                  <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="residencia">Residencia</label>
                    {{-- <input type="text" class="form-control @error("residencia") is-invalid @enderror" id="residencia" wire:model="residencia"> --}}
                    <input type="text" class="form-control @error("cuenta") is-invalid @enderror" id="cuenta" 
                    value="{{ $residencia }}" wire:model.defer="residencia">

                    @error("residencia")
                      <small class="text-danger">{{$message}}</small>
                    @enderror

                  </div>

                 
                <div class="d-flex justify-content-center align-items-center" role="toolbar" aria-label="Toolbar with button groups" style="height: 20vh;">
                  
                  <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-success align-self-center" style="align-content  :center " wire:click="actualizar()">Actualizar</button>
                  </div>
                  <div class="btn-group me-2" role="group" aria-label="Second group">
                    <a type="button" class="btn btn-danger align-self-center" style="align-content:center" href="{{route('usuario.index')}}">Cancelar </a>
                  </div>
                               
                </div>
                  
            </form>
        </div>
      </div>
</div>
</div>