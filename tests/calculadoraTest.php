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
        $resultado = $calculadora->restar(10, 5);

        $this->assertEquals(5, $resultado);
    }

    public function testMultiplicar() {
        $calculadora = new Calculadora();
        $resultado = $calculadora->multiplicar(5, 4);

        $this->assertEquals(20, $resultado);
    }

    public function testDividirEntreCero() {
        $this->expectException(\Exception::class);

        $calculadora = new Calculadora();
        $calculadora->dividir(10, 0);
    }

    // Ejercicio 01
    public function testEsPar() {
        $calculadora = new Calculadora();

        $this->assertTrue($calculadora->esPar(2));
        $this->assertTrue($calculadora->esPar(10));
        $this->assertFalse($calculadora->esPar(5));
    }

    // Ejercicio 02
    public function testEsPositivo() {
        $calculadora = new Calculadora();

        $this->assertTrue($calculadora->esPositivo(8));
        $this->assertTrue($calculadora->esPositivo(1));
        $this->assertFalse($calculadora->esPositivo(-5));
        $this->assertFalse($calculadora->esPositivo(0));
    }

    // Ejercicio 03
    public function testEsNegativo() {
        $calculadora = new Calculadora();

        $this->assertTrue($calculadora->esNegativo(-3));
        $this->assertTrue($calculadora->esNegativo(-20));
        $this->assertFalse($calculadora->esNegativo(5));
        $this->assertFalse($calculadora->esNegativo(0));
    }

    // Ejercicio 04
    public function testEsCero() {
        $calculadora = new Calculadora();

        $this->assertTrue($calculadora->esCero(0));
        $this->assertFalse($calculadora->esCero(7));
        $this->assertFalse($calculadora->esCero(-1));
    }
}