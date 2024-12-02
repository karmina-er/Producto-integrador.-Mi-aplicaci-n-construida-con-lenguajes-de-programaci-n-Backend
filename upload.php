<?php
//SUBIR ARCHIVOS 
session_start();

if (isset($_SESSION['user']) && isset($_FILES['file'])) {
    $userDir = 'uploads/' . basename($_SESSION['user']); //carpeta


//crear directorio de files 
if(!is_dir($userDir)){
    mkdir($userDir, 0777, true);    //en caso de no encontrarlo crea uno nuevo directorio (mk-make dir- directory)
}

$file = $_FILES['file'];
$filename = $file['name'];
$filePath = $userDir . '/' . $filename;

//mover el archivo
if (move_uploaded_file($file['tmp_name'], $filePath)) {
    echo "El archivo se subio correctamente<br>";
} else {
    echo "Error al subir el archivo<br>";
}
} else {
echo "Error: No has iniciado sesión o no seleccionaste un archivo.<br>";
header('Location: welcome.php');
exit();
}
?>
