<?php
include ('database.php');

$rawData = file_get_contents("php://input");
$producto = json_decode($rawData, true);

$response = array(
    'status'  => 'error',
    'message' => 'ID no proporcionado'
);
if (isset($producto['id'])) {
    $id = $producto['id'];
    $nombre = $producto['nombre'];
    $marca = $producto['marca'];
    $modelo = $producto['modelo'];
    $precio = $producto['precio'];
    $detalles = $producto['detalles'];
    $unidades = $producto['unidades'];
    $imagen = $producto['imagen'];

    $query = "UPDATE productos SET nombre = '$nombre', marca = '$marca', modelo = '$modelo', precio = $precio, detalles = '$detalles', unidades = $unidades, imagen = '$imagen' WHERE id = $id";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        if (mysqli_affected_rows($conexion) > 0) {
            $response['status'] = 'success';
            $response['message'] = 'Producto actualizado correctamente';
        } else {
            $response['message'] = 'No se realizaron cambios en el producto';
        }
    } else {
        $response['message'] = 'Error al actualizar el producto: ' . mysqli_error($conexion);
    }
}

// Cierra la conexion
$conexion->close();
echo json_encode($response, JSON_PRETTY_PRINT);
?>