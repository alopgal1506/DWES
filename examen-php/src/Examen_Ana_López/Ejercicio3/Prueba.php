<?php
include_once("Vehiculo.php");
include_once("Coche.php");
include_once("Bicicleta.php");

if(!isset($_SESSION['vehiculo'])){
    $_SESSION['vehiculo']=[];
}

session_start();

$coche=new Coche("12345rfd", 20, 4);
$bicicleta=new Bicicleta("67899fgh", 10);


?>