<!-- Ejercicio 1 -->
<?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>

<!-- Ejercicio 2 -->
<?php
function generarAleatorios() {
    $matriz = [];
    $contador = 0;
    do {
        $num1 = rand(100, 999);
        $num2 = rand(100, 999);
        $num3 = rand(100, 999);
        if ($num1 % 2 != 0 && $num2 % 2 == 0 && $num3 % 2 != 0) {
            $matriz[] = [$num1, $num2, $num3];
        }
        $contador++;
    } while (count($matriz) < 4);
    return [$matriz, $contador];
}
?>
    