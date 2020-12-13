<?php
function Conectarse()
{
    global $host, $usuario, $password, $db;
    $host = "localhost";
    $usuario = "root";
    $password = "";
    $db = "proyecto-ia";
    if (!($link = mysqli_connect($host, $usuario, $password))) 
    { 
        echo "Error conectando a la base de datos."; 
        exit(); 
    }
    if (!mysqli_select_db($link, $db)) 
    { 
        echo "Error seleccionando la base de datos."; 
        exit(); 
    }
    return $link; 
} 

function guardarAsistencias($listaNombres)
{
    $mysqli = Conectarse();
    foreach($listaNombres as $nombre)
    {
        $selAlumno = "SELECT * FROM alumnos_asistencia WHERE nombre = '$nombre' LIMIT 1;";
        $resAlumno = mysqli_query($mysqli, $selAlumno);
        if(mysqli_num_rows($resAlumno) > 0)
        {
            $alumno = mysqli_fetch_array($resAlumno);
            $updateAlumno = "UPDATE alumnos_asistencia SET asistencias = ".($alumno['asistencias'] + 1).", ultima_asistencia = '".date('Y-m-d H:i:s')."' WHERE id = $alumno[id] LIMIT 1;";
            mysqli_query($mysqli, $updateAlumno);
        }else
        {
            $insertAlumno = "INSERT INTO alumnos_asistencia (nombre, asistencias, ultima_asistencia) VALUES('$nombre', 1, '".date('Y-m-d H:i:s')."');";
            mysqli_query($mysqli, $insertAlumno);
        }
    }
    echo "ok";
}
?>