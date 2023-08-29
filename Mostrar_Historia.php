<!DOCTYPE html>
<html>
<head>
<style>
  .center-content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh; /* Esto centra verticalmente en la ventana del navegador */
    background-color: #00BFFF;

  }
  .code-container {
    border: 1px solid #ccc;
    padding: 40px;
    width: 50%; /* Ajusta el ancho según tu preferencia */
    background-color: #f5f5f5;
  }
  .fondo {
   background-color: #00BFFF;
   /* Recuerda que los botones html traen un borde por defecto que se suele ver bastante mal, 
   puedes quitarlo en la siguiente linea */
   border: none;
  }
  .encabezado{

    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #ccc;
    padding: 20px;
    width: 96.5%; /* Ajusta el ancho según tu preferencia */
    height: 0%;
    background-color: #f5f5f5;
    position: absolute; /* Cambiar a "relative" si prefieres movimiento relativo */
    top: 1px;
    left: 0px;
  }
  .boton{
    display: flex;
    justify-content: center;
    border: 1px solid #ccc;
    padding: 15px;
    background-color: #f5f5f5;
    position: absolute; /* Cambiar a "relative" si prefieres movimiento relativo */
    
    left: 580px;
    margin-top: auto;
  }
/* Tablas */
    
 .table-container {
    border-collapse: collapse;
    width: 100%;
    margin: 20px 0;
 }

 .table-container th,
 .table-container td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
 }

 .table-container th {
    background-color: #f2f2f2;
    font-weight: bold; 
 }
 
 .table-cell {
    text-align: center;
  }

</style>
</head>
<body class="fondo">
<div class="encabezado"><steam class=" "><h1> Historia de usuario </h1> </steam> </div>
<div class="center-content">

  <div class="code-container">
 
    <?php
      $host = "localhost";  // Por lo general, "localhost"
      $usuario = "root";
      $contraseña = "";
      $base_de_datos = "Clinica";
      // Crear conexión
      $conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

      // Verificar la conexión
      if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
      }

      // Consulta SQL para obtener los datos de la tabla "historia"
      
      $query = "SELECT * FROM historia ORDER BY id DESC LIMIT 1";
      $resultado = $conn->query($query);

      if ($resultado->num_rows > 0) {
         echo "<table border='1'>
         <tr class='table-container'>
         <th>ID</th>
         <th>Altura</th>
         <th>Peso</th>
         <th>Dirección</th>
         <th>Número de Emergencia</th>
         <th>Tipo de Sangre</th>
         <th>ID Paciente</th>
         </tr>";

         $fila = $resultado->fetch_assoc();
            echo "<tr class= 'table-container th'>";
            echo "<td class='table-cell'>" . $fila['id'] . "</td>";
            echo "<td class='table-cell'>" . $fila['altura'] . "</td>";
            echo "<td class='table-cell'>" . $fila['peso'] . "</td>";
            echo "<td class='table-cell'>" . $fila['direccion'] . "</td>";
            echo "<td class='table-cell'>" . $fila['num_emergencia'] . "</td>";
            echo "<td class='table-cell'>" . $fila['tipo_sanngre'] . "</td>";
            echo "<td class='table-cell'>" . $fila['id_paciente'] . "</td>";
            echo "</tr>";
        
        echo "</table>";
     } else {
       echo "No se encontraron resultados.";
     }

    // Cerrar la conexión
     $conn->close();
    ?>

  </div>
</div>
<button class="boton" onclick="location.href='historia.html'">Cerrar sesion</button>

</body>
</html>
