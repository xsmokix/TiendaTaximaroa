<?php 
//$_POST['modificar_producto']=3;
if(!isset($_POST['id_categoria'])){
  die();
  exit();

}else{
  //$id_categoria = "1";
 $id_categoria = $_POST['id_categoria'];
require_once "db.php";
   $subcategoria = $con->query("SELECT * FROM submenu WHERE idmenu = $id_categoria");
    ?>


               
                    <?php  
                     while($rowsubcategoria = $subcategoria->fetch_object()){ ?>
                    <option value="<?php echo $rowsubcategoria->id; ?>"><?php echo $rowsubcategoria->nombre; ?></option>
                  <?php } ?>
                
<?php } ?>