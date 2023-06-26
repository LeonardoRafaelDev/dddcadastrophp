<?php

namespace App\Repositories;

use App\Domain\Usuarios\Usuario;
use Illuminate\Support\Facades\DB;

class UsuarioRepository
{
    public function create(Usuario $usuario): void
    {
        DB::table('usuarios')->insert([
            'id' => $usuario->getId(),
            'nome' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'senha' => $usuario->getSenha(),
        ]);
    }

    public function findByEmail(string $email): ?Usuario
    {
        $result = DB::table('usuarios')->where('email', $email)->first();

        if ($result === null) {
            return null;
        }

        return new Usuario(
            $result->id,
            $result->nome,
            $result->email,
            $result->senha
        );
    }
}
