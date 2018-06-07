$(document).ready(function () {
    $('#btn_closemodal').click(function () {
        $('#modal').modal('close');
    });
    $('.tooltipped').tooltip();
    $('#Btn_Agree').click(function () {
        Create_Row(this);
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false, // Close upon selecting a date,
        format: 'dd/mm/yyyy',
    });
    $('#Btn_save').click(function () {
        Save_form();
    });
    $('#f_observacion').on('keypress', function () {
        alert("cambio");
    });

});
function Select_Table(obj) {
    $("#Btn_Agree").attr('name', obj.name);
    $("#Div_Agree").removeAttr("style");
    var params = {
        "formulario": obj.name
    };
    $.ajax({
        data: params,
        url: '../../Controllers/Tabla_select.php',
        dataType: 'html',
        type: 'post',
        success: function (response) {
            $("#div_tabla").html(response);
            $('#select').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'copy', text: 'Copiar', className: 'btn yellow darken-3 waves-effect waves-light' },
                    { extend: 'excel', text: 'excel', className: 'btn yellow darken-3 waves-effect waves-light' },
                    { extend: 'csv', text: 'csv', className: 'btn yellow darken-3 waves-effect waves-light' },
                    { extend: 'pdf', text: 'pdf', className: 'btn yellow darken-3 waves-effect waves-light' },
                    { extend: 'print', text: 'Imprimir', className: 'btn yellow darken-3 waves-effect waves-light' }
                ],
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        }
    });
};
function Create_Row(obj) {
    var formulario = obj.name.split(',')[0];
    $('#modal').modal({
        opacity: .5
    });
    $('#modal').modal('open');
    $('#Modal_Iframe').attr('src', '../' + formulario + '/' + formulario + '.php');
    $('#Modal_Iframe').attr('onload', 'resizeIframe(this)');
};
function Edit_Row(obj) {
    var accion = obj.name.split(',')[0];
    var formulario = obj.name.split(',')[1];
    var id = obj.name.split(',')[2];
    var table = $('#select').DataTable();
    var data = table.row($(obj).parents('tr')).data();
    var get = "";
    var lenght_data = data.length - 1;
    for (var a = 0; a < lenght_data; a++) {
        if (a == (lenght_data - 1)) {
            get += data[a].split('id="')[1].substr(0, 1);
        } else {
            get += data[a] + ",";
        }
    }
    $('#modal').modal({
        opacity: .5
    });
    $('#modal').modal('open');
    $('#Modal_Iframe').attr('src', '../' + formulario + '/' + formulario + '.php?info=' + get + ',' + accion)
    $('#Modal_Iframe').attr('onload', 'resizeIframe(this)');
};
function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
};
function closeIFrame() {
    $('#modal').modal('close');
    location.reload();
};
function Select_form(obj) {
    var params = {
        "formulario": obj.name
    };
    $.ajax({
        data: params,
        url: '../../Controllers/form_select.php',
        dataType: 'html',
        type: 'post',
        success: function (response) {
            $("#div_Contenido").html(response);
            $('.collapsible').collapsible();
            $('textarea#f_observacion').characterCounter();
        }
    });
};
function Save_form() {
    var checks = $('input#respuesta_detalle');
    var obs = $('textarea#f_observacion');
    var bit = 0;
    var limit = checks.length;
    var f_split = $('#f_fecha').text().split(' ')[0].split('/');
    var fecha = f_split[2] + '/' + f_split[1] + '/' + f_split[0];

    for (var a = 0; a < limit; a++) {
        if (checks[a].checked) {
            bit = 1;
        } else {
            bit = 0;
        }
        var params = {
            "accion": 6,
            "id_usuario": $('#id_user').text(),
            "id_detalle": 0,
            "id_formulario": $.trim($('#f_formulario').text().split('-')[1]),
            "id_pregunta": checks[a].name,
            "id_ficha": $.trim($('#f_formulario').text().split('-')[2]),
            "fecha": fecha,
            "respuesta_detalle": bit,
            "observacion": obs[a].value,
            "estado_det_for": 1,
        };
        save_question(a, limit, params);
    };
};
function save_question(count, question, params) {
    $.ajax({
        data: params,
        url: '../../Controllers/detalle_formularioHandler.php',
        dataType: 'html',
        type: 'post',
        success: function (response) {
            if (count == (question - 1)) {
                if(response == ""){
                    alert('Formulario almacenado correctamente.');
                }else{
                    alert(response);
                }                
            }
        }
    });
};
function Print_data(obj) {
    var params = {
        "usuario": obj.name
    };
    $.ajax({
        data: params,
        url: '../../Controllers/informe.php',
        dataType: 'html',
        type: 'post',
        success: function (response) {
            $("#div_Contenido").html(response);
            $('#select').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'copy', text: 'Copiar', className: 'btn yellow darken-3 waves-effect waves-light' },
                    { extend: 'excel', text: 'excel', className: 'btn yellow darken-3 waves-effect waves-light' },
                    { extend: 'csv', text: 'csv', className: 'btn yellow darken-3 waves-effect waves-light' },
                    { extend: 'pdf', text: 'pdf', className: 'btn yellow darken-3 waves-effect waves-light' },
                    { extend: 'print', text: 'Imprimir', className: 'btn yellow darken-3 waves-effect waves-light' }
                ],
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        }
    });
}
function closesession() {
    var params = {
        "data": "1"
    };
    $.ajax({
        data: params,
        url: '../../Controllers/LoginHandler.php',
        dataType: 'html',
        type: 'post',
        success: function (response) {
            window.location.replace('http://localhost:8080/verificacion_ambientes/');
        }
    });
}
function restarpass() {
    var data = $('#info_user').text();
    $('#modal').modal({
        opacity: .5
    });
    $('#modal').modal('open');
    $("#restar").attr('src', '../Usuario/usuario_1.php?info=' + data);
    $('#restar').attr('onload', 'resizeIframe(this)');
}