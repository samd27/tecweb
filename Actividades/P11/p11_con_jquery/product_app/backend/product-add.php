<?php
    include_once __DIR__.'/database.php';

    $nombre   = $_POST['nombre'];
    $marca    = $_POST['marca'];
    $modelo   = $_POST['modelo'];
    $precio   = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen   = $_POST['imagen'];

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $data = array(
        'status'  => 'error',
        'message' => 'Ya existe un producto con ese nombre'
    );

    if(isset($nombre)) {
        $sql = "SELECT * FROM productos WHERE nombre = '$nombre' AND eliminado = 0";
        $result = $conexion->query($sql);
        
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO productos VALUES (null, '$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$imagen', 0)";
            if($conexion->query($sql)){
                $data['status'] =  "success";
                $data['message'] =  "Producto agregado";
            } else {
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
            }
        }
        $result->free();
        $conexion->close();
    }
      

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>