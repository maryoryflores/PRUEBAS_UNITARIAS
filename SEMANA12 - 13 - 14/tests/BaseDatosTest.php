<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\BaseDatos;

/**
 * @group basedatos
 * @covers \App\BaseDatos
 */
class BaseDatosTest extends TestCase
{
    private $baseDatos;

    /**
     * Ejercicio 1: Se ejecuta UNA VEZ antes de TODAS las pruebas de la clase
     */
    public static function setUpBeforeClass(): void
    {
        echo "\n[INFO] Iniciando pruebas de base de datos...\n";
    }

    /**
     * Ejercicio 1: Se ejecuta UNA VEZ después de TODAS las pruebas de la clase
     */
    public static function tearDownAfterClass(): void
    {
        echo "[INFO] Finalizando pruebas de base de datos...\n";
    }

    /**
     * Se ejecuta antes de CADA prueba individual
     */
    protected function setUp(): void
    {
        $this->baseDatos = new BaseDatos();
    }

    /**
     * Se ejecuta después de CADA prueba individual
     */
    protected function tearDown(): void
    {
        $this->baseDatos->limpiar();
        $this->baseDatos = null;
    }

    public function testGuardarUsuario()
    {
        $resultado = $this->baseDatos->guardarUsuario('Juan Perez', 'juan@mail.com');
        $this->assertTrue($resultado);
    }

    public function testContarUsuarios()
    {
        $this->baseDatos->guardarUsuario('Ana Gomez', 'ana@mail.com');
        $this->baseDatos->guardarUsuario('Luis Torres', 'luis@mail.com');

        $total = $this->baseDatos->contarUsuarios();
        $this->assertEquals(2, $total);
    }

    /**
     * Ejercicio 2: Usuario con email vacío 
     */
    public function testGuardarUsuarioConEmailVacio()
    {
        $resultado = $this->baseDatos->guardarUsuario('Carlos Cruz', '');
        $this->assertFalse($resultado);
    }

    /**
     * Ejercicio 2: Usuario con nombre muy largo
     */
    public function testGuardarUsuarioConNombreMuyLargo()
    {
        $nombreLargo = str_repeat("A", 255);
        $resultado = $this->baseDatos->guardarUsuario($nombreLargo, 'largo@mail.com');
        $this->assertTrue($resultado);
    }

    /**
     * Ejercicio 2: Insertar 100 usuarios
     */
    public function testInsertar100Usuarios()
    {
        for ($i = 1; $i <= 100; $i++) {
            $this->baseDatos->guardarUsuario("Usuario $i", "user$i@mail.com");
        }
        
        $total = $this->baseDatos->contarUsuarios();
        $this->assertEquals(100, $total);
    }
}