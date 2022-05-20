// Variables
var myTable = "#resultados";
var myTableBody = myTable + " tbody";
var myTableRows = myTableBody + " tr";
var myTableColumn = myTable + " th";
var modalEditar = document.getElementById("editarModal");

$(document).ready(function () {
    cargarDatos();
    // configuramos la primer columan en order asc
    $(myTableColumn).eq(0).addClass("sorted-asc");

});

function cargarDatos() {
    // comenzamos cargando los datos del endpoint
    $.ajax({
        type: "GET",
        url: "http://localhost/fe-pi/api/empleados/lista_empleados.php",
        dataType: "json",
        success: function (json) {
            document.getElementById("loading").remove();
            $.each(json.data, function (reg) {
                $("#resultados tbody").append(`<tr>
                <td>${json.data[reg].id}</td>
                <td>${json.data[reg].name}</td>
                <td>${json.data[reg].email}</td>
                <td>${json.data[reg].age}</td>
                <td>${json.data[reg].designation}</td>
                <td><div class="btn-group" role="group" aria-label="Basic example">
                <button id="editar" data-row='${JSON.stringify(json.data[reg])}' type="button" class="btn btn-primary">Editar</button>
                <button id="eliminar" data-row="${json.data[reg].id}" type="button" class="btn btn-danger">Eliminar</button>
              </div></td>
            </tr>`);

            });

            paginacion(5);
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error: ", status.message);
        },
    });

}

function filtrar() {
    // metodo para filtrar resultados mientras escribimos
    var table = document.getElementById("resultados").tBodies[0];
    var busqueda = document.getElementById('inputFiltrar');
    texto = busqueda.value.toLowerCase();
    var r = 0;
    while (row = table.rows[r++]) {
        if (row.innerText.toLowerCase().indexOf(texto) !== -1) {
            row.style.display = null;
        } else
            row.style.display = 'none';
    }
}

$("th").click(function () {
    // Cuando le demos click a cualquier columna se aplicara el ordenamiento
    var table = $(this).parents("table").eq(0);
    var rows = table
        .find("tr:gt(0)")
        .toArray()
        .sort(comparer($(this).index()));
    this.asc = !this.asc;
    if (!this.asc) {
        rows = rows.reverse();
    }
    for (var i = 0; i < rows.length; i++) {
        table.append(rows[i]);
    }
    setIcon($(this), this.asc);
});

function comparer(index) {
    // comparar valores de la tabla entre sí
    return function (a, b) {
        var valA = getCellValue(a, index),
            valB = getCellValue(b, index);
        return $.isNumeric(valA) && $.isNumeric(valB) ?
            valA - valB :
            valA.localeCompare(valB);
    };
}

function getCellValue(row, index) {
    // Obtener valores de cada celda
    return $(row).children("td").eq(index).html();
}

function setIcon(element, asc) {
    // toggler para cambiar las fechas en las columnas
    $("th").each(function (index) {
        $(this).removeClass("sorted-asc");
        $(this).removeClass("sorted-desc");
    });

    if (asc) element.addClass("sorted-asc");
    else element.addClass("sorted-desc");
}

$(document).on("change", "#mostrar", function () {
    paginacion($("#mostrar").val());
})

function paginacion(valor) {
    // Paginacion de la tabla
    $("#page-navigation").remove();
    $("#total_registro").remove();
    $('#datatable_paginate').append('<nav id="page-navigation"><ul class="pagination"></ul></nav>');

    var rowsShown = valor;
    var rowsTotal = $('#resultados tbody tr').length;
    var numPages = rowsTotal / rowsShown;
    var i = 0;


    for (i; i < numPages; i++) {
        var pageNum = i + 1;
        $('.pagination').append(`<li class="page-item" rel="${i}"><a class="page-link" href="#">${pageNum}</a></li>`);
    }

    $('#resultados tbody tr').hide();
    $('#resultados tbody tr').slice(0, rowsShown).show("drop");
    $("#datatable_info").append(`<label id="total_registro" class="m-2">Mostrando 1 al ${valor} de ${rowsTotal} registros</label>`);
    $('.pagination li:first').addClass('active');

    $('.pagination li').bind('click', function () {

        $("#total_registro").remove();
        $('.pagination li').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        startItem = currPage * rowsShown;
        endItem = Number(startItem) + Number(rowsShown);
        // console.log(currPage, startItem, endItem);
        $("#datatable_info").append(`<label id="total_registro" class="m-2">Mostrando ${startItem + 1} al ${endItem} de ${rowsTotal} registros</label>`);
        $('#resultados tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).css('display', 'table-row').animate({
            opacity: 1
        }, 300);
    });
}



$(document).on("click", "button#editar", function () {
    const data = $(this).data("row");
    document.getElementById("idEmpleado").value = data.id;
    document.getElementById("inputName").value = data.name;
    document.getElementById("inputEdad").value = data.age;
    document.getElementById("inputEmail").value = data.email;
    document.getElementById("inputDepto").value = data.designation;

    $("#editarModal").show("drop");
})

$(document).on("submit", "#editarEmpleado", function () {
    var id = document.getElementById("idEmpleado").value;
    var name = document.getElementById("inputName").value;
    var age = document.getElementById("inputEdad").value;
    var email = document.getElementById("inputEmail").value;
    var depto = document.getElementById("inputDepto").value;

    fetch(`http://localhost/fe-pi/api/empleados/actualizar_empleado.php?id=${id}&name=${name}&age=${age}&email=${email}&designation=${depto}`, {
        method: "PUT"
    }).then((response) => {
        if (response.ok) {
            $("#editarModal").hide();
            location.reload();
            return response.json();
        }
    }).then((data) => {
        alert(data.message);
    })

    
})

$(document).on("click", "button#eliminar", function () {
    const id = $(this).data("row");
    if (confirm("¿Está seguro de eliminar el empleado?")) {
        fetch(`http://localhost/fe-pi/api/empleados/eliminar_empleado.php?id=${id}`, {
            method: "DELETE"
        }).then((response) => {
            if (response.ok) {
                location.reload();
                return response.json();
            }
        }).then((res) => {
            alert(res.message);
        })
    }
})