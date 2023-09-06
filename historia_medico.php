<?php

$id= $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-eqiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/historia_medico.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="title">Registro <span> Historia</span></h1>
        <div class="registro">
            <div class="registro-form">
                <h3>Historia</h3>
                <form action="javascript: Registrar_historia_for_medico(<?php echo $id ?>)" id="form_descripcion">
                    <p>
                        <label>Sintomas:</label>
                        <textarea type="text" id = "sintomas" name="sintomas" rows ="10" colums="18"  required></textarea>                       
                    </p>
                    <p>
                        <label>Diagnostico:</label>
                        <textarea type="text" id = "diagnostico" name="diagnostico"  rows ="10" colums="18"  required></textarea>
                    </p>
                    <p>                        
                        <label>Tratamiento:</label>
                        <textarea type="text" id = "tratamiento" name="tratamiento"  rows ="10" colums="18" required></textarea>
                    </p>
                    <p>
                        <label>Receta:</label>
                        <textarea type="textarea" id = "receta" name="receta"  rows ="10" colums="18" required></textarea>
                    </p>
                    <p class = "bloque">
                        <button type= "submit"> 
                            Registrar
                        </button>
                    </p>
            </div>

        </div>

    </div>
</body>
</html>