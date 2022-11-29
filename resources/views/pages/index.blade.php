
@extends('adminlte::page', ['iFrameEnabled' => false])

@section('title', 'Instrucciones')

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
                    <b><i class="icon fas fa-info-circle" style="color:gold;"></i> Instrucciones:</b>                
                </div>
        </div>

        <div class="card-body table-responsive">

                <div class="callout callout-warning alert-dismissable fade show" style="font-weight:bold;">
                            <ol>
                                <li value="1">
                                    Da click en el nombre de un docente para comenzar a evaluarlo.
                                </li>
                                <li value="2">
                                    Lee con atención cada pregunta, y asigna la puntuación que representa la evaluación al desempeño del docente.
                                </li>
                                <li value="3">
                                    A la izquierda de cada opción aparece un círculo para seleccionar la opción que a tu juicio es la correcta.
                                </li>
                                <li value="4">
                                    Cuando hayas finalizado tu evaluación da click en el botón "Continuar".
                                </li>
                                <li value="5">
                                    Regresarás al listado de tus docentes y repite los pasos anteriores hasta evaluar a todos.
                                </li>
                                <li value="6">
                                Al terminar de evaluar a todos da click en el botón "Imprimir comprobante"
                                </li>
                            </ol>
                </div> 
                <div>
                   
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