<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'samd2704',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>