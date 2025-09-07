<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    // Lista todos os professores
    public function index()
    {
        return view('professores.index');
    }

    // Cadastra um novo professor
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|min:3|max:100',
            'email' => 'required|string|email|max:50|unique:professor,email',
            'senha' => 'required|string|min:8|max:100',
            'telefone' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
        ];

        $mensagens = [
            'nome.required' => 'O nome é obrigatório.',
            'nome.min' => 'O nome deve ter pelo menos :min caracteres.',
            'nome.max' => 'O nome não pode exceder :max caracteres.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Digite um email válido.',
            'email.unique' => 'Este email já está cadastrado.',
            'senha.required' => 'A senha é obrigatória.',
            'senha.min' => 'A senha deve ter no mínimo :min caracteres.',
        ];

        $request->validate($regras, $mensagens);

        $professor = Professor::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
        ]);

        return response()->json($professor, 201); //professor, estamos retornando no formato json para testar no postman!
    }

    // Mostra um professor específico
    public function show($id)
    {
        $professor = Professor::find($id);

        if (!$professor) {
            return response()->json(['message' => 'Professor não encontrado'], 404);
        }

        return response()->json($professor, 200);
    }

    // Atualiza um professor existente
    public function update(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);

        $professor->update([
            'nome' => $request->nome ?? $professor->nome,
            'email' => $request->email ?? $professor->email,
            'senha' => $request->senha ? bcrypt($request->senha) : $professor->senha,
            'telefone' => $request->telefone ?? $professor->telefone,
            'data_nascimento' => $request->data_nascimento ?? $professor->data_nascimento,
        ]);

        return response()->json($professor, 200);
    }

    // Deleta um professor
    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return response()->json(['message' => 'Professor deletado com sucesso'], 200);
    }
}
