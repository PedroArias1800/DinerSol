

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

/*
function Cual(c){
    var central = document.getElementById("Central");
    var fotoCentral = document.getElementById("CafCentral");

    var fisc = document.getElementById("Fisc");
    var fotoFisc = document.getElementById("CafFisc");
    
    var pb = document.getElementById("Edi1PB");
    var fotoPb = document.getElementById("CafEdi1PB");

    var p2 = document.getElementById("Edi1P2");
    var fotoP2 = document.getElementById("CafEdi1P2");

    var c = document.getElementsByClassName("CafCentral");

    if(c == 1){
        central.style.display = "block";
        fotoCentral.style.display = "block";

        fisc.style.display = "none";
        fotoFisc.style.display = "none";

        pb.style.display = "none";
        fotoPb.style.display = "none";
        
        p2.style.display = "none";
        fotoP2.style.display = "none";

    } else if(c == 2) {
        central.style.display = "none";
        fotoCentral.style.display = "none";

        fisc.style.display = "block";
        fotoFisc.style.display = "block";

        pb.style.display = "none";
        fotoPb.style.display = "none";

        p2.style.display = "none";
        fotoP2.style.display = "none";

    } else if(c == 3){
        central.style.display = "none";
        fotoCentral.style.display = "none";

        fisc.style.display = "none";
        fotoFisc.style.display = "none";

        pb.style.display = "block";
        fotoPb.style.display = "block";

        p2.style.display = "none";
        fotoP2.style.display = "none";

    } else{
        central.style.display = "none";
        fotoCentral.style.display = "none";

        fisc.style.display = "none";
        fotoFisc.style.display = "none";

        pb.style.display = "none";
        fotoPb.style.display = "none";

        p2.style.display = "block";
        fotoP2.style.display = "block";
    }
}
*/

function Cual(c){
  var i = document.getElementById("imgCafe");
  var n = document.getElementById("nameCafe");

  if(c==1){
    i.src = "../Imagenes/CafeteriaCentral.jpg";
    n.innerHTML = "Cafeteria Central";
  } else if(c==2){
    i.src = "../Imagenes/CafeteriaEdi1PB.PNG";
    n.innerHTML = "Cafeteria Edificio #1 PB";
  } else if(c==3){
    i.src = "../Imagenes/CafeteriaEdi1P2.PNG";
    n.innerHTML = "Cafeteria Edificio #1 P2";
  } else{
    i.src = "../Imagenes/CafeteriaFISC.jpg";
    n.innerHTML = "Cafeteria Edificio #3";
  }

  for(i=1; i<=c; i++){
    if(document.getElementById('ComboCaf'+i).value == c){
      document.getElementById('ComboCaf'+i).style.display = 'inline';
    } else {
      document.getElementById('ComboCaf'+i).style.display = 'none';
    }
  }
}
