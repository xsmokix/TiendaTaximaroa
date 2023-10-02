 <?php 
 require_once "db.php";
        


        if (isset($_POST['modificar_facturacion'])) {

          $id_facturacion=mysqli_real_escape_string($con, $_POST["id_facturacion"]);

         $facturacion = $con->query("SELECT * FROM  facturacion WHERE id = $id_facturacion;");
          while($rowfacturacion = $facturacion->fetch_object()){


        ?>

      
      <form method="post" action="actualizar.php" id="formModificarFacturacion">
                <input type="hidden" name="actualizar_facturacion" value="1">
                 <input type="hidden" name="id_facturacion" value="<?php echo $rowfacturacion->id ?>">

                <!-- Address -->
               
                <div class="pl-lg-4">
                  <div class="row">

                <!-- facturacion -->

                <div class="col-md-12">
                    <label for="firstName">Razón social</label>
                  <input  type="text" name="razon_social" class="form-control form-control-alternative" id="razonsocialMod" value="<?php echo $rowfacturacion->razon_social ?>">
                </div>
                <div class="col-md-12">
                    <label for="firstName">Régimen fiscal</label>
                  <input  type="text" name="regimen" class="form-control form-control-alternative" id="regimenMod" value="<?php echo $rowfacturacion->regimen ?>">
                </div>
                <div class="col-md-12">
                <label for="rfc">RFC</label>
                <input type="text" name="rfc" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "13" class="form-control form-control-alternative" id="rfcMod" value="<?php echo $rowfacturacion->rfc ?>" required>
              </div>
               <div class="col-md-6">
                <label for="corroe">Correo electrónico</label>
                <input  type="text" name="correo" class="form-control form-control-alternative" id="correoMod" value="<?php echo $rowfacturacion->correo ?>" required>
                <span class="badge badge-danger" id="validatecorreoMod" style="display: none;">Ingresa un correo válido</span>
              </div>
               <div class="col-md-6">
                <label for="correoalt">Correo electrónico alternativo</label>
                <input  type="text" name="correo_alt" class="form-control form-control-alternative" id="correo_altMod" value="<?php echo $rowfacturacion->correo_alt ?>">
              </div>
           
              <div class="col-md-8">
                <label for="city">Calle</label>
                <input type="text" name="calle" class="form-control form-control-alternative" id="calleMod" value="<?php echo $rowfacturacion->calle ?>" required>
              </div>
              <div class="col-md-4">
                <label for="numero">Número</label>
                <input type="number" name="numero" class="form-control form-control-alternative" id="numeroMod" value="<?php echo $rowfacturacion->numero ?>">
              </div>
              <div class="col-md-8">
                <label for="address">Colonia</label>
                <input type="text" name="colonia" class="form-control form-control-alternative" id="coloniaMod" value="<?php echo $rowfacturacion->colonia ?>">
              </div>
              <div class="col-md-4">
                <label for="cp">Código postal</label>
                <input type="number" name="cp" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "5" class="form-control form-control-alternative" id="cp" value="<?php echo $rowfacturacion->cp ?>">
              </div>
              
              
              
              <div class="col-md-6">
                <label for="Estado">Estado</label>
                <select name="estado" id="jmr_contacto_estado1" class="form-control">
                              <option value="<?php echo $rowfacturacion->estado ?>"><?php echo $rowfacturacion->estado ?></option>
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
              <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label"  for="input-city">Municipio</label>
                         <select id="jmr_contacto_municipio1" class="form-control" name="municipio" required>
                          <option value="<?php echo $rowfacturacion->municipio ?>"><?php echo $rowfacturacion->municipio ?></option>
                        </select>
                      </div>
                    </div>
              <div class="col-md-6">
                <label for="Ciudad">Ciudad</label>
                <input type="text" name="ciudad" class="form-control" id="ciudadMod" value="<?php echo $rowfacturacion->ciudad ?>">
              </div>
              <div class="col-md-6">
                <label for="pais">País</label>
                <input type="text" name="pais" class="form-control" id="paisMod" value="<?php echo $rowfacturacion->pais ?>">
              </div>
              <div class="col-md-12">
                <label for="uso CFDI">uso CFDI</label>
                <select name="cfdi" class="form-control" id="cfdiMod">
                  <option value="G01" <?php if($rowfacturacion->cfdi =='G01'){ echo "selected"; }?>>G01 Adquisición de mercancias</option>
                  <option value="G02" <?php if($rowfacturacion->cfdi =='G02'){ echo "selected"; }?>>G02 Devoluciones, descuentos o bonificaciones</option>
                  <option value="G03" <?php if($rowfacturacion->cfdi =='G03'){ echo "selected"; }?>>G03 Gastos en general</option>
                  <option value="I01" <?php if($rowfacturacion->cfdi =='I01'){ echo "selected"; }?>>I01 Construcciones</option>
                  <option value="I02" <?php if($rowfacturacion->cfdi =='I02'){ echo "selected"; }?>>I02 Mobilario y equipo de oficina por inversiones</option>
                  <option value="I03" <?php if($rowfacturacion->cfdi =='I03'){ echo "selected"; }?>>I03 Equipo de transporte</option>
                  <option value="I04" <?php if($rowfacturacion->cfdi =='I04'){ echo "selected"; }?>>I04 Equipo de computo y accesorios</option>
                  <option value="I05" <?php if($rowfacturacion->cfdi =='I05'){ echo "selected"; }?>>I05 Dados, troqueles, moldes, matrices y herramental</option>
                  <option value="I06" <?php if($rowfacturacion->cfdi =='I06'){ echo "selected"; }?>>I06 Comunicaciones telefónicas</option>
                  <option value="I07" <?php if($rowfacturacion->cfdi =='I07'){ echo "selected"; }?>>I07 Comunicaciones satelitales</option>
                  <option value="I08" <?php if($rowfacturacion->cfdi =='I08'){ echo "selected"; }?>>I08 Otra maquinaria y equipo</option>
                  <option value="D01" <?php if($rowfacturacion->cfdi =='D01'){ echo "selected"; }?>>D01 Honorarios médicos, dentales y gastos hospitalarios.</option>
                  <option value="D02" <?php if($rowfacturacion->cfdi =='D02'){ echo "selected"; }?>>D02 Gastos médicos por incapacidad o discapacidad</option>
                  <option value="D03" <?php if($rowfacturacion->cfdi =='D03'){ echo "selected"; }?>>D03 Gastos funerales.</option>
                  <option value="D04" <?php if($rowfacturacion->cfdi =='D04'){ echo "selected"; }?>>D04 Donativos.</option>
                  <option value="D05" <?php if($rowfacturacion->cfdi =='D05'){ echo "selected"; }?>>D05 Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).</option>
                  <option value="D06" <?php if($rowfacturacion->cfdi =='D06'){ echo "selected"; }?>>D06 Aportaciones voluntarias al SAR.</option>
                  <option value="D07" <?php if($rowfacturacion->cfdi =='D07'){ echo "selected"; }?>>D07 Primas por seguros de gastos médicos.</option>
                  <option value="D08" <?php if($rowfacturacion->cfdi =='D08'){ echo "selected"; }?>>D08 Gastos de transportación escolar obligatoria.</option>
                  <option value="D09" <?php if($rowfacturacion->cfdi =='D09'){ echo "selected"; }?>>D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.</option>
                  <option value="D10" <?php if($rowfacturacion->cfdi =='D10'){ echo "selected"; }?>>D10 Pagos por servicios educativos (colegiaturas)</option>
                  <option value="P01" <?php if($rowfacturacion->cfdi =='P01'){ echo "selected"; }?>>P01 Por definir</option>
                </select>
              </div>

               
                <div class="col-md-12">
                  <hr class="my-4" />
                </div>
               
                <div class="col-md-12 text-center">
                  <button type="button" class="btn btn-sm btn-info" onclick="validarNuevaFacturacionMod(); return false;">Actualizar datos de facturación</button>&nbsp;&nbsp;&nbsp;
                  
                </div>
             
              </div>
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
              </script>


              <?php }
              }
               ?>
