<!DOCTYPE html>
<html lang="en">
<head>
  <title>SEIEM | Panel Administrativo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--
<script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/js/jszip.min.js') }}"></script>
<script src="{{ asset('public/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/js/buttons.colVis.min.js') }}"></script>
-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

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


        <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary">
            <i class="fa fa-pie-chart"></i> 
            Avance de la evaluación
        </a>

        <a  class="btn btn-secondary shadow">
            <i class="fa fa-users"></i> 
            Todos los alumnos 
        </a>






<div class="container-fluid">
<div class="tab-content" id="myTabContent">
<br>


<form name="FrmCartel" id="FrmCartel" method="get" action="{{ route('admin.show', 0 ) }}" >
    @method('PATCH')
    @csrf
<select class="form form-control col-6" name="sedes" id="sedes">
    <option selected disabled>-- Elejir Institución --</option>
    @foreach($sedes as $sede)
        <option value="{{ $sede->osede }}">{{ $sede->osede }}</option>
    @endforeach
</select>
<br>
    <button class="btn btn-outline-success btn-sm col-6"  >
    <b> Buscar</b>
    <span class="fa fa-search"></span>
    </button> 
<br>
<br>
</form>





                <table id="example1" class="table table-sm table-striped table-hover" style="font-size:14px;">
                <thead class="colorBG">
                    <tr class="bg-purple" >
                            <th>No.</th>
                            <th>Institución</th>
                            <th>Sede</th>
                            <th>Matricula (usuario)</th>
                            <th>Nombre del alumno</th>
                            <th>Programa</th>
                            <th>Restaurar password</th>
                        </tr>
                </thead>
                <tbody>
                    <?php $count=0; ?>
                        @php($count=0)
                    @foreach ($alumnodoc as $alumnodocs)
                        @php($count++)
                        <tr valign="middle">
                            <td width="5%" align="center"> {{ $count }} </td>
                            <td  width="20%"> {{ $alumnodocs->osede }} </td>
                            <td  width="10%"> {{ $alumnodocs->osubsede }} </td>
                            <td  width="10%"> {{ $alumnodocs->omatricula }} </td>
                            <td  width="25%"> {{ $alumnodocs->onombre }} </td>
                            <td  width="20%"> {{ $alumnodocs->oprograma }} </td>
                            <td  width="10%" align="center">   
                                <a class="btn btn-outline-dark btn-sm"  data-toggle="modal" data-target="#myModal{{ $count }}" title="Restaurar password de: {{ $alumnodocs->onombre }}">
                                <span class="badge badge-light">
                                            <i class="fa fa-ellipsis-h"></i><i class="fa fa-ellipsis-h"></i> <i class="fa fa-refresh"></i>
                                        </span>
                                </a>
                        
                                


                                <div class="modal fade" id="myModal{{ $count }}">
                                    <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                        <b>¿ Desea resetear el password de: {{ $alumnodocs->onombre }} ?</b>
                                                        
                                                    <button type="button" class="close" data-dismiss="modal" style="color:red;">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                <br>El password será <b>evaluacion2022</b>
                                                <i class="fa fa-refresh" style="font-size:40px; color:#69379A;"></i>
                                                    <br><br>

                                                        <div class="d-flex justify-content-between align-items-center">
                                                                <button class="btn btn-outline-primary btn-sm" data-dismiss="modal">
                                                                    <span class="fa fa-reply"></span> No restaurar
                                                                </button>
                                                                <br>
                                                                <form name="FrmCartel" id="FrmCartel" method="post" action="{{ route('admin.update', $alumnodocs->id_user) }}" >
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    <input type="hidden" id="idd" name="idd" value="{{ $alumnodocs->id_user }}">
                                                                    <button class="btn btn-outline-success btn-sm "  >
                                                                    <b> Restaurar password</b>
                                                                    <span class="fa fa-check"></span>
                                                                </button> 
                                                                </form>

                                                                                                                         
                                                        </div>


                                                
                                                </div>

                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                    </div>
                                </div>


                            </td>
                        </tr>
                    
                    @endforeach
                </tbody>
                </table>





</div>
</div>



</div>




</body>
</html>



<script>

function submitform()
{
    document.getElementById('FrmCartel').submit();
}

$(function () {
    
    $("#example1").DataTable({
      "paginate": true, 
      "responsive": false, 
      "lengthChange": false, 
      "autoWidth": true,
      "language": 'es',
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');    

});



</script>