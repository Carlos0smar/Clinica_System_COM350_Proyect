<!DOCTYPE html>
<html>
<head>
    <title>Resultados de la consulta</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        
    </style>
</head>
<body class="main-body">

<?php
include('conexion.php');

$id = $_GET['id'];

$sql = "SELECT id, nombre, apellido, genero, direccion, telefono FROM paciente WHERE id = '$id'";
$resultado = $con->query($sql);

if ($resultado->num_rows > 0) {
    //echo '<form action="javascript: registrarHistoria()"  id="formHistoria" class="main-form">';
    echo '<form action="javascript: registrarHistoria()"  id="formHistoria" class="">';

    while ($row = $resultado->fetch_assoc()) {
        echo'<div class="column">';
        echo '<label class="form-label">Nombre:</label><br>';
        echo '<input type="text" class="form-field" name="nombre" value="' . $row['nombre'] . '" readonly><br>';
        

        
        echo '<label class="form-label">Apellido:</label><br>';
        echo '<input type="text" class="form-field" name="apellido" value="' . $row['apellido'] . '" readonly><br>';
        
        echo '<label class="form-label">Género:</label><br>';
        echo '<input type="text" class="form-field" name="genero" value="' . $row['genero'] . '" readonly><br>';
        
        echo '<label class="form-label">Dirección:</label><br>';
        echo '<input type="text" class="form-field" name="direccion" value="' . $row['direccion'] . '" readonly><br>';
         
        echo '<label class="form-label">Teléfono:</label><br>';
        echo '<input type="text" class="form-field" name="telefono" value="' . $row['telefono'] . '" readonly><br>';

        echo'</div>';
      
        echo'<div class="column">';

        
        echo '<label class="form-label">Tipo de Sangre:</label><br>';
        echo '<input type="text" class="form-field" name="tipo_sangre" placeholder="Tipo de Sangre"><br>';
        
        echo '<label class="form-label">Peso:</label><br>';
        echo '<input type="text" class="form-field" name="peso" placeholder="Peso"><br>';
        
        echo '<label class="form-label">Estatura:</label><br>';
        echo '<input type="text" class="form-field" name="estatura" placeholder="Estatura"><br>';

        echo '<label class="form-label">Alergia:</label><br>';
        echo '<input type="text" class="form-field" name="alergia" placeholder="Alegia"><br>';

        echo '<label class="form-label">Fecha de nacimiento:</label><br>';
        echo '<input type="text" class="form-field" name="fecha_nac" placeholder="Fecha de nacimiento"><br>';

        echo'</div>';
        
        
        echo '<div class="column"><label class="form-label">Descripción:</label></div><br>';
        echo '<textarea class="form-textarea" name="descripcion" placeholder="Descripción" rows="4"></textarea><br>';

        echo '<input type="hidden" class="form-field" name="id" value="' . $row['id'] . '" readonly><br>';
   
        
       
    }
   
  
    
    echo '<input type="submit" class="form-button" value="Enviar">';
    echo '</form>';

    
} else {
    echo "No se encontraron resultados.";
}

$con->close();
?>

</body>
</html>
