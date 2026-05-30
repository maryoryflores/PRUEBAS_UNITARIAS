<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase {

    public function testSumar() {
        $calculadora = new Calculadora();
        $resultado = $calculadora->sumar(2, 3);
        $this->assertEquals(5, $resultado);
    }

    public function testRestar() {
        $calculadora = new Calculadora();
        $resultado = $calculadora->restar(4, 5);
        $this->assertEquals(-1, $resultado);
    }

    public function testMultiplicar() {
        $calculadora = new Calculadora();
        $resultado = $calculadora->multiplicar(10, 2);
        $this->assertEquals(20, $resultado);
    }

    public function testDividirEntreCero() {
        $this->expectException(\Exception::class);
        $calculadora = new Calculadora();
        $calculadora->dividir(10, 0);
    }
}