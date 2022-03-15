function limpiarSelector() {
    var recurso = document.getElementById("selectRecursos");

    recurso.value = 0;
}

function eliminarTabla() {
    var tabla = document.getElementsByTagName("table");

    if (tabla) {
        document.getElementById("tabla-resultados").removeChild(tabla);
    }
}

function buscar() {
    var recurso = document.getElementById("selectRecursos").value;

    if (recurso === "0") {
        alert("Seleccione un recurso diferente!");
    } else {
        fetch("https://jsonplaceholder.typicode.com/" + recurso)
            .then((response) => {
                if (response.ok) {
                    return response.json();
                }
            })
            .then((data) => {
                var columnas = [];
                for (let key in data[0]) {
                    columnas.push(key);
                }

                crearTabla(columnas, data);

            })
            .catch((error) => {
                console.log(error);
            })
    }

    limpiarSelector();
}

function crearTabla(columns, data) {
    try {
        eliminarTabla();
    } catch (error) {
        console.log(error);
    }

    let table = document.createElement('table');
    table.id = "resultados";
    table.className = "table table-striped"
    let thead = document.createElement('thead');
    let tbody = document.createElement('tbody');
    tbody.id = "tbody";

    table.appendChild(thead);
    table.appendChild(tbody);

    for (const header of columns) {
        let vHeader = document.createTextNode(header);
        let thHeader = document.createElement("th");
        thHeader.appendChild(vHeader);
        thead.appendChild(thHeader);
    }

    var tabla = document.getElementById("tabla-resultados");
    tabla.innerHTML = "<h5>Resultados</h5><div class='row g-3 mb-3'><div class='col-auto'><input type='text' class='form-control' onkeyup='filtrar()' id='inputFiltrar' placeholder='Buscar'></div></div>";
    tabla.appendChild(table);

    var cuerpo = document.getElementById("tbody");

    for (let key in data) {
        row = cuerpo.insertRow();
        for (const [k, val] of Object.entries(data[key])) {
            celda = row.insertCell();
            celda.innerHTML = val;
        }
    }
}

function filtrar() {
    var input, filter, table, tr;
    input = document.getElementById("inputFiltrar");
    filter = input.value.toUpperCase();
    table = document.getElementById("resultados");
    tr = table.getElementsByTagName("tr");



    for (var cel in tr) {
        var visible = false;
        var td = tr[cel].getElementsByTagName("td");

        for (let j = 0; j < td.length; j++) {
            if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                visible = true;
            }
        }

        if (visible === true) {
            tr[cel].style.display = "";
            tr[0].style.display = "";
        } else {
            tr[cel].style.display = "none";
        }
    }
}