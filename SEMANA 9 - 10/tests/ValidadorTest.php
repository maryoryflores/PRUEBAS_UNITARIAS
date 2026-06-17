<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Validador;

class ValidadorTest extends TestCase
{
    private $validador;

    protected function setUp(): void
    {
        $this->validador = new Validador();
    }

    // PROVEEDORES//

    public static function proveedorEsPar(): array
    {
        return [
            [6, true],
            [3, false],
            [0, true],
            [-4, true],
        ];
    }

    public static function proveedorEsPositivo(): array
    {
        return [
            [20, true],
            [0, false],
            [-7, false],
        ];
    }

    public static function proveedorEsNegativo(): array
    {
        return [
            [-9, true],
            [0, false],
            [3, false],
        ];
    }


    // PRUEBAS//

    #[DataProvider('proveedorEsPar')]
    public function testEsPar($numero, $esperado)
    {
        $resultado = $this->validador->esPar($numero);
        $this->assertEquals($esperado, $resultado);
    }

    #[DataProvider('proveedorEsPositivo')]
    public function testEsPositivo($numero, $esperado)
    {
        $resultado = $this->validador->esPositivo($numero);
        $this->assertEquals($esperado, $resultado);
    }

    #[DataProvider('proveedorEsNegativo')]
    public function testEsNegativo($numero, $esperado)
    {
        $resultado = $this->validador->esNegativo($numero);
        $this->assertEquals($esperado, $resultado);
    }
}