# Sistema de Reservas de Hotel - Pruebas Unitarias

Este proyecto es una práctica de laboratorio correspondiente a la **Semana 12** de la Unidad Didáctica de Pruebas Unitarias. Su objetivo principal es aplicar validaciones robustas (manejo de excepciones frente a casos límite) en un sistema de reservas de hotel y auditar su comportamiento mediante pruebas unitarias estructuradas con **PHPUnit 10+**.

## 🚀 Características del Proyecto

El sistema está dividido en las siguientes entidades dentro de `src/`:
- Cliente:Validación de nombres no vacíos y formato correcto de correo electrónico.
- Habitacion:Control de números y precios estrictamente mayores a cero, y control de estados de disponibilidad de reserva.
- Reserva:Validación estricta de formatos de fecha (`YYYY-MM-DD`), bloqueo de ingresos en el pasado, impedimento de salidas previas al ingreso y cálculo automático del costo total.

## 🛠️ Requisitos e Instalación

Para descargar las dependencias del framework de pruebas, ejecuta el siguiente comando en la raíz del proyecto:

composer install