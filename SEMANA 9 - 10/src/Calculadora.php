<?php

namespace App;

class Calculadora {

    public function sumar($a, $b) {
        return $a + $b;
    }

    public function restar($a, $b) {
        return $a - $b;
    }

    public function multiplicar($a, $b) {
        return $a * $b;
    }

    public function dividir($a, $b) {
        if ($b == 0) {
            throw new \Exception("No se puede dividir entre cero");
        }

        return $a / $b;
    }

    // Semana 08
    public function esPar($numero) {
        return $numero % 2 == 0;
    }

    public function esPositivo($numero) {
        return $numero > 0;
    }

    public function esNegativo($numero) {
        return $numero < 0;
    }

    public function esCero($numero) {
        return $numero == 0;
    }
}