@extends('template')

@section('content')

<div class="welcome-content">
         <h1>Atenção</h1>
         <p>{{$info}}</p>
         <p><a class ="btn btn-secondary" href="{{$link}}">Voltar</a></p>
</div>

@endsection