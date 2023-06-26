<?php

namespace App\Domain\Services;

use App\Domain\Usuarios\Usuario;
use App\Repositories\UsuarioRepository;

class CadastroUsuarioService
{
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function cadastrarUsuario(string $nome, string $email, string $senha): void
    {
        if ($this->usuarioRepository->findByEmail($email) !== null) {
            throw new \Exception('Usuário com o email fornecido já existe');
        }

        $usuario = new Usuario(
            uniqid(),
            $nome,
            $email,
            $senha
        );

        $this->usuarioRepository->create($usuario);
    }
}
