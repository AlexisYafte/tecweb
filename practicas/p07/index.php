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
    if (isset($_GET['numero'])) {
        $numero = $_GET['numero'];
        if (esMultiplo($numero)) {
            echo "<p>R= El número $numero ES múltiplo de 5 y 7.</p>";
        } else {
            echo "<p>R= El número $numero NO es múltiplo de 5 y 7.</p>";
        }
    }
    ?>


    <h2>Ejercicio 2</h2>
    <p>Generar números aleatorios y almacenarlos en una matriz de Mx3.</p>
    <form action="" method="post">
    <input type="submit" value="Generar Secuencia">
    </form>
    <br>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $resultado = generarSecuenciaImparParImpar();


    echo '<h3>Secuencias generadas:</h3>';
    foreach ($resultado['matriz'] as $fila) {
        echo implode(" ", $fila) . "<br>"; 
    }

    echo '<p>Número de iteraciones: ' . $resultado['iteraciones'] . '</p>';
    echo '<p>Números generados en total: ' . $resultado['totalNumerosGenerados'] . '</p>';
}
?>

    <h2>Ejercicio 3</h2>
    <p>Encuentra el primer número aleatorio que sea múltiplo de un número dado, usando un ciclo.</p>

    <form method="get" action="index.php">
        <label for="numero">Ingresa un número:</label>
        <input type="number" name="numero" id="numero" required>

        <label for="ciclo">Selecciona el ciclo:</label>
        <select name="ciclo" id="ciclo">
            <option value="while">While</option>
            <option value="do-while">Do-While</option>
        </select>

        <input type="submit" value="Buscar Múltiplo">
    </form>

    <br>

    <?php
    if (isset($_GET['numero']) && isset($_GET['ciclo'])) {
        $numeroDado = $_GET['numero'];  
        $ciclo = $_GET['ciclo'];  

        if ($numeroDado > 0) {
            if ($ciclo == 'while') {
                list($multiplo, $contador) = encontrarMultiploWhile($numeroDado);
                echo "<p>Usaste el ciclo <strong>while</strong> para encontrar el primer múltiplo de $numeroDado.</p>";
            } else {
                list($multiplo, $contador) = encontrarMultiploDoWhile($numeroDado);
                echo "<p>Usaste el ciclo <strong>do-while</strong> para encontrar el primer múltiplo de $numeroDado.</p>";
            }
            echo "<p>El primer múltiplo de $numeroDado es: $multiplo.</p>";
            echo "<p>Se realizaron $contador iteraciones para encontrarlo.</p>";
        } else {
            echo "<p>Por favor, ingresa un número mayor a 0.</p>";
        }
    }
    ?>

</body>
</html>