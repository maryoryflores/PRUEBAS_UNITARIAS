<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Cliente;
use InvalidArgumentException;

/**
 * @covers \App\Cliente
 * @group cliente
 */
class ClienteTest extends TestCase {

    public function testNombreVacio(): void {
        $this->expectException(InvalidArgumentException::class);
        new Cliente("", "maryory@test.com", "926849164");
    }

    public function testEmailInvalido(): void {
        $this->expectException(InvalidArgumentException::class);
        new Cliente("Maryory Flores", "email_incorrecto", "926849164");
    }
}