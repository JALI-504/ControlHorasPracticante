<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @role('Admin')

                @foreach ($users as $user)
                @if (!$user->hasRole('Admin'))
                <div class="card" style="margin-top: 5%">
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
                                        @else
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuemin="0" aria-valuemax="100">
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
                                                    {{ round(($user->totalHorasAcumuladas() / $user->horas_requeridas) * 100) }}%
                                                </div>
                                            @else
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuemin="0" aria-valuemax="100">
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