</html>
<div id="titulo-mensaje">
        <h1>Bienvenido</h1>
    </div>
<?php
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION['user'];
    $pwd = $_SESSION['pwd'];

        echo "Tu correo registrado es: $user <br>";
        echo "Tu contraseña registrada es: $pwd <br>";

//long out - destroy       
if (isset($_POST['cerrar'])){
    session_unset();
    session_destroy();
    echo '<h1>La sesion ha terminado</h1>';
    header("Location: index.html");
    exit();
    }


//crea la carpeta del ususario
$userDir = 'uploads/' . basename($user); // Carpeta del usuario

if (!file_exists($userDir)) {
    // Crear directorio solo si no existe
    mkdir($userDir, 0777, true);
}
}

setcookie('fechaLogin', time(), time() + (86400 * 30), "/");    //cookie 85400 po 30 días

//Tabla de formulario de archivos
echo '<h3>Subir archivo</h3>';
echo '<form action="welcome.php" method="POST" enctype="multipart/form-data">';
echo '<input type="file" name="file" required>';
echo '<input type="submit" value="Subir Archivo">';
echo '</form>';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $uploadDir = $userDir . '/';// Cambio: Ruta de carga de archivos.
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo "El archivo se subio correctamente<br>"; 
    } else {
        echo "Error al subir el archivo<br>"; 
    }
} 


//muestra el archivo
$tabla = $userDir; // Directorio del usuario
if (is_dir($tabla)) { 
    $directory = new DirectoryIterator($tabla);
echo '<table border="1">';
echo '<tr>';
echo '<th>id</th>';
echo '<th>name</th>';
echo '<th>size</th>';
echo '<th>download</th>';
echo '<th>delete</th>';
echo '</tr>';

foreach ($directory as $fileInfo) {
    if ($fileInfo->isFile()) {
        $id = $fileInfo->getFilename();
        $name = $fileInfo->getFilename();
        $size = $fileInfo->getSize();
        $download_link = 'download.php?file=' . urlencode($name);
        $delete_link = 'delete.php?file=' . urlencode($name);

        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $name . '</td>';
        echo '<td>' . $size . '</td>';
        echo '<td><a href="' . $download_link . '">Download</a></td>';
        echo '<td><a href="' . $delete_link . '">Delete</a></td>';
        echo '</tr>';
    }
}
echo '</table>';
}
?>
</table>
<form action="" method="POST">
<input type="submit" name="cerrar" value="Cerrar Sesión">
</form>
<link rel="stylesheet" type="text/css" href="style.css">
</html>

