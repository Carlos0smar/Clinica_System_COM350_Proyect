<?php session_start();
$email = $_POST['email'];
$password = $_POST['password'];
include('conexion.php');
$sql = "SELECT 'medico' AS nivel, id, email, nombre, apellido
FROM medico
WHERE email = '$email' AND password = '$password'
UNION
SELECT 'administrador' AS nivel, id, email, nombre, apellido
FROM administrador
WHERE email = '$email' AND password = '$password'
UNION
SELECT 'paciente' AS nivel, id, email, nombre, apellido
FROM paciente
WHERE email = '$email' AND password = '$password';
";
$resultado = $con->query($sql);
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['apellido'] = $fila['apellido'];
    $_SESSION['email'] = $fila['email'];
    $_SESSION['nivel'] = $fila['nivel'];
    // Redirecciona al inicio después de haber iniciado sesión
    redirect = array("redirect" => "inicio.html");
    echo json_encode(redirect);
    // header("location:inicio.html");
} else {
?>
    Error contraseña no valida
    <meta http-equiv="refresh" content="3; url=login.html" />
<?php
}
?>