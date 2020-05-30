<?php

require('main.php');



$data = file_get_contents("../data-1.json");

$bienesRaices = json_decode($data, true);

foreach ($bienesRaices as $item) {

  $_direccion     = $item['Direccion'];
  $_ciudad        = $item['Ciudad'];
  $_telefono      = $item['Telefono'];
  $_codigo_postal = $item['Codigo_Postal'];
  $_tipo          = $item['Tipo'];
  $_precio        = $item['Precio'];

    echo obtenerHtmlItem($_direccion,
      $_ciudad,
      $_telefono,
      $_codigo_postal,
      $_tipo,
      $_precio
    );
}

?>
