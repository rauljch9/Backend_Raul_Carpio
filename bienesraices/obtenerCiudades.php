<?php

require('main.php');


$data = file_get_contents("../data-1.json");

$bienesRaices = json_decode($data, true);


$ciudades[] = '';

foreach ($bienesRaices as $item) {

  $_ciudad = $item['Ciudad'];

  if (!in_array($_ciudad,$ciudades)){
    array_push($ciudades,$_ciudad);
    echo obtenterHtmlOpcion($_ciudad,$_ciudad);
  }

}






?>
