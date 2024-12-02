<html> 
    <div id="titulo-mensaje">
        <h1> Mensaje </h1>
    </div>
<?php
//LOG IN USURIARIO CORRECTO E INCORRECTO
session_start();        //se agrega para habilitar inicio de seccion SIEMPRE
    if (isset($_POST['boton'])) {
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];
        

        $usuarios = isset($_SESSION['usuarios']) ? $_SESSION['usuarios'] : [];
        $usuario_valido = false;

        foreach ($usuarios as $usuario) {
            if ($usuario['correo'] === $user && $usuario['contraseña'] === $pwd) {
                $usuario_valido = true;
                $_SESSION['user'] = $user;
                $_SESSION['pwd'] = $pwd;
    
                break;
            }
        }
        if($usuario_valido){
            header("Location: welcome.php");
            echo "<p>¡Muy bien! - Usuario válido</p>";  
            exit();
        }
        else{
            echo "<p>¡Error! - Usuario incorrecto</p>";
        }
    }
    
    ?>
    </div>
<p>¿No tienes cuenta? <a href="registro.html">Regístrate aquí</a></p>
<link rel="stylesheet" type="text/css" href="style.css">
</html>
