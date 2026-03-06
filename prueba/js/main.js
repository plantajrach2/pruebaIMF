var btn = document.getElementById('btn_cargar_usuarios');
var loader = document.getElementById('loader');
var error_box = document.getElementById('error_box');
var tabla = document.getElementById('tabla');
var formedit = document.getElementById('formularioeditar');


function agregarActividad(e) {

    e.preventDefault();

    var peticion = new XMLHttpRequest();

    peticion.open('POST', 'API/setActividad.php');

    //console.warn('formulario: ',formulario);

    nombre = formulario.nombre.value.trim();
    descripcion = formulario.descripcion.value.trim();
    
    fecha_apertura = formulario.fecha_apertura.value.trim();
    fecha_cierre = formulario.fecha_cierre.value.trim();
    hecha = formulario.hecha.checked;

    var parametros = "nombre=" + nombre + "&descripcion=" + descripcion + "&fecha_apertura=" + fecha_apertura + "&fecha_cierre=" + fecha_cierre+ "&hecha=" + hecha;

    peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    loader.classList.add('active');

    peticion.onload = function () {
        cargarActividades();
        // formulario.nombre.value=''; etc, etc...
        formulario.reset();
    }

    peticion.onreadystatechange = function () {

        if (peticion.readyState == 4 && peticion.status == 200) {

            loader.classList.remove('active');

            Swal.fire({
                title: "Movimiento exitoso",
                text: "¡Se añadió nueva actividad!",
                icon: "success"
            });

        } else {            
            
             Swal.fire({
                title: "Movimiento erroneo",
                text: "¡No fue posible añadir nueva actividad!",
                icon: "error"
            });

        }

    }

    peticion.send(parametros);


}

async function cargarActividades() {

    tabla.innerHTML = '<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Apertura</th><th>Cierre</th><th>Completada</th><th>Acciones</th></tr>';

    try {

        var peticion = new XMLHttpRequest();
        peticion.open('GET', 'API/loadActividades.php');
        // 
        loader.classList.add('active');

        peticion.onload = function () {

            var datos = JSON.parse(peticion.responseText);

            for (i = 0; i < datos.length; i++) {
                var elemento = document.createElement('tr');

                elemento.innerHTML += ("<td>" + datos[i].id_actividad + "</td>");
                elemento.innerHTML += ("<td>" + datos[i].nombre + "</td>");
                elemento.innerHTML += ("<td>" + datos[i].descripcion + "</td>");
                
                elemento.innerHTML += ("<td>" + datos[i].fecha_apertura + "</td>");
                elemento.innerHTML += ("<td>" + datos[i].fecha_cierre + "</td>");
                elemento.innerHTML += ("<td><input type='checkbox' id='scales' class='form-check-input' name='scales' "+(datos[i].hecha ? "checked" : "")+" onchange='marcaHecha("+datos[i].id_actividad+","+!datos[i].hecha+")' /></div></td>");
                elemento.innerHTML += ("<td><a href='editar-actividad.php?id=" + datos[i].id_actividad + "'>editar</a></td>");


                document.getElementById('tabla').appendChild(elemento);

            }
        }

        peticion.onreadystatechange = function () {
            if (peticion.readyState == 4 && peticion.status == 200) {
                loader.classList.remove('active');
            }
        }

        peticion.send();
        
    } catch (error) {

        Swal.fire({
            title: "Movimiento erroneo",
            text: "¡No fue posible cargar la información!",
            icon: "error"
        });

        console.log(error);

    }    

}

function getActividad(idp) {

    var peticion = new XMLHttpRequest();
    peticion.open('GET', 'API/getActividad.php?id=' + idp);
    // 

    peticion.onload = function () {

        var datos = JSON.parse(peticion.responseText);

        for (i = 0; i < datos.length; i++) {

            formedit.id_actividad.value = datos[i].id_actividad;
            formedit.nombre.value = datos[i].nombre;
            formedit.descripcion.value = datos[i].descripcion;
            
            formedit.fecha_apertura.value = datos[i].fecha_apertura;
            formedit.fecha_cierre.value = datos[i].fecha_cierre;

            formedit.hecha.checked = datos[i].hecha;

        }

    }

    peticion.onreadystatechange = function () {
        if (peticion.readyState == 4 && peticion.status == 404) {
            alert("no se encontro al usuario");
        }
    }

    peticion.send();
}


function editarActividad(e) {

    e.preventDefault();

    var peticion = new XMLHttpRequest();

    peticion.open('POST', 'API/updateActividad.php');

    id_actividad = formularioeditar.id_actividad.value.trim();
    nombre = formularioeditar.nombre.value.trim();
    descripcion = formularioeditar.descripcion.value.trim();
    fecha_apertura = formularioeditar.fecha_apertura.value.trim();
    fecha_cierre = formularioeditar.fecha_cierre.value.trim();
    hecha = formularioeditar.hecha.checked;

    var parametros = "id_actividad=" + id_actividad + "&nombre=" + nombre + "&descripcion=" + descripcion+"&fecha_apertura=" + fecha_apertura + "&fecha_cierre=" + fecha_cierre+ "&hecha=" + hecha;

    peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    loader.classList.add('active');

    peticion.onload = function () {
        // formularioeditar.nombre.value=''; etc, etc...
        // formularioeditar.reset();
        alert("Edición exitosa");
        //location.reload();
    }

    peticion.onreadystatechange = function () {

        if (peticion.readyState == 4 && peticion.status == 404) {
            alert("no se pudo actualizar!");
        }

    }

    peticion.send(parametros);

}

async function marcaHecha(id_actividad,hecha) {
    
    try {
        
        var peticion = new XMLHttpRequest();

        peticion.open('POST', 'API/markDone.php');

        hecha;
        id_actividad;

        var parametros = "id_actividad=" + id_actividad +"&hecha=" + hecha;

        peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        loader.classList.add('active');

        peticion.onload = function () {
            cargarActividades();
        }

        peticion.onreadystatechange = function () {

            if (peticion.readyState == 4) {

                if (peticion.status == 200) {

                    Swal.fire({
                        title: "Movimiento exitoso",
                        text: "Actividad actualizada correctamente",
                        icon: "success"
                    });

                } else {

                    Swal.fire({
                        title: "Error",
                        text: "No fue posible actualizar",
                        icon: "error"
                    });

                }

            }

        }

        peticion.send(parametros);

    } catch (error) {

         Swal.fire({
            title: "Error",
            text: "No fue posible actualizar la actividad",
            icon: "error"
        });

        console.error(error);
    }

}

document.addEventListener("DOMContentLoaded", function () {

    // DATE DE ACTIVIDADES
    var selectActividad = document.getElementById("selectActividad");
    var peticionActividad = new XMLHttpRequest();

    peticionActividad.open("GET", "API/selectActividad.php", true);

    peticionActividad.onload = function () {
        if (peticionActividad.status === 200) {
            var datos = JSON.parse(peticionActividad.responseText);
            selectActividad.innerHTML = ""; // Limpiar contenido

            datos.forEach(function (puesto) {
                var option = document.createElement("option");
                option.value = puesto.id;
                option.textContent = puesto.nombre;
                selectActividad.appendChild(option);
            });
        } else {
            selectActividad.innerHTML = "<option>Error al cargar</option>";
        }
    };

    peticionActividad.onerror = function () {
        selectActividad.innerHTML = "<option>Error de red</option>";
    };

    peticionActividad.send();


    //INPUT DE ACTIVIDADES
    const apertura = document.getElementById('fecha_apertura');
    const cierre = document.getElementById('fecha_cierre');

    apertura.addEventListener('change', function () {
        // Al seleccionar apertura, la fecha mínima para cierre será la misma
        cierre.min = apertura.value;

        // Validación: si fecha_cierre ya no es válida, se limpia
        if (cierre.value && cierre.value < apertura.value) {
            cierre.value = null;
        }
    });

    cierre.addEventListener('change', function () {
        // Al seleccionar cierre, la fecha máxima para apertura será la misma
        apertura.max = cierre.value;

        // Validación: si fecha_apertura ya no es válida, se limpia
        if (apertura.value && apertura.value > cierre.value) {
            apertura.value = null;
        }
    });
});

