<!DOCTYPE html>
<html lang="en">
<head>
  <title>SEIEM | Panel Administrativo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
<style>
.fakeimg {
height: 200px;
background: #aaa;
}
.colorBG{
background-color: #69379A;
color: white;
}
</style>
</head>
<body>


<nav class="colorBG navbar navbar-expand-sm navbar-light">
    <a class="navbar-brand" href="#" style="color:white;" >
       <b> SEIEM | Panel Administrativo de Evaluación al desempeño docente</b>. Semestre agosto 2022 - enero 2023
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar" >

    </div>  
</nav>
<br>



<div class="container-fluid">

        <a class="btn btn-secondary">
            <i class="fa fa-pie-chart"></i> 
            Avance de la evaluación
        </a>

        <a href="{{ route('admin.edit', 0) }}" class="btn btn-outline-secondary">
            <i class="fa fa-users"></i> 
            Todos los alumnos 
        </a>







<div class="container-fluid">
<div class="tab-content" id="myTabContent">
<br>


                            <br>
                            <div style="color:#69379A;"><h4>Listado de alumnos</h4></div>
                            <table id="example1" class="table table-sm table-striped table-hover shadow" style="font-size:14px;" >
                            <thead class="colorBG ">
                                <tr class="bg-purple" >
                                    <th>No.</th>
                                    <th>Institución</th>
                                    <th>Sede</th>
                                    <th>Total</th>
                                    <th>Concluidos</th>
                                    <th>Sin concluir</th>
                                </tr>
                            </thead>
                            
                                <?php $count=0; ?>
                                    @php($count=0)
                                @foreach($totales as $totalesd)

                                    @php( $totall = $totalesd->totaldoc )                                  
                                    @php( $sinevaluar = $totall )
                                   
                                    @php($count++)
                                <tr valign="middle">
                                    <td width="5%" align="center"> {{ $count }} </td>
                                    <td  width="30%"> {{ $totalesd->osede }} </td>
                                    <td  width="20%"> {{ $totalesd->osubsede }} </td>
                                    <td  width="10%"> {{ number_format($totall) }} </td>
                                    <td  width="10%">
                                        @if( $totalesd->oba==0 )
                                                {{ $totalesd->oba }}
                                        @else
                                                @foreach( $totales2 as $totales22 )  
                                                    @if( $totalesd->osede == $totales22->osede && $totalesd->osubsede == $totales22->osubsede )
                                                        @php( $losquevan_ = $totales22->totaldocter )                                                           
                                                            {{ $losquevan_ }}
                                                    @endif                             
                                                @endforeach 
                                        @endif
                                    </td>
                                    <td  width="10%"> 

                                        @if( $totalesd->oba==0 )
                                                {{ $totalesd->oba }}
                                        @else
                                                 @foreach( $totales2 as $totales22 )  
                                                    @if( $totalesd->osede == $totales22->osede && $totalesd->osubsede == $totales22->osubsede )
                                                    @php( $losquevan_ = $totales22->totaldocter )

                                                        @if( $losquevan_ <=0 )
                                                            @php( $losquevan = '0' )
                                                        @else
                                                            @php( $losquevan = $losquevan_ )
                                                        @endif

                                                        {{ number_format($totall-$losquevan) }}  
                                                         
                                                    @endif
                                                @endforeach 
                                        @endif

                                               

                                </td>


                                </tr>
                                  
                                @endforeach

                                @php( $grantotal = $totalg->totalg )

                                @if( $totalto->totalt  )
                                    @php( $evaltotal = $totalto->totalt )
                                @else
                                    @php( $evaltotal = 0 )
                                @endif

                                @php($restan = $grantotal-$evaltotal )

                            <tfoot class="colorBG">
                                <tr valign="middle">
                                    <td colspan="3" align="center">  <b>Totales</b></td>
                                    <td  width="10%"> <b>{{ number_format($grantotal) }}</b> </td>
                                    <td  width="10%"> <b>{{ number_format($evaltotal) }}</b> </td>
                                    <td  width="10%"> <b>{{ number_format($restan) }}</b> </td>
                                </tr>
                            </tfoot>
                            </table>
                            <br>
                      


                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                              google.charts.load( {packages:["corechart"]});
                              google.charts.setOnLoadCallback(drawChart);
                              function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                  ['Task', 'Hours per Day', ],
                                  ['Concluidos: <?php echo number_format($evaltotal);?>',     <?php echo $evaltotal;?>, ],
                                  ['Sin concluir: <?php echo number_format($restan);?>',      <?php echo $restan;?>, ],

                                ]);

                                var options = {
                                  title: '% de alumnos que han evaluado',
                                  is3D: true,
                                  colors:['purple','red']
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                                chart.draw(data, options);
                              }
                            </script>


                            <button class="btn btn-outline-secondary btn-sm" onclick="imprim1(piechart_3d)">
                                    <b>Imprimir grafica <i class="fa fa-print"></i></b>
                            </button> 
                                <br><div  id="piechart_3d" style="width:900px; height: 500px;"></div>





                                                    

                                



</div>
</div>



</div>




</body>
</html>

<script type="text/javascript">
$(function () {
    
    $("#example1").DataTable({
      "paginate": false, 
      "responsive": false, 
      "lengthChange": false, 
      "autoWidth": true,
      "language": 'es',
      "buttons": ["pdf", "print", "excel"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');    

});



function imprim1(piechart_3d){
var printContents = document.getElementById('piechart_3d').innerHTML;
        w = window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
        w.print();
        w.close();
        return true;}


</script>

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
