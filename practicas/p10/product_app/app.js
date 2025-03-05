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
function buscarProducto(e) {
    e.preventDefault();

    var search = document.getElementById('search').value;

    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);

            let productos = JSON.parse(client.responseText);

            if(productos.length > 0) {
                let template = '';
                productos.forEach(producto => {
                    let descripcion = '';
                    descripcion += '<li>precio: '+producto.precio+'</li>';
                    descripcion += '<li>unidades: '+producto.unidades+'</li>';
                    descripcion += '<li>modelo: '+producto.modelo+'</li>';
                    descripcion += '<li>marca: '+producto.marca+'</li>';
                    descripcion += '<li>detalles: '+producto.detalles+'</li>';

                    template += `
                        <tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;
                });

                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("search="+search);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    var productoJsonString = document.getElementById('description').value;
    var finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = document.getElementById('name').value;

    validarFormulario(finalJSON, e);

    productoJsonString = JSON.stringify(finalJSON, null, 2);

    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);
            let response = JSON.parse(client.responseText);
            alert(response.message);
        }
    };
    client.send(productoJsonString);
}

// FUNCIÓN DE VALIDACIÓN
function validarFormulario(finalJSON, event) {
    if (!finalJSON.nombre || finalJSON.nombre.length > 100) {
        alert('El nombre es requerido y debe tener una longitud máxima de 100 caracteres.');
        event.preventDefault();
    }

    if (!finalJSON.marca || finalJSON.marca.trim() === '') {
        alert('La marca es requerida.');
        event.preventDefault();
    }

    if (!finalJSON.modelo || finalJSON.modelo.length > 25 || !/^[a-zA-Z0-9]+$/.test(finalJSON.modelo)) {
        alert('El modelo es requerido, debe tener una longitud máxima de 25 caracteres y debe ser alfanumérico.');
        event.preventDefault();
    }

    if (isNaN(finalJSON.precio) || finalJSON.precio < 99.99) {
        alert('El precio es requerido y debe ser mayor a 99.99.');
        event.preventDefault();
    }

    if (finalJSON.detalles && finalJSON.detalles.length > 250) {
        alert('Los detalles no deben exceder los 250 caracteres.');
        event.preventDefault();
    }

    if (isNaN(finalJSON.unidades) || finalJSON.unidades < 0) {
        alert('El número de unidades es requerido y debe ser mayor o igual a 0.');
        event.preventDefault();
    }

    if (!finalJSON.imagen || finalJSON.imagen.trim() === '') {
        finalJSON.imagen = 'img/default.png';
    }
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try {
        objetoAjax = new XMLHttpRequest();
    } catch (err1) {
        try {
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    var JsonString = JSON.stringify(baseJSON, null, 2);
    document.getElementById("description").value = JsonString;
}
