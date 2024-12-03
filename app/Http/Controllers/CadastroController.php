<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;

class CadastroController extends Controller
{
    // Exibe o formulário
    public function create()
    {
        return view('cadastro.create'); // Certifique-se de criar essa view!
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

        // Processar o upload da imagem
        $caminhoImagem = null;
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $caminhoImagem = $request->imagem->store('imagens', 'public');
        }

        // Criar o cadastro no banco
        Cadastro::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'imagem' => $caminhoImagem,
        ]);

        // Redirecionar com mensagem de sucesso
        return redirect()->route('cadastro.create')->with('success', 'Cadastro realizado com sucesso!');
    }
}
