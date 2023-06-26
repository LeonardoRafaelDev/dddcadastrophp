<?php

namespace App\Domain\Usuarios;

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __construct(string $id, string $nome, string $email, string $senha)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function validarSenha(string $senha): bool
    {
        return $this->senha === $senha;
    }
}
