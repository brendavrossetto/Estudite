<?php 

namespace App\Http\Controllers;

use App\Mail\MateriaCadastrado;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MateriasController extends Controller
{
    public function index()  
    {
        $dados = Materia::get();
        $materiassPorNota = Materia::groupBy('nota')
        ->selectRaw('nota, count(*) as quantidade')
        ->get();
        return view('materias.index', [
            'materias' => $dados,
        ]);
    }

    public function cadastrar(){
        return view('materias.cadastrar');
    }

    public function gravar(Request $form){
        dd($form);
        $dados = $form->validate([
            'nome'=> 'required',
            'nota' => 'required|integer',
        ]);
        
        
        Mail::to('alguem@batata.com')->send(new MateriaCadastrado);


    }

   

    public function editar(Materia $materias) {
        return view('materias/editar', ['materias' => $materias]);
       }

       public function editarGravar(Request $form, Materia $materias)
        {
        $dados = $form->validate([
        'nome' => 'required|max:255',
        'descricao' => 'required'
        ]);

        
    }
    public function apagar(Materia $materias) {
        return view('materias.apagar', [
        'materia' => $materias,
        ]); 
    }

    //vai deletar de vez do banco
    public function deletar (Materia $materia) {
        $materia->delete();
        return redirect()->route('materias');
    }


}