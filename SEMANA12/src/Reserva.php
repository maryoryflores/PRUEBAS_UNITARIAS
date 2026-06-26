<?php

namespace App;

use InvalidArgumentException;
use DateTime;

class Reserva
{
    private Cliente $cliente;
    private Habitacion $habitacion;
    private string $fechaIngreso;
    private string $fechaSalida;

    public function __construct(
        Cliente $cliente,
        Habitacion $habitacion,
        string $fechaIngreso,
        string $fechaSalida
    ) {

        $ingreso = DateTime::createFromFormat('Y-m-d', $fechaIngreso);

        // CP-07
        if (!$ingreso || $ingreso->format('Y-m-d') !== $fechaIngreso) {
            throw new InvalidArgumentException("Fecha de ingreso inválida.");
        }

        $salida = DateTime::createFromFormat('Y-m-d', $fechaSalida);

        if (!$salida || $salida->format('Y-m-d') !== $fechaSalida) {
            throw new InvalidArgumentException("Fecha de salida inválida.");
        }

        // CP-08
        $hoy = new DateTime('today');

        if ($ingreso < $hoy) {
            throw new InvalidArgumentException("La fecha de ingreso no puede ser pasada.");
        }

        // CP-09
        if ($salida <= $ingreso) {
            throw new InvalidArgumentException("La fecha de salida debe ser posterior.");
        }

        $this->cliente = $cliente;
        $this->habitacion = $habitacion;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaSalida = $fechaSalida;
    }

    // CP-10
    public function calcularTotal(): float
    {
        $ingreso = new DateTime($this->fechaIngreso);
        $salida = new DateTime($this->fechaSalida);

        $dias = $ingreso->diff($salida)->days;

        return $dias * $this->habitacion->getPrecio();
    }
}