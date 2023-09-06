function cargarContenido(abrir) {

    var contenedor;
    contenedor = document.getElementById('contenido');
    fetch(abrir)
        .then(response => response.text() )
        .then(data => contenedor.innerHTML = data);
}

function cargarSacarFicha() {
  
  var contenedor;
  contenedor = document.getElementById('contenido');
  fetch('Create_ficha_interface.php')
      .then(response => response.text())
      .then(data => {
          contenedor.innerHTML = data;

          const hora = document.getElementById('hora');
          const horas = ["08", "09","10", "11", "14", "15", "16", "17"]
          
      
          for (let i = 0; i <horas.length; i++) {
              const option = document.createElement("option");
      
              var horaFormateada = `${horas[i]}:${'00'}:${'00'}`;
      
              // if(horas[i] == "8" || horas[i] == "9"){
              //     horaFormateada = `${'0'}${horas[i]}:${'00'}:${'00'}`;
              // }

              option.value = horaFormateada;
              option.text =  horas[i] + ":00";
              hora.appendChild(option);
          }

          const selectDiaSemana = document.getElementById("dia");
          
      
          const diasSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];
          const fechaActual = new Date();
      
          
      
          // Calcula la fecha del primer día de la semana (Domingo)
          const primerDiaSemana = new Date(fechaActual);
          // primerDiaSemana.setDate(fechaActual.getDate() - diaActual);
      
          // Genera las opciones del select
          for (let i = 0; i < diasSemana.length; i++) {
              const option = document.createElement("option");
      
              option.text = diasSemana[i];
              
              // Calcula la fecha correspondiente al día de la semana
              const fechaDiaSemana = new Date(primerDiaSemana);
              fechaDiaSemana.setDate(primerDiaSemana.getDate()+i-1);
      
              // Formatea la fecha en formato "dd/mm/yyyy"
              const dd = String(fechaDiaSemana.getDate()).padStart(2, "0");
              const mm = String(fechaDiaSemana.getMonth() + 1).padStart(2, "0");
              const yyyy = fechaDiaSemana.getFullYear();
              const fechaFormateada = `${yyyy}-${mm}-${dd}`;
              console.log(fechaFormateada);
              option.value = fechaFormateada;
              selectDiaSemana.appendChild(option);
          }
          
          // tabla = document.getElementById('tabla_horarios');
          // fetch('datosTabla.php')
          // .then(response => response.text())
          // .then(data => {
          //   datos = JSON.parse(data);
          //   tabla = dibujarTabla(datos);
          //   tabla.innerHTML = html;});

          // function dibujarTabla(){
          //   var html = "";
          //   html += `<tr>`;
          //   html += `<td> HORA </td>`;
          //   html += `<td> LUENES </td>`;
          //   html += `<td> MARTES </td>`;
          //   html += `<td> MIERCOLES </td>`;
          //   html += `<td> JUEVES </td>`;
          //   html += `<td> VIERNES </td>`;
          //   html += `</tr>`
          //   for (let i = 0; i <= 7 ; i++) {
          //     html += `<tr>`;
          //     html += `<td> ${horas[i]}:00 </td>`;
          //     for(let j = 1; i<=5; j++){
          //       var indice = 0;
          //       while(indice < datos.length){
          //         var fila = datos[indice];
          //         if(fila.hora.getHours() == i && fila.dia.getDay() == j){
          //           html += `<td><button value="${}" ></button></</td>`;
          //         }
          //       }
          //     }
          //   }
          // }
          const scriptElement = document.createElement('script');
          scriptElement.innerHTML = data;
          document.body.appendChild(scriptElement);
      });
}

function formHistoria(id) {

  var contenedor;
  contenedor = document.getElementById('contenido');
  fetch('listar.php?id='+id)
      .then(response => response.text())
      .then(data => { contenedor.innerHTML = data; });
}


function MostrarHistoria(id) {
  console.log(id);
  var contenedor;
  contenedor = document.getElementById('contenido');
  fetch('Mostrar_Historia.php?id='+id)
      .then(response => response.text())
      .then(data => { contenedor.innerHTML = data; });
}

function formDescripcion(id) {
  console.log(id);
  var contenedor;
  contenedor = document.getElementById('contenido');
  fetch('historia_medico.php?id='+id)
      .then(response => response.text())
      .then(data => { contenedor.innerHTML = data; });
}

function Registrar_historia_for_medico(id) {
  console.log(id);
  var contenedor;
  contenedor = document.getElementById('contenido');
  var formulario = document.getElementById("form_descripcion");
  var parametros = new FormData(formulario);
  fetch('create_historia_medico.php?id='+id, {
    method: "POST",
    body: parametros
  })
      .then(response => response.json())
      .then(data => { 
        if (data.redirect) {
          // console.log(data.redirect);
          fetch("Mostrar_Historia.php?id="+data.redirect)
          .then(response => response.text())
          .then(data => contenedor.innerHTML = data);
        }
      });
      
}


function Historia_for_paciente(fecha, id) {
  console.log(id);
  var contenedor;
  contenedor = document.getElementById('contenido');
  fetch('Mostrar_Historia.php?id='+id+'&fecha='+fecha)
      .then(response => response.text())
      .then(data => { contenedor.innerHTML = data; });
}

function registrarHistoria() {
  // console.log("entro");
  var contenedor;
  contenedor = document.getElementById('contenido');
  var formulario = document.getElementById("formHistoria");
  var parametros = new FormData(formulario);
  fetch("insertar.php",
      {
          method: "POST",
          body: parametros
      })
      .then(response => response.json())
      .then(data => {
        if (data.redirect) {
          fetch("Mostrar_Historia.php?id="+data.id)
          .then(response => response.text())
          .then(data => contenedor.innerHTML = data);
        }
      });
}

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