<?php
  session_start()
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>BiblioDrive</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
   .carousel-inner .carousel-item img {
      width: 250px;
      margin-left: 370px;
    }

 </style>
</head>
<body>
  <?php
  if(isset($_REQUEST['mel'])){
    require_once('connexion.php');
    $mel = $_REQUEST['mel'];
    $motdepasse = $_REQUEST['motdepasse'];
    
    $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE mel= :mel AND motdepasse=:motdepasse");
    $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
    $stmt->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    $compte = $stmt->fetch();
    if (!$compte) {
     echo 'ca marche pas';}
     else {
       $_SESSION['profil'] = $compte->profil;
       echo 'ca marche';
     }
      }
    if(isset($_POST['btn-deco'])){
      session_unset();  
    }   
    ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4 col-md-12">
        <?php
          if (isset($_SESSION['profil']) && $_SESSION["profil"] == 'admin'){
            include 'admin.php';
          }
        if (!isset($_SESSION["profil"]) || $_SESSION["profil"] == 'client') {
          include "entete.html";}
        ?>          
      </div> 
    </div>
    <div class="row" id="center">
      <div class="col-md-8">
        <?php 
        if(!isset($_SESSION['profil']) || $_SESSION['profil'] == 'client'){
          include("carousel.php");
        }
        ?>
      </div>  
      <div class="col-md-4">
        <?php
        if(!isset($_SESSION['profil'])){
        include 'authentification.php';
      }else{
          $_SESSION['profil'] = $compte->profil;
          echo '<form method="POST" action="accueil.php">';
          echo '<br><strong>BIENVENUE' , ' ', $compte->prenom ,' ', $compte->nom ,'</strong> <br> ', $compte->mel ,'<br> ', $compte->adresse ,' <br> ', $compte->codepostal ,' ', $compte->ville;
          echo '<br><input type="submit" name="btn-deco" value="Déconnexion" class="btn btn-outline-primary btn-sm"></input>';
          echo '</form>';
        }            
      ?>
      </div>  
    </div>
</body>
</html>