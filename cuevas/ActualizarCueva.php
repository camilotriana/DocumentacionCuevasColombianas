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
    !isset($_POST["nombre"]) ||
    !isset($_POST["longitud"]) ||
    !isset($_POST["latitud"]) ||
    !isset($_POST["id_cueva"]) ||
    !isset($_POST["id_tipo"]) ||
    !isset($_POST["id_lugar"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_cueva = $_POST["id_cueva"];
$id_lugar = $_POST["id_lugar"];
$id_tipo = $_POST["id_tipo"];
$nombre = $_POST["nombre"];
$longitud = $_POST["longitud"];
$latitud = $_POST["latitud"];

$sentencia = $base_de_datos->prepare("UPDATE cuevas SET nombre_cueva = ?, longitud = ?, latitud = ?, id_lugar = ?, id_tipo = ? WHERE id_cueva = ?;");
$resultado = $sentencia->execute([$nombre, $longitud, $latitud, $id_lugar, $id_tipo, $id_cueva]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
