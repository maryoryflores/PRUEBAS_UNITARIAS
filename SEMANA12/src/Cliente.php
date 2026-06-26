<?php
namespace App;

use InvalidArgumentException;

class Cliente {
    private string $nombre;
    private string $email;
    private string $telefono;

    public function __construct(string $nombre, string $email, string $telefono) {
        // CP-01: Validar nombre vacío
        if (empty(trim($nombre))) {
            throw new InvalidArgumentException("El nombre no puede estar vacío.");
        }
        // CP-02: Validar formato de email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("El formato del email es inválido.");
        }

        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getEmail(): string {
        return $this->email;
    }
}