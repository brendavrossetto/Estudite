<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index() {
        $dados = Usuario::orderBy('name', 'asc')->get();

        return view('usuarios.index', [
            'usuarios' => $dados,
        ]);
    }

    public function cadastrar() {
        return view('usuarios.cadastrar');
    }

    public function gravar(Request $form) {
        $dados = $this->validateDados($form);

        $dados['password'] = Hash::make($dados['password']);
        Usuario::create($dados);

        return redirect()->route('usuarios');
    }

    public function apagar(Usuario $usuario){
        return view('usuario.apagar', [
            'usuario' => $usuario,
        ]);
    }

    public function deletar(Usuario $usuario){
        $usuario->delete();
        return redirect()->route('usuarios');
    }

    public function editar(Usuario $usuario) {
        return view('usuarios.editar', ['usuario' => $usuario]);
    }

    public function editarGravar(Request $form, Usuario $usuario) {
        $dados = $this->validateDados($form);

        if (isset($dados['password'])) {
            $dados['password'] = Hash::make($dados['password']);
        }

        $usuario->fill($dados);
        $usuario->save();

        return redirect()->route('usuarios');
    }

    public function login(Request $form){
        if ($form->isMethod('POST')) {
            $credenciais = $form->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt($credenciais)) {
                return redirect()->intended(route('index'));
            } else {
                return redirect()->route('login')
                    ->withErrors(['login' => 'Usuário ou senha inválidos.']);
            }
        }

        return view('usuarios.login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }

    /**
     * Valida os dados do formulário de usuário.
     */
    private function validateDados(Request $form) {
        return $form->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:usuarios,email,' . ($form->id ?? 'NULL'),
            'username' => 'required|min:3|max:255',
            'password' => $form->isMethod('POST') ? 'required|min:3' : 'nullable|min:3',
            'admin' => 'boolean'
        ]);
    }
}
