<?php
include ('database.php');

var_dump($_POST);

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen = $_POST['imagen'];

    $query = "UPDATE productos SET nombre = '$nombre', marca = '$marca', modelo = '$modelo', precio = $precio, detalles = '$detalles', unidades = $unidades, imagen = '$imagen' WHERE id = $id";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Producto actualizado correctamente']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al actualizar el producto']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID no proporcionado']);
}
?>