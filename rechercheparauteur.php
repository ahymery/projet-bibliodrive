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

// Connexion à la base de données MySQL 

require_once('connexion.php');

// Envoi de la requête vers MySQL
if (isset($_REQUEST["nom"])) {
  $nomrecherché=$_REQUEST['nom'];

  $stmt->bindValue(':nomrecherché', $nomrecherché, PDO::PARAM_STR);

  $stmt = $connexion->prepare("SELECT * FROM auteur WHERE nom = :nomrecherché");

  $stmt->execute();

  $select = $stmt->fetch();
  
  $_REQUEST['nom'] = $select->nom;
  
  $select = $connexion->query("SELECT * FROM livre 
    INNER JOIN auteur ON (livre.noauteur = auteur.noauteur)
    WHERE auteur.nom LIKE '.%$nomrecherché%.' 
    ");
}

// Les résultats retournés par la requête seront traités en 'mode' objet

$select->setFetchMode(PDO::FETCH_OBJ);

// Parcours des enregistrements retournés par la requête : premier, deuxième…

while($enregistrement = $select->fetch())

{

  // Affichage du champ  détail de la table 'livre'

  echo "<a href='#'>', $enregistrement->titre'</a>";  
}

?>
</body>
</html>