function cargarContenido(abrir) {

    var contenedor;
    contenedor = document.getElementById('contenido');
    fetch(abrir)
        .then(response => response.text())
        .then(data => contenedor.innerHTML = data);
}


function formHistoria(id) {

  var contenedor;
  contenedor = document.getElementById('contenido');
  fetch('listar.php?id='+id)
      .then(response => response.text())
      .then(data => { contenedor.innerHTML = data; });
}

// function registrarHistoria() {
//   // console.log("entro");
//   var contenedor;
//   contenedor = document.getElementById('contenido');
//   var formulario = document.getElementById("formHistoria");
//   var parametros = new FormData(formulario);
//   fetch("insertar.php",
//       {
//           method: "POST",
//           body: parametros
//       })
//       .then(response => response.json())
//       .then(data => {
//         if (data.redirect) {
//           fetch("MOSTRARFICHA.php")
//           .then(response => response.text())
//           .then(data => contenedor.innerHTML = data);
//         }
//       });
// }

function redirecIndex(abrir) {
  fetch("ficha.php")
      .then(response => response.text())
      .then(data => window.location.href = 'inde.php');
}

function cerrarSession() {
  // console.log("entro");
  var contenedor;
  contenedor = document.getElementById('contenido');
  fetch("cerrarsession.php")
      .then(response => response.json())
      .then(data => {
        if (data.redirect) {
          window.location.href = data.redirect;
        }
      });
}

function registrarFicha() {
  // console.log("entro");
  var contenedor;
  contenedor = document.getElementById('contenido');
  var formulario = document.getElementById("formFicha");
  var parametros = new FormData(formulario);
  fetch("createFicha.php",
      {
          method: "POST",
          body: parametros
      })
      .then(response => response.json())
      .then(data => {
        if (data.redirect) {
          fetch("ficha.php")
          .then(response => response.text())
          .then(data => contenedor.innerHTML = data);
        }
      });
}

function registrarMedico() {
  // console.log("entro");
  var contenedor;
  contenedor = document.getElementById('contenido');
  var formulario = document.getElementById("formMedico");
  var parametros = new FormData(formulario);
  fetch("createMedico.php",
      {
          method: "POST",
          body: parametros
      })
      .then(response => response.json())
      .then(data => {
        if (data.redirect) {
          fetch("readMedico.php")
          .then(response => response.text())
          .then(data => contenedor.innerHTML = data);
        }
      });
}

function loginFetch() {
  
  var contenedor;
  contenedor = document.getElementById('contenido');
  var formulario = document.getElementById("formLogin");
  var parametros = new FormData(formulario);
  fetch("autenticar.php",
      {
          method: "POST",
          body: parametros
      })
      .then(response => response.json())
      .then(data => {
        if (data.redirect) {
          window.location.href = data.redirect;
        }
      });
}