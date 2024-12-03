@extends('base')

@section('titulo', 'Cadastrar')

@section('conteudo')
<p>Preencha o formulario: </p>

@if($errors->any())
<div>
    <h2>deu ruim</h2>
    @foreach($errors->all() as $erro)
    <p>{{$erro}}</p>
    @endforeach
</div>
@endif 

<form method="post" action="{{ route ('usuarios.gravar') }}">
    @csrf
    <input type="text" name="name"
    placeholder="Nome" value="{{ old('name')}}">
    <br>
    <input type="text" name="email"
    placeholder="Email" value="{{ old('email')}}">
    <br>
    <input type="text" name="username"
    placeholder="User" value="{{ old('username')}}">
    <br>
    <input type="text" name="password"
    placeholder="Senha" value="{{ old('password')}}">
    <br>
    <select name="admin"> 
    <option value="null">Selecione o admin</option>
    <option value="1">yess</option>
    <option value="0">noo</option>
    </select>
    <br>
    <input type="submit" name="Gravar">
</form>

@endsection