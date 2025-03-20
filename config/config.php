<!-- Definimos una variable global con la URL base
 en un archivo config.php y luego la usaremos en el header.php-->
<?php
define('BASE_URL', 'http://localhost/mood-tracker/');
?>
<!-- Se asegura de que BASE_URL funcione en cualquier archivo del proyecto, 
 sin importar desde dónde se incluya header.php.-->