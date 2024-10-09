<?php
@$link = new mysqli('localhost', 'root', '032805', 'marketzone');
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error);
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$unidades = $_POST['unidades'];
$detalles = $_POST['detalles'];

// Manejo de la imagen
$imagen = $_FILES['imagen']['name'];
$ruta_imagen = 'img/' . $imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen);

// Actualización de producto en la base de datos
$sql = "UPDATE productos SET 
        nombre='$nombre', 
        marca='$marca', 
        modelo='$modelo', 
        precio='$precio', 
        unidades='$unidades', 
        detalles='$detalles', 
        imagen='$ruta_imagen'
        WHERE id = $id";

if ($link->query($sql) === TRUE) {
    echo "Producto actualizado exitosamente.";
} else {
    echo "Error actualizando producto: " . $link->error;
}

$link->close();
?>
