<?php
 require_once "db.php";

$cp=mysqli_real_escape_string($con, $_POST["cp"]);
$totalFinal=mysqli_real_escape_string($con, $_POST["totalFinal"]);

/*
$cp="00810";
$totalFinal = "4000";
*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.envioclickpro.com/api/v1/quotation",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n    \"origin_address\": \"Fray Sebastián de Aparicio\",\r\n    \"origin_number\": \"23\",\r\n    \"origin_zip_code\": \"58228\",\r\n    \"destination_address\": \"Puente del Marquez\",\r\n    \"destination_number\": \"738\",\r\n    \"destination_zip_code\": \"$cp\",\r\n    \"package\": {\r\n        \"description\": \"Productos\",\r\n        \"contentValue\": ".$totalFinal.",\r\n        \"weight\": 2.00,\r\n        \"length\": 20.00,\r\n        \"height\": 20.00,\r\n        \"width\": 20.00\r\n    }\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json; charset=utf-8",
    "Authorization: f2292d33-411f-4dfc-8f12-4cbcc468a160",
    "content-Type: application/json"
  )
));
$resultados = curl_exec($curl);
curl_close($curl);
//echo $resultados;

   
     

       // if (isset($_POST['envioclick'])) {

/*
        $calle=mysqli_real_escape_string($con, $_POST["calle"]);
        $numero=mysqli_real_escape_string($con, $_POST["numero"]);
        $cp=mysqli_real_escape_string($con, $_POST["cp"]);
        $contentValue=mysqli_real_escape_string($con, $_POST["contentValue"]);
        $telefono=mysqli_real_escape_string($con, $_POST["telefono"]);

*/


/*
$resultados ='
{
  "status": "OK",
  "status_codes": [
    200
  ],
  "status_messages": [
    {
      "request": "Request processed."
    }
  ],
  "data": {
    "insurance": {
      "contentValue": 2000,
      "amountInsurance": 92.8,
      "insurance": 0
    },
    "rates": [
      {
        "idRate": 8504107,
        "idProduct": 35,
        "product": "Económico",
        "vehicle": null,
        "idCarrier": 25,
        "carrier": "AMPM",
        "total": 94.53,
        "deliveryDays": 8,
        "deliveryType": "Domicilio",
        "quotationType": "EnvioClick Pro"
      },
      {
        "idRate": 8504108,
        "idProduct": 36,
        "product": "Express",
        "vehicle": null,
        "idCarrier": 25,
        "carrier": "AMPM",
        "total": 134.22,
        "deliveryDays": 6,
        "deliveryType": "Domicilio",
        "quotationType": "EnvioClick Pro"
      },
      {
        "idRate": 8504106,
        "idProduct": 15,
        "product": "Económico",
        "vehicle": null,
        "idCarrier": 7,
        "carrier": "REDPACK",
        "total": 136.97,
        "deliveryDays": 4,
        "deliveryType": "Domicilio",
        "quotationType": "EnvioClick Pro"
      },
      {
        "idRate": 8504104,
        "idProduct": 13,
        "product": "Económico",
        "vehicle": null,
        "idCarrier": 6,
        "carrier": "ESTAFETA",
        "total": 157.69,
        "deliveryDays": 5,
        "deliveryType": "Domicilio",
        "quotationType": "EnvioClick Pro"
      },
      {
        "idRate": 8504102,
        "idProduct": 11,
        "product": "Dos días",
        "vehicle": null,
        "idCarrier": 6,
        "carrier": "ESTAFETA",
        "total": 164.21,
        "deliveryDays": 3,
        "deliveryType": "Domicilio",
        "quotationType": "EnvioClick Pro"
      },
      {
        "idRate": 8504103,
        "idProduct": 12,
        "product": "Express",
        "vehicle": null,
        "idCarrier": 6,
        "carrier": "ESTAFETA",
        "total": 177.71,
        "deliveryDays": 2,
        "deliveryType": "Domicilio",
        "quotationType": "EnvioClick Pro"
      },
      {
        "idRate": 8504109,
        "idProduct": 38,
        "product": "Económico",
        "vehicle": null,
        "idCarrier": 27,
        "carrier": "PAQUETEEXPRESS",
        "total": 190.61,
        "deliveryDays": 4,
        "deliveryType": "Domicilio",
        "quotationType": "EnvioClick Pro"
      },
      {
        "idRate": 8504105,
        "idProduct": 14,
        "product": "Express",
        "vehicle": null,
        "idCarrier": 7,
        "carrier": "REDPACK",
        "total": 199.8,
        "deliveryDays": 5,
        "deliveryType": "Domicilio",
        "quotationType": "EnvioClick Pro"
      }
    ],
    "idCarriersNoWsResult": [
      9,
      10,
      22,
      24,
      26
    ],
    "countryCode": "MX",
    "package": {
      "weight": 2,
      "length": 20,
      "height": 20,
      "width": 20
    },
    "originZipCode": "58150",
    "destinationZipCode": "58150"
  }
}';
*/

$array = json_decode($resultados, true);

//print_r($array);

if ($array['status']=="NOT OK") {
  echo "Hay un error en el código postal o tu dirección, verifica de nuevo por favor";
  die();
exit();
}






//echo  "aqui: ".$array["data"]['rates'][2]['idRate']." aqui";
     
//     echo "<br><br>";

 //    echo $longitud = "longitrud".count($array["data"]['rates']);  




     ?>


    

            <div class="row gutter-1">
               <div class="col-12">
                                                  <div class="nombre-paquetera ng-binding">Por paquetería</div>
                                                </div>
            <br><br> 


<?php for ($i=0; $i < count($array["data"]['rates']); $i++) { 
  # code...
?>
             
              <div class="col-md-6">
                <div class="custom-control custom-choice" onclick="seleccionarPaqueteria('<?php echo $i ?>','<?php echo $array["data"]['rates'][$i]['total'] ?>','<?php echo $array["data"]['rates'][$i]['carrier'] ?>'); return false;">
                  <input type="radio" name="choice-shipping" class="custom-control-input radioEnvio" id="choice-shipping-<?php echo $i ?>">
                  
                  
                    <label class="custom-control-label text-dark" for="choice-shipping-1">
                      <div class="row">
                        
                        <div class="col-3">
                          <img src="assets/images/paqueterias/<?php echo $array["data"]['rates'][$i]['carrier'] ?>.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-xs-9">
                          <b><?php echo $array["data"]['rates'][$i]['carrier'] ?></b>
                        </div>
                      <span class="d-flex justify-content-between mb-1 eyebrow"> <h5 class=""><br>$<?php echo $array["data"]['rates'][$i]['total'] ?> MXN</h5></span>
                      Tiempo de entrega estimado <?php echo $array["data"]['rates'][$i]['deliveryDays'] ?> días
                      </div>
                    </label>
                    <span class="choice-indicator"></span>
               

                </div>
              </div>
            

<?php }


// }  ?>
<div class="col-md-6"></div>
<div class="col-md-6">
  <button type="button" onclick="validarFacturacion(); irTabFacturacion(); return false;" class="btnAzulRedondo" style="color:white;">Guardar envío</button>
</div>
</div>

         




