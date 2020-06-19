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
    !isset($_POST["n_poblacion"]) ||
    !isset($_POST["peligro"]) ||
    !isset($_POST["id_cueva"]) ||
    !isset($_POST["id_especie"]) ||
    !isset($_POST["id_fauna"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_fauna = $_POST["id_fauna"];
$id_especie = $_POST["id_especie"];
$id_cueva = $_POST["id_cueva"];
$nombre = $_POST["nombre"];
$peligro = $_POST["peligro"];
$n_poblacion = $_POST["n_poblacion"];


$sentencia = $base_de_datos->prepare("UPDATE fauna SET nombre_fauna = ?, n_poblacion = ?, peligro = ?, id_cueva = ?, id_especie = ? WHERE id_fauna = ?;");
$resultado = $sentencia->execute([$nombre, $n_poblacion, $peligro, $id_cueva, $id_especie, $id_fauna]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
