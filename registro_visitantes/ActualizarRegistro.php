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
    !isset($_POST["fecha"]) ||
    !isset($_POST["hora_entrada"]) ||
    !isset($_POST["hora_salida"]) ||
    !isset($_POST["valor_ingreso"]) ||
    !isset($_POST["id_visitante"]) ||
    !isset($_POST["id_cueva"]) ||
    !isset($_POST["id_registro"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_cueva = $_POST["id_cueva"];
$valor_ingreso = $_POST["valor_ingreso"];
$id_visitante = $_POST["id_visitante"];
$fecha = $_POST["fecha"];
$hora_entrada = $_POST["hora_entrada"];
$hora_salida = $_POST["hora_salida"];
$id_registro = $_POST["id_registro"];

$sentencia = $base_de_datos->prepare("UPDATE registro_visitantes SET fecha = ?, hora_entrada = ?, hora_salida = ?, valor_ingreso = ?, id_visitante = ?, id_cueva = ? WHERE id_registro = ?;");
$resultado = $sentencia->execute([$fecha, $hora_entrada, $hora_salida, $valor_ingreso, $id_visitante, $id_cueva, $id_registro]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
