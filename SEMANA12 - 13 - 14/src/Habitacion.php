<?php

namespace App;

use InvalidArgumentException;
use Exception;

class Habitacion
{
    private int $numero;
    private string $tipo;
    private float $precio;
    private bool $disponible;

    public function __construct(int $numero, string $tipo, float $precio)
    {
        // CP-03
        if ($numero <= 0) {
            throw new InvalidArgumentException("Número de habitación inválido.");
        }

        // CP-04
        if ($precio <= 0) {
            throw new InvalidArgumentException("Precio inválido.");
        }

        $this->numero = $numero;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->disponible = true;
    }

    // CP-05 y CP-06
    public function reservar(): void
    {
        if (!$this->disponible) {
            throw new Exception("La habitación ya está reservada.");
        }

        $this->disponible = false;
    }

    public function isDisponible(): bool
    {
        return $this->disponible;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }
}