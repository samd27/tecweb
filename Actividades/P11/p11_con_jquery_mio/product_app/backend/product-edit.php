<?php
include_once __DIR__.'/database.php';

$nombre   = $_POST['nombre'];
$marca    = $_POST['marca'];
$modelo   = $_POST['modelo'];
$precio   = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen'];
$id       = $_POST['id'];

// SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
$data = array(
    'status'  => 'error',
    'message' => 'La consulta falló'
);

// SE VERIFICA HABER RECIBIDO EL ID
if (isset($nombre)) {
    $sql = "SELECT * FROM productos WHERE nombre = '$nombre' AND eliminado = 0";
    $result = $conexion->query($sql);

    if ($result->num_rows == 0) {
        $sql = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', precio='$precio', detalles='$detalles', unidades='$unidades', imagen='$imagen' WHERE id = $id";
        if ($conexion->query($sql)) {
            $data['status'] = "success";
            $data['message'] = "Producto actualizado";
        } else {
            $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
        }
    } else {
        $data['message'] = "Ya existe un producto con ese nombre";
    }
    $result->free();
    $conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);
?>