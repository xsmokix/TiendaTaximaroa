<?php
include "db.php";


$type = 0;
if(isset($_POST['type'])){
    $type = $_POST['type'];
}
// Search result
if($type == 1){
    $searchText = mysqli_real_escape_string($con,$_POST['search']);

    $sql = "SELECT id,nombre,foto1,codigo_fabricante,clave_producto,existencia FROM productos where clave_producto like '%".$searchText."%' order by nombre asc limit 5";

    $result = mysqli_query($con,$sql);

    $search_arr = array();

    while($fetch = mysqli_fetch_assoc($result)){
        $id = $fetch['id'];
        $nombre = $fetch['nombre'];
        $foto = $fetch['foto1'];
        $codigo = $fetch['codigo_fabricante'];
        $clave_producto = $fetch['clave_producto'];
        $existencia = $fetch['existencia'];

        $search_arr[] = array("id" => $id, "nombre" => $nombre, "foto" => $foto, "codigo" => $codigo , "clave_producto" => $clave_producto, "existencia" => $existencia);
    }

    echo json_encode($search_arr);
}

// get User data
if($type == 2){
    $productoId = mysqli_real_escape_string($con,$_POST['productoId']);

    $sql = "SELECT id FROM productos where id=".$productoId;

    $result = mysqli_query($con,$sql);

    $return_arr = array();
    while($fetch = mysqli_fetch_assoc($result)){
        $username = $fetch['nombre'];
        $email = $fetch['descripcion'];

        $return_arr[] = array("username"=>$username, "email"=> $email);
    }

    echo json_encode($return_arr);
}