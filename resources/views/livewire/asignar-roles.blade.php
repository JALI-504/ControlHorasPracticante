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
                    {{-- <p class="form-control" style="width: 50%">{{ auth()->user()->name }}</p> --}}

                    {{-- Sellec para usuarios --}}
                    <div class="form-group" style="margin-left: 10px">
                        <label for="user"></label>
                        <select class="form-select btn btn-outline-secondary" aria-label="Default select example"
                            wire:model="user" style="width: 300px">
                            <option selected>Seleccione</option>
                            @foreach ($users as $user)
                            <option value="{{$user->user_id}}">{{$user->name}}</option>
                            @endforeach
                        </select>

                        @error("centro")
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                    </div>

                </div>

                <label style="margin-left: 30px"><strong>Seleccione un Rol: </strong></label>

                {{-- Sellec para roles --}}

                <div class="form-group" style="margin-left: 28px">
                    <label for="centro"></label>
                    <select class="form-select btn btn-outline-danger" aria-label="Default select example"
                        wire:model="role" style="width: 120px">
                        <option selected>Seleccione</option>
                        @foreach ($roles as $role)
                        <option value="{{$role->rol_id}}">{{$role->name}}</option>
                        @endforeach
                    </select>

                    @error("centro")
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>

                <div style="margin-left: 30px">
                    <button type="button" class="btn btn-outline-success" style="width: 120px">
                        Asignar</button>
                </div>


            </div>
        </form>

    </div>

</div>