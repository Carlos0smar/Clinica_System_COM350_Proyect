<!DOCTYPE html>
<html>
<head>
<style>
  .center-content {
    display: flex;
    justify-content: center;
    align-items: center;
    /* height: 50vh; */
    background-color: #00BFFF;

  }
  .code-container {
    border: 1px solid #ccc;
    padding: 40px;
    /* width: 50%;  */
    background-color: #f5f5f5;
  }
  .fondo {
   background-color: #00BFFF;
   /* Recuerda que los botones html traen un borde por defecto que se suele ver bastante mal, 
   puedes quitarlo en la siguiente linea */
   border: none;
  }
  .encabezado{

    text-align: center;
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
<body >
<div class="encabezado"><steam class=" "><h1> Historia de usuario </h1> </steam> </div>
<div class="center-content">

  <div class="code-container">
 
    <?php
      include('conexion.php');
      $id = $_GET['id'];
      // Consulta SQL para obtener los datos de la tabla "historia"
      
      $query = "SELECT h.*, p.* FROM historia h INNER JOIN paciente p ON h.id_paciente = p.id WHERE h.id_paciente = $id";
      $resultado = $con->query($query);

      if ($resultado->num_rows > 0) {
         echo "<table border='1'>
         <tr class='table-container'>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>Altura</th>
         <th>Genero</th>
         <th>Peso</th>
         <th>Dirección</th>
         <th>Número de Emergencia</th>
         <th>Tipo de Sangre</th>
         </tr>";

         $fila = $resultado->fetch_assoc();
            echo "<tr class= 'table-container th'>";
            // echo "<td class='table-cell'>" . $fila['id'] . "</td>";
            echo "<td class='table-cell'>" . $fila['nombre'] . "</td>";
            echo "<td class='table-cell'>" . $fila['apellido'] . "</td>";
            echo "<td class='table-cell'>" . $fila['altura'] . "</td>";
            echo "<td class='table-cell'>" . $fila['genero'] . "</td>";
            echo "<td class='table-cell'>" . $fila['peso'] . "</td>";
            echo "<td class='table-cell'>" . $fila['direccion'] . "</td>";
            echo "<td class='table-cell'>" . $fila['num_emergencia'] . "</td>";
            echo "<td class='table-cell'>" . $fila['tipo_sanngre'] . "</td>";
            // echo "<td class='table-cell'>" . $fila['id_paciente'] . "</td>";
            echo "</tr>";
        
        echo "</table>";
     } else {
       echo "No se encontraron resultados.";
     }

    // Cerrar la conexión
     $con->close();
    ?>

  </div>
</div>
<!-- <a href="javascript: " <button class="boton" onclick="location.href='historia.html'">Cerrar sesion</button></a> -->

</body>
</html>
