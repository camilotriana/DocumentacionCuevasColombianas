<?php
/*
================================
Este archivo guarda los datos del formulario
en donde se editan
================================
*/
?>

<?php

#Salir si alguno de los datos no está presente
if (
    !isset($_POST["nombre_ciudad"]) ||
    !isset($_POST["nombre_departamento"]) ||
    !isset($_POST["id_lugar"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_lugar = $_POST["id_lugar"];
$nombre_ciudad = $_POST["nombre_ciudad"];
$nombre_departamento = $_POST["nombre_departamento"];

$sentencia = $base_de_datos->prepare("UPDATE lugar SET nombre_ciudad = ?, nombre_departamento = ? WHERE id_lugar = ?;");
$resultado = $sentencia->execute([$nombre_ciudad, $nombre_departamento, $id_lugar]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
