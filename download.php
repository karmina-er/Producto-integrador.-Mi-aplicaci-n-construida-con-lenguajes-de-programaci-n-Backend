<?php

//DESCARGAR ARCHIVOS
session_start(); 
if (isset($_SESSION['user']) && isset($_GET['file'])) {
    $userDir = 'uploads/' . basename($_SESSION['user']); // Carpeta del usuario
    $filename = basename($_GET['file']);
    $filePath = $userDir . '/' . $filename;

    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    }
}

header('Location: welcome.php');
exit();
?>