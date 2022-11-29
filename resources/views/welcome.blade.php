<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistema de Evaluación del desempeño del personal docente</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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



<nav class="colorBG navbar navbar-expand-sm  fixed-top">
@if (Route::has('login'))

@auth
            <a class="nav-link" href="{{ route('index') }}" style="text-decoration:none; color:white;">
                <span class="spann"> 
                    <i class="fa fa-reply"></i>
                    &nbsp;IR A LA EVALUACIÓN &nbsp;
                    <i class="fa fa-file-text"></i> 
                </span> 
            </a>
@else
<br>
<!--

            <a class="nav-link" href="{{ route('login') }}" style="text-decoration:none; color:white;">
                <span class="spann"> <i class="fa fa-sign-in"></i> LOGIN</span>
            </a>

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <span class="spann"> <i class="fa fa-edit"></i> REGISTRO</span>
                    </a>
                </li>
            @endif
-->

@endauth

@endif
</nav>


<div class="row">

 
    <div class="col-sm-2">  <br><br><br>   </div>
    
    <div class="col-sm-5 " style="padding-top: 100px;">
   
                <center>
                        <h3 style="color:purple;">
                        <p>
                            <b>Sistema de Evaluación al desempeño del personal docente de las instituciones de Educación Superior de SEIEM 
                                del semestre Agosto 2022 - Enero 2023.</b>
                        </p>
                        </h3>
                </center>
                <br>
                
                <div class="flex-right position-ref">
                        <img class="img-fluid" src="img/SEIEM_edo.png" alt="">
                </div> 
                <br>
                <div>
                        <center>
                            <div class="spinner-grow spinner-grow-sm text-light"></div>
                            <div class="spinner-grow spinner-grow-sm text-muted"></div>
                            <div class="spinner-grow spinner-grow-sm text-dark"></div>
                            <div class="spinner-grow spinner-grow-sm text-primary"></div>
                            <div class="spinner-grow spinner-grow-sm text-success"></div>
                            <div class="spinner-grow spinner-grow-sm text-info"></div>
                            <div class="spinner-grow spinner-grow-sm text-warning"></div>
                            <div class="spinner-grow spinner-grow-sm text-danger"></div>
                            <div class="spinner-grow spinner-grow-sm text-secondary"></div>
                        </center>
                    </div>
                    
    </div>

    <div class="col-sm-1">     </div>

    <div class="col-sm-3"  style="padding-top: 100px;">

































    </div>

    <div class="col-sm-1">     </div>


</div>


</body>
</html>

<script>
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>