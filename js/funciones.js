function enviarDatos(urlArchivo, idContenedor, tipo, data, file) {
    var form_data = new FormData();
    if (idContenedor)
        $("#" + idContenedor).html("<div class='spinner-border text-primary' role='status'><span class='sr-only'>Cargando...</span></div>");
    if (data)
        form_data.append('data', data);
    if (file)
        form_data.append('file', file);
    $.ajax({
        url: urlArchivo,
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'text',
        type: 'POST',
        success: function(ajax) {
            switch (tipo) {
                case 1:
                    $("#" + idContenedor).html(ajax);
                    break;

                case 2:
                    if (ajax == "ok") {
                        $("#alertaImg").html("Los datos de la imagen se guardaron correctamente");
                        $("#alertaImg").removeClass("alert-danger");
                        $("#alertaImg").addClass("alert-success");
                        $("#alertaImg").addClass("d-flex");
                        $("#labelSubirImg").html("Seleccionar Archivo.");
                        $("#subirImg").val("");
                        enviarDatos("php/listaAsistencia.php", "tabla_asistencia", 1);
                    } else
                        alert(ajax);
                    break;
            }
        }
    });
}

function previoImg() {
    $("#alertaImg").removeClass("alert-success");
    $("#alertaImg").removeClass("d-flex");
    $("#alertaImg").addClass("d-none");
    $("#alertaImg").addClass("alert-danger");
    $("#alertaImg").html("");
    var extensionDoc = $("#subirImg").val();
    extensionDoc = extensionDoc.split(".");
    extensionDoc = extensionDoc[extensionDoc.length - 1];
    extensionDoc = extensionDoc.toUpperCase();
    if (extensionDoc == 'JPG' || extensionDoc == 'JPEG' || extensionDoc == 'GIF' || extensionDoc == 'PNG' || extensionDoc == 'BMP') {
        $("#alta_archivo_ok").attr("src", "img/ok.png");
        $("#labelSubirImg").html($("#subirImg").val());
    } else {
        $("#alertaImg").html("El archivo cargado no es imagen.");
        $("#alertaImg").addClass("d-flex");
        $("#labelSubirImg").html("Seleccionar Archivo.");
        $("#subirImg").val("");
    }
}

function subirImagen() {
    $("#alertaImg").removeClass("d-flex");
    $("#alertaImg").addClass("d-none");
    $("#alertaImg").html("");
    //var archivo = document.getElementById("subirImg").files[0];
    var archivo = $('#subirImg').prop('files')[0];
    if (!archivo) {
        $("#alertaImg").html("No se ha cargado ninguna imagen.");
        $("#alertaImg").addClass("d-flex");
        return;
    }
    enviarDatos("php/ocr.php", "", 2, "", archivo);
}