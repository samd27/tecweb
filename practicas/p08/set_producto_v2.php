<?php
$nombre   = $_POST['nombre'];
$marca    = $_POST['marca'];
$modelo   = $_POST['modelo'];
$precio   = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen'];

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'samd2704', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}
$repNom = $link->query("SELECT * FROM productos WHERE nombre = '{$nombre}' AND marca = '{$marca}' AND modelo = '{$modelo}'");
if ($repNom->num_rows > 0) 
{
    echo 'El Producto ya se encuentra registrado';
    die();
    
}

/** Crear una tabla que no devuelve un conjunto de resultados */
$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";
if ( $link->query($sql) ) 
{
    echo 'El Producto ha sido registrado exitosamente:<br/>';
    echo 'Nombre: ' . $nombre . '<br/>';
    echo 'Marca: ' . $marca . '<br/>';
    echo 'Modelo: ' . $modelo . '<br/>';
    echo 'Precio: ' . $precio . '<br/>';
    echo 'Detalles: ' . $detalles . '<br/>';
    echo 'Unidades: ' . $unidades . '<br/>';
    echo 'Imagen: ' . $imagen . '<br/>';
}
else
{
    echo 'El Producto no pudo ser insertado =(';
}

$link->close();
?>