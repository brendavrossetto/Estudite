<?php 

namespace App\Http\Controllers;

use App\Mail\MateriaCadastrado;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MateriaController extends Controller
{
    public function index()  
    { 
                // Recupera todas as matérias do banco de dados
                $materias = Materia::all();
        
                // Opcional: agrupar matérias por nota
                $materiasPorNota = Materia::groupBy('nota')
                    ->selectRaw('nota, count(*) as quantidade')
                    ->get();
        
                // Retorna a view com os dados
                return view('materias.index', [
                    'materias' => $materias,
                    'materiasPorNota' => $materiasPorNota,
                ]);
    }

    public function cadastrar(){
        return view('materias.cadastrar');
    }

    public function gravar(Request $form){
        dd($form);
        $dados = $form->validate([
            'titulo'=> 'required',

        ]);
        
        


    }

   

    public function editar(Materia $materias) {
        return view('materias/editar', ['materias' => $materias]);
       }

       public function editarGravar(Request $form, Materia $materias)
        {
        $dados = $form->validate([
        'titulo' => 'required|max:255',
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