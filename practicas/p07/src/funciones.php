<!-- Ejercicio 1 -->
<?php
function esMultiplo($numero) {
    return ($numero % 5 == 0) && ($numero % 7 == 0);
    }
?>

<!-- Ejercicio 2 -->
<?php
function generarSecuenciaImparParImpar() {
    $matriz = []; // Matriz para almacenar las secuencias
    $iteraciones = 0; // Contador de iteraciones
    $totalNumerosGenerados = 0; // Contador de números generados

    do {
        // Generar 3 números aleatorios
        $num1 = rand(1, 1000); // Puedes ajustar el rango si lo deseas
        $num2 = rand(1, 1000);
        $num3 = rand(1, 1000);

        // Incrementar el contador de números generados
        $totalNumerosGenerados += 3;

        // Verificar el patrón: impar, par, impar
        $patronCorrecto = ($num1 % 2 != 0) && ($num2 % 2 == 0) && ($num3 % 2 != 0);

        // Almacenar la secuencia en la matriz
        $matriz[] = [$num1, $num2, $num3];

        // Incrementar el contador de iteraciones
        $iteraciones++;
    } while (!$patronCorrecto); // Repetir hasta que el patrón sea correcto

    return [
        'matriz' => $matriz,
        'iteraciones' => $iteraciones,
        'totalNumerosGenerados' => $totalNumerosGenerados
    ];
}
?>

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






    