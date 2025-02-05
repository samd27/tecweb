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




?>