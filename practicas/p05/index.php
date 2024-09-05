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


?>