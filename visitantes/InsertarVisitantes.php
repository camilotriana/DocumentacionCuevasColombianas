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
if (!isset($_POST["id_visitante"]) ||!isset($_POST["nombre"]) || !isset($_POST["apellido"]) 
           || !isset($_POST["rh"]) || !isset($_POST["celular"]) || !isset($_POST["direccion"])) {
    
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$id_visitante=$_POST["id_visitante"];
$celular=$_POST["celular"];
$direccion=$_POST["direccion"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$rh =$_POST["rh"];


/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */


try{
$sentencia = $base_de_datos->prepare("INSERT INTO visitantes(id_visitante, nombre, apellido, rh, celular, direccion) VALUES (?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_visitante, $nombre, $apellido, $rh, $celular, $direccion]); # Pasar en el mismo orden de los ?

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
                window.location= 'FormularioVisitantes.php'
    </script>";  
}