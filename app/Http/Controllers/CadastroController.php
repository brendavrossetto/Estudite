<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo; // Substitua 'Modelo' pelo nome do seu Model relacionado ao banco de dados.

class CadastroController extends Controller
{
    public function store(Request $request)
    {
        // Validações dos campos enviados
        $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer|min:0|max:120',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Valida o upload de imagem (opcional)
        ]);

        // Faz o upload da imagem, se enviada
        $caminhoImagem = null;
        if ($request->hasFile('imagem')) {
            $caminhoImagem = $request->file('imagem')->store('imagens', 'public'); // Salva em 'storage/app/public/imagens'
        }

        // Salva os dados no banco de dados
        Cadastros::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'imagem' => $caminhoImagem,
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('alguma.rota') // Substitua pela rota para onde deseja redirecionar
            ->with('sucesso', 'Cadastro realizado com sucesso!');
    }
}
