<?php 
//Inclure le fichier de connection
include('connection.php');
//Vérifier si la connection a réussie 
if(!$conn){
    die("La connexion a la base de données a échouée : " . mysqli_connect_error());
}

?>