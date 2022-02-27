function crearRegistro() {
    var nombre = document.getElementById("nombre");
    var apellidos = document.getElementById("apellidos");
    var usuario = document.getElementById("usuario");
    var comentarios = document.querySelector("textarea");
    var moneda = document.getElementById("moneda");
    var pago = document.querySelectorAll('input[type=checkbox]');
    var labelPago = document.getElementById("label_pago");
    var tbody = document.querySelector('tbody');
    var registro = document.createElement('tr');
    var tHeadCount = null;

    if (nombre.value == "" || nombre == null) {
        nombre.style.background = "red";
    } else {
        nombre.previousElementSibling.style.color = "green";
        nombre.style.background = "white";
        var valor = document.createTextNode(nombre.value);
        var celda = document.createElement('td');
        celda.appendChild(valor);
        registro.appendChild(celda);
        nombre.value = null;
    }



    if (apellidos.value == "" || apellidos == null) {
        apellidos.style.background = "red";
    } else {
        apellidos.previousElementSibling.style.color = "green";
        apellidos.style.background = "white";
        var valorApe = document.createTextNode(apellidos.value);
        var celdaApe = document.createElement('td');
        celdaApe.appendChild(valorApe);
        registro.appendChild(celdaApe);
        apellidos.value = null;
    }

    if (usuario.value == "" || usuario == null) {
        usuario.style.background = "red";
    } else {
        usuario.previousElementSibling.style.color = "green";
        usuario.style.background = "white";
        var vUser = document.createTextNode(usuario.value);
        var cUser = document.createElement('td');
        cUser.appendChild(vUser);
        registro.appendChild(cUser);
        usuario.value = null;
    }

    if (moneda.value == "0") {
        moneda.style.background = "red";
    } else {
        moneda.previousElementSibling.style.color = "green";
        moneda.style.background = "white";
        var vCoin = document.createTextNode(moneda.value);
        var cCoin = document.createElement('td');
        cCoin.appendChild(vCoin);
        registro.appendChild(cCoin);
        moneda.value = 0;
    }

    var valido = 0;
    var pos = null;
    var vPago = null;

    for (var i of pago) {
        if (i.checked) {
            i.style.color = "green";
            valido++;
            vPago = document.createTextNode(i.id);
            pos = i;
        }
    }

    if (valido == 0 || valido > 1) {
        alert("Selecciona solo un método de pago");
    } else {
        labelPago.style.color = "green";
        var cPago = document.createElement('td');
        cPago.appendChild(vPago);
        registro.appendChild(cPago);
        pos.checked = false;
    }

    if (comentarios.value == "" || comentarios == null) {
        comentarios.style.background = "red";
    } else {
        comentarios.previousElementSibling.style.color = "green";
        comentarios.style.background = "white";
        var tComm = comentarios.value;
        var vComm = document.createTextNode(tComm);
        var cComm = document.createElement('td');
        cComm.appendChild(vComm);
        registro.appendChild(cComm);
        comentarios.value = null;
    }

    if (!tbody) {
        crearTabla();
        tHeadCount = document.querySelectorAll('th').length;
    } else {
        tHeadCount = document.querySelectorAll('th').length;
    }
    
    if (registro.childElementCount == (tHeadCount - 1)) {
        var tAct = document.createElement("i");
        tAct.className = "bi bi-trash";
        tAct.onclick = eliminarFila;
        var cAct = document.createElement("td");
        cAct.appendChild(tAct);
        registro.appendChild(cAct);
        tbody.appendChild(registro);
    } 
}

function eliminarFila() {
    var tabla = document.getElementById("historial");
    var numFilas = tabla.rows.length;
    if (numFilas == 1) {
        eliminarTabla();
    } else {
        var fila = this.parentNode.parentNode;
        fila.parentNode.removeChild(fila);
    }
}

function eliminarTabla() {
    var tabla = document.getElementById("historial");
    if (tabla) {
        document.getElementById("tabla").removeChild(tabla);
    } else {
        alert("No hay registros en el historial");
    }
}

function crearTabla() {
    console.log("creando tabla!")
    let table = document.createElement('table');
    table.id = "historial";
    let thead = document.createElement('thead');
    let tbody = document.createElement('tbody');

    table.appendChild(thead);
    table.appendChild(tbody);

    let headers = ["Nombre", "Apellidos", "Usuario", "Moneda a Comprar", "Moneda de Pago", "Comentarios", "Acción"];

    for (const header of headers) {
        let vHeader = document.createTextNode(header);
        let thHeader = document.createElement("th");
        thHeader.appendChild(vHeader);
        thead.appendChild(thHeader);
    }

    document.getElementById("tabla").appendChild(table);
}

window.onload = crearTabla;