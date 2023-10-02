<?php
include "db.php";


$type = 0;
if(isset($_POST['type'])){
    $type = $_POST['type'];
}
// Search result
if($type == 1){
    $searchText = mysqli_real_escape_string($con,$_POST['search']);

    $sql = "SELECT * FROM marcas where marca like '%".$searchText."%' order by marca asc limit 5";

    $result = mysqli_query($con,$sql);

    $search_arr = array();

    while($fetch = mysqli_fetch_assoc($result)){
        $id = $fetch['id'];
        $marca = $fetch['marca'];
        

        $search_arr[] = array("id" => $id, "marca" => $marca);
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