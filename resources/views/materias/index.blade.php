

@extends('base')

@section('titulo', 'Materias atuais:')

@section('conteudo')
<p>
    <a href="{{ route('materias.cadastrar') }}"  class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"> <i class="fas fa-paw"> </i> Cadastrar mais um animal </a>
</p>

<div class="md:px-32 py-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
    <table class="min-w-full bg-white">
    <thead class="bg-gray-800 text-white">
    <tr>
    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Id</th>
    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nota</th>
    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Apagar</th>
  
    </tr>
    </thead>
    </div>
    </div>
    
@foreach($materias as $materia )
    
<tr>
<td class="w-1/3 text-left py-3 px-4">{{ $materia['id'] }}</td>
<td class="w-1/3 text-left py-3 px-4">{{ $mteria['nome'] }}</td>
<td class="w-1/3 text-left py-3 px-4"> {{ $materia['nota'] }} </td>
<td class="w-1/3 text-left py-3 px-4"> {{ $materia['apagar'] }} </td>


{{-- <td><a href="{{route('materia.apagar', $materia['id'])}}">Apagar</a></td> --}}
</tr>

@endforeach

</table>

@endsection 


