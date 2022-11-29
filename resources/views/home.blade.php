@extends('adminlte::page', ['iFrameEnabled' => true])

@section('title', 'Admin')

@section('content_header')
    <h1>Home</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Hello</h1>
            <p>Welcome to this beautiful admin home.</p>
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