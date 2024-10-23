// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };
  
  function init() {
    var JsonString = JSON.stringify(baseJSON, null, 2);
    $('#description').val(JsonString); // Usamos jQuery para poner el valor en el textarea
    listarProductos(); // Cargar productos al inicio
  }
  
  // Función para listar productos
  function listarProductos() {
    $.ajax({
      url: './backend/product-list.php',
      method: 'GET',
      success: function(response) {
        let productos = JSON.parse(response);
        let template = '';
        productos.forEach(producto => {
          let descripcion = `
            <li>precio: ${producto.precio}</li>
            <li>unidades: ${producto.unidades}</li>
            <li>modelo: ${producto.modelo}</li>
            <li>marca: ${producto.marca}</li>
            <li>detalles: ${producto.detalles}</li>`;
          template += `
            <tr productId="${producto.id}">
              <td>${producto.id}</td>
              <td>${producto.nombre}</td>
              <td><ul>${descripcion}</ul></td>
              <td>
                <button class="product-delete btn btn-danger">Eliminar</button>
              </td>
            </tr>`;
        });
        $('#products').html(template);
      }
    });
  }
  
  // Función para agregar producto
  $('#add-product-btn').click(function(e) {
    e.preventDefault();
  
    let productoJsonString = $('#description').val();
    let producto = JSON.parse(productoJsonString);
    producto['nombre'] = $('#name').val();
  
    $.ajax({
      url: './backend/product-add.php',
      method: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(producto),
      success: function(response) {
        let respuesta = JSON.parse(response);
        let template_bar = `
          <li>status: ${respuesta.status}</li>
          <li>message: ${respuesta.message}</li>`;
        $('#container').html(template_bar);
        $('#product-result').removeClass('d-none'); // Mostrar resultados
        listarProductos(); // Volver a listar los productos
      }
    });
  });
  
  // Función para buscar productos
  $('#search-btn').click(function(e) {
    e.preventDefault();
    
    let searchTerm = $('#search').val();
    $.ajax({
      url: './backend/product-search.php',
      method: 'GET',
      data: { search: searchTerm },
      success: function(response) {
        let productos = JSON.parse(response);
        let template = '';
        let template_bar = '';
        productos.forEach(producto => {
          template += `
            <tr productId="${producto.id}">
              <td>${producto.id}</td>
              <td>${producto.nombre}</td>
              <td><ul>
                <li>precio: ${producto.precio}</li>
                <li>unidades: ${producto.unidades}</li>
                <li>modelo: ${producto.modelo}</li>
                <li>marca: ${producto.marca}</li>
                <li>detalles: ${producto.detalles}</li>
              </ul></td>
              <td>
                <button class="product-delete btn btn-danger">Eliminar</button>
              </td>
            </tr>`;
          template_bar += `<li>${producto.nombre}</li>`;
        });
        $('#products').html(template);
        $('#container').html(template_bar);
        $('#product-result').removeClass('d-none'); // Mostrar barra de resultados
      }
    });
  });
  
  // Función para eliminar productos
  $(document).on('click', '.product-delete', function() {
    if (confirm('¿De verdad deseas eliminar el producto?')) {
      let id = $(this).closest('tr').attr('productId');
      $.ajax({
        url: './backend/product-delete.php',
        method: 'GET',
        data: { id: id },
        success: function(response) {
          let respuesta = JSON.parse(response);
          let template_bar = `
            <li>status: ${respuesta.status}</li>
            <li>message: ${respuesta.message}</li>`;
          $('#container').html(template_bar);
          $('#product-result').removeClass('d-none'); // Mostrar barra de resultados
          listarProductos(); // Actualizar lista
        }
      });
    }
  });
  
  $(document).ready(function() {
    init(); // Inicializar la aplicación
  });
  