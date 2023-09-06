<?php
include('conexion.php');
session_start();

$id_paciente = $_GET['id'];

$sql = "SELECT  p.nombre as 'nombre_paciente', p.apellido as 'apellido_paciente', h.id as 'id_historia', h.fecha_nac as 'fech_nacimiento', 
h.peso as 'peso', h.altura as 'altura', h.tipo_sanngre as 'tipo_sangre', h.alergia as 'alergia'
FROM historia h INNER JOIN paciente p ON h.id_paciente = p.id WHERE p.id = $id_paciente;";

$resultado = $con->query($sql);

if(isset($_SESSION['nivel'])){
    
    if($_SESSION['nivel'] == 'administrador'){
        
        $sql2 = "SELECT d.sintomas as 'sintoma', d.diagnostico as 'diagnostico', d.tratamiento as 'tratamiento', d.receta as 'receta', 
        d.fecha as 'fecha_consulta', m.nombre as 'nombre_medico', m.apellido as 'apellido_medico' 
        FROM historia h INNER JOIN paciente p ON h.id_paciente = p.id INNER JOIN descripcion d ON d.id_historia = h.id 
        INNER JOIN medico m ON d.id_medico = m.id WHERE p.id = $id_paciente;";

        $resultado2 = $con->query($sql2);



    }elseif ($_SESSION['nivel']== 'paciente') {
        
        $fecha = $_GET['fecha'];

        $sql2 = "SELECT d.sintomas as 'sintoma', d.diagnostico as 'diagnostico', d.tratamiento as 'tratamiento', d.receta as 'receta', 
        d.fecha as 'fecha_consulta', m.nombre as 'nombre_medico', m.apellido as 'apellido_medico' 
        FROM historia h INNER JOIN paciente p ON h.id_paciente = p.id INNER JOIN descripcion d ON d.id_historia = h.id INNER JOIN 
        medico m ON d.id_medico = m.id WHERE d.fecha = $fecha AND h.id_paciente = $id_paciente;";

        $resultado2 = $con->query($sql2);


    }elseif ($_SESSION['nivel'] == 'medico'){

        $sql2 = "SELECT d.sintomas as 'sintoma', d.diagnostico as 'diagnostico', d.tratamiento as 'tratamiento', d.receta as 'receta', 
        d.fecha as 'fecha_consulta', m.nombre as 'nombre_medico', m.apellido as 'apellido_medico' 
        FROM historia h INNER JOIN paciente p ON h.id_paciente = p.id INNER JOIN descripcion d ON d.id_historia = h.id 
        INNER JOIN medico m ON d.id_medico = m.id WHERE p.id = $id_paciente;";

        $resultado2 = $con->query($sql2);

    }

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Título de tu página</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="EstiloTable.css">
   
</head>
<body>
    <?php
    if ($resultado->num_rows > 0) {
        $data = $resultado->fetch_assoc();
        ?>
        <h1 style = "text-align: center;"> DATOS MEDICOS</h1>
     
        <div class="column">

        <!-- <p>NOMBRE</p>
        <p> <?php echo $data['nombre_paciente'] ?></p> -->

        <label class="form-label">Nombre:</label><br>
        <input type="text" class="form-field" name="nombre" value="<?php echo $data['nombre_paciente'] ?>" readonly>

        <label class="form-label">APELLIDO:</label><br>
        <input type="text" class="form-field" name="nombre" value="<?php echo $data['apellido_paciente'] ?>" readonly>
        
        <!-- <p>APELLIDO</p>
        <p> <?php echo $data['apellido_paciente'] ?></p> -->
        
        <label class="form-label">FECHA DE NACIMIENTO:</label><br>
        <input type="text" class="form-field" name="nombre" value="<?php echo $data['fech_nacimiento'] ?>" readonly>

        <!-- <p>FECHA DE NACIMIENTO</p>
        <p> <?php echo $data['fech_nacimiento'] ?></p> -->
         
        <!-- <p>PESO</p>
        <p> <?php echo $data['peso'] ?></p> -->
        <label class="form-label">PESO:</label><br>
        <input type="text" class="form-field" name="nombre" value="<?php echo $data['peso'] ?>" readonly>

        </div>

        <div class="column">

        <label class="form-label">ALTURA:</label><br>
        <input type="text" class="form-field" name="nombre" value="<?php echo $data['altura'] ?>" readonly>

        <!-- <p>ALTURA</p>
        <p> <?php echo $data['altura'] ?></p> -->


        <!-- <p>tipo sangre</p>
        <p> <?php echo $data['tipo_sangre'] ?></p> -->

        <label class="form-label">TIPO DE SANGRE:</label><br>
        <input type="text" class="form-field" name="nombre" value="<?php echo $data['tipo_sangre'] ?>" readonly>

        <label class="form-label">ALERGIA:</label><br>
        <input type="text" class="form-field" name="nombre" value="<?php echo $data['alergia'] ?>" readonly>      
        <!-- <p>alergia</p>
        <p> <?php echo $data['alergia'] ?></p>-->
        </div>
        <?php } ?>
    
    <h4 style="color: black;">HISTORIAS</h4>
    
        
        <?php
    if($resultado2->num_rows > 0){ ?>
     
            <table class="table">
                <tr >
                    <th class="th">Sintomas</th>
                    <th class="th">Diagnostico</th>
                    <th class="th">Tratamiento</th>
                    <th class="th">Receta</th>
                    <th class="th">Fecha</th>
                    <th class="th">Medico</th>
                </tr>
                <?php while ($row = $resultado2->fetch_assoc()) { ?>
                        <td><?php echo $row['sintoma'] ?></td>
                        <td><?php echo $row['diagnostico'] ?></td>
                        <td><?php echo $row['tratamiento'] ?></td>
                        <td><?php echo $row['receta'] ?></td>
                        <td><?php echo $row['fecha_consulta'] ?></td>
                        <td><?php echo $row['nombre_medico']." ".$row['apellido_medico']?> </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?php
    }?>

        <?php
        if($_SESSION['nivel'] == 'paciente'){?>
            <a href="javascript: cargarContenido('ficha.php') "><button class="boton">Volver</button></a>
            <?php
        }

        if($_SESSION['nivel']=='medico'){?>
            <div class="boton-container">
                
                <a href="javascript: cargarContenido('Read_Citas_Medico.php') "><button class="boton">Volver</button></a>
                <a href="javascript: formDescripcion(<?php echo $data['id_historia']?>) "><button class="boton">Nueva Historia</button></a>
            </div>
        <?php

        if($_SESSION['nivel']=='administrador'){?>
            <div class="boton-container">
                <a href="javascript: cargarContenido('Read_Paciente_Admin.php') "><button class="boton">Volver</button></a>
            </div>
        <?php
        }?>

        <?php
        } else {?>

            <!-- ponerle diseño y centrar dentro del div -->
            <div class= "boton-container" > 
                <P style= "text-align: center; color: black;"> NO HAY HISTORIAS QUE MOSTRAR </p>
                <?php
                if($_SESSION['nivel'] == 'paciente'){?>
                    <a href="javascript: cargarContenido('ficha.php') "><button class="boton">Volver</button></a>
                    <?php
                }elseif($_SESSION['nivel'] == 'paciente') {?>
                    <a href="javascript: cargarContenido('Read_Citas_Medico.php') "><button class="boton">Volver</button></a>
                    <?php
                }else{?>
                <a href="javascript: cargarContenido('Read_Paciente_Admin.php') "><button class="boton">Volver</button></a>
                <?php
                }?>
            </div>
            <?php
        }
    
    $con->close();
    ?>

</body>
</html>



