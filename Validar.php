<?php
$usuario="cmj";
$contraseña="cmjcmj";
#Salir si alguno de los datos no está presente
if (!isset($_POST["usuario"]) ||!isset($_POST["contraseña"])) {
    exit();
}
if($_POST["usuario"]===$usuario && $_POST["contraseña"]===$contraseña){
    header("Location: Encabezado2.php");
}
 else {
    echo "<script>
                alert('CONTRASEÑA O USUARIO INCORRECTO');
                window.location= 'Login.php'
    </script>";    
}
?>
