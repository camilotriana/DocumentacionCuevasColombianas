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
    !isset($_POST["peligro"]) ||
    !isset($_POST["id_cueva"]) ||
    !isset($_POST["id_especie"]) ||
    !isset($_POST["id_flora"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_flora = $_POST["id_flora"];
$id_especie = $_POST["id_especie"];
$id_cueva = $_POST["id_cueva"];
$nombre = $_POST["nombre"];
$peligro = $_POST["peligro"];


$sentencia = $base_de_datos->prepare("UPDATE flora SET nombre_flora = ?, peligro = ?, id_cueva = ?, id_especie = ? WHERE id_flora = ?;");
$resultado = $sentencia->execute([$nombre, $peligro, $id_cueva, $id_especie, $id_flora]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
