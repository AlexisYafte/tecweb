<?php
    include_once __DIR__.'/database.php';

    // OBTENER LOS DATOS DEL PRODUCTO ENVIADO POR EL CLIENTE (JSON)
    $producto = json_decode(file_get_contents('php://input'), true);

    if (!empty($producto)) {
        // OBTENER VALORES DEL JSON
        $nombre = $producto['nombre'];
        $precio = $producto['precio'];
        $unidades = $producto['unidades'];
        $modelo = $producto['modelo'];
        $marca = $producto['marca'];
        $detalles = $producto['detalles'];
        $imagen = isset($producto['imagen']) ? $producto['imagen'] : 'img/default.png';

        // VALIDAR SI EL PRODUCTO YA EXISTE (MISMO NOMBRE Y eliminado=0)
        $queryCheck = "SELECT * FROM productos WHERE nombre = ? AND eliminado = 0";
        if ($stmtCheck = $conexion->prepare($queryCheck)) {
            $stmtCheck->bind_param("s", $nombre);
            $stmtCheck->execute();
            $resultCheck = $stmtCheck->get_result();

            // SI YA EXISTE, NO HACER INSERCIÓN
            if ($resultCheck->num_rows > 0) {
                echo "El producto ya existe en la base de datos.";
            } else {
                // INSERTAR NUEVO PRODUCTO
                $queryInsert = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)";
                if ($stmtInsert = $conexion->prepare($queryInsert)) {
                    $stmtInsert->bind_param("sdissss", $nombre, $precio, $unidades, $modelo, $marca, $detalles, $imagen);

                    if ($stmtInsert->execute()) {
                        echo "Producto agregado exitosamente.";
                    } else {
                        echo "Error al agregar el producto.";
                    }

                    $stmtInsert->close();
                }
            }

            $stmtCheck->close();
        } else {
            echo "Error en la consulta: " . $conexion->error;
        }

        $conexion->close();
    } else {
        echo "No se recibieron datos del producto.";
    }
?>

