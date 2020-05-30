<?php

require('bienesraices/main.php');

$data = file_get_contents("data-1.json");

$bienesRaices = json_decode($data, true);


foreach ($bienesRaices as $item) {

  $precios = explode(';',$_GET['precio']);

  $_direccion     = $item['Direccion'];
  $_ciudad        = $item['Ciudad'];
  $_telefono      = $item['Telefono'];
  $_codigo_postal = $item['Codigo_Postal'];
  $_tipo          = $item['Tipo'];
  $_precio        = $item['Precio'];

  $_precio_plain = str_replace("$", "", str_replace(",", "", $_precio));

   if (   ($_GET['ciudad']==$_ciudad xor $_GET['ciudad']=='')
     and  ($_GET['tipo']==$_tipo xor $_GET['tipo']=='')
     and  (
                (float)$_precio_plain>=(float)$precios[0]
            and (float)$_precio_plain<=(float)$precios[1]
        )
   ){

    echo obtenerHtmlItem($_direccion,
      $_ciudad,
      $_telefono,
      $_codigo_postal,
      $_tipo,
      $_precio
    );


  }

}

?>
