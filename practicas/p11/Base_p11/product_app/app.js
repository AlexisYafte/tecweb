// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar Producto"
function buscarProducto(e) {
    e.preventDefault();  // Evita que el formulario se envíe de manera tradicional

    // SE OBTIENE EL TÉRMINO DE BÚSQUEDA A ENVIAR
    const searchTerm = document.getElementById('search').value.trim();

    // VALIDAR SI EL CAMPO DE BÚSQUEDA NO ESTÁ VACÍO
    if (!searchTerm) {
        alert("Por favor, ingresa un término de búsqueda.");
        return;
    }

    // CREAR CONEXIÓN AJAX
    const client = getXMLHttpRequest();
    client.open('GET', './backend/read.php?search=' + encodeURIComponent(searchTerm), true);
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            // Mostrar en consola el resultado obtenido
            console.log('[CLIENTE]\n' + client.responseText);

            // Convertir la respuesta JSON a un objeto
            const productos = JSON.parse(client.responseText);

            // Revisar si hay resultados y mostrarlos
            if (productos.length > 0) {
                let output = '';
                productos.forEach(function (producto) {
                    output += `
                        <tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td>
                                <ul>
                                    <li>Precio: ${producto.precio}</li>
                                    <li>Unidades: ${producto.unidades}</li>
                                    <li>Modelo: ${producto.modelo}</li>
                                    <li>Marca: ${producto.marca}</li>
                                    <li>Detalles: ${producto.detalles}</li>
                                </ul>
                            </td>
                        </tr>
                    `;
                });
                document.getElementById("productos").innerHTML = output;
            } else {
                // Mostrar mensaje si no se encuentran productos
                document.getElementById("productos").innerHTML = '<tr><td colspan="3">No se encontraron productos.</td></tr>';
            }
        } else if (client.readyState == 4) {
            alert("Error en la búsqueda, por favor intenta de nuevo.");
        }
    };
    client.send();  // Enviar la solicitud
}

// FUNCIÓN PARA CREAR EL OBJETO DE CONEXIÓN AJAX
function getXMLHttpRequest() {
    let objetoAjax;

    try {
        objetoAjax = new XMLHttpRequest();  // Para navegadores modernos
    } catch (err1) {
        try {
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");  // Para IE7 y IE8
        } catch (err2) {
            try {
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");  // Para IE5 y IE6
            } catch (err3) {
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}


// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();  // Evita que el formulario se envíe automáticamente

    // OBTENER VALORES DESDE EL FORMULARIO
    const nombre = document.getElementById('name').value.trim();
    const descripcion = document.getElementById('description').value.trim();

    // VALIDACIONES DEL CLIENTE
    if (!nombre) {
        alert('El nombre del producto es obligatorio.');
        return;  // Salir de la función si no hay nombre
    }

    let producto;
    try {
        // Convertir la descripción (string) en JSON
        producto = JSON.parse(descripcion);
    } catch (error) {
        alert('La descripción debe estar en formato JSON válido.');
        return;  // Salir de la función si no es JSON válido
    }

    // Validar que el JSON tenga los campos requeridos
    if (!producto.precio || isNaN(producto.precio) || producto.precio <= 0) {
        alert('El precio debe ser un número mayor a 0.');
        return;  // Salir de la función si la validación falla
    }

    if (!producto.unidades || isNaN(producto.unidades) || producto.unidades <= 0) {
        alert('Las unidades deben ser un número mayor a 0.');
        return;  // Salir de la función si la validación falla
    }

    // Añadir el nombre al objeto producto
    producto.nombre = nombre;

    // Convertir el objeto producto en un JSON string
    const productoJsonString = JSON.stringify(producto);

    // CREAR CONEXIÓN AJAX AL SERVIDOR
    const client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");

    client.onreadystatechange = function () {
        if (client.readyState == 4) {
            if (client.status == 200) {
                // Mostrar el mensaje del servidor
                alert(client.responseText);
            } else {
                alert('Error en la conexión al servidor.');
            }
        }
    };

    // ENVIAR EL JSON AL SERVIDOR
    client.send(productoJsonString);
}


function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

