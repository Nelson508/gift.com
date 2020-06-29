//Evita que se vuelva a enviar el formulario
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
 }

function preventDefault(e) {
  if (event.currentTarget.allowDefault) {
    return;
  }
  e.preventDefault();
}
// Cambia las comunas respecto a la region seleccionada
$(document).ready(function(){
  $("#cbxRegion").change(function(){
    $("#cbxRegion option:selected").each(function(){
      idRegion = $(this).val();
      $.post('modulos/comuna.php', {idRegion: idRegion}, function(data){
        $("#cbxComuna").html(data);
      });
    });
  });
});
//Comprueba que es Email este disponible
function comprobarEmail() { 
    
  jQuery.ajax({

   url: 'modulos/compEmail.php',
   data:'txtCorreo='+$("#txtCorreo").val(),
   type: "POST",
   success:function(data){

    if(data==1){

      $("#formulario #txtCorreo").css("border-color", "#DC3545");

      //css colocar icono adentro de un input
      /*$("#formulario #txtCorreo").css({"padding-right": "calc(1.5em + .75rem)",
      "background-image": "url('https://use.fontawesome.com/releases/v5.8.2/svgs/regular/calendar-alt.svg')",
      "background-repeat": "no-repeat",
      "filter": "hue-rotate(120deg)",
      "background-position": "center right calc(.375em + .1875rem)",
      "background-size": "calc(.75em + .375rem) calc(.75em + .375rem)"});*/

      $("#estadoemail").html("<span class='estado-no-disponible-email'> Email no Disponible.</span>");
        
      $("form").bind("submit", preventDefault);
      $("form").get(0).allowDefault = false;
       
    }else if(data==2){
        
      $("#formulario #txtCorreo").css("border-color", "#28A745");
      $("#estadoemail").html("<span> Email Disponible.</sppan>");      
      $("form").get(0).allowDefault = true;
    }
  },
  error:function (){}
  });
}
//Comprueba contraseña
function comprobarContraseña() {
   
  var txtPass = $("#txtPass").val();
  var txtRetypePass = $("#txtRetypePass").val();

  if(txtPass != txtRetypePass){
        
      $("#formulario #txtRetypePass").css("border-color", "#DC3545");
      $("#estadopass").html("<span class='estado-no-disponible-email'> Las contraseñas NO coinciden! </span>");
      $("form").bind("submit", preventDefault);
      $("form").get(0).allowDefault = false;

  }else{

      $("#formulario #txtRetypePass").css("border-color", "#28A745");
      $("#estadopass").html("<span> Las contraseñas coinciden.</sppan>");
      $("form").get(0).allowDefault = true;
  }
}

// Validacion de formulario Bootstrap 4 
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();