
@extends('adminlte::page', ['iFrameEnabled' => false])

@section('title', 'Instrucciones de evaluación')

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

                <div class="callout callout-info alert-dismissable fade show">
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
                            <a href="{{ route('pages.docentes.index') }}" class="btn btn-success btn-sm" style="text-decoration:none; color:white;">
                                <i class="far fa-hand-point-right"></i>&nbsp;&nbsp;
                                <b>IR A LA EVALUACIÓN AL DESEMPEÑO DEL PERSONAL DOCENTE &nbsp;&nbsp;
                                <i class="fas fa-share-square"></i></b>
                            </a>
                        </div>
                </div> 

        </div>
</div>


@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi AdminLTE!'); </script>
@stop