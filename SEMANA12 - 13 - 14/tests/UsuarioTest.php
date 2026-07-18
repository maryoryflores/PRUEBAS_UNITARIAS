<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Usuario;

/**
 * @group usuario
 * @covers \App\Usuario
 */
class UsuarioTest extends TestCase
{
    // ==========================================
    // PRUEBAS DE LA GUÍA BASE
    // ==========================================

    public function testGetNombre()
    {
        $usuario = new Usuario('Alberto Perez', 'alberto@mail.com', 25);
        $this->assertEquals('Alberto Perez', $usuario->getNombre());
    }

    public function testGetEmail()
    {
        $usuario = new Usuario('Alberto Perez', 'alberto@mail.com', 25);
        $this->assertEquals('alberto@mail.com', $usuario->getEmail());
    }

    public function testGetEdad()
    {
        $usuario = new Usuario('Alberto Perez', 'alberto@mail.com', 25);
        $this->assertEquals(25, $usuario->getEdad());
    }

    public function testEsMayorDeEdadConEdadValida()
    {
        $usuario = new Usuario('Alberto Perez', 'alberto@mail.com', 25);
        $this->assertTrue($usuario->esMayorDeEdad());
    }

    public function testEsMayorDeEdadConEdadInvalida()
    {
        $usuario = new Usuario('Ana Gomez', 'ana@mail.com', 16);
        $this->assertFalse($usuario->esMayorDeEdad());
    }

    public function testEsMayorDeEdadConEdadCero()
    {
        $usuario = new Usuario('Luis Torres', 'luis@mail.com', 0);
        $this->assertFalse($usuario->esMayorDeEdad());
    }

    public function testUsuarioValido()
    {
        $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $this->assertTrue($usuario->esValido());
    }

    public function testUsuarioInvalido()
    {
        $usuario = new Usuario('', '', 0);
        $this->assertFalse($usuario->esValido());
    }

    public function testUsuarioEsInstancia()
    {
        $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $this->assertInstanceOf(Usuario::class, $usuario);
    }

    public function testUsuarioNoEsInstanciaDeOtraClase()
    {
        $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $this->assertNotInstanceOf(\Exception::class, $usuario);
    }

    public function testGetNombreConAssertSame()
    {
        $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $this->assertSame('Juan Perez', $usuario->getNombre());
    }

    public function testGetEdadConAssertSame()
    {
        $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $this->assertSame(25, $usuario->getEdad());
    }

    public function testAssertSameConTiposDiferentes()
    {
        $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $this->assertEquals(25, $usuario->getEdad());
        $this->assertSame(25, $usuario->getEdad());
        $this->assertNotSame("25", $usuario->getEdad());
    }

    public function testUsuarioNoEsNull()
    {
        $usuario = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $this->assertNotNull($usuario);
    }

    public function testCompararObjetosIguales()
    {
        $usuario1 = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $usuario2 = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $this->assertEquals($usuario1, $usuario2);
    }

    public function testCompararObjetosDiferentes()
    {
        $usuario1 = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $usuario2 = new Usuario('Ana Gomez', 'ana@mail.com', 30);
        $this->assertNotEquals($usuario1, $usuario2);
    }

    public function testCompararMismoObjeto()
    {
        $usuario1 = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $usuario2 = $usuario1;
        $this->assertSame($usuario1, $usuario2);
    }

    public function testCompararObjetosDiferentesConAssertSame()
    {
        $usuario1 = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $usuario2 = new Usuario('Juan Perez', 'juan@mail.com', 25);
        $this->assertNotSame($usuario1, $usuario2);
    }

    // ==========================================
    // EJERCICIOS A DESARROLLAR
    // ==========================================

    // Ejercicio 1: Verificar si un array contiene o no un elemento
    public function testArrayContieneElemento()
    {
        $numeros = [1, 2, 3, 4, 5];
        $this->assertContains(3, $numeros);
        $this->assertNotContains(6, $numeros);
    }

    // Ejercicio 2: Verificar el número de elementos de un array
    public function testArrayTieneTresElementos()
    {
        $numeros = [1, 2, 3];
        $this->assertCount(3, $numeros);
    }

    // Ejercicio 3: Verificar si el array está vacío o lleno
    public function testArrayEstaVacio()
    {
        $vacio = [];
        $this->assertEmpty($vacio);
    }

    public function testArrayNoEstaVacio()
    {
        $numeros = [1, 2, 3];
        $this->assertNotEmpty($numeros);
    }

    // Ejercicio 4: Alertas o mensajes personalizados de error
    public function testGetNombreConMensaje()
    {
        $usuario = new Usuario('Alberto Perez', 'alberto@mail.com', 25);
        $this->assertEquals('Alberto Perez', $usuario->getNombre(), 'El nombre no coincide con el esperado');
    }
}