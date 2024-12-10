<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;

class CadastroController extends Controller
{
    // Exibe a lista de usuários
    public function index()
    {
        $usuarios = Cadastro::all(); // Busca todos os usuários cadastrados
        return view('usuarios.index', compact('usuarios'));
    }

    // Exibe o formulário de cadastro
    public function create()
    {
        return view('usuarios.create');
    }

    // Salva os dados no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer|min:18',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Processa o upload da imagem
        $caminhoImagem = null;
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $caminhoImagem = $request->imagem->store('imagens', 'public');
        }

        // Salva os dados no banco
        Cadastro::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'imagem' => $caminhoImagem,
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('usuarios.cadastrar')->with('success', 'Usuário cadastrado com sucesso!');
    }

    // Apaga um usuário
    public function destroy(Cadastro $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário apagado com sucesso!');
    }

    // Métodos de autenticação (exemplos simples)
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // Processa o login (exemplo simplificado)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Aqui você adicionaria lógica de autenticação
        return redirect()->route('usuarios.index');
    }

    public function logout()
    {
        // Faz logout do usuário (exemplo simplificado)
        return redirect()->route('login');
    }
}
