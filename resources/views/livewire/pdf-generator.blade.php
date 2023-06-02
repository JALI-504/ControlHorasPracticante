<div>

<div style=" margin-left: 2.5cm; margin-right: 2.5cm">

    <div style="text-align: center" wire:ignore>
        <img src="{{ asset('images/logomipymes.png') }}" alt="Logo" style="width: 100px; height: 100px;">
        <h1 style="display: inline-block; vertical-align: middle; margin-left: 10px;">MiPymes Financiero</h1>
    </div>
    
    <hr><br>

    <h3 style="text-align: center">Constancia Culminacion de Practica Profesional</h3>
    <br> <br> <br>
    <div class="contenido">
        <p id="primero" style="line-height: 2; font-size:14px; text-align: justify">
            Ing.<strong>{{$user->carrera->supervisor->nombre_sup}}</strong>
        </p>
        <br> <br>
      
        <p id="segundo" style="line-height: 2; font-size: 14pxpx; text-align: justify">
            Por medio de la presente se <strong><u>HACE CONSTAR QUE:</u></strong>
            <br>
            <br>
            El joven <strong><u> {{ $user->name }},</u></strong> estudiante de la <strong><u> {{
                    $user->carrera->centro->nombre_centro}} </u></strong>, de la carrera de<strong><u> {{
                    $user->carrera->carrera }} </u></strong>, ha cumplido satisfactoriamente con las actividades
            asignadas para la prestación de la Práctica Profesional, en el Departamento de <strong><u>{{ $user->depto->nombreDepto }}</u></strong>, en el periodo comprendido del día <strong><u> {{ $user->horas->first()->fecha }} </u></strong>, al
            día <strong><u> {{ $user->horas->max()->fecha }} </u></strong>, acumulando un total de <strong><u> {{ $user->horas_requeridas }}</u></strong>
        </p>
        <br><br>
        <p id="tercero" style="line-height: 2; font-size:14px; text-align: justify">
            La presente se extiende a petición del interesado para los fines legales que a él convengan, en la ciudad de
            de Danlí, departamento de El Paraíso.
        </p>
        <hr style="border: none; height: 1px; background-color: rgba(236, 225, 225, 0.8); align-content: center">
        <br> <br>

        <div style="text-align: center; margin-top: 13%">
            
            <hr style="height: 0.25px; background-color: #000; width: 30%; margin: auto;">
            <strong> <p style="font-size:14px; text-align: center">{{ $user->depto->nombreCargo }}</p></strong>
        </div>

    </div>



</div>
  
</div>