function limpiarCampos() {
    var nombre = document.getElementById("inputNombre");
    var email = document.getElementById("inputEmail");
    var usuario = document.getElementById("inputUsuario");
    var password = document.getElementById("inputContraseña");

    nombre.value = null;
    email.value = null;
    usuario.value = null;
    password.value = null;
}

function crearUsuario() {
    var nombre = document.getElementById("inputNombre").value;
    var email = document.getElementById("inputEmail").value;
    var usuario = document.getElementById("inputUsuario").value;
    var password = document.getElementById("inputContraseña").value;

    var nuevoUsuario = JSON.constructor();
    nuevoUsuario.nombre = nombre;
    nuevoUsuario.email = email;
    nuevoUsuario.usuario = usuario;
    nuevoUsuario.password = password;

    var r = document.getElementById("resultado");
    r.innerHTML = JSON.stringify(nuevoUsuario, null, 2);

    limpiarCampos();
}

function convertirJSON() {
    var resultado = document.getElementById("resultado");
    var jsonStr = document.getElementById("inputJSON");
    var data = JSON.parse(jsonStr.value);
    

    var table = document.createElement("table"), row, celdaKey, celdaValue;
    document.getElementById("tabla").appendChild(table);

    for (let key in data) {
        row =  table.insertRow();
        celdaKey = row.insertCell();
        celdaKey.innerHTML = key
        celdaValue = row.insertCell();
        celdaValue.innerHTML = data[key];
    }

    table.className = "table"

    resultado.innerHTML = null;
    jsonStr.value = null;
}
