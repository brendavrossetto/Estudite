@extends('base')

@section('titulo', 'Apagar ')

@section('conteudo')
<p>Tem certeza que quer apagar?</p>
<p><em>{{ $animal['nome'] }}</em></p>
<form action="{{ route('materias.apagar', $materia['id']) }}" method="post">
@method('delete')
@csrf

<input type="submit" value="Apagar" style="background:red; color:white">
</form>

<a href="{{ route('materias') }}">Cancelar</a>

@endsection