<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;

class CadastroController extends Controller
{
    // Método para armazenar os dados no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer|min:18', // Exemplo de validação para idade
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validação da imagem
        ]);

        // Processando o upload da imagem
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            // Salvando a imagem no diretório public/imagens
            $caminhoImagem = $request->imagem->store('imagens', 'public');
        } else {
            $caminhoImagem = null; // Se não houver imagem, define como nulo
        }

        // Criando um novo cadastro no banco de dados
        Cadastro::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'imagem' => $caminhoImagem,
        ]);

        // Redirecionar ou retornar com sucesso
        return redirect()->route('cadastro.index')->with('success', 'Cadastro realizado com sucesso!');
    }
}
