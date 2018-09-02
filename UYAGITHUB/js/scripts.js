/* global $ */

        // const correcto_email = false;
        // function validar_email() 
        // {
        //   var email = document.getElementById("nombre");

        //   var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        //   regex.test(email) ? true : false;
          
        //   email.addEventListener("change", function (event){
        //   if(!regex.test(email)) {
        //     email.setCustomValidity("¡Yo esperaba una dirección de correo, cariño!");
        //   }  
        //   else{
        //     email.setCustomValidity("Hola funciono");
        //   } 
        //   });
        // }


    // const correcto_dni = false;
    // function validar_DNI(dni) {

    //     var numero, letrilla, letra;
    //     var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;

    //     dni = dni.toUpperCase();

    //     if(expresion_regular_dni.test(dni) === true){
    //         numero = dni.substr(0,dni.length-1);
    //         numero = numero.replace('X', 0);
    //         numero = numero.replace('Y', 1);
    //         numero = numero.replace('Z', 2);
    //         letrilla = dni.substr(dni.length-1, 1);
    //         numero = numero % 23;
    //         letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
    //         letra = letra.substring(numero, numero+1);
    //         if (letra != letrilla){
    //           alert("Dni erróneo, la letra del NIF no se corresponde");
    //           // email.setCustomValidity("¡Yo esperaba una dirección de correo, cariño!");

    //         }
    //         else{
    //             return true;
    //         }
    //     }
    //     else{
    //         alert("Dni erróneo, formato no válido");
          
    //     }
    // }

         

    function enviar_seleccion(sel){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      var i = sel;
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById("dia").innerHTML = myObj[i].dia;
            document.getElementById("primero").innerHTML = myObj[i].primero;
            document.getElementById("segundo-plato").innerHTML = myObj[i].segundo[0].plato;
            document.getElementById("segundo-guarnicion").innerHTML = myObj[i].segundo[0].guarnicion;
        }
    };
    xmlhttp.open("GET", "js/json_demo.json", true);
    xmlhttp.send();
    }
  
  
    function copy_on_click() {
      var copyText = document.getElementById("telef");
      copyText.select();
      document.execCommand("copy");
      alert("Copied the text: " + copyText.value);
    }
     
    
  $(document).ready(function(){
    $('select').formSelect();
  });
  
  
  /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function menu_toggle() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}


function success_message() {
    alert("Cuenta creada correctamente!");
}


      function comprobar_nombre() {
          var str = document.getElementById("nombre");
          var patt = new RegExp("^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$");
          
          if (patt.test(str.value)){
            str.setCustomValidity('');
          }
          else{
            str.setCustomValidity("El nombre no es válido. Introduce solo letras y espacios en blanco.");
          }
      }
      
      function comprobar_apellido() {
          var str = document.getElementById("apellido");
          var patt = new RegExp("^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$");
          
          if (patt.test(str.value)){
            str.setCustomValidity('');
          }
          else{
            str.setCustomValidity("El apellido no es válido. Introduce solo letras y espacios en blanco.");
          }
      }
      
      function comprobar_dni() {
        var str = document.getElementById("dni");
        var dni = str.value;
        var numero, letrilla, letra;
        var expresion_regular_dni = new RegExp("^[XYZ]?\d{5,8}[A-Z]$");
        dni = dni.toUpperCase();
        
        numero = dni.substr(0,dni.length-1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        letrilla = dni.substr(dni.length-1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero+1);
        if(letra == letrilla){
          if(!expresion_regular_dni.test(str.value.toUpperCase())){
            str.setCustomValidity('');
          }
        }
        else{
          str.setCustomValidity("El DNI no es válido.");
        }
    }
    
    function comprobar_correo() {
      var str = document.getElementById("mail");
      var patt = new RegExp("^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$");
      
      if (patt.test(str.value)){
        str.setCustomValidity('');
      }
      else{
        str.setCustomValidity("El correo electrónico no es válido. Incluye el signo @ y texto tras él");
      }
    }

function comprobar_contrasena(){
      var str = document.getElementById("password");
      var patt = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,})");
      
      if (patt.test(str.value)){
        str.setCustomValidity('');
      }
      else{
        str.setCustomValidity("La contraseña no es lo suficientemente fuerte. Introduce al menos 6 carácteres incluyendo al menos una minúscula, una mayúscula, un número y un carácter especial.");
      }
    }
    