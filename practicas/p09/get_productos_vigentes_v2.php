<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
    //header("Content-Type: application/json; charset=utf-8"); 
    $data = array();

		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', 'samd2704', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			//exit();
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE eliminado != 0") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada */
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = ($value);
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}

		$link->close();

        /** Se devuelven los datos en formato JSON */
        //echo json_encode($data, JSON_PRETTY_PRINT);
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function show() {
            // se obtiene el id de la fila donde está el botón presionado
            var rowId = event.target.parentNode.parentNode.id;
            // se obtienen los datos de la fila en forma de arreglo
            var data = document.getElementById(rowId).querySelectorAll(".row-data");

            var id = data[0].innerHTML;
            var name = data[1].innerHTML;
            var brand = data[2].innerHTML;
            var model = data[3].innerHTML;
            var price = data[4].innerHTML;
            var units = data[5].innerHTML;
            var details = data[6].innerHTML;
            var image = data[7].innerHTML;

            send2form(id, name, brand, model, price, units, details, image);
        }

        function send2form(id, name, brand, model, price, units, details, image) {
            var urlForm = "formulario_productos_v2.php";
            var propId = "id=" + id;
            var propName = "nombre=" + name;
			var propBrand = "marca=" + brand;
            var propModel = "modelo=" + model;
            var propPrice = "precio=" + price;
            var propUnits = "unidades=" + units;
            var propDetails = "detalles=" + details;
            var propImage = "imagen=" + image;
            window.open(urlForm + "?" + propId + "&" + propName + "&" + propBrand + "&" + propModel + "&" + propPrice + "&" + propUnits + "&" + propDetails + "&" + propImage);
        }
    </script>
</head>
<body>
    <h3>PRODUCTO</h3>
    <br/>
    <?php if (isset($row)) : ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $value) : ?>
                    <tr id="row-<?= $value['id'] ?>">
                        <th scope="row" class="row-data"><?= $value['id'] ?></th>
                        <td class="row-data"><?= $value['nombre'] ?></td>
                        <td class="row-data"><?= $value['marca'] ?></td>
                        <td class="row-data"><?= $value['modelo'] ?></td>
                        <td class="row-data"><?= $value['precio'] ?></td>
                        <td class="row-data"><?= $value['unidades'] ?></td>
                        <td class="row-data"><?= $value['detalles'] ?></td>
                        <td class="row-data"><img src="<?= $value['imagen'] ?>" style="height: 150px;"></td>
                        <td>
                            <input 
                                type="button" 
                                value="submit" 
                                onclick="show()"
                                style="background-color: #343a40; color: white; border: 1px solid #1d2124; padding: 8px 16px; border-radius: 5px; font-size: 16px; cursor: pointer; transition: background 0.3s ease;" 
                                onmouseover="this.style.backgroundColor='#23272b'" 
                                onmouseout="this.style.backgroundColor='#343a40'" 
                                onmousedown="this.style.backgroundColor='#1d2124'" 
                                onmouseup="this.style.backgroundColor='#23272b'" 
                            />
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (!empty($id)) : ?>
        <script>
            alert('El ID del producto no existe');
        </script>
    <?php endif; ?>
</body>
</html>