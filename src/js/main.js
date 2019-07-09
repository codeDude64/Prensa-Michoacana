//-------------este es el codigo para crearUsuario.html-----------------
let botonCancelar = document.getElementById('btnCancelar');

if(botonCancelar != null){
    botonCancelar.addEventListener('click',()=>{
        console.log("Estas Entrado?");
        location.href="http://localhost:9090/index.html";
    });
}

//-----------------------------------------------------------------------


//------------------este codigo para bienvenido.php-----------------------
const btnAddTitulo = document.getElementById('btn-addTitulo');

if(btnAddTitulo != null){
    btnAddTitulo.addEventListener('click',()=>{
        console.log("Estas adentro?");
        location.href="http://localhost:9090/crearTitulo.php";
    });
}


function confirmarEliminacion(id){
    let ops = confirm('¿Estas seguro de eliminar el Titulo?');
    if(ops == true){
        location.href = 'http://localhost:9090/controllers/eliminarTitulo.php?IdTitulo='+id;
    }
}

function abrirTitulo(id,nombre){
    console.log('http://localhost:9090/Titulo.php?IdTitulo='+id+'&Nombre='+nombre);
    location.href = 'http://localhost:9090/Titulo.php?IdTitulo='+id+'&NombreTitulo='+nombre;
}

//------------------------------------------------------------------------

//------------------este codigo para Titulo.php-----------------------
function agregarTomo(idTitulo,nombre){
    console.log(nombre);
    location.href = 'http://localhost:9090/crearTomo.php?idTitulo='+idTitulo+'&NombreTitulo='+nombre;
}

function confirmarEliminacionTomo(idTomo,idTitulo,nombreTitulo){
    let opt = confirm('¿Estas seguro de eliminar el Tomo?');
    if(opt == true){
        location.href = 'http://localhost:9090/controllers/eliminarTomo.php?IdTomo='+idTomo+'&IdTitulo='+idTitulo+'&NombreTitulo='+nombreTitulo;
    }
}

function abrirTomo(idTomo,numeroTomo,nombreTitulo){
    location.href = 'http://localhost:9090/Tomo.php?IdTomo='+idTomo+'&NumeroTomo='+numeroTomo+'&NombreTitulo='+nombreTitulo;
}
//------------------------------------------------------------------------

//------------------este codigo para Tomo.php-----------------------
function agregarNumero(IdTomo,NumeroTomo,NombreTitulo){
    location.href = "http://localhost:9090/crearNumero.php?IdTomo="+IdTomo+"&NumeroTomo="+NumeroTomo+"&NombreTitulo="+NombreTitulo;
}

function confirmarEliminacionNumero (idNumero,idTomo,numeroTomo,nombretitulo) {
    let opt = confirm('¿Estas seguro de eliminar el Numero?');
    if(opt == true){
        location.href = "http://localhost:9090/controllers/eliminarNumero.php?IdNumero="+idNumero+"&IdTomo="+idTomo+"&NumeroTomo="+numeroTomo+"&NombreTitulo="+nombretitulo;
    }
}

function abrirNumero(IdNumero,NoPeriodico,NumeroTomo,IdTomo,NombreTitulo){
    location.href = "http://localhost:9090/Numero.php?NombreTitulo="+NombreTitulo+"&IdTomo="+IdTomo+"&NumeroTomo="+NumeroTomo+"&NoPeriodico="+NoPeriodico+"&IdNumero="+IdNumero;}
//------------------------------------------------------------------

//------------------este codigo para Numero.php-----------------------
function agregarArticulo(IdNumero,NoPeriodico,NumeroTomo,IdTomo,NombreTitulo){
  location.href = "http://localhost:9090/crearArticulo.php?IdNumero="+IdNumero+"&NoPeriodico="+NoPeriodico+"&NumeroTomo="+NumeroTomo+"&IdTomo="+IdTomo+"&NombreTitulo="+NombreTitulo;
}

//------------------------------------------------------------------


//------------------este codigo para crearArticulo.php-------------

function listarCiencia(){
    let valorSelect = document.getElementById('selectCiencia').value;
    let valorAnterior = document.getElementById('ciencia').value;
    document.getElementById('ciencia').value = valorAnterior + "" +valorSelect+"\n";

    document.getElementById('selectCiencia').selectedIndex=0;
}

function listarTec(){
    let valorSelect = document.getElementById('selectTec').value;
    let valorAnterior = document.getElementById('tecnologia').value;
    document.getElementById('tecnologia').value = valorAnterior + "" +valorSelect+"\n";

    document.getElementById('selectTec').selectedIndex=0;
}

//------------------------------------------------------------------
