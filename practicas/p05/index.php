<?php
// 1. Variables válidas
$_myvar = "Válido porque comienza con un guion bajo";
$_7var = "Válido porque comienza con un guion bajo";
$myvar = "Válido porque empieza con un carácter válido";
$var7 = "Válido porque los números pueden estar al final";

echo $_myvar . "<br>";
echo $_7var . "<br>";
echo $myvar . "<br>";
echo $var7 . "<br>";

// 2. Proporcionar valores
$a = "ManejadorSQL";
$b = 'MySQL';
$c = &$a; 

echo '<br>';
echo "a: $a, b: $b, c: $c<br>";

// Segunda asignación
$a = "PHP server";
$b = &$a;

echo "a: $a, b: $b, c: $c <br>";

echo "<h3>Explicación:</h3>";
echo "<p>En el segundo bloque de asignaciones, cuando cambiamos el valor de \$a a 'PHP server', ";
echo "las variables \$b y \$c también adoptan este valor, ya que ambas son referencias a \$a.</p>";
echo "<p>Una referencia en PHP significa que ambas variables (en este caso \$b y \$c) apuntan al mismo ";
echo "espacio de memoria que la variable original (\$a), por lo que cualquier cambio en \$a se refleja automáticamente en \$b y \$c.</p>";

// 3. Contenido de cada variable
$a = "PHP5";
echo "Valor de \$a después de la primera asignación: ";
var_dump($a);
echo "<br>";

$z[] = &$a;
echo "Contenido de \$z después de la asignación de referencia: ";
var_dump($z); 
echo "<br>";

$b = "5a version de PHP";
echo "Valor de \$b después de la tercera asignación: ";
var_dump($b);
echo "<br>";

if (is_numeric($b)) {
    $c = $b * 10;
} else {
    $c = 0; 
    echo "No se puede multiplicar \$b porque no es numérico.<br>";
}
echo "Valor de \$c después de la cuarta asignación (multiplicación): ";
var_dump($c);
echo "<br>";

$a .= $b;
echo "Valor de \$a después de la concatenación con \$b: ";
var_dump($a); 
echo "<br>";

$b *= $c;
echo "Valor de \$b después de multiplicarse por \$c: ";
var_dump($b);
echo "<br>";

$z[0] = "MySQL";
echo "Contenido de \$z después de sobrescribir \$z[0]: ";
var_dump($z); 
echo "<br>";

// 4. Leer y usar $GLOBALS
echo "<br>";
echo "Valor de \$a desde GLOBALS: " . $GLOBALS['a'] . "<br>";
echo "Valor de \$b desde GLOBALS: " . $GLOBALS['b'] . "<br>";
echo "Valor de \$c desde GLOBALS: " . $GLOBALS['c'] . "<br>";


?>