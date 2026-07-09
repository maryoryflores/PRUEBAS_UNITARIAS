# Reporte de Pruebas Unitarias

**Fecha:** 22/06/2026
**Responsable:** [Nombre del estudiante]

## Resultados
- **Total de pruebas:** 10
- **Pruebas pasadas:** ___
- **Pruebas fallidas:** ___

## Errores encontrados y corregidos
1. Cliente: No validaba nombre vacío -> Se agregó validación
2. Cliente: No validaba email -> Se agregó `filter_var()`
3. Habitacion: No validaba número positivo -> Se agregó validación
4. Habitacion: No validaba precio positivo -> Se agregó validación
5. Habitacion: Permitía reservar no disponible -> Se agregó verificación
6. Reserva: No validaba fechas -> Se agregó validación de fechas
7. Reserva: Cálculo de días incorrecto -> Se implementó `DateTime::diff()`