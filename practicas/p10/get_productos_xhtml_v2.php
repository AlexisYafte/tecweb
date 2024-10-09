<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3>Productos con stock menor o igual al tope</h3>

    <?php
    @$link = new mysqli('localhost', 'root', '032805', 'marketzone');
    if ($link->connect_errno) {
        die('Falló la conexión: ' . $link->connect_error);
    }

    $sql = "SELECT * FROM productos";
    $result = $link->query($sql);

    echo '<table class="table">';
    echo '<thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Precio</th>
            <th scope="col">Unidades</th>
            <th scope="col">Detalles</th>
            <th scope="col">Imagen</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['nombre'] . '</td>';
        echo '<td>' . $row['marca'] . '</td>';
        echo '<td>' . $row['modelo'] . '</td>';
        echo '<td>' . $row['precio'] . '</td>';
        echo '<td>' . $row['unidades'] . '</td>';
        echo '<td>' . $row['detalles'] . '</td>';
        echo '<td><img src="' . $row['imagen'] . '" width="100" /></td>';
        // Enlace de edición que envía a formulario_productos.php
        echo '<td><a href="formulario_productos_v2.php?id=' . $row['id'] . '" class="btn btn-primary">Editar</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    $link->close();
    ?>


</body>
</html>