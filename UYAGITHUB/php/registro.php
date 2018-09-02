<?php
include "conexion.php";
define('ROOT_DIR', dirname(__FILE__));

error_reporting(1);

$con = CrearConexion();

$nombre = $apellidos = $dni = $correo = $password = "";

$nombre=$_POST['nombre']; 
$apellidos=$_POST['apellido'];
$dni=$_POST['dni']; 
$correo=$_POST['correo'];
$password=$_POST['password'];
$nota=$_POST['nota']; 

$sql = "INSERT INTO Datos_Personales ( Nombre, Apellido, DNI, Correo, Password, Media) VALUES('$nombre','$apellidos','$dni','$correo','$password', '$nota')";

if (!mysqli_query($con, $sql)){
	echo "  No insertado  ";
}
else{
	echo "Datos insertados";
	header('Location:  ../iniciosesion.html');
}

$result = mysqli_query($con, $query);
// if ( false===$result ) {
//   printf("error: %s\n", mysqli_error($con));
// }


?>



