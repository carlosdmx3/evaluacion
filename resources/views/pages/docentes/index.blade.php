
@extends('adminlte::page', ['iFrameEnabled' => false])

@section('title', 'Personal docente a evaluar')

@section('content_header')
    <br>
@stop

@section('content')

@php( $carbon = new \Carbon\Carbon() )

        @php( $totalc_ = ((float)$docenteval2->totalc) )
        @php( $total_  = ((float)$docentevalc->total) )
        @php( $totalAvance_ = ( ((float)$totalc_ * 100) / $total_ ) )
        @php( $totalAvance = round($totalAvance_) )

    
    



<div class="col-10 card card-purple card-outline shadow">
    <div class="card-header bg-light shadow-sm d-flex mb-2">
            <div class="d-flex justify-content-between">
                <b><i class="icon fas fa-user-check" style="color:green;"></i> Personal docente para realizar la evaluación al desempeño</b>                
            </div>
    </div>

    <div class="card-body table-responsive">
            <div>
        
                    <table class="table table-sm table-striped table-hover" style="font-size:14px;">
                        <tr class="bg-purple" >
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Asignatura</th>
                                <th>Evaluar</th>
                                <th>% de avance</th>
                            </tr>
                        <?php $count=0; ?>
                            @php($count=0)
                        @foreach ($alumno as $alumnos)
                            @php($count++)
                            <tr valign="middle">
                                <td width="5%" align="center"> {{ $count }} </td>

                                <td  width="30%"> {{ $alumnos->odocente }} </td>

                                <td  width="45%"> {{ $alumnos->oasignatura }} </td>

                                <td  width="10%" align="center">   
                                    <a  href="{{ route('pages.docentes.edit', $alumnos->id) }}" 
                                        class="btn btn-outline-dark btn-xs" 
                                        title="Evaluar a: {{ $alumnos->odocente }} ">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                </td>
                                <td whidth="10%"> 
                                    <span class="progress" >
                        @foreach ($docenteval as $docentevals)
                            @if($docentevals->id_docente==$alumnos->id)

                                @php($total=$docentevals->op1 + $docentevals->op2 + $docentevals->op3 + $docentevals->op4 + $docentevals->op5 + $docentevals->op6 + $docentevals->op7 +
                                  $docentevals->op8 + $docentevals->op9 + $docentevals->op10  + $docentevals->op11 + $docentevals->op12 + $docentevals->op13 + $docentevals->op14 +
                                  $docentevals->op15 + $docentevals->op16 + $docentevals->op17 + $docentevals->op18 + $docentevals->op19 + $docentevals->op20 + $docentevals->op21 + 
                                  $docentevals->op22 + $docentevals->op23 + $docentevals->op24 + $docentevals->op25 + $docentevals->op26 + $docentevals->op27 + $docentevals->op28 +
                                  $docentevals->op29 + $docentevals->op30 + $docentevals->op31 + $docentevals->op32 + $docentevals->op33 + $docentevals->op34 + $docentevals->op35)
                                    
                                  @if($docentevals->oban_fin==1)
                                                <span   class="progress-bar bg-success progress-bar-striped progress-bar-animated" 
                                                        style="width:100%;">
                                                        <b>100%</b>
                                                </span>
                                    @else

                                                <span   class="progress-bar bg-danger progress-bar-striped progress-bar-animated" 
                                                        style="width:15%;">
                                                        <b>0%</b>
                                                </span>

                                    @endif

                            @endif
                        @endforeach
                                    </span>  
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <center>
                        <button class="btn btn-outline-success btn-sm"  data-toggle="modal" data-target="#myModal">
                                Comprobante de evaluación <i class="fa fa-file"></i> 
                        </button>

                    </center>
                    
                    <br>
              
            </div>
    </div>
    </div>

    @if( $totalAvance == '100' ) 
        @php( $tamanio='xl' )
    @else 
    @php( $tamanio='lg' )
    @endif

        <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-{{$tamanio}}">
            <div class="modal-content">
                <div class="modal-header">
                        @if( $docentevalc->total == $docenteval2->totalc )
                            <button class="btn btn-outline-secondary btn-sm" onclick="imprim1(imp1)">
                                    <b>Imprimir comprobante de evaluación al desempeño del personal docente <i class="fas fa-print"></i></b>
                                </button>         
                        @else              
                                    <b> <i class="fas fa-chart-pie" style="color:#E5B616"></i> 
                                    Avance de evaluación al desempeño {{round($totalAvance)}}%</b>
                        @endif
                                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal" >
                                        Cerrar ventana &nbsp;<span class="fas fa-times"></span>
                                </button>
                </div> 
                <div class="modal-body" id="imp1">
                @if( $docentevalc->total == $docenteval2->totalc)
                        @foreach($documento as $documentos)
                                <table style="font-size:16px;">
                                <thead>
                                <tr>
                                    <td>
                                        <img src="storage/images/encabezado.jpg" alt=""width="100%">
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td align="center">
                                            <p><b>  {{$documentos->p1}}  <br> {{$documentos->p2}}  <br> {{$documentos->p3}}  </b></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="justify">
                                            <br><br>
                                            @foreach($alumnod as $alumnods)
                                                <p id="text3"> 
                                                    {{$documentos->c1}} <b>{{ $users->name }}</b> {{$documentos->c2}} <b>{{$alumnods->osede}}</b> {{$documentos->c3}} <b>{{$alumnods->osubsede}}</b>. {{$documentos->c4}} <b>{{$alumnods->oprograma}}</b>.
                                                </p> 
                                            @endforeach
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr style="text-align:right; font-size:12px;">
                                    <td >
                                        <img src="storage/images/pie.jpg" alt=""width="100%">
                                        {{ auth()->user()->id }}/{{ $alumnos->id }}/{{ $date = $carbon->now() }}
                                    </td>
                                </tr>
                                </tfoot>
                                </table>
                                @endforeach
                @else
                                    <center>                                                       
                                        <b style="color:red;">Aún no has concluido la evaluación, al terminarla podrás generar tu comprobante&nbsp;&nbsp;</b>
                                        @if( $totalAvance<=90 && $totalAvance>=50 )
                                            @php($barrita='warning')
                                            @php($tama=90)
                                        @elseif( $totalAvance<=50 )
                                            @php($barrita='danger')
                                            @php($tama=70)

                                        @endif
                                        <br><br>
                                        <span   class= "shadow progress-bar bg-{{ $barrita }} progress-bar-striped progress-bar-animated" style= "100%; ">
                                            <b>Avance de evaluación al desempeño {{round($totalAvance)}}%</b>
                                        </span>

                                        <br><br>
                                        <i class="far fa-hand-point-right"></i>&nbsp;
                                            <button class="btn btn-outline-warning btn-sm  col-6"  data-dismiss="modal">
                                                    <b>Concluir la evaluación </b>&nbsp;&nbsp;
                                                    <i class="fa fa-file-signature"></i>
                                            </button>&nbsp;
                                        <i class="far fa-hand-point-left"></i>
                                        <br> <br>
                                    </center>  
                @endif 
                </div>
                <div class="modal-footer"><!--
                            <button type="button" class="btn btn-outline-danger btn-sm btn-block" data-dismiss="modal" >
                                Cerrar ventana &nbsp;<span class="fas fa-times"></span>
                            </button>-->
                </div>
        </div>
        </div>



@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
@stop

@section('js')
    <script> console.log('Hi AdminLTE!'); </script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colVis.min.js') }}"></script>

    

<script>
$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert").alert('close');
    }, 5000);
});


function imprim1(imp1){
var printContents = document.getElementById('imp1').innerHTML;
        w = window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
		w.print();
		w.close();
        return true;}


$(function () {
    
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "language": 'es',
      "buttons": ["pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');    

});

$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert").alert('close');
    }, 2000);
});



</script>

<script async src="https://get.geojs.io/v1/ip/geo.js"></script>
@stop