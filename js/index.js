/*
  Creación de una función personalizada para jQuery que detecta cuando se detiene el scroll en la página
*/
$.fn.scrollEnd = function(callback, timeout) {
  $(this).scroll(function(){
    var $this = $(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};
/*
  Función que inicializa el elemento Slider
*/

function inicializarSlider(){
  $("#rangoPrecio").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 100000,
    from: 200,
    to: 80000,
    prefix: "$"
  });
}
/*
  Función que reproduce el video de fondo al hacer scroll, y deteiene la reproducción al detener el scroll
*/
function playVideoOnScroll(){
  var ultimoScroll = 0,
      intervalRewind;
  var video = document.getElementById('vidFondo');
  $(window)
    .scroll((event)=>{
      var scrollActual = $(window).scrollTop();
      if (scrollActual > ultimoScroll){
       video.play();
     } else {
        //this.rewind(1.0, video, intervalRewind);
        video.play();
     }
     ultimoScroll = scrollActual;
    })
    .scrollEnd(()=>{
      video.pause();
    }, 10)
}

inicializarSlider();
playVideoOnScroll();





$('#mostrarTodos').click(function(){
  mostrarTodos();
});

$("#formulario").on('submit', function(event){
    event.preventDefault();
    buscar();
});

$('document').ready(function() {
  llenarCiudades();
  llenarTipos();
})

function mostrarTodos(){
  $.ajax({
    url:'bienesraices/mostrarTodos.php',
    type:'GET',
    success: function(response){
      $('.itemMostrado').remove();
      $(response).appendTo($($('.colContenido')[0]));
    //console.log(response)
    },
    error:function(error){
      console.log(error);
    }
  });
}

function buscar(){
  $.ajax({
    url:'buscador.php',
    type:'GET',
    data: $("#formulario").serialize(),
    success: function(response){
      $('.itemMostrado').remove();
      $(response).appendTo($($('.colContenido')[0]));
    console.log(response)
    console.log($("#formulario").serialize());
    },
    error:function(error){
      console.log(error);
    }
  });
}

function llenarCiudades(){
  $.ajax({
    url:'bienesraices/obtenerCiudades.php',
    type:'GET',
    success: function(response){
      $(response).appendTo($('#selectCiudad'));
      $('#selectCiudad').before($('<br>')).before($('<br>'));
      $('#selectCiudad').css({'display':'block'});
      console.log(response);
    },
    error:function(error){
      console.log(error);
    }
  });
}

function llenarTipos(){
  $.ajax({
    url:'bienesraices/obtenerTipos.php',
    type:'GET',
    success: function(response){
      $(response).appendTo($('#selectTipo'));
      $('#selectTipo').before($('<br>'));
      $('#selectTipo').css({'display':'block'});
      console.log(response);
    },
    error:function(error){
      console.log(error);
    }
  });
}
