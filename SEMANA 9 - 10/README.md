Pasos para clonar el repositorio y ejecutar el proyecto

Paso 1: Clonar el repositorio

Copiar el enlace del repositorio de GitHub y abrir una terminal o Git Bash. Luego ejecutar el siguiente comando:

git clone URL_DEL_REPOSITORIO

Por ejemplo:

git clone https://github.com/usuario/nombre-del-repositorio.git

Una vez finalizada la descarga, ingresar a la carpeta del proyecto:

cd nombre-del-repositorio

---

Paso 2: Abrir el proyecto

Abrir la carpeta del proyecto en Visual Studio Code mediante el comando:

code .

O abrirla manualmente desde Visual Studio Code seleccionando Archivo → Abrir carpeta.

---

Paso 3: Tener instalado Composer

Antes de ejecutar el proyecto, verificar que Composer esté instalado. Para comprobarlo, ejecutar:

composer --version

Si muestra la versión instalada, se puede continuar.

---

Paso 4: Instalar las dependencias del proyecto

Importante: Este repositorio no incluye la carpeta "vendor", ya que no se sube a GitHub por tratarse de dependencias que pueden generarse automáticamente.

Por ello, después de clonar el proyecto es obligatorio ejecutar:

composer install

Este comando descargará e instalará todas las librerías necesarias y creará la carpeta "vendor".

---

Paso 5: Actualizar el autoload de Composer

Una vez instaladas las dependencias, ejecutar:

composer dump-autoload

Este comando actualiza el autoload para que las clases del proyecto sean reconocidas correctamente.

---

Paso 6: Verificar que la carpeta "vendor" fue creada

Después de ejecutar "composer install", comprobar que dentro del proyecto exista la carpeta:

vendor/

Si la carpeta fue creada correctamente, el proyecto ya cuenta con todas las dependencias necesarias.

---

Paso 7: Ejecutar las pruebas

Finalmente, para comprobar que todo funciona correctamente, ejecutar:

vendor/bin/phpunit tests

Si la configuración es correcta, PHPUnit ejecutará las pruebas del proyecto y mostrará los resultados correspondientes.

Nota importante

Debido a que la carpeta "vendor" no está incluida en el repositorio, cualquier persona que clone el proyecto deberá ejecutar primero:

composer install

De lo contrario, el proyecto no podrá ejecutarse ni será posible realizar las pruebas, ya que faltarán las dependencias necesarias.