<?php
@$link = new mysqli('localhost', 'root', '032805', 'marketzone');
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id = $id";
$result = $link->query($sql);
$producto = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <script>
        function validarFormulario() {
            var nombre = document.getElementById("nombre").value;
            var marca = document.getElementById("marca").value;
            var modelo = document.getElementById("modelo").value;
            var precio = document.getElementById("precio").value;
            var unidades = document.getElementById("unidades").value;
            var detalles = document.getElementById("detalles").value;

            if (nombre === "" || marca === "" || modelo === "" || precio === "" || unidades === "" || detalles === "") {
                alert("Por favor, completa todos los campos.");
                return false;
            }

            if (isNaN(precio) || isNaN(unidades)) {
                alert("El precio y las unidades deben ser números.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="guardar_producto.php" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario();">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>"><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo $producto['marca']; ?>"><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo $producto['modelo']; ?>"><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>"><br>

        <label for="unidades">Unidades:</label>
        <input type="number" id="unidades" name="unidades" value="<?php echo $producto['unidades']; ?>"><br>

        <label for="detalles">Detalles:</label>
        <textarea id="detalles" name="detalles"><?php echo $producto['detalles']; ?></textarea><br>

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/png, image/jpeg"><br>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>

<?php $link->close(); ?>
