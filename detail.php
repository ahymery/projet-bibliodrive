<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        include 'entete.html';
    ?>

<?php

// connexion a la base de donnée

require_once('connexion.php');

$noauteur = $connexion->query('SELECT noauteur FROM livre WHERE nom IN (SELECT noauteur FROM auteur WHERE nom = '.$select.'');

// Envoi de la requête vers MySQL

$select = $connexion->query("SELECT * FROM livre WHERE noauteur = .$noauteur. INNER JOIN auteur ON ('auteur.noauteur = livre.noauteur')");

// Les résultats retournés par la requête seront traités en 'mode' objet

$select->setFetchMode(PDO::FETCH_OBJ);

// Traitement d'un seul résultat

$enregistrement = $select->fetch();

if ($enregistrement) {// si $enregistrement n'est pas vide

  echo '<h1>', $enregistrement->titre,' ', $enregistrement->nom ,' ', $enregistrement->prenom ,'</h1>';
  echo '<p>', '<img src= .$enregistrement->photo./>','<br>', $enregistrement->detail;

} 

else {// La requête n'a pas retournée de résultat

  echo "Aucun résultat";

}

?>
</body>
</html>