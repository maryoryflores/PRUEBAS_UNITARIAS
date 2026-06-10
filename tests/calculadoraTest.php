<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Calculadora;

class CalculadoraTest extends TestCase 
{
    private $calculadora;
    
    protected function setUp(): void
    {
        $this->calculadora = new Calculadora();
    }


    // PROVEEDORES//
    
    public static function proveedorSuma(): array
    {
        return [
            [8, 2, 10],
            [0, 0, 0],
            [-8, 2, -6], 
            [200, 400, 600],
        ];
    }

    public static function proveedorResta(): array
    {
        return [
            [8, 2, 6],
            [6, 8, -2],  
            [0, 6, -6],
            [200, 100, 100],
        ];
    }

    public static function proveedorMultiplicacion(): array
    {
        return [
            [8, 2, 16],
            [5, 0, 0],
            [-5, 3, -15],
            [10, 10, 100],
        ];
    }

    public static function proveedorDivision(): array
    {
        return [
            [14, 2, 7, false],
            [9, 2, 4.5, false],
            [0, 6, 0, false],
            [20, 0, null, true], 
        ];
    }


    // PRUEBAS//
    
    #[DataProvider('proveedorSuma')]
    public function testSumar($a, $b, $esperado) 
    {
        $resultado = $this->calculadora->sumar($a, $b);
        $this->assertEquals($esperado, $resultado);
    }

    #[DataProvider('proveedorResta')]
    public function testRestar($a, $b, $esperado) 
    {
        $resultado = $this->calculadora->restar($a, $b);
        $this->assertEquals($esperado, $resultado);
    }

    #[DataProvider('proveedorMultiplicacion')]
    public function testMultiplicar($a, $b, $esperado) 
    {
        $resultado = $this->calculadora->multiplicar($a, $b);
        $this->assertEquals($esperado, $resultado);
    }

    #[DataProvider('proveedorDivision')]
    public function testDividir($a, $b, $esperado, $expectException)
    {
        if ($expectException) {
            // CAMBIADO: Ahora espera \Exception::class para coincidir con tu Calculadora.php
            $this->expectException(\Exception::class);
            $this->calculadora->dividir($a, $b);
        } else {
            $resultado = $this->calculadora->dividir($a, $b);
            $this->assertEquals($esperado, $resultado);
        }
    
    }
}