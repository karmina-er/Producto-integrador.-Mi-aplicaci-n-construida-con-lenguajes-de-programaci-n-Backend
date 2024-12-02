<?php
session_start();
//ELIMINAR ARCHIVOS
if (isset($_GET['file'])) {
    $filename = basename($_GET['file']);  //usa get para que funcione
    $user = $_SESSION['user'];  
    $userDir = 'uploads/' . basename($user);  //carpeta

    $filePath = $userDir . '/' . $filename;

    if (file_exists($filePath)) {
        unlink($filePath); //elimina
    }
}


header('Location: welcome.php');
exit();
?>
