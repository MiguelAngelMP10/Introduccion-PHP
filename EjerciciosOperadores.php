<?php 
    echo" Ejercicio 1";

    echo '<br>32 + 3 = ';
    echo 32 + 3;
    echo '<br>3(2+3) = ';
    echo 3 * (2+3);

    echo "<br>Ejercicio 2<br>";
    $valor = 10;

    if ($valor > 5 && $valor < 10) {
        echo "$valor es mayor que 5 pero menor que 10";
    }

    if ($valor >= 0 && $valor <= 20) {
        echo "$valor es mayor o igual a 0 pero menor o igual a 20";
    }

    if ($valor === "10") {
        echo "$valor es igual a “10” asegurando que el tipo de dato sea cadena";
    }

    if (($valor > 0 && $valor < 5) || ($valor > 10 && $valor < 15)) {
        echo "$valor es mayor a 0 pero menor a 5 o es mayor a 10 pero menor a 15";
    }
?>