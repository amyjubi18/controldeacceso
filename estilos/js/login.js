document.getElementById("bonton-inicio-sesion").addEventListener("click", iniciar);

//declaracion de variables
// var formulario_login = document.querySelector('.formulario-login');

var formulario_ingreso = document.querySelector('.caja-posterior');

var contenedor_login = document.querySelector('.contenedor_2');

var contenedor_ingreso = document.querySelector ('.contenedor_1');


function iniciar() {
    if(window.innerWidth > 850){
    contenedor_login.style.display = "flex";
    formulario_ingreso.style.bottom = "500px";
    contenedor_ingreso.style.display= "none";
    }
    else{
    contenedor_login.style.display = "flex";
    formulario_ingreso.style.bottom = "0px";
    contenedor_ingreso.style.display= "none";
    }
}