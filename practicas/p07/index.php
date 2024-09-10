<?php
include 'src/funciones.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    
    <form method="get" action="index.php">
        <input type="number" name="numero" placeholder="Ingresa un número">
        <input type="submit" value="Comprobar">
    </form>


    <?php
        list($numeros, $iteraciones) = generarAleatorios();
        echo "Se generaron $iteraciones números en 4 iteraciones:<br>";
        foreach ($numeros as $fila) {
        echo implode(", ", $fila) . "<br>";
       }
    ?>
</body>
</html>