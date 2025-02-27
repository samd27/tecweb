<!DOCTYPE html >
<html>

  <head>
    <meta charset="utf-8" >
    <title>Registro de productos</title>
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>
  </head>

  <body>
    <h1>Registro de Smarthphones</h1>

    <form id="formularioPhones" action="http://localhost/tecweb/practicas/p08/set_producto_v2.php" method="post">

    <fieldset>
      <legend>Actualiza los datos de este Smarthphone:</legend>

        <li><label for="form-nombre">Nombre:</label> <input type="text" name="nombre" id="form-nombre" value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"></li>
        <script>
          document.getElementById('formularioPhones').addEventListener('submit', function(event) {
            var nombre = document.getElementById('form-nombre').value;
            if (nombre.length > 100 || nombre.trim() === '') {
              alert('El nombre es requerido y debe tener una longitud máxima de 100 caracteres.');
              event.preventDefault();
            }
          });
        </script>
        
        <li>
          <label for="form-marca">Marca: </label>
          <select name="marca" id="form-marca">
            <option value="">Seleccione una marca</option>
            <option value="Samsung">Samsung</option>
            <option value="Apple">Apple</option>
            <option value="Pixel">Pixel</option>
            <option value="Xiaomi">Xiaomi</option>
          </select>
        </li>
        <script>
          document.getElementById('formularioPhones').addEventListener('submit', function(event) {
            var marca = document.getElementById('form-marca').value;
            if (marca.trim() === '') {
              alert('La marca es requerida.');
              event.preventDefault();
            }
          });
        </script>

        <li><label for="form-modelo">Modelo:</label> <input type="text" name="modelo" id="form-modelo" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"></li>
        <script>
          document.getElementById('formularioPhones').addEventListener('submit', function(event) {
            var modelo = document.getElementById('form-modelo').value;
            if (modelo.length > 25 || modelo.trim() === '' || !/^[a-zA-Z0-9]+$/.test(modelo)) {
              alert('El modelo es requerido, debe tener una longitud maxima de 25 caracteres y debe de ser alfanumerico.');
              event.preventDefault();
            }
          });
        </script>

        <li><label for="form-precio">Precio:</label> <input type="number" name="precio" id="form-precio" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"></li>
        <script>
          document.getElementById('formularioPhones').addEventListener('submit', function(event) {
            var precio = document.getElementById('form-precio').value;
            if (precio.trim() === '' || precio.trim() < 99.99) {
              alert('El precio es requerido y debe de ser mayor a 99.99.');
              event.preventDefault();
            }
          });
        </script>

        <li>
          <label for="form-detalles">Detalles (opcional):</label><br>
          <textarea name="detalles" rows="4" cols="60" id="form-detalles"> <?= !empty($_POST['detalles'])?$_POST['detalles']:$_GET['detalles'] ?>"</textarea>
        </li>
        <script>
          document.getElementById('formularioPhones').addEventListener('submit', function(event) {
            var detalles = document.getElementById('form-detalles').value;
            if (detalles.length > 250) {
              alert('Los detalles no deben de exceder los 250 caracteres.');
              event.preventDefault();
            }
          });
        </script>

        <li><label for="form-unidades">Unidades:</label> <input type="number" name="unidades" id="form-unidades" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"></li>
        <script>
          document.getElementById('formularioPhones').addEventListener('submit', function(event) {
            var unidades = document.getElementById('form-unidades').value;
            if (unidades.trim() === '' || unidades.trim() < 0) {
              alert('El numero de unidades es requerido y debe de ser mayor o igual a 0.');
              event.preventDefault();
            }
          });
        </script>

         <script>
          document.getElementById('formularioPhones').addEventListener('submit', function(event) {
            var marca = document.getElementById('form-marca').value;
            if (marca.trim() === '') {
              alert('La marca es requerida.');
              event.preventDefault();
            }
          });
        </script>
        
        <li>
          <label for="form-imagen">Imagen:</label>
          <input type="text" name="imagen" id="form-imagen" value="<?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?>">
        </li>
        <script>
          document.getElementById('formularioPhones').addEventListener('submit', function(event) {
            var imagenInput = document.getElementById('form-imagen');
            if (imagenInput.value.trim() === '') {
              imagenInput.value = 'img/imagen.png';
            }
          });
        </script>

    </fieldset>

      <p>
        <input type="submit" value="Ingresar a la BD">
        <input type="reset">
      </p>

    </form>
  </body>
</html>