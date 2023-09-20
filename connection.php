<?php 
//infos de conneection à la BD 
$dbname = "aerienne1";
$host = "localhost";
$username ="root";
$password ="";
//Connection à la BD 
$conn = mysqli_connect($host, $username, $password, $dbname);
//Vérification 
if(!$conn)
    {
        echo ("Impossible de se connecter à la BD");
        die();
    }
?>