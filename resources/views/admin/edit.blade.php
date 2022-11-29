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
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "language": 'es',
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');    

});

</script>