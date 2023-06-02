<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @role('Admin')

                @foreach ($users as $user)
                @if (!$user->hasRole('Admin'))
                <div class="card" style="margin-top: 5%; text-align: center">
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-center">
                            <img src="https://picsum.photos/300/300" alt="Perfil" class="rounded-circle me-3"
                                style="width: 100px; height: 100px;">
                            <div>
                                <div style="margin-left: 20px">
                                    <h5>Practicante: {{ $user->name }}</h5>
                                    @if ($user->carrera)
                                    <p>Carrera: {{ $user->carrera->carrera }}</p>
                                    <p>Centro: {{ $user->carrera->centro ? $user->carrera->centro->nombre_centro : 'Sin
                                        asignar' }}</p>
                                    @else
                                    <p>Carrera: Sin asignar</p>
                                    <p>Centro: Sin asignar</p>
                                    @endif

                                    <p>Horas Requeridas: {{ $user->horas_requeridas }}</p>

                                    @if($user->horas_requeridas != 0)
                                        <div class="progress-bar
                                                    @if($user->totalHorasAcumuladas() < ($user->horas_requeridas * 0.35))
                                                        bg-danger
                                                        @elseif($user->totalHorasAcumuladas() < ($user->horas_requeridas * 0.70))
                                                            bg-warning
                                                        @else
                                                            bg-success
                                                    @endif" role="progressbar"
                                            style="width: {{ ($user->totalHorasAcumuladas() / $user->horas_requeridas) * 100 }}%"
                                            aria-valuemin="0" aria-valuemax="{{ $user->horas_requeridas }}">
                                            {{ round(($user->totalHorasAcumuladas() / $user->horas_requeridas) * 100) }}%
                                        </div>

                                        <!-- código aquí para mostrar el botón cuando la barra de progreso llegue al 100% -->
                                    {{-- @if ($user->totalHorasAcumuladas() >= $user->horas_requeridas)
                                    <div>
                                        <button wire:click="generarPdf" class="mt-2 btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H176c-35.3 0-64 28.7-64 64V512H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"/></svg> 
                                            Imprimir Constacia</button>
                                    </div>
                                @endif --}}
                                    
                                    @else
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"
                                            aria-valuemin="0" aria-valuemax="100">
                                            0%
                                        </div>
                                    @endif
 

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @else
                <!-- Contenido para otros roles (en este caso, Practicante) -->
                <div class="card" style="margin-top: 5%">
                    <div class="card-header" style="text-align: center">
                        <h2><strong>{{ __('CONTROL DE HORAS PARA PRACTICANTES') }}</strong></h2>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center" style="text-align: center">
                                    <img src="https://picsum.photos/300/300" alt="Perfil" class="rounded-circle me-3"
                                        style="width: 100px; height: 100px;">
                                    <div>
                                        <h3>{{ auth()->user()->name }}</h3>
                                        @if (auth()->check() && auth()->user()->carrera)
                                        <h4>{{ auth()->user()->carrera->carrera }}</h4>
                                        @endif
                                        @if (auth()->check() && auth()->user()->carrera &&
                                        auth()->user()->carrera->centro)
                                        <h5>{{ auth()->user()->carrera->centro->nombre_centro }}</h5>
                                        @endif
                                        <br>
                                        <h6>Horas de Practica Requeridas: {{ $user->horas_requeridas }}</h6>
                                        <h6>Progreso:</h6>

                                        @if($user->horas_requeridas != 0)
                                        <div class="progress-bar
                                                    @if($user->totalHorasAcumuladas() < ($user->horas_requeridas * 0.35))
                                                        bg-danger
                                                        @elseif($user->totalHorasAcumuladas() < ($user->horas_requeridas * 0.70))
                                                            bg-warning
                                                        @else
                                                            bg-success
                                                        @endif" role="progressbar"
                                            style="width: {{ ($user->totalHorasAcumuladas() / $user->horas_requeridas) * 100 }}%"
                                            aria-valuemin="0" aria-valuemax="{{ $user->horas_requeridas }}">
                                            {{ round(($user->totalHorasAcumuladas() / $user->horas_requeridas) * 100)
                                            }}%
                                        </div>

                                        <!-- código aquí para mostrar el botón cuando la barra de progreso llegue al 100% -->
                                        @if ($user->horas_requeridas != 0 && ($user->totalHorasAcumuladas() /
                                        $user->horas_requeridas) >= 1)
                                        <button wire:click="generarPdf" class="mt-2 btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H176c-35.3 0-64 28.7-64 64V512H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"/></svg> 
                                            Imprimir Constancia</button>
                                        @endif
                                        {{-- fin --}}

                                        @else
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"
                                            aria-valuemin="0" aria-valuemax="100">
                                            0%
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endrole

            </div>
        </div>
    </div>
</div>