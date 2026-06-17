<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Validador;

class ValidadorTest extends TestCase
{
    private $validador;

    protected function setUp(): void
    {
        $this->validador = new Validador();
    }

    public function testValidarEdadNormal()
    {
        $this->assertTrue(
            $this->validador->validarEdad(20)
        );
    }

    public function testValidarEdadNegativa()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "La edad no puede ser un numero negativo"
        );

        $this->validador->validarEdad(-5);
    }

    public function testValidarEdadMenor()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(
            "Es menor de edad"
        );

        $this->validador->validarEdad(15);
    }

    public function testValidarEmailNormal()
    {
        $this->assertTrue(
            $this->validador->validarEmail("correo@gmail.com")
        );
    }

    public function testValidarEmailInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "El email ingresado no es válido"
        );

        $this->validador->validarEmail("correo_invalido");
    }

    public function testValidarPasswordNormal()
    {
        $this->assertTrue(
            $this->validador->validarPassword("Password123")
        );
    }

    public function testValidarPasswordCorta()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(
            "Contraseña demasiado corta"
        );

        $this->validador->validarPassword("abc");
    }

    public function testValidarPasswordSinNumero()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(
            "Debe contener al menos un número"
        );

        $this->validador->validarPassword("Password");
    }
}