<?php
    $nombre   = $_POST['nombre'];
    $marca    = $_POST['marca'];
    $modelo   = $_POST['modelo'];
    $precio   = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen   = $_POST['imagen'];
    $id       = $_POST['id'];
    
    /* MySQL Conexion*/
    @$link = new mysqli('localhost', 'root', 'samd2704', 'marketzone');	
    // Chequea coneccion
    if($link === false){
    die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
    }
    // Se actualiza el campo 'email' de la tabla 'personas' donde el 'id' es 3
    $sql = "UPDATE productos SET 
            nombre='$nombre', 
            marca='$marca', 
            modelo='$modelo', 
            precio='$precio', 
            detalles='$detalles', 
            unidades='$unidades', 
            imagen='$imagen' 
            WHERE id='$id'"
    ;
    if(mysqli_query($link, $sql)){
    echo "Registro actualizado.";
    echo "<br><a href='get_productos_xhtml_v2.php'>Ver productos en XHTML</a>";
    echo "<br><a href='get_productos_vigentes_v2.php'>Ver productos vigentes</a>";
    } else {
    echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
    }
    // Cierra la conexion
    mysqli_close($link);
?>