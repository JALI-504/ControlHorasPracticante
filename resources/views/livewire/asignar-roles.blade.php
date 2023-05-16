<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div>

        <div class="d-flex">
            <div class=" me-4">
                <h1>Asignar Roles</h1>
            </div>
        </div>

        <form action="" style="padding: 30px">

            <div class="card" style="padding: 20px">
                <div class="card-body">
                    <p class="h5"><strong>Nombre:</strong> </p>
                    <p class="form-control" style="width: 50%">{{ $user->name }}</p>


                </div>

                <label style="margin-left: 30px"><strong>Seleccione un Rol: </strong></label>
                @foreach ($roles as $role)

               

                <div class="form-check" style="margin-left: 30px">
                    <input class="form-check-input" type="checkbox" value="{{$role->id}}" id="flexCheckIndeterminate"
                    wire:model="role_ids">
                    <label class="form-check-label" for="flexCheckIndeterminate" style="margin-left: 10px">
                        {{$role->name}}
                    </label>
                  </div>
                
                @endforeach

                <div style="margin-left: 30px; margin-top: 20px">
                    <button type="button" class="btn btn-outline-success" style="width: 150px" wire:click="asignar">
                        Asignar</button>
                </div>

            </div>
        </form>

    </div>

</div>