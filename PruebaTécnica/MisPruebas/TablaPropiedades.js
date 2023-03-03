
/* Usamos el la función "fetch" para obtener el JSON desde una URL o desde un archivo en el servidor */
fetch("api.js")
    /* La funcion "fetch" devuelve una promesa, que debemos resolverla usando "then" */
    .then(response => response.json())
    .then(data=> {
        /* Creamos la tabla usando los datos del JSON */
        let tabla = document.querySelector("#tabla");
        let encabezado = "<tr><th>id</th><th>userId</th><th>typeId</th><th>name</th><th>rentedFrom</th>" +
            "<th>rentedTo</th></tr>";
        /* Asignamos el encabezado a nuestra tabla */
        tabla.innerHTML = encabezado;
        /* Generamos las filas de la tabla, recorriendo los objetos del JSON con el bucle forEach*/
        data.forEach(dato => {
            let fila = "<tr>";
            fila += "<td>" + dato.id + "</td>";
            fila += "<td>" + dato.userId + "</td>";
            fila += "<td>" + dato.typeId + "</td>";
            fila += "<td>" + dato.name + "</td>";
            fila += "<td>" + dato.rentedFrom + "</td>";
            fila += "<td>" + dato.rentedTo + "</td>";
            fila += "</tr>";
            /* Asignamos las filas a nuestra tabla */
            tabla.innerHTML += fila;
        });
    });
