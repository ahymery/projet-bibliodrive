<?php session_start() ?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioDrive</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-8 col-md-12">
    <?php
        include 'entete.html';
    ?>
    </div>
  </div>
 <div class="row">
    <div class="col-md-8">
    <?php
    // Connexion à la base de données MySQL 
    require_once('connexion.php');

    // Envoi de la requête vers MySQL
    if(isset($_GET["nolivre"])) {

    $select = $connexion->prepare("SELECT * FROM livre
    INNER JOIN auteur ON livre.noauteur = auteur.noauteur
    WHERE livre.nolivre LIKE :livre");
     $select->bindValue(":livre", $_GET['nolivre'], PDO::PARAM_STR);
    $select->setFetchMode(PDO::FETCH_OBJ);
    $select->execute();
  
    while($enregistrement = $select->fetch()){
      echo '<img id="covers" src="covers/', $enregistrement->photo, '"/>';
      echo '<h3 id="titre">Titre : ', $enregistrement->titre ," (", $enregistrement->anneeparution ,")", '</h3><br>';
      echo '<h3 id="auteur">Auteur : ', $enregistrement->prenom ,' ', $enregistrement->nom ,'</h3><br>';
      echo '<h3 id="isbn13">ISBN-13 : ', $enregistrement->isbn13 ,'</h3><br>';
      echo '<div class="resume">';
      echo '<h2>Résumé du livre : </h2>', '<p id="resume">', $enregistrement->detail ,'</p>';
      echo '</div>';
      
      if($_SESSION){ 
        echo '<form method="POST">';
        echo '<input type="submit" name="btn-ajoutpanier" class="btn btn-outline-primary btn-lg" value="Ajouter au panier"></input>';
        echo '</form>';
      }else{
        echo '<h4>Veuillez vous connecter pour emprunter un livre.</h4  >';
      }

      if(!isset($_SESSION['panier'])){
     // Initialisation du panier
     $_SESSION['panier'] = array();
    }
  
    // On ajoute les entrées dans le tableau
    if(isset($_POST['btn-ajoutpanier'])){
      array_push($_SESSION['panier'], $enregistrement->titre);  
      echo "Livre ajouté avec succès.";
    }
  }
  }
  
    ?>
    </div>
    <div class="col-md-4">
    <?php
       include('deconnexion.php');
      ?>
  </div>
</body>
</html>