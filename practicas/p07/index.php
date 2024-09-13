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

    <h2>Ejercicio 4</h2>
    <p>Crear arreglo con letras del abecedario</p>

<?php
$arreglo = crearArregloLetras();
echo "<table border='1'>";
echo "<tr><th>Índice</th><th>Letra</th></tr>";
foreach ($arreglo as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";
?>

    <h2>Ejercicio 5</h2>
    <p>Formulario con edad y sexo</p>
<form action="index.php" method="post">
    Edad: <input type="number" name="edad" required>
    Sexo: 
    <select name="sexo">
        <option value="femenino">Femenino</option>
        <option value="masculino">Masculino</option>
    </select>
    <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    if ($sexo == 'femenino' && $edad >= 18 && $edad <= 35) {
        echo "Bienvenida, usted está en el rango de edad permitido.";
    } else {
        echo "Error: No cumple los requisitos.";
    }
}
?>

<h2>Ejercicio 6</h2>
<p>Registro de parque vehicular</p>
<!-- Formulario para buscar por matrícula -->
<form action="index.php" method="post">
        <label for="matricula">Buscar por matrícula:</label>
        <input type="text" id="matricula" name="matricula" placeholder="Ingrese la matrícula" />
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario para mostrar todos los autos -->
    <form action="index.php" method="post">
        <input type="hidden" name="mostrar_todos" value="1" />
        <input type="submit" value="Mostrar todos los autos registrados" />
    </form>

    <br />

    <?php
    $parqueVehicular = obtenerParqueVehicular();

    if (isset($_POST['matricula'])) {
        $matricula = strtoupper($_POST['matricula']);  

        if (isset($parqueVehicular[$matricula])) {
            echo "<h3>Información del vehículo con matrícula $matricula:</h3>";
            echo "<strong>Auto:</strong><br>";
            echo "Marca: " . $parqueVehicular[$matricula]['Auto']['marca'] . "<br>";
            echo "Modelo: " . $parqueVehicular[$matricula]['Auto']['modelo'] . "<br>";
            echo "Tipo: " . $parqueVehicular[$matricula]['Auto']['tipo'] . "<br>";

            echo "<strong>Propietario:</strong><br>";
            echo "Nombre: " . $parqueVehicular[$matricula]['Propietario']['nombre'] . "<br>";
            echo "Ciudad: " . $parqueVehicular[$matricula]['Propietario']['ciudad'] . "<br>";
            echo "Dirección: " . $parqueVehicular[$matricula]['Propietario']['direccion'] . "<br>";
        } else {
            echo "<p>No se encontró ningún vehículo con la matrícula $matricula.</p>";
        }
    }

    if (isset($_POST['mostrar_todos'])) {
        echo "<h3>Todos los autos registrados:</h3>";
        foreach ($parqueVehicular as $matricula => $datosVehiculo) {
            echo "<strong>Matrícula:</strong> $matricula<br>";
            echo "<strong>Auto:</strong><br>";
            echo "Marca: " . $datosVehiculo['Auto']['marca'] . "<br>";
            echo "Modelo: " . $datosVehiculo['Auto']['modelo'] . "<br>";
            echo "Tipo: " . $datosVehiculo['Auto']['tipo'] . "<br>";

            echo "<strong>Propietario:</strong><br>";
            echo "Nombre: " . $datosVehiculo['Propietario']['nombre'] . "<br>";
            echo "Ciudad: " . $datosVehiculo['Propietario']['ciudad'] . "<br>";
            echo "Dirección: " . $datosVehiculo['Propietario']['direccion'] . "<br>";
            echo "<hr>";
        }
    }
    ?>
</body>
</html>