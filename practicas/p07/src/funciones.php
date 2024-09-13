<!-- Ejercicio 1 -->
<?php
function esMultiplo($numero) {
    return ($numero % 5 == 0) && ($numero % 7 == 0);
    }
?>

<!-- Ejercicio 2 -->
<?php
function generarSecuenciaImparParImpar() {
    $matriz = []; 
    $iteraciones = 0; 
    $totalNumerosGenerados = 0; 

    do {
        $num1 = rand(1, 1000); 
        $num2 = rand(1, 1000);
        $num3 = rand(1, 1000);

        $totalNumerosGenerados += 3;

        $patronCorrecto = ($num1 % 2 != 0) && ($num2 % 2 == 0) && ($num3 % 2 != 0);

        $matriz[] = [$num1, $num2, $num3];

        $iteraciones++;
    } while (!$patronCorrecto);

    return [
        'matriz' => $matriz,
        'iteraciones' => $iteraciones,
        'totalNumerosGenerados' => $totalNumerosGenerados
    ];
}
?>

<!-- Ejercicio 3 -->
<?php
function encontrarMultiploWhile($numeroDado) {
    $contador = 0;
    $aleatorio = rand(1, 1000);  


    while ($aleatorio % $numeroDado != 0) {
        $aleatorio = rand(1, 1000);  
        $contador++;
    }

    return [$aleatorio, $contador];
}

function encontrarMultiploDoWhile($numeroDado) {
    $contador = 0;
    do {
        $aleatorio = rand(1, 1000);
        $contador++;
    } while ($aleatorio % $numeroDado != 0); 
    return [$aleatorio, $contador];
}
?>

<!-- Ejercicio 4 -->
<?php
function crearArregloLetras() {
    $arreglo = [];
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i);
    }
    return $arreglo;
}
?>









    