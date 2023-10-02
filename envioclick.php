<?php 


$resultados='
[
   {
      "name":"Madrid",
      "y":"58"
   },
   {
      "name":"Granada",
      "y":"21"
   },
   {
      "name":"Segovia",
      "y":"12"
   },
   {
      "name":"La Rioja",
      "y":"3"
   },
   {
      "name":"Toledo",
      "y":"3"
   }
]';

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

$array = json_decode($resultados, true);

print_r($array);




echo  "aqui: ".$array["data"]['rates'][2]['idRate']." aqui";