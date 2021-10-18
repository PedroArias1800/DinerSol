function Mostrar() {
    var x = document.getElementById("contra1");
    var y = document.getElementById("contra2");

    if (x.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
  }

  function ComprobarClave(){
    p1 = document.formRegistro.contra1.value;
    p2 = document.formRegistro.contra2.value;

    if(p1 != p2){
      alert("Ambas claves deben ser iguales.");
      return false;
    }
  }

  function Tipo(t){
    var tel = document.getElementById("telefono");
    var cor = document.getElementById("correo");
    var lblT = document.getElementById("lblTel");
    var lblC = document.getElementById("lblCor");


    if(t == 1){
      tel.value = '';
      tel.disabled = true;
      tel.hidden = true;
      cor.disabled = false;
      cor.hidden = false;

      lblT.hidden = true;
      lblC.hidden = false;
    } else {
      cor.value = '';
      cor.disabled = true;
      cor.hidden = true;
      tel.disabled = false;
      tel.hidden = false;

      lblC.hidden = true;
      lblT.hidden = false;
    }
  }