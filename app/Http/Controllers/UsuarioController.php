<?php

namespace App\Http\Controllers;

use App\Domain\Services\CadastroUsuarioService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UsuarioController extends Controller
{
    private $cadastroUsuarioService;

    public function __construct(CadastroUsuarioService $cadastroUsuarioService)
    {
        $this->cadastroUsuarioService = $cadastroUsuarioService;
    }

    public function cadastrar(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'senha' => 'required|string|min:6',
        ]);

        try {
            $this->cadastroUsuarioService->cadastrarUsuario(
                $data['nome'],
                $data['email'],
                $data['senha']
            );

            return response()->json(['message' => 'Usuário cadastrado com sucesso']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
