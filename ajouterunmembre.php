<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un membre</title>
</head>
<body>
<form method="get">
    <br>Nom : <input type="text" name="nom"><br>
    <br>Prénom : <input type="text" name="prenom"><br>
    <br>Adresse : <input type="text" name="adresse"><br>
    <br>Mail : <input type="email" name="mel"><br>
    <br>Mot de Passe : <input type="password" name="mdp"><br>
    <br><input type="submit" value="Créer un profil">
    <input type="reset" value="Reinitialiser">
</form>

<?php    
    if (isset($_REQUEST["nom"])) {
    require_once('connexion.php');
    $nom=$_REQUEST["nom"];
    $prenom=$_REQUEST["prenom"];
    $adresse=$_REQUEST["adresse"];
    $mel=$_REQUEST["mel"];
    $mdp=$_REQUEST["mdp"];

    $stmt = $connexion->prepare("INSERT INTO insertion(nom, prenom, adresse, mel, mdp) VALUES(:nom, :prenom, :adresse, :mel, :mdp)");
    $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
    $stmt->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);
    $stmt->execute();
    }
?>
</body>
</html>

<?php

?>