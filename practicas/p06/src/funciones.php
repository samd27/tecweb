<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

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


function parque_small(){
    $vehiculos2 = array(
        'ABC1234' => [
            'Auto' => [
                'marca'=> 'HONDA', 'modelo' => '2020', 'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Juan Pérez', 'ciudad' => 'Puebla', 'direccion' => 'Av. Juárez 123'
            ]
        ],
        'DEF5678' => [
            'Auto' => [
                'marca'=> 'TOYOTA', 'modelo' => '2019', 'tipo' => 'sedán'
            ],
            'Propietario' => [
                'nombre' => 'María López', 'ciudad' => 'CDMX', 'direccion' => 'Calle Reforma 456'
            ]
        ]
    );
    print_r($vehiculos2);
}
function parque($mat)
{
    $vehiculos = array(
        'ABC1234' => [
            'Auto' => [
                'marca'=> 'HONDA', 'modelo' => '2020', 'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Juan Pérez', 'ciudad' => 'Puebla', 'direccion' => 'Av. Juárez 123'
            ]
        ],
        'DEF5678' => [
            'Auto' => [
                'marca'=> 'TOYOTA', 'modelo' => '2019', 'tipo' => 'sedán'
            ],
            'Propietario' => [
                'nombre' => 'María López', 'ciudad' => 'CDMX', 'direccion' => 'Calle Reforma 456'
            ]
        ],
        'GHI9012' => [
            'Auto' => [
                'marca'=> 'FORD', 'modelo' => '2018', 'tipo' => 'hatchback'
            ],
            'Propietario' => [
                'nombre' => 'Carlos García', 'ciudad' => 'Guadalajara', 'direccion' => 'Blvd. Hidalgo 789'
            ]
        ],
        'JKL3456' => [
            'Auto' => [
                'marca'=> 'NISSAN', 'modelo' => '2021', 'tipo' => 'sedán'
            ],
            'Propietario' => [
                'nombre' => 'Ana Torres', 'ciudad' => 'Monterrey', 'direccion' => 'Carrera 10 #20-30'
            ]
        ],
        'MNO7890' => [
            'Auto' => [
                'marca'=> 'BMW', 'modelo' => '2017', 'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Pedro Ramírez', 'ciudad' => 'Cancún', 'direccion' => 'Plaza Mayor 321'
            ]
        ],
        'PQR1122' => [
            'Auto' => [
                'marca'=> 'CHEVROLET', 'modelo' => '2016', 'tipo' => 'sedán'
            ],
            'Propietario' => [
                'nombre' => 'Sofía Méndez', 'ciudad' => 'Tijuana', 'direccion' => 'Av. Insurgentes 987'
            ]
        ],
        'STU3344' => [
            'Auto' => [
                'marca'=> 'MAZDA', 'modelo' => '2022', 'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Diego Fernández', 'ciudad' => 'Mérida', 'direccion' => 'Calle 50 #123'
            ]
        ],
        'VWX5566' => [
            'Auto' => [
                'marca'=> 'VOLKSWAGEN', 'modelo' => '2015', 'tipo' => 'hatchback'
            ],
            'Propietario' => [
                'nombre' => 'Elena Rojas', 'ciudad' => 'León', 'direccion' => 'Blvd. Campestre 456'
            ]
        ],
        'YZA7788' => [
            'Auto' => [
                'marca'=> 'KIA', 'modelo' => '2023', 'tipo' => 'sedán'
            ],
            'Propietario' => [
                'nombre' => 'Miguel Herrera', 'ciudad' => 'Querétaro', 'direccion' => 'Av. Zaragoza 789'
            ]
        ],
        'BCD9900' => [
            'Auto' => [
                'marca'=> 'HYUNDAI', 'modelo' => '2014', 'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Laura Castillo', 'ciudad' => 'Saltillo', 'direccion' => 'Calle Victoria 101'
            ]
        ]
    );

    if ($mat != NULL)
    {
        if(array_key_exists($mat, $vehiculos))
        {
            echo '<h3>Auto con matrícula ' . $mat . '</h3>';
            print_r($vehiculos[$mat]);
        }
        else
        {
            echo '<h3>No se encontró un auto con matrícula ' . $mat . '</h3>';
        }
    }
    else
    {
        echo '<h3>Lista de autos registrados</h3>';
        print_r($vehiculos);
    }

}


?>