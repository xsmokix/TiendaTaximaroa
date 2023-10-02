<?php
$id = $_GET['id'];
date_default_timezone_set('America/Mexico_City');
$hoy = date("Y-m-d");

if (!file_exists("../assets/images/productos/".$id)) {
            mkdir("../assets/images/productos/".$id, 0777);
}
    $nombre  = pathinfo( $_FILES["file"]["name"], PATHINFO_FILENAME ); // nombre
    function limpiar($string){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }
    $nombre = limpiar($nombre);
    $extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "../assets/images/productos/".$id."/".$nombre.".".$extension)) {
        echo 'si';
    } else {
        echo 'no';
    }
