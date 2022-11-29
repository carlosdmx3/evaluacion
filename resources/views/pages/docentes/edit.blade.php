

@extends('adminlte::page', ['iFrameEnabled' => false])

@section('title',  'Evaluar a: '.$alumno->odocente)

@section('content_header')
    <br>
<!--
    <h1><b>Productos Index</b></h1>
-->
@stop

@section('content')


<div class="col-10 card card-purple card-outline shadow">
                <div class="card-header bg-light shadow-sm d-flex mb-2">
                        <div  style="font-size:14px;">
                                <i class="icon fas fa-spell-check" style="color:green;"></i>
                                    &nbsp; <b>Profesor(a):</b> &nbsp;  
                                    {{ $alumno->odocente }}    
                                <br>
                                <i class="fas fa-book" style="color:green;"></i>
                                    &nbsp; <b> Asignatura: </b> &nbsp;    
                                    {{ $alumno->oasignatura }}      
                                    <br>

                                <br> 
                                Contesta con veracidad y honestidad las siguientes preguntas, que tiene como objetivo, 
                                conocer tu opinión respecto del desempeño de las y los docentes que participan en el desarrollo del programa curricular que ofrece la Institución. 
                                Y selecciona la opción que mejor exprese el desempeño docente.
                                <br><br>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('pages.docentes.index') }}" class="btn btn-outline-secondary btn-sm"> 
                                            <span class="fas fa-reply"></span> 
                                            <b>Regresar </b>
                                        </a>
                                    </div>
                        </div>
                </div>

@foreach($docenteval as $docentevals)
        <div class="card-body table-responsive">
        <form name="FrmCartel" id="FrmCartel" method="post" action="{{ route('pages.evaluaciones.update', $docentevals->id  ) }}" >
        @method('PATCH')
        @csrf
                        <table id="example1" class="table table-sm table-striped  table-hover "  style="font-size:14px;">
                        <thead class="bg-purple" align="center">
                                <tr>
                                    <th>#</th>
                                    <th>Preguntas de evaluación</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php $count=0;?> 
                            @php($count=0)
                            @foreach ($evaluacion as $evaluaciones)
                            @php($count++)
                                <tr>
                                    <td width="5%"  align="right">  
                                        <b>{{ $count }} .-</b>
                                    </td>
                                    <td  width="95%">
                                        <b>{{ $evaluaciones->odescripcion }} </b>
                                            {{'op'.$evaluaciones->onumpregunta}}
                                        @php($actual = 'op'.$evaluaciones->onumpregunta) 
                                        @php($pregunta = $evaluaciones->onumpregunta )
                                        
                                        <br> 
                                        <input  type="radio" 
                                                id="p{{ $count }}1" 
                                                name="p{{ $evaluaciones->onumpregunta }}" 
                                                value="1"                                                                                        
                                                @if( old('p'.$evaluaciones->onumpregunta, $docentevals->$actual)=='1')checked @endif 
                                                >
                                        Totalmente en desacuerdo

                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input  type="radio" 
                                                id="p{{ $count }}2" 
                                                name="p{{ $evaluaciones->onumpregunta }}" 
                                                value="2"                                                                                         
                                                @if( old('p'.$evaluaciones->onumpregunta, $docentevals->$actual)=='2')checked @endif
                                                >
                                        En desacuerdo

                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input  type="radio" 
                                                id="p{{ $count }}3" 
                                                name="p{{ $evaluaciones->onumpregunta }}" 
                                                value="3"                                                                                        
                                                @if( old('p'.$evaluaciones->onumpregunta, $docentevals->$actual)=='3')checked @endif
                                                >
                                        Ni de acuerdo ni en desacuerdo

                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input  type="radio" 
                                                id="p{{ $count }}4" 
                                                name="p{{ $evaluaciones->onumpregunta }}" 
                                                value="4"                                                                                       
                                                @if( old('p'.$evaluaciones->onumpregunta, $docentevals->$actual)=='4')checked @endif
                                                >
                                        De acuerdo    
                                        
                                        &nbsp;&nbsp;&nbsp;&nbsp;                   
                                        <input  type="radio" 
                                                id="p{{ $count }}5" 
                                                name="p{{ $evaluaciones->onumpregunta }}" 
                                                value="5"                                                                                       
                                                @if( old('p'.$evaluaciones->onumpregunta, $docentevals->$actual)=='5')checked @endif
                                                >
                                        Totalmente de acuerdo  
                                        <br>

                                            @error('p'.$evaluaciones->onumpregunta)
                                                <span style="color:red;"> 
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror  
                                                    
                                    </td>
                                </tr>
                        @endforeach    
                        </tbody>                  
                        </table>

                <br>               
        </form>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('pages.docentes.index') }}" class="btn btn-outline-secondary btn-sm"> 
                        <span class="fas fa-reply"></span> 
                        <b>Regresar</b>
                    </a>
                    &nbsp;&nbsp;

                        @if($docentevals->oban_fin==1)
                            @php($textoo='Evaluacion concluida')
                            @php($valorboton='disabled')
                        @else
                            @php($textoo='Evaluar a: '.$alumno->odocente)
                            @php($valorboton='')
                            
                        @endif
                    <button class="btn btn-outline-success btn-sm"  data-toggle="modal" data-target="#myModal" {{$valorboton}} >
                        <b>{{$textoo}}</b>
                        <span class="fas fa-check"></span>
                    </button>                                                            
                </div>
</div>


    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                            <b>¿ Desea concluir la evaluación de: {{ $alumno->odocente }} ?</b>
                        <button type="button" class="close" data-dismiss="modal" style="color:red;">&times;</button>
                    </div>

                    <div class="modal-body">
                        Recuerda, que antes de concluir, puedes cambiar el valor de alguna(s) de las preguntas, si así lo deseas.
                        <br><br>

                            <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-outline-primary btn-sm btn-block" data-dismiss="modal">
                                        <span class="fas fa-reply"></span> Continuar evaluando
                                    </button>
                                    <br>

                                    <button class="btn btn-outline-success btn-sm btn-block"  onclick="submitform();">
                                        <b>
                                        @if($docentevals->oban_fin==1)
                                            Evaluacion concluida 
                                        @else
                                            Sí, concluir evaluacion
                                        @endif
                                        </b>
                                        <span class="fas fa-check"></span>
                                    </button>                                                          
                            </div>


                    
                    </div>

                    <div class="modal-footer">
                    </div>
                </div>
        </div>
    </div>


@endforeach





@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@stop

@section('css')

@stop

@section('js')
<script> 


function submitform()
{
    document.getElementById('FrmCartel').submit();
}
</script>
    

    @foreach($docenteval as $docentevalsw)
    @if($docentevalsw->oban_fin==1)
<script>
    function deshabilitarFormulario(formulario){
	for(i=0; i<formulario.elements.length; i++){
		formulario.elements[i].disabled = true;
	}
}
deshabilitarFormulario(document.getElementsByName('FrmCartel')[0]);
</script>
@endif
@endforeach

<script async src="https://get.geojs.io/v1/ip/geo.js"></script>
@stop