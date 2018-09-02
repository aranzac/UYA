<?php

function CrearConexion()
{
$servername = "sql202.epizy.com";
$username = "epiz_22510112";
$password = "sxc4z26q";
$dbname="epiz_22510112_colegio_db";

    $con = mysqli_connect($servername, $username, $password);

    if(!$con){
        echo "  No conectada ";
    }

    if(!mysqli_select_db($con, $dbname)){
        echo "  BD no seleccionada";
    }
    return $con;
}

?>

