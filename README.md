## Instalación

 1. Descargar o clonar el repositorio en la carpeta laragon/www dentro de una carpeta vacia.
 2. Abrir Laragon y crear el subdominio local para el proyecto
 3. Abrir HeidiSql o phpmyadmin y crear una base de datos vacia
 4. Abrir el proyecto en VS code o otro editor de preferencia.
 5. Crear un archivo .env configurando nombre de dominio, url y crendenciales de la base de datos
 6. En la terminal ubicarse en la ruta del proyecto y ejecutar el comando composer install (debe tener intalado y seleccionada la version php 8)
 7. Para modificar cc y js, debe instalar npm_modules con el comando npm install
 8. Para colocar en modo produccción el procesamiento de css y js, se utiliza el comando npm run watch
 9. Para mandar a producccion se ejecuta el comando npm run production 
