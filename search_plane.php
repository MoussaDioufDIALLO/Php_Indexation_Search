<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère la ville d'atterrissage depuis le formulaire
    $villeAtterrissage = $_POST["loc"];

    // Valide et nettoie les données si nécessaire
    // (Vous pouvez ajouter des validations supplémentaires ici)

    include("connection.php"); 

    // Vérification de la connexion
    if ($conn->connect_error) {
        die('Erreur de connexion à la base de données : ' . $connexion->connect_error);
    }

    // Requête SQL pour rechercher des avions en fonction de la ville d'atterrissage en utilisant l'index
//    $requete = "SELECT * FROM avion WHERE loc LIKE '%$villeAtterrissage%'";
//    $requete = "SELECT * FROM avion USE INDEX (idx_loc) WHERE loc LIKE '%$villeAtterrissage%'";
    $requete = "SELECT * FROM AVION USE INDEX(idx_loc) WHERE loc LIKE '%$villeAtterrissage%'";
    $resultat = $conn->query($requete);

    // Vérification de la réussite de la requête
    if ($resultat === false) {
        echo 'Erreur de requête : ' . $conn->error;
    } else {
        // Affichage des résultats de la recherche
        echo '<h2>Résultats de la recherche :</h2>';
        while ($row = $resultat->fetch_assoc()) {
            echo 'ID Avion : ' . $row['idav'] . '<br>';
            echo 'Type Avion : ' . $row['typeav'] . '<br>';
            echo 'Capacité : ' . $row['cap'] . '<br>';
            echo 'Ville d\'atterrissage : ' . $row['loc'] . '<br>';
            echo 'Remarques : ' . $row['remarq'] . '<br>';
            echo '<hr>';
        }

        // Libération du résultat
        $resultat->free();
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
}
?>
