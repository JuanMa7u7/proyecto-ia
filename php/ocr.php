<?php
    include_once("db.php");
    include_once('../vendor/autoload.php'); 
    use thiagoalessio\TesseractOCR\TesseractOCR;
    extract($_POST);
    $imgNombre = $_FILES['file']['name'];
    $imgRuta = "../img/capturas/".$_FILES['file']['name'];
    move_uploaded_file($_FILES["file"]["tmp_name"], $imgRuta);
    $ocr = new TesseractOCR();
    $ocr -> image($imgRuta);
    $ocr -> lang('spa');
    $resultado = $ocr -> run();
    unlink($imgRuta);
    $charset='UTF-8';
    $resultado = iconv($charset, 'ASCII//TRANSLIT', $resultado);
    $resultado = strtoupper($resultado);
    $resultado = preg_replace('([^A-Z|^\x20|^\n])', '', $resultado);
    $resultado = preg_replace('/\n+/', "|", $resultado);
    $resultado = explode("|", $resultado);
    $listaNombres = array();
    for($i = 0; $i < count($resultado); $i++)
        if($i % 2 == 0)
        {
            $resultado[$i] = substr($resultado[$i], 0, -1);
            array_push($listaNombres, $resultado[$i]);
        }
    if(($clave = array_search("TU", $listaNombres)) !== false) 
        unset($listaNombres[$clave]);
    $listaNombres = array_unique($listaNombres);
    //SE ALMACENA LA INFORMACION EN LA BASE DE DATOS
    guardarAsistencias($listaNombres);
?>