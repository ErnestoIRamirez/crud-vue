@extends('layouts.app')

@section('content')
<div class="container">
    <label for="">Buscar</label>
    <input type="text">
    <button id="busca">Buscar</button>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
    $('#busca').on('click', function() {
        alert("ASD");
    })
</script>
@endsection