@extends('base')

@section('titulo', 'Cadastrar Usuário')

@section('conteudo')
    <h2>Cadastrar Novo Usuário</h2>

    @if($errors->any())
        <div>
            <h3>Erro no preenchimento:</h3>
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('usuarios.gravar') }}" enctype="multipart/form-data">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Digite o nome" required>
        <br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" value="{{ old('idade') }}" placeholder="Digite sua idade" required>
        <br>

        <label for="imagem">Foto de Perfil:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*">
        <br>

        <button type="submit">Cadastrar</button>
    </form>
@endsection
