<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();

    // SE VERIFICA HABER RECIBIDO EL TÉRMINO DE BÚSQUEDA
    if( isset($_GET['search']) ) {
        $searchTerm = $_GET['search'];
        
        // SE PREPARA LA CONSULTA SQL UTILIZANDO LIKE PARA PERMITIR BÚSQUEDAS PARCIALES
        $query = "SELECT * FROM productos WHERE nombre LIKE ? OR marca LIKE ? OR detalles LIKE ?";
        if ($stmt = $conexion->prepare($query)) {
            
            // Añadir % para búsquedas parciales
            $searchTerm = "%{$searchTerm}%";
            // Asignar parámetros y ejecutar la consulta
            $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Obtener los resultados
            while ($row = $result->fetch_assoc()) {
                // Convertir a UTF-8 y agregar al arreglo de datos
                foreach($row as $key => $value) {
                    $row[$key] = utf8_encode($value);
                }
                $data[] = $row;
            }

            // Liberar recursos
            $stmt->close();
        } else {
            die('Query Error: '.mysqli_error($conexion));
        }
        
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
