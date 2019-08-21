<?php 

//Ejercicio 1.
$arreglo = [

	'keyStr1' => 'lado',
	0 => 'ledo',

	'keyStr2' => 'lido',
	1 => 'lodo',
	2 => 'ludo'
];

echo 'Solución Ejecicio uno <br>';
echo implode(' ',$arreglo);
echo "<br>".implode(' ',array_reverse($arreglo));


//Ejercicio 2

$arregloEjecicioDos = [
    'México' =>[
        'Puebla',
        'Monterrey',
        'Guadalajara'
    ],
    'México' =>[
        'Puebla',
        'Monterrey',
        'Guadalajara'
    ],
    'Colombia' =>[
        'Bogota',
        'Cartagena',
        'Medellin'
    ],
    'Japon' =>[
        'Tokio',
        'Kioto',
        'Yokohama'
    ],
    'España' =>[
        'Teruel',
        'Burgos',
        'Toledo'
    ]
    ];
    
    echo '<br><br>Solución Ejecicio dos <br>';

    foreach ($arregloEjecicioDos as $pais => $ciudades) {
        echo '<b>'. $pais .':</b>' .implode(' ',$ciudades).'<br>';
    }


    echo '<br><br>Solución Ejecicio tres <br>';
    $valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];
    echo ' [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61]';
    echo '<pre>';
    rsort($valores);
    echo '3 números más grandes';
    print_r(array_slice($valores,0, 3));
    echo '3 números más bajos'; 
    print_r(array_slice($valores, count($valores)-3, count($valores)));
    
    echo '</pre>';
?>