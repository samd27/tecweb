<?php
include_once __DIR__.'/database.php';

$response = array('exists' => false);

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $sql = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
    if ($result = $conexion->query($sql)) {
        if ($result->num_rows > 0) {
            $response['exists'] = true;
        }
        $result->free();
    } else {
        die('Query Error: '.mysqli_error($conexion));
    }
    $conexion->close();
}

echo json_encode($response);
?>