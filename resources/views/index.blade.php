
@extends('adminlte::page', ['iFrameEnabled' => false])

@section('title', 'Evaluación al desempeño del personal docente')

@section('content_header')
    <br>
<!--
    <h1><b>Productos Index</b></h1>
-->
@stop

@section('content')


<div class="col-10 card card-purple card-outline shadow">
        <div class="card-header bg-light shadow-sm d-flex mb-2">
                <div class="d-flex justify-content-between">
                    <b><i class="icon fas fa-info-circle" style="color:#1FA7C5;"></i> Instrucciones para la evaluación al desempeño del personal docente:</b>                
                </div>
        </div>

        <div class="card-body table-responsive">

                <div class="callout callout-info alert-dismissable fade show" >
                            <ol>
                                <li value="1">
                                    Da click en el nombre de un docente para comenzar a evaluarlo.
                                </li>
                                <li value="2">
                                    Lee con atención cada pregunta y asigna la puntuación que representa la evaluación al desempeño del docente.
                                </li>
                                <li value="3">
                                    A la izquierda de cada opción aparece un círculo para seleccionar la opción que a tu juicio es la correcta.
                                </li>
                                <li value="4">
                                    Cuando hayas finalizado tu evaluación da click en el botón <span class="badge badge-success">Concluir evaluación</span>
                                        <i class="fas fa-mouse-pointer"></i>
                                </li>
                                <li value="5">
                                    Regresarás al listado de tus docentes y repite los pasos anteriores hasta evaluar a todos.
                                </li>
                                <li value="6">
                                Al terminar de evaluar a todos da click en el botón <span class="badge badge-success">Comprobante de evaluación</span>
                                        <i class="fas fa-mouse-pointer"></i>
                                </li>
                            </ol>

                        <div>
                            <a href="{{ route('pages.docentes.index') }}" class="btn btn-success btn-sm" style="text-decoration:none;  color:white;">
                                <i class="far fa-hand-point-right"></i>&nbsp;&nbsp;
                                <b>IR A LA EVALUACIÓN AL DESEMPEÑO DEL PERSONAL DOCENTE &nbsp;&nbsp;
                                <i class="fas fa-share-square"></i></b>
                            </a>
                        </div>
                </div> 

        </div>
</div>





@foreach($users as $userses)
@if ( $userses->password=='$2y$10$9GxM0Z6uX7LyYCHhhfwr..Tu3eUZISRdezic5M7qI09.8miAtwwlO' )

        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">
                            <i class="fas fa-hand-paper"></i> &nbsp; Hola:  <b> {{ $userses->name }}</b></span>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body" align="center">
                        <h4>
                            <span style="color:red;">
                                <b>¡Por favor realiza el cambio de tu contraseña!</b> 
                            </span>
                                    <br><br>
                                Clic  &nbsp;<i class="far fa-hand-point-right"></i> &nbsp;
                                    <a href="{{ route('change-password') }}" class="btn btn-outline-secondary btn-sm">
                                        Cambiar mi contraseña 
                                        <span class="badge badge-light">
                                            <i class="fas fa-ellipsis-h"></i><i class="fas fa-ellipsis-h"></i>
                                        </span>
                                    </a>
                        </h4>                        
                    </div>

                    <div class="modal-footer">

                    </div>

                </div>
            </div>
        </div>

@else

@endif
@endforeach





@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi AdminLTE!'); </script>

    
<script>
$( document ).ready(function() {
    $('#myModal').modal('toggle')
});
</script>


};
@stop