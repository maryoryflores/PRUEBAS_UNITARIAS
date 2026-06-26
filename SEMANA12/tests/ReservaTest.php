<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Cliente;
use App\Habitacion;
use App\Reserva;
use InvalidArgumentException;

/**
 * @covers \App\Reserva
 * @group reserva
 */
class ReservaTest extends TestCase {

    public function testFechaIngresoInvalida(): void {
        $cliente = new Cliente("Maryory Flores", "maryory@test.com", "926849164");
        $habitacion = new Habitacion(101, "Simple", 100.0);

        $this->expectException(InvalidArgumentException::class);
        // CP-07: Envía un formato de texto incorrecto en lugar de YYYY-MM-DD
        new Reserva($cliente, $habitacion, "formato-invalido", "2026-12-30");
    }

    public function testFechaIngresoPasado(): void {
        $cliente = new Cliente("Maryory Flores", "maryory@test.com", "926849164");
        $habitacion = new Habitacion(101, "Simple", 100.0);

        $this->expectException(InvalidArgumentException::class);
        // CP-08: Envía una fecha del pasado
        new Reserva($cliente, $habitacion, "2020-01-01", "2026-12-30");
    }

    public function testFechaSalidaAnterior(): void {
        $cliente = new Cliente("Maryory Flores", "maryory@test.com", "926849164");
        $habitacion = new Habitacion(101, "Simple", 100.0);

        $this->expectException(InvalidArgumentException::class);
        // CP-09: La fecha de salida es previa a la de ingreso
        new Reserva($cliente, $habitacion, "2026-07-10", "2026-07-05");
    }

    public function testCalcularTotal(): void {
        $cliente = new Cliente("Maryory Flores", "maryory@test.com", "926849164");
        $habitacion = new Habitacion(101, "Simple", 100.0); 

        // CP-10: Estancia de 3 días (del 10 al 13 de Julio de 2026)
        $reserva = new Reserva($cliente, $habitacion, "2026-07-10", "2026-07-13");
        
        $this->assertEquals(300.0, $reserva->calcularTotal());
    }
}