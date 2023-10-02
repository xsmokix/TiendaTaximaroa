<?php
    $id_producto = $_GET['id_producto'];
    $nombre_foto = $_GET['eliminar_foto'];
    //HERE IS THE LOGIC TO FIND THE PATH OF YOUR FILE
    unlink($nombre_foto); //You can add more validations or full paths
     header("Location: productos_editar.php?id_producto=".$id_producto);
?>