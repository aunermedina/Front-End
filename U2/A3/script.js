var data = [];
var registro = 1;

function limpiarCampos() {
    var moneda = document.getElementById("selectMoneda");
    var precio = document.getElementById("inputPrecio");
    var cantidad = document.getElementById("inputCantidad");

    moneda.value = 0;
    precio.value = null;
    cantidad.value = null;
}

function crearOrden() {
    var moneda = document.getElementById("selectMoneda").value;
    var precio = document.getElementById("inputPrecio").value;
    var cantidad = document.getElementById("inputCantidad").value;

    var nuevaOrden = JSON.constructor();
    nuevaOrden.moneda = moneda;
    nuevaOrden.precio = precio;
    nuevaOrden.cantidad = cantidad;
    nuevaOrden.estatus = "Completado";
    
    data.push(nuevaOrden);

    limpiarCampos();

    setTimeout(() => {
        agregarATabla(data);
    }, Math.floor(Math.random() * 10000));
}

function agregarATabla(data) {
    var table = document.getElementById("tbody"), row, celdaKey, celdaMoneda, celdaPrecio, celdaCantidad, celdaEstatus;

    for (let key in data) {
        row =  table.insertRow();
        celdaKey = row.insertCell();
        celdaKey.innerHTML = registro++;
        celdaMoneda = row.insertCell();
        celdaMoneda.innerHTML = data[key].moneda;
        celdaPrecio = row.insertCell();
        celdaPrecio.innerHTML = data[key].precio;
        celdaCantidad = row.insertCell();
        celdaCantidad.innerHTML = data[key].cantidad;
        celdaEstatus = row.insertCell();
        celdaEstatus.innerHTML = data[key].estatus;
    }

    data.pop();
}

function crearTabla() {
    let table = document.createElement('table');
    table.id = "historial";
    table.className = "table"
    let thead = document.createElement('thead');
    let tbody = document.createElement('tbody');
    tbody.id = "tbody";

    table.appendChild(thead);
    table.appendChild(tbody);

    var headers = ["#", "Moneda", "Precio", "Cantidad", "Estatus"];

    for (const header of headers) {
        let vHeader = document.createTextNode(header);
        let thHeader = document.createElement("th");
        thHeader.appendChild(vHeader);
        thead.appendChild(thHeader);
    }

    document.getElementById("tabla").appendChild(table);
}

window.onload = crearTabla;