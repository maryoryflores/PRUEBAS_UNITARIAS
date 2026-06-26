# Plan de Pruebas Unitarias - Sistema de Reservas de Hotel

**Elaborado por:** Tech Lead

**Fecha:** 22/06/2026

**Responsable de ejecución:** QA - [Nombre del estudiante]

## 1. Alcance de las pruebas

### Se prueba:
- Creación de clientes (nombre, email, teléfono)
- Creación de habitaciones (número, tipo, precio)
- Reserva de habitaciones (disponibilidad)
- Cálculo de totales (días de estadía)
- Validaciones de fechas (ingreso, salida)

### No se prueba:
- Interfaz de usuario (frontend)
- Conexión a base de datos

## 2. Objetivos de las pruebas
- Verificar que los clientes no se creen con datos inválidos
- Verificar que las habitaciones no se reserven si no están disponibles
- Verificar que las fechas sean válidas
- Verificar que el total se calcule correctamente

## 3. Estrategia de pruebas
- **Tipo:** Pruebas unitarias
- **Herramientas:** PHPUnit 11+
- **Enfoque:** Casos límite y validaciones

## 4. Casos de prueba identificados

| ID | Clase | Método | Caso de prueba | Datos de entrada | Resultado esperado |
|:---|:---|:---|:---|:---|:---|
| CP-01 | Cliente | __construct | Nombre vacío | nombre = "" | Lanza InvalidArgumentException |
| CP-02 | Cliente | __construct | Email inválido | email = "invalido" | Lanza InvalidArgumentException |
| CP-03 | Habitacion | __construct | Número cero | numero = 0 | Lanza InvalidArgumentException |
| CP-04 | Habitacion | __construct | Precio cero | precio = 0 | Lanza InvalidArgumentException |
| CP-05 | Habitacion | reservar | Habitación disponible | - | Cambia disponibilidad a false |
| CP-06 | Habitacion | reservar | Habitación no disponible | - | Lanza Exception |
| CP-07 | Reserva | __construct | Fecha ingreso inválida | fecha = "invalida" | Lanza InvalidArgumentException |
| CP-08 | Reserva | __construct | Fecha ingreso en pasado | fecha = "2020-01-01" | Lanza InvalidArgumentException |
| CP-09 | Reserva | __construct | Fecha salida anterior | salida < ingreso | Lanza InvalidArgumentException |
| CP-10 | Reserva | calcularTotal | 3 días de estadía | ingreso=2025-01-01, salida=2025-01-04 | Total = precio * 3 |

## 5. Criterios de salida
- Todas las pruebas pasando OK
- Cobertura de casos límite
- Documentación con PHPDoc