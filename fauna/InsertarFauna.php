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
if (!isset($_POST["id_fauna"]) ||!isset($_POST["nombre"]) || !isset($_POST["n_poblacion"]) || !isset($_POST["peligro"]) 
           || !isset($_POST["id_cueva"]) || !isset($_POST["id_especie"])) {
    
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_cueva=$_POST["id_cueva"];
$id_especie=$_POST["id_especie"];
$id_fauna=$_POST["id_fauna"];
$nombre = $_POST["nombre"];
$peligro = $_POST["peligro"];
$n_poblacion = $_POST["n_poblacion"];


/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */


try{
$sentencia = $base_de_datos->prepare("INSERT INTO fauna(id_fauna, nombre_fauna, n_poblacion, peligro, id_cueva, id_especie) VALUES (?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_fauna, $nombre, $n_poblacion, $peligro, $id_cueva, $id_especie]); # Pasar en el mismo orden de los ?

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
                window.location= 'FormularioFauna.php'
    </script>";  
}