<html>
    <head>
        <title>Proyecto IA</title>
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap-4.5.3/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <!--JS-->
        <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="js/ajaxupload-min.js"></script>
        <script type="text/javascript" src="js/shortcut.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-4.5.3/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
    </head>
    <body class="p-3 mb-2 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div id="subir_img" class="col"></div>
                <div id="tabla_asistencia" class="col table-responsive altoTabla"></div>
            </div>
        </div>
    </body>
    <script>
        enviarDatos("php/subirArchivo.php", "subir_img" , 1);
        enviarDatos("php/listaAsistencia.php", "tabla_asistencia",  1);
    </script>
</html>