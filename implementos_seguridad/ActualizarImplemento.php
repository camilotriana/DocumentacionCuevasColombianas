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
    !isset($_POST["nivel_prioridad"]) ||
    !isset($_POST["id_implemento"]) ||
    !isset($_POST["id_visitante"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_implemento = $_POST["id_implemento"];
$id_visitante = $_POST["id_visitante"];
$nombre = $_POST["nombre"];
$nivel_prioridad = $_POST["nivel_prioridad"];


$sentencia = $base_de_datos->prepare("UPDATE implementos_seguridad SET nombre = ?, nivel_prioridad = ?, id_visitante = ? WHERE id_implemento = ?;");
$resultado = $sentencia->execute([$nombre, $nivel_prioridad, $id_visitante, $id_implemento]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
