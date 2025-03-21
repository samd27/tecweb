<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>
    <p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="XHTML 1.1 válido" height="31" width="88" /></a>
  </p>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>

    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue:</p>
    <p>$a = “ManejadorSQL”;</p>
    <p>$b = 'MySQL';</p>
    <p>$c = &amp;&amp;a;</p>
    <?php
        echo '<h4>a. Ahora muestra el contenido de cada variable</h4>';

        $a = "ManejadorSQL";
        $b = 'MySQL';
        @$c = &$a;

        echo '<p>$a = '.$a.'</p>';
        echo '<p>$b = '.$b.'</p>';
        echo '<p>$c = '.$c.'</p>';
        

        $a = "PHP server";
        $b = &$a;
        echo '<h4>b. Agrega al código actual las siguientes asignaciones:</h4>';
        echo '<p>$a = “PHP server”</p>';
        echo '<p>$b = ' . $b . ' (referencia a $a)</p>';


        echo '<h4>c. Ahora muestra el contenido de cada variable</h4>';    
        echo '<p>$a = '.$a.'</p>';
        echo '<p>$b = '.$b.'</p>';
        echo '<p>$c = '.$c.'</p>';
        
    
        echo '<h4>d. Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de
        asignaciones</h4>';

        echo '<p> En la segunda asignacion de variables se le dio el valor "PHP sever" a la variable "a" <br />
        y "b" comenzo a hacer referencia a "a". A su vez, "c" ya hacia referencia a "a", por lo que, las 3 variables <br />
        mostraron el mismo texto. </p>';
        unset($a, $b, $c);
    ?>

    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación, <br />
    verificar la evolución del tipo de estas variables (imprime todos los componentes de los
    arreglo):</p>

    <?php
        error_reporting(0);

        $a = "PHP5 ";
        echo '<p>$a = '.$a.'</p>';

        $z[] = &$a;
        echo '<p>$z[0] = '.$z[0].'</p>';
        
        $b = "5a version de PHP";
        echo '<p>$b = '.$b.'</p>';

        $c = $b*10;
        echo '<p>$c = '.$c.'</p>';
        
        $a .= $b;
        echo '<p>$a = '.$a.'</p>';
        
        $b *= $c;
        echo '<p>$b = '.$b.'</p>';
        
        $z[0] = "MySQL";
        echo '<p>'.json_encode($z).'</p>';
    ?>

    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de <br />
    la matriz $GLOBALS o del modificador global de PHP.</p>

    <?php
          global $a, $b, $c, $z;

          echo "<p>\$a = $a</p>";
          echo "<p>\$b = $b</p>";
          echo "<p>\$c = $c</p>";
          echo "<p>\$z = " . json_encode($z) . "</p>";

          unset($a, $b, $c, $z);
    ?>

    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script: </p>
    <?php
        $a = "7 personas";
        $b = (integer) $a;
        $a = "9E3";
        $c = (double) $a;


        echo '<ul>';
        echo '<li>$a termina con el valor 9E3 que es 9 x 10^3 o 9000.</li>';
        echo '<li>$b termina con el valor 7 porque se convirtió a entero y tomara 
            el valor entero que tenia $a.</li>';
        echo '<li>$c termina con el valor 9000.0 porque se convirtió a double 
            y tomara el valor de $a </li>';
        echo '</ul>';

        unset($a, $b, $c);
    ?>

    <h2>Ejercicio 6</h2>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
    usando la función var_dump(&lt;datos&gt;).</p>

    <?php
        $a = '0';
        $b = "TRUE";
        $c = "FALSE";
        $d = ($a OR $b);          
        $e = ($a AND $c);     
        $f = ($a XOR $b);         
        echo '<p>$a = ' . var_export((bool)$a, true) . '</p>';
        echo '<p>$b = ' . var_export((bool)$b, true) . '</p>';
        echo '<p>$c = ' . var_export((bool)$c, true) . '</p>';
        echo '<p>$d = ' . var_export((bool)$d, true) . '</p>';
        echo '<p>$e = ' . var_export((bool)$e, true) . '</p>';
        echo '<p>$f = ' . var_export((bool)$f, true) . '</p>';

        echo '<p>Variables $e y $f con echo.</p>';
        echo '<p>$e = ' . var_export($e, true) . '</p>';
        echo '<p>$f = ' . var_export($f, true) . '</p>';
        unset($a, $b, $c, $d, $e, $f);
    ?>

    <h2>Ejercicio 7</h2>
    <p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>
        <?php
        echo '<h4>a. La versión de Apache y PHP:</h4>';
        echo '<p>' . $_SERVER['SERVER_SOFTWARE'] . '</p>';

        echo '<h4>b. El nombre del sistema operativo (servidor):</h4>';
        echo '<p>' . php_uname() . '</p>';

        echo '<h4>c. El idioma del navegador (cliente):</h4>';
        echo '<p>' . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . '</p>';

        ?>
</body>
</html>