<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
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
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $total_hora->total_suma_horas > 0 ? floatval($total_hora->total_suma_horas) / floatval($user->horas_requeridas) * 100 : 0 }}%;"
                                                aria-valuenow="{{ $total_hora->total_suma_horas }}" aria-valuemin="0"
                                                aria-valuemax="{{ $user->horas_requeridas }}">
                                                {{ $total_hora->total_suma_horas }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>