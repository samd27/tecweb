<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if (!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JSON A OBJETO
        $jsonOBJ = json_decode($producto);

        // ASIGNAR VARIABLES SIN LIMPIAR
        $nombre   = $jsonOBJ->nombre;
        $marca    = $jsonOBJ->marca;
        $modelo   = $jsonOBJ->modelo;
        $precio   = (float)$jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = (int)$jsonOBJ->unidades;
        $imagen   = $jsonOBJ->imagen;

        // VALIDAR SI EL PRODUCTO YA EXISTE
        $query = "SELECT * FROM productos WHERE (nombre = '{$nombre}' AND marca = '{$marca}' AND eliminado = 0) OR (marca = '{$marca}' AND modelo = '{$modelo}' AND eliminado = 0)";
        $result = $conexion->query($query);

        if ($result->num_rows > 0) {
            echo json_encode(['status' => 'error', 'message' => 'El Producto ya se encuentra registrado']);
        } else {
            // INSERTAR EL PRODUCTO
            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
                    VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";

            if ($conexion->query($sql)) {
                echo json_encode(['status' => 'success', 'message' => 'El Producto ha sido registrado exitosamente']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'El Producto no pudo ser insertado']);
            }
        }

        $conexion->close();
    }
?>