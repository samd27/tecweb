<?php
function es_multiplo7y5($num){
    if ($num % 5 == 0 && $num % 7 == 0) {
        echo '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
    } else {
        echo '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
    }
}

function impar_par_impar() {
    $numeros = array();
    $cont = 0;

    do {
        $cont++;
        $var1 = rand(100, 999);
        $var2 = rand(100, 999);
        $var3 = rand(100, 999);
          
        $numeros[] = [$var1, $var2, $var3];

    } while (!($var1 % 2 != 0 && $var2 % 2 == 0 && $var3 % 2 != 0)); 

    foreach ($numeros as $fila) {
        echo implode(', ', $fila) . "<br>";
    }
    echo '<h3>' . ($cont * 3) . ' números obtenidos en ' . $cont . ' iteraciones</h3>';
}


function multiplo($num) {
    $var = rand(1, 1000);
    $cont = 1; // Contador de intentos

    // Mientras el número generado NO sea múltiplo de $num, seguimos generando
    while ($var % $num != 0) {
        $var = rand(1, 1000);
        $cont++;
    }

    echo "<h4>El primer número entero obtenido aleatoriamente que ES múltiplo de $num es: $var</h4>";
    echo "<p>Se compararon $cont números.</p>";
}

function multiploVariacion($num){
    $cont = 0;
    do {
        $var = rand(1, 1000);
        $cont++;
    } while ($var % $num != 0); 
        
    echo "<h4>El primer número entero obtenido aleatoriamente que ES múltiplo de $num es: $var</h4>";
    echo "<p>Se compararon $cont números.</p>";       
}


function ascii() {
    $letras = array();
    for ($i = 97; $i <= 122; $i++) {
        $letras[$i] = chr($i);
    }
    foreach ($letras as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
}

function rango_edad($num, $sexo) {
    if ($num >= 18 && $num <=35 && $sexo == 'femenino')
    {
        echo '<h3>R= Bienvenida, usted está en el rango de edad permitido.</h3>';
    }
    else{
        echo '<h3>R= Lo sentimos, usted no está en el rango de edad permitido.</h3>';
    }
}

?>