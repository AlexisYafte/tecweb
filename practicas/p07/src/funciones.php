<!-- Ejercicio 1 -->
<?php
function esMultiplo($numero) {
    return ($numero % 5 == 0) && ($numero % 7 == 0);
    }
?>

<!-- Ejercicio 2 -->
<?php
function generarSecuenciaImparParImpar() {
    $matriz = []; 
    $iteraciones = 0; 
    $totalNumerosGenerados = 0; 

    do {
        $num1 = rand(1, 1000); 
        $num2 = rand(1, 1000);
        $num3 = rand(1, 1000);

        $totalNumerosGenerados += 3;

        $patronCorrecto = ($num1 % 2 != 0) && ($num2 % 2 == 0) && ($num3 % 2 != 0);

        $matriz[] = [$num1, $num2, $num3];

        $iteraciones++;
    } while (!$patronCorrecto);

    return [
        'matriz' => $matriz,
        'iteraciones' => $iteraciones,
        'totalNumerosGenerados' => $totalNumerosGenerados
    ];
}
?>

<!-- Ejercicio 3 -->
<?php
function encontrarMultiploWhile($numeroDado) {
    $contador = 0;
    $aleatorio = rand(1, 1000);  


    while ($aleatorio % $numeroDado != 0) {
        $aleatorio = rand(1, 1000);  
        $contador++;
    }

    return [$aleatorio, $contador];
}

function encontrarMultiploDoWhile($numeroDado) {
    $contador = 0;
    do {
        $aleatorio = rand(1, 1000);
        $contador++;
    } while ($aleatorio % $numeroDado != 0); 
    return [$aleatorio, $contador];
}
?>

<!-- Ejercicio 4 -->
<?php
function crearArregloLetras() {
    $arreglo = [];
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i);
    }
    return $arreglo;
}
?>

<!-- Ejercicio 6 -->
<?php
function obtenerParqueVehicular() {
    return [
        'ABC1234' => [
            'Auto' => [
                'marca' => 'Honda',
                'modelo' => 2020,
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Alfonzo Esparza',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'C.U., Jardines de San Manuel'
            ]
        ],
        'XYZ5678' => [
            'Auto' => [
                'marca' => 'Mazda',
                'modelo' => 2019,
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Ma. del Consuelo Molina',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '97 oriente'
            ]
        ],
        'DEF4321' => [
            'Auto' => [
                'marca' => 'Toyota',
                'modelo' => 2018,
                'tipo' => 'hatchback'
            ],
            'Propietario' => [
                'nombre' => 'Luis Pérez',
                'ciudad' => 'Monterrey, NL.',
                'direccion' => 'Av. Revolución'
            ]
        ],
        'GHI8765' => [
            'Auto' => [
                'marca' => 'Ford',
                'modelo' => 2021,
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'María González',
                'ciudad' => 'Guadalajara, Jal.',
                'direccion' => 'Av. Patria'
            ]
        ],
        'JKL4329' => [
            'Auto' => [
                'marca' => 'Chevrolet',
                'modelo' => 2015,
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Carlos Ramírez',
                'ciudad' => 'Tijuana, BC.',
                'direccion' => 'Blvd. Agua Caliente'
            ]
        ],
        'MNO9867' => [
            'Auto' => [
                'marca' => 'Nissan',
                'modelo' => 2017,
                'tipo' => 'hatchback'
            ],
            'Propietario' => [
                'nombre' => 'José Hernández',
                'ciudad' => 'Mérida, Yuc.',
                'direccion' => 'Col. Altabrisa'
            ]
        ],
        'PQR5432' => [
            'Auto' => [
                'marca' => 'Volkswagen',
                'modelo' => 2020,
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Laura Sánchez',
                'ciudad' => 'Cancún, Q. Roo',
                'direccion' => 'Av. Kabah'
            ]
        ],
        'STU1235' => [
            'Auto' => [
                'marca' => 'Hyundai',
                'modelo' => 2019,
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Diego Martínez',
                'ciudad' => 'Morelia, Mich.',
                'direccion' => 'Col. Tres Marías'
            ]
        ],
        'VWX9876' => [
            'Auto' => [
                'marca' => 'Kia',
                'modelo' => 2022,
                'tipo' => 'hatchback'
            ],
            'Propietario' => [
                'nombre' => 'Fernanda Torres',
                'ciudad' => 'Chihuahua, Chih.',
                'direccion' => 'Av. Universidad'
            ]
        ],
        'YZA6543' => [
            'Auto' => [
                'marca' => 'Audi',
                'modelo' => 2018,
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Roberto Domínguez',
                'ciudad' => 'Culiacán, Sin.',
                'direccion' => 'Av. Obregón'
            ]
        ],
        'BCD0987' => [
            'Auto' => [
                'marca' => 'BMW',
                'modelo' => 2021,
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Ana López',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Lomas de Angelópolis'
            ]
        ],
        'EFG7654' => [
            'Auto' => [
                'marca' => 'Mercedes-Benz',
                'modelo' => 2020,
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Javier Fernández',
                'ciudad' => 'Toluca, Edo. Méx.',
                'direccion' => 'Blvd. Aeropuerto'
            ]
        ],
        'HIJ3210' => [
            'Auto' => [
                'marca' => 'Jeep',
                'modelo' => 2019,
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Mónica Sánchez',
                'ciudad' => 'Querétaro, Qro.',
                'direccion' => 'Av. Constituyentes'
            ]
        ],
        'KLM4567' => [
            'Auto' => [
                'marca' => 'Tesla',
                'modelo' => 2021,
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Ricardo Ortiz',
                'ciudad' => 'CDMX',
                'direccion' => 'Polanco'
            ]
        ],
        'NOP2345' => [
            'Auto' => [
                'marca' => 'Volvo',
                'modelo' => 2018,
                'tipo' => 'hatchback'
            ],
            'Propietario' => [
                'nombre' => 'Patricia Gutiérrez',
                'ciudad' => 'San Luis Potosí, SLP.',
                'direccion' => 'Col. Lomas'
            ]
        ]
    ];
}
?>







    