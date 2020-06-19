<?php
/*
================================
Este archivo inserta los datos 
enviados a través de formulario.php
================================
*/
?>
<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["id_cueva"]) ||!isset($_POST["fecha"]) || !isset($_POST["hora_entrada"]) 
           || !isset($_POST["hora_salida"]) || !isset($_POST["valor_ingreso"]) || !isset($_POST["id_visitante"])
           || !isset($_POST["id_registro"])) {
    
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_cueva=$_POST["id_cueva"];
$valor_ingreso=$_POST["valor_ingreso"];
$id_visitante=$_POST["id_visitante"];
$fecha = $_POST["fecha"];
$hora_entrada = $_POST["hora_entrada"];
$hora_salida =$_POST["hora_salida"];
$id_registro=$_POST["id_registro"];

/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */


try{
$sentencia = $base_de_datos->prepare("INSERT INTO registro_visitantes(fecha, hora_entrada, hora_salida, valor_ingreso, id_visitante, id_cueva, id_registro) VALUES (?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$fecha, $hora_entrada, $hora_salida, $valor_ingreso, $id_visitante, $id_cueva, $id_registro]); # Pasar en el mismo orden de los ?

#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: ../Listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
    
} catch (Exception $ex) {
echo "<script>
                alert('Error el Id ingresado ya existe o error de relacion');
                window.location= 'FormularioRegistro.php'
    </script>";  
}