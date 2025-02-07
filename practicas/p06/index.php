<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php

        require_once __DIR__ .'/src/funciones.php';

        if(isset($_GET['numero']))
        {
            es_multiplo7y5($_GET['numero']);
            
        }
    ?>

  
    <!-- <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p06/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?> 
    -->


    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una <br> secuencia compuesta por: impar, par, impar.</p>
    <?php
        require_once __DIR__ .'/src/funciones.php';

        impar_par_impar();
    ?>

    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además <br> sea múltiplo de un número dado. El número dado se debe obtener vía GET.</p>

    <?php
        require_once __DIR__ .'/src/funciones.php';
        if (isset($_GET['numero']))
        {
            multiplo($_GET['numero']);

            echo '<p><strong>Crear una variante de este script utilizando el ciclo do-while.</strong></p>';
            multiploVariacion($_GET['numero']);
        }
        
    ?>

    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
    a la ‘z’. <br> Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
    el valor en cada índice.</p>
    <h4>Lee el arreglo y crea una tabla en XHTML con echo y un ciclo foreach</h4>
    
    <table border="3">
        <tr>
            <th>Índice</th>
            <th>Valor</th>
        </tr>
        <?php
            require_once __DIR__ . '/src/funciones.php';
            ascii();
        ?>
    </table>

    <h2>Ejercicio 5</h2>
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
    sexo “femenino”, <br >cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
    bienvenida apropiado.</p>
    <h4>Los valores para $edad y $sexo se deben obtener por medio de un formulario en
    HTML. <br> Utilizar el la Variable Superglobal $_POST.</h4>


    <form action="http://localhost/tecweb/practicas/p06/index.php" method="post">
    Sexo: 
    <select name="sexo">
        <option value="masculino">Masculino</option>
        <option value="femenino">Femenino</option>
    </select>
    <br>
    Edad: <input type="number" name="edad" min="0"><br>
    <input type="submit" value="Enviar">
    </form>


    <?php
        require_once __DIR__ . '/src/funciones.php';
        if(isset($_POST["sexo"]) && isset($_POST["edad"]))
        {
            rango_edad($_POST["edad"], $_POST["sexo"]);
        }
    ?>

</body>
</html>