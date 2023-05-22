<div>
  {{-- The Master doesn't talk, he acts. --}}
  <div>

      <div class="d-flex">
          <div class=" me-4">
              <h1>Perfil de Usuario
          </div>
      </div>

      <form action="" style="padding: 30px">

          <div class="card" style="padding: 10px">
              <div class="card-body">
                  <p class="h5"><strong>Nombre:</strong> </p>
                  <p class="form-control" style="width: 50%">{{ $user->name }}</p>
                     
              
                  <p class="h5"><strong>No. Cuenta:</strong> </p>
                  <p class="form-control" style="width: 50%">{{ $user->cuenta }}</p>
                  
             
                <div class="d-flex">
                <div class="form-group" style="width: 30%">
                    <p class="h5"><strong>Teléfono:</strong></p>
                    <p class="form-control" style="width: 90%">{{ $user->tel }}</p>
                </div>

               <div class="form-group" style="width: 25%">
                    <p class="h5"><strong>Horas Requeridas:</strong></p>
                    <p class="form-control" style="width: 80%">{{ $user->horas_requeridas }}</p>
               </div>
                </div>
            
            
                  <p class="h5"><strong>Email:</strong> </p>
                  <p class="form-control" style="width: 50%">{{ $user->email }}</p>

                  <p class="h5"><strong>Residencia:</strong> </p>
                  <p class="form-control" style="width: 50%">{{ $user->residencia }}</p>
              </div>        
          
              <div style="display: flex; gap: 20px;">
                <div style="margin-left: 30px; margin-top: 20px">
                    <a type="button" class="btn btn-outline-success" style="width: 150px" 
                    href="{{ route('usuario.update',  ['id' => $user->id])}}">Editar</a>
                </div>

                <div style="margin-left: 30px; margin-top: 20px">
                    <a type="button" class="btn btn-outline-danger" style="width: 150px"
                    href="{{route('inicio')}}">Cancelar</a>
                </div>
            </div>
              </div>

          </div>
      </form>

  </div>

