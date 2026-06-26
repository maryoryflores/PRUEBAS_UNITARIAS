<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Habitacion;
use InvalidArgumentException;
use Exception;

/**
 * @covers \App\Habitacion
 * @group habitacion
 */
class HabitacionTest extends TestCase {

    public function testNumeroCero(): void {
        $this->expectException(InvalidArgumentException::class);
        new Habitacion(0, "Simple", 100.0);
    }

    public function testNumeroNegativo(): void {
        $this->expectException(InvalidArgumentException::class);
        new Habitacion(-5, "Simple", 100.0);
    }

    public function testPrecioCero(): void {
        $this->expectException(InvalidArgumentException::class);
        new Habitacion(101, "Simple", 0.0);
    }

    public function testPrecioNegativo(): void {
        $this->expectException(InvalidArgumentException::class);
        new Habitacion(101, "Simple", -50.0);
    }

    public function testReservaHabitacionDisponible(): void {
        $habitacion = new Habitacion(101, "Simple", 100.0);
        $this->assertTrue($habitacion->isDisponible());
        $habitacion->reservar(); 
        $this->assertFalse($habitacion->isDisponible());
    }

    public function testReservaHabitacionNoDisponible(): void {
        $habitacion = new Habitacion(101, "Simple", 100.0);
        $habitacion->reservar(); 

        $this->expectException(Exception::class);
        $habitacion->reservar(); 
    }
}