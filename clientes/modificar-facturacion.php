<?php 
require_once "db.php";
$facturacion = $con->query("SELECT * FROM facturacion WHERE id = $_POST[id_facturacion]");
 while($rowFacturacion = $facturacion->fetch_object()){

 ?>
<form id="formFacturacion1" method="post" action="actualizar.php">
                <input type="text" name="actualizarfacturacion" value="1">
                <input type="text" name="id_facturacion" value="<?php echo $_POST['id_facturacion'] ?>">
                



                  <div class="row gutter-1 mb-6" style="background-color: rgba(0, 0, 0, 0.03); padding:20px 20px;">
              
              <div class="form-group col-md-12">
                <label for="firstName">Razón social</label>
                <div id="search3">
                <input  type="text" name="razon_social" class="form-control form-control-alternative" id="razon_social" value="<?php echo $rowFacturacion->razon_social ?>">
              </div>
              </div>
               <div class="form-group col-md-6">
                <label for="rfc">RFC</label>
                <input type="text" name="rfc" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "13" class="form-control form-control-alternative" id="rfc" value="<?php echo $rowFacturacion->rfc ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control form-control-alternative" id="correo1" value="<?php echo $rowFacturacion->correo ?>">
                <span id="validatecorreo1" class="validate badge badge-danger" style="display: none;">Ingresa un correo válido</span>
              </div>
           
          
              <div class="form-group col-md-4">
                <label for="city">Calle</label>
                <input type="text" name="calle" class="form-control form-control-alternative" id="calle" value="<?php echo $rowFacturacion->calle ?>">
              </div>
              <div class="form-group col-md-2">
                <label for="postcode">Número</label>
                <input type="number" name="numero" class="form-control form-control-alternative" id="numero" value="<?php echo $rowFacturacion->numero ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="address">Colonia</label>
                <input type="text" name="colonia" class="form-control form-control-alternative" id="colonia" value="<?php echo $rowFacturacion->colonia ?>">
              </div>
              <div class="form-group col-md-2">
                <label for="cp">Código postal</label>
                <input type="number" name="cp" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "5" class="form-control form-control-alternative" id="cp" value="<?php echo $rowFacturacion->cp ?>">
              </div>
             
              <div class="form-group col-md-4">
                <label for="Ciudad">Ciudad</label>
                <input type="text" name="ciudad" class="form-control form-control-alternative" id="ciudad" value="<?php echo $rowFacturacion->ciudad ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="Estado">Estado</label>
                <select name="estado" id="jmr_contacto_estado1" class="form-control">
                  <option value="<?php echo $rowFacturacion->estado ?>"><?php echo $rowFacturacion->estado ?></option>
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
              <div class="form-group col-md-4">
                <label for="Municipio">Municipio</label>
               <select id="jmr_contacto_municipio1" name="municipio" class="form-control">
                <option value="<?php echo $rowFacturacion->municipio ?>"><?php echo $rowFacturacion->municipio ?></option></select>
              </div>
              
              <div class="form-group col-md-6">
                <label for="pais">País</label>
                <input type="text" name="pais" class="form-control form-control-alternative" id="pais" value="<?php echo $rowFacturacion->pais ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="uso CFDI">uso CFDI</label>
                <select name="cfdi" class="form-control" id="cfdi">
                  <option value="<?php echo $rowFacturacion->cfdi ?>" selected><?php echo $rowFacturacion->cfdi ?></option>
                  <option value="G01">G01 Adquisición de mercancias</option>
                  <option value="G02">G02 Devoluciones, descuentos o bonificaciones</option>
                  <option value="G03">G03 Gastos en general</option>
                  <option value="I01">I01 Construcciones</option>
                  <option value="I02">I02 Mobilario y equipo de oficina por inversiones</option>
                  <option value="I03">I03 Equipo de transporte</option>
                  <option value="I04">I04 Equipo de computo y accesorios</option>
                  <option value="I05">I05 Dados, troqueles, moldes, matrices y herramental</option>
                  <option value="I06">I06 Comunicaciones telefónicas</option>
                  <option value="I07">I07 Comunicaciones satelitales</option>
                  <option value="I08">I08 Otra maquinaria y equipo</option>
                  <option value="D01">D01 Honorarios médicos, dentales y gastos hospitalarios.</option>
                  <option value="D02">D02 Gastos médicos por incapacidad o discapacidad</option>
                  <option value="D03">D03 Gastos funerales.</option>
                  <option value="D04">D04 Donativos.</option>
                  <option value="D05">D05 Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).</option>
                  <option value="D06">D06 Aportaciones voluntarias al SAR.</option>
                  <option value="D07">D07 Primas por seguros de gastos médicos.</option>
                  <option value="D08">D08 Gastos de transportación escolar obligatoria.</option>
                  <option value="D09">D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.</option>
                  <option value="D10">D10 Pagos por servicios educativos (colegiaturas)</option>
                  <option value="P01">P01 Por definir</option>
                </select>
              </div>
             
              <!-- <div class="col-6">
                <button type="button" class="btnAzulRedondo" onclick="calcularEnvio(); return false;" id="configreset">Continuar con el envío</button>
              </div> -->
              
            </div>


                <hr class="my-4" />
               
                <div class="text-center">
                  <div class="btn btn-sm btn-success" type="button" onclick="validarActualizacion();">Actualizar estos datos</div>
                </div>
             
                <!-- Description -->
                
                <!--<div class="pl-lg-4">
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                  </div>
                </div>-->
              </form>


                <script>


                  //obtenemos el municipio del estado actual
                  $.ajax({
type: "POST",
url: "procesar-estados.php",
data: { municipios : '<?php echo $rowFacturacion->estado ?>' } 
}).done(function(data){

$("#jmr_contacto_municipio1").html(data);
$("#jmr_contacto_municipio1").prepend("<option value='<?php echo $rowFacturacion->municipio ?>' selected><?php echo $rowFacturacion->municipio ?></option>");

});
                        // Obtener municipios al actualizar estado
