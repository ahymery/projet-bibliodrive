<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioDrive | Panier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style.css">
  </head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-8 col-md-12">
        <?php include "entete.html"?>
    </div>
   </div>
</div>
   <?php 
   session_start();

   if(!isset($_SESSION['panier'])){
       // Initialisation du panier
       $_SESSION['panier'] = array();
    }
   ?>

   <div class="row">
    <div class="col-md-8">
   <h1 id='panier'>Votre panier</h1>  
   <?php 
         /* Récupération du nom, prénom de l'auteur 
            ainsi que de l'année de parution du livre */
          require_once('connexion.php');
         
         $stmt = $connexion->prepare("SELECT auteur.nom, auteur.prenom, livre.anneeparution FROM livre 
        INNER JOIN auteur ON auteur.noauteur = livre.noauteur");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        // Affichage du panier 
         
        if($enregistrement = $stmt->fetch()){

          $nb_livresempruntés = count($_SESSION['panier']); 
          $nb_emprunts = (5 - $nb_livresempruntés);
          echo '<h3 id="reste">Il vous reste ', $nb_emprunts ,' réservations possible(s).</h3>';
          for ($id =0 ;$id < $nb_livresempruntés; $id++){
            echo '<form method="POST">';
            echo '<p id="contenupanier">', $enregistrement->nom ,' ', $enregistrement->prenom ,' - ', $_SESSION['panier'][$id] ,' (', $enregistrement->anneeparution ,')';
            echo '<input type="submit" id="contenupanier" name="annuler" class="btn btn-primary btn-sm" value="Annuler la réservation">';
            echo '</form></p>';
          } 
          echo '<h3 id="emprunts">Il y a ', $nb_livresempruntés ,' livres dans le panier<h3>';
          echo '<form method="POST">';
          echo '<input type="submit" name="valider" class="btn btn-primary btn-lg" value="Valider le panier">';
          echo '</form>';
        }

         // Requête permettant d'ajouter le contenu du panier dans la table 'emprunter" 

        

     ?>
  </div>
  <div class="col-md-4">
    <?php include "deconnexion.php"?>
    </div>
</body>
</html>