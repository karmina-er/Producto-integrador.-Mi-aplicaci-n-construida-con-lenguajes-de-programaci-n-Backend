<?php
//REGISTRO DE USUARIOS 
session_start(); 
if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [];
}

$nombre = $_POST['name'];
$correo = $_POST['user'];
$contraseña = $_POST['pwd'];

$usuario = [
    'nombre' => $nombre,
    'correo' => $correo,
    'contraseña' => $contraseña
];

$_SESSION['usuarios'][] = $usuario;

$json = json_encode($_SESSION['usuarios'],JSON_PRETTY_PRINT); //JSON_PRETTY_PRINT se agrega para que los acomode en forrma de lista
$archivo = "usuarios.json";
file_put_contents($archivo,$json);

echo "<p>¡Felicidades, ya tienes una cuenta!</p>";

?>
<html>
<form method="post" action="index.html">
    <input type="submit" id="botton regresar" name="inicio" value="Volver a Inicio de Sesión">
</form>
<link rel="stylesheet" type="text/css" href="style.css">
</p>
</html>