# Reporte de Pruebas Unitarias

Fecha:26/06/2026
Responsable:[FLORES VILA MIRIAM MARYORY]

## Resultados
- Total de pruebas:12
- Pruebas pasadas:12
- Pruebas fallidas:0

## Errores encontrados y corregidos
1. Cliente: No validaba nombre vacío -> Se agregó validación en constructor.
2. Cliente: No validaba email -> Se agregó `filter_var()` en constructor.
3. Habitacion: No validaba número positivo -> Se impidió el registro de números menores o iguales a cero.
4. Habitacion: No validaba precio positivo -> Se impidió el registro de montos menores o iguales a cero.
5. Habitacion: Permitía reservar no disponible -> Se añadió una excepción si la habitación ya fue reservada.
6. Reserva: No validaba fechas -> Se implementó parsing de formato estricto con `DateTime::createFromFormat`.
7. Reserva: Cálculo de días incorrecto -> Se corrigió el valor fijo reemplazándolo por `$ingreso->diff($salida)->days`.