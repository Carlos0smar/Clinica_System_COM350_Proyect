function cargarContenido(abrir) {

    var contenedor;
    contenedor = document.getElementById('contenido');
    fetch(abrir)
        .then(response => response.text())
        .then(data => contenedor.innerHTML = data);
}


// function editarPersona(id) {
//     var contenedor;
//     contenedor = document.getElementById('datos');
//     fetch('form_update.php?id=' + id)
//         .then(response => response.text())
//         .then(data => contenedor.innerHTML = data);

// }

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