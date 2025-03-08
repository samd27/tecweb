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
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON, null, 2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();

    // Asignar el evento keyup al campo de búsqueda
    $('#search').keyup(function() {
        buscarProducto();
    });
}

// FUNCIÓN CALLBACK AL CARGAR LA PÁGINA O AL AGREGAR UN PRODUCTO
function listarProductos() {
    $.ajax({
        url: './backend/product-list.php',
        type: 'GET',
        dataType: 'json',
        success: function(productos) {
            if (Object.keys(productos).length > 0) {
                let template = '';

                productos.forEach(producto => {
                    let descripcion = '';
                    descripcion += '<li>precio: ' + producto.precio + '</li>';
                    descripcion += '<li>unidades: ' + producto.unidades + '</li>';
                    descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                    descripcion += '<li>marca: ' + producto.marca + '</li>';
                    descripcion += '<li>detalles: ' + producto.detalles + '</li>';

                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                });

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                $('#products').html(template);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', error);
        }
    });
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarProducto() {
    // SE OBTIENE EL VALOR DEL CAMPO DE BÚSQUEDA
    var search = $('#search').val();

    $.ajax({
        url: './backend/product-search.php',
        type: 'GET',
        data: { search: search },
        dataType: 'json',
        success: function(productos) {
            if (Object.keys(productos).length > 0) {
                let template = '';
                let template_bar = '';

                productos.forEach(producto => {
                    let descripcion = '';
                    descripcion += '<li>precio: ' + producto.precio + '</li>';
                    descripcion += '<li>unidades: ' + producto.unidades + '</li>';
                    descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                    descripcion += '<li>marca: ' + producto.marca + '</li>';
                    descripcion += '<li>detalles: ' + producto.detalles + '</li>';

                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;

                    template_bar += `
                        <li>${producto.nombre}</li>
                    `;
                });

                // SE HACE VISIBLE LA BARRA DE ESTADO
                $('#product-result').removeClass('d-none').addClass('card my-4 d-block');

                // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                $('#container').html(template_bar);

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                $('#products').html(template);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', error);
        }
    });
}

// FUNCIÓN DE VALIDACIÓN
function validarFormulario(finalJSON) {
    if (!finalJSON.nombre || finalJSON.nombre.length > 100) {
        alert('El nombre es requerido y debe tener una longitud máxima de 100 caracteres.');
        return false;
    }

    if (!finalJSON.marca || finalJSON.marca.trim() === '') {
        alert('La marca es requerida.');
        return false;
    }

    if (!finalJSON.modelo || finalJSON.modelo.length > 25 || !/^[a-zA-Z0-9]+$/.test(finalJSON.modelo)) {
        alert('El modelo es requerido, debe tener una longitud máxima de 25 caracteres y debe ser alfanumérico.');
        return false;
    }

    if (isNaN(finalJSON.precio) || finalJSON.precio < 99.99) {
        alert('El precio es requerido y debe ser mayor a 99.99.');
        return false;
    }

    if (finalJSON.detalles && finalJSON.detalles.length > 250) {
        alert('Los detalles no deben exceder los 250 caracteres.');
        return false;
    }

    if (isNaN(finalJSON.unidades) || finalJSON.unidades < 0) {
        alert('El número de unidades es requerido y debe ser mayor o igual a 0.');
        return false;
    }

    if (!finalJSON.imagen || finalJSON.imagen.trim() === '') {
        finalJSON.imagen = 'img/default.png';
    }

    return true;
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    var productoJsonString = $('#description').val();
    var finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = $('#name').val();

    if (!validarFormulario(finalJSON)) {
        return;
    }

    productoJsonString = JSON.stringify(finalJSON, null, 2);

    $.ajax({
        url: './backend/product-add.php',
        type: 'POST',
        contentType: 'application/json;charset=UTF-8',
        data: productoJsonString,
        dataType: 'json',
        success: function(respuesta) {
            console.log(respuesta);
            listarProductos();
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', error);
        }
    });
}

// FUNCIÓN CALLBACK DE BOTÓN "Eliminar"
function eliminarProducto() {
    if (confirm("¿De verdad deseas eliminar el producto?")) {
        var id = $(this).closest('tr').attr('productId');

        $.ajax({
            url: './backend/product-delete.php',
            type: 'GET',
            data: { id: id },
            dataType: 'json',
            success: function(respuesta) {
                console.log(respuesta);
                let template_bar = '';
                template_bar += `
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>
                `;

                // SE HACE VISIBLE LA BARRA DE ESTADO
                $('#product-result').removeClass('d-none').addClass('card my-4 d-block');

                // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                $('#container').html(template_bar);

                // SE LISTAN TODOS LOS PRODUCTOS
                listarProductos();
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud AJAX:', error);
            }
        });
    }
}

// Delegación de eventos para los botones de eliminar
$(document).on('click', '.product-delete', eliminarProducto);

// Inicialización al cargar la página
$(document).ready(function() {
    init();
});