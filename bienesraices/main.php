<?php



function obtenerHtmlItem($direccion,$ciudad,$telefono,$codigo_postal,$tipo,$precio){
  return '<div class="card horizontal itemMostrado">'
    .'<img src="./img/home.jpg">'
    .'<div class="card-stacked">'
      .'<div class="card-content">'
        .'<span><strong>Direccion: </strong></span><span>'.$direccion.'</span><br>'
        .'<span><strong>Ciudad: </strong></span><span>'.$ciudad.'</span><br>'
        .'<span><strong>Telefono: </strong></span><span>'.$telefono.'</span><br>'
        .'<span><strong>Codigo postal: </strong></span><span>'.$codigo_postal.'</span><br>'
        .'<span><strong>Tipo: </strong></span><span>'.$tipo.'</span><br>'
        .'<span><strong>Precio: </strong></span><span class="precioTexto">'.$precio.'</span>'
      .'</div>'
      .'<div class="card-action">'
        .'<a href="#">VER MAS</a>'
      .'</div>'
    .'</div>'
  .'</div>';
};


function obtenterHtmlOpcion($valor,$texto){
  return '<option value="'.$valor.'">'.$texto.'</option>';
}

?>
