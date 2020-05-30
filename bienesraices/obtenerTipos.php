<?php

require('main.php');


$data = file_get_contents("../data-1.json");

$bienesRaices = json_decode($data, true);


$tipos[] = '';

foreach ($bienesRaices as $item) {

  $_tipo = $item['Tipo'];

  if (!in_array($_tipo,$tipos)){
    array_push($tipos,$_tipo);
    echo obtenterHtmlOpcion($_tipo,$_tipo);
  }

}






?>
