 <?php 
 require_once "db.php";
        


        if (isset($_POST['modificar_direccion'])) {

          $id_direccion=mysqli_real_escape_string($con, $_POST["id_direccion"]);

         $direccion = $con->query("SELECT * FROM  direcciones WHERE id = $id_direccion;");
          while($rowdireccion = $direccion->fetch_object()){


        ?>

      <form method="post" action="actualizar.php">
                <input type="hidden" name="actualizar_direccion" value="1">
                <input type="hidden" name="id_direccion" value="<?php echo $rowdireccion->id ?>">

                <!-- Address -->
               
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Calle</label>
                        <input name="calle" class="form-control form-control-alternative"  value="<?php echo $rowdireccion->calle ?>" type="text" required>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Núm. Ext</label>
                        <input name="numero_exterior" class="form-control form-control-alternative"  value="<?php echo $rowdireccion->numero_exterior ?>" type="text" required>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Núm. Int</label>
                        <input name="numero_interior" class="form-control form-control-alternative"  value="<?php echo $rowdireccion->numero_interior ?>" type="text">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Colonia</label>
                        <input name="colonia" class="form-control form-control-alternative"  value="<?php echo $rowdireccion->colonia ?>" type="text" required>
                      </div>
                    </div>
           
                  

                  <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Estado</label>
                        <select name="estado" id="jmr_contacto_estado1" class="form-control jmr_contacto_estado">
                              <option value="<?php echo $rowdireccion->estado ?>">
                                <?php if($rowdireccion->estado==""){ 
                                  echo "Selecciona estado..."; 
                                }else{ 
                                  echo $rowdireccion->estado; 
                                } ?>
                              </option>
                              <option value="Aguascalientes">Aguascalientes</option>
                              <option value="Baja California">Baja California</option>
                              <option value="Baja California Sur">Baja California Sur</option>
                              <option value="Campeche">Campeche</option>
                              <option value="Chiapas">Chiapas</option>
                              <option value="Chihuahua">Chihuahua</option>
                              <option value="CDMX">Ciudad de México</option>
                              <option value="Coahuila">Coahuila</option>
                              <option value="Colima">Colima</option>
                              <option value="Durango">Durango</option>
                              <option value="Estado de México">Estado de México</option>
                              <option value="Guanajuato">Guanajuato</option>
                              <option value="Guerrero">Guerrero</option>
                              <option value="Hidalgo">Hidalgo</option>
                              <option value="Jalisco">Jalisco</option>
                              <option value="Michoacán">Michoacán</option>
                              <option value="Morelos">Morelos</option>
                              <option value="Nayarit">Nayarit</option>
                              <option value="Nuevo León">Nuevo León</option>
                              <option value="Oaxaca">Oaxaca</option>
                              <option value="Puebla">Puebla</option>
                              <option value="Querétaro">Querétaro</option>
                              <option value="Quintana Roo">Quintana Roo</option>
                              <option value="San Luis Potosí">San Luis Potosí</option>
                              <option value="Sinaloa">Sinaloa</option>
                              <option value="Sonora">Sonora</option>
                              <option value="Tabasco">Tabasco</option>
                              <option value="Tamaulipas">Tamaulipas</option>
                              <option value="Tlaxcala">Tlaxcala</option>
                              <option value="Veracruz">Veracruz</option>
                              <option value="Yucatán">Yucatán</option>
                              <option value="Zacatecas">Zacatecas</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Municipio</label>
                       <select id="jmr_contacto_municipio1" class="form-control" name="municipio">

                          <option value="" selected><?php echo $municipio = $rowdireccion->municipio ?></option>

                        </select>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Ciudad</label>
                        <input type="text" name="ciudad" class="form-control form-control-alternative"  value="<?php echo $rowdireccion->ciudad ?>" required>
                      </div>
                    </div>
                    
                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">CP</label>
                        <input type="number" name="cp"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "5" class="form-control form-control-alternative"  value="<?php echo $rowdireccion->cp ?>" required>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
               
                <div class="text-center">
                  <button type="submit" class="btn btn-sm btn-info">Actualizar dirección</button>&nbsp;&nbsp;
                </div>
             
              
              </form>


              <script>
                // Obtener municipios
$("#jmr_contacto_estado1").on("change", function() {
  console.log("entro");
//$("#jmr_contacto_estado1").change(function(){
var estado = $("#jmr_contacto_estado1 option:selected").val();
$.ajax({
type: "POST",
url: "procesar-estados.php",
data: { municipios : estado } 
}).done(function(data){
$("#jmr_contacto_municipio1").html(data);
});
});



$( document ).ready(function() {
  console.log("entro");
//$("#jmr_contacto_estado").change(function(){
var estado = $("#jmr_contacto_estado1").val();
$.ajax({
type: "POST",
url: "procesar-estados.php",
data: { municipios : estado } 
}).done(function(data){
$("#jmr_contacto_municipio1").html(data);
$("#jmr_contacto_municipio1").prepend('<option value="<?php echo $municipio; ?>" selected><?php echo $municipio; ?></option>');
});


});

              </script>


              <?php }
              }
               ?>
