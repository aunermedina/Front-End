$(document).ready(function () {
    cargarDatos();

});

function cargarDatos() {
    // comenzamos cargando los datos del endpoint
    $.ajax({
        type: "GET",
        url: "http://localhost/fe-pi/api/empleados/lista_empleados.php",
        dataType: "json",
        success: function (json) {
            console.log(json.itemCount);
            document.getElementById("numEmpleado").innerHTML = json.itemCount;
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error: ", status.message);
        },
    });

    $.ajax({
        type: "GET",
        url: "http://localhost/fe-pi/api/registros/lista_registros.php",
        dataType: "json",
        success: function (json) {
            console.log(json.itemCount);
            document.getElementById("numCliente").innerHTML = json.itemCount;
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error: ", status.message);
        },
    });
}