$("#jmr_contacto_estado1").change(function(){
  console.log("cambio guardar");
var estado = $("#jmr_contacto_estado1 option:selected").val();
$.ajax({
type: "POST",
url: "procesar-estados.php",
data: { municipios : estado } 
}).done(function(data){
$("#jmr_contacto_municipio1").html(data);
});
});


//validamos que todos los campos estén llenos

function validarActualizacion(){
  console.log("entrando");
  var inputsvacios1 = 0;
  var selectvacios1 = 0;
var $inputs1 = $('#formFacturacion1').find(':input') //INPUTS
var $selects1 = $('#formFacturacion1').find('select') //SELECTS

$inputs1.each(function(index, element) {
    if ($(element).val().length <= 0) {
            $(element).css("border", "solid 2px #FA5858");
            inputsvacios1 = inputsvacios1 +1;
            return false;

    }else{
            $(element).css("border", "none");
            inputsvacios1 = 0;
    }
});

$selects1.each(function(index, element) {
    if ( $(element).val() ==0) {
            $(element).css("border", "solid 2px #FA5858");
            selectvacios1 = selectvacios1 + 1;
            return false;

    }else{
            $(element).css("border", "none");
            selectvacios1 = 0;
    }
});

console.log("inputsvacios11: "+inputsvacios1+"select1 vacios: "+selectvacios1);

if (inputsvacios1==0 && selectvacios1==0) {
  $("#formFacturacion1").submit()
}

}


  //validar correo form

  $(document).ready(function() {

    $("#correo1").keyup(function(){

      console.log("entrando");

        var email = $("#correo1").val();

        if(email != 0)
        {
            if(isValidEmailAddress(email))
            {
                $("#validatecorreo1").hide();
            } else {
                $("#validatecorreo1").show();
            }
        } else {
            $("#validatecorreo1").hide();         
        }

    });

});


  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
                </script>
              

<?php } ?>
