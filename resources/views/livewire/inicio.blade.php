{{-- <div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                        <div class="progress">
                                            @php
                                            $prog = is_numeric($total_hora->total_suma_horas) ?
                                            number_format($total_hora->total_suma_horas, 2) : '0.00';
                                            $s = '';
                                            if ($prog < 34) { $s='bg-danger' ; } elseif ($prog < 67) { $s='bg-warning' ;
                                                } else { $s='bg-success' ; } $width=0; if ($total_hora->total_suma_horas
                                                > 0 && $user->horas_requeridas > 0) {
                                                $width = (floatval($total_hora->total_suma_horas) /
                                                floatval($user->horas_requeridas)) * 100;
                                                }
                                                @endphp

                                                <div class="progress-bar custom-progress-bar {{ $s }}"
                                                    role="progressbar" style="width: {{ $width }}%; max-width: 100%;"
                                                    aria-valuenow="{{ $total_hora->total_suma_horas }}"
                                                    aria-valuemin="0" aria-valuemax="{{ $user->horas_requeridas }}">
                                                    <span class="font-weight-bold">{{ $total_hora->total_suma_horas
                                                        }}</span>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}





                {{-- @foreach ($users as $user)
                <div class="card" style="margin-top: 5%">
                    <div class="card-body">
                        <h5>Practicante: {{ $user->name }}</h5>
                        @if ($user->carrera)
                        <p>Carrera: {{ $user->carrera->carrera }}</p>
                        <p>Centro: {{ $user->carrera->centro ? $user->carrera->centro->nombre_centro : 'Sin asignar' }}
                        </p>
                        @else
                        <p>Carrera: Sin asignar</p>
                        <p>Centro: Sin asignar</p>
                        @endif
                    </div>
                    <div>
                    </div>

                </div>
                @endforeach --}}


                {{--
            </div>
        </div>
    </div>
</div> --}}


<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @role('Admin')
                <!-- Contenido exclusivo para el rol de 'Admin' -->
                {{-- @foreach ($users as $user)
                <div class="card" style="margin-top: 5%">
                    <div class="card-body">
                        <h5>Practicante: {{ $user->name }}</h5>
                        @if ($user->carrera)
                        <p>Carrera: {{ $user->carrera->carrera }}</p>
                        <p>Centro: {{ $user->carrera->centro ? $user->carrera->centro->nombre_centro : 'Sin asignar' }}
                        </p>
                        @else
                        <p>Carrera: Sin asignar</p>
                        <p>Centro: Sin asignar</p>
                        @endif
                    </div>
                    <div>
                    </div>
                </div>
                @endforeach --}}

                @foreach ($users as $user)
                @if (!$user->hasRole('Admin'))
                <div class="card" style="margin-top: 5%">
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-center">
                            <img src="https://picsum.photos/300/300" alt="Perfil" class="rounded-circle me-3" style="width: 100px; height: 100px;">
                            <div>
                                <h5>Practicante: {{ $user->name }}</h5>
                                @if ($user->carrera)
                                    <p>Carrera: {{ $user->carrera->carrera }}</p>
                                    <p>Centro: {{ $user->carrera->centro ? $user->carrera->centro->nombre_centro : 'Sin asignar' }}</p>
                                @else
                                    <p>Carrera: Sin asignar</p>
                                    <p>Centro: Sin asignar</p>
                                @endif
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
                                        <div class="progress">
                                            @php
                                            $prog = is_numeric($total_hora->total_suma_horas) ?
                                            number_format($total_hora->total_suma_horas, 2) : '0.00';
                                            $s = '';
                                            if ($prog < 34) { $s='bg-danger' ; } elseif ($prog < 67) { $s='bg-warning' ;
                                                } else { $s='bg-success' ; } $width=0; if ($total_hora->total_suma_horas
                                                > 0 && $user->horas_requeridas > 0) {
                                                $width = (floatval($total_hora->total_suma_horas) /
                                                floatval($user->horas_requeridas)) * 100;
                                                }
                                                @endphp

                                                <div class="progress-bar custom-progress-bar {{ $s }}"
                                                    role="progressbar" style="width: {{ $width }}%; max-width: 100%;"
                                                    aria-valuenow="{{ $total_hora->total_suma_horas }}"
                                                    aria-valuemin="0" aria-valuemax="{{ $user->horas_requeridas }}">
                                                    <span class="font-weight-bold">{{ $total_hora->total_suma_horas
                                                        }}</span>
                                                </div>
                                        </div>
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