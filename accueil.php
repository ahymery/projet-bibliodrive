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

    input[name=btn-deco]{
      margin-left: 190px !important;
      margin-top: 5px !important;
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
     }
      }
    if(isset($_POST['btn-deco'])){
      session_unset();  
    }   
    ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-8 col-md-12">
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
      <div class="col-md-8 col-sm-8">

        <?php 
        if(!isset($_SESSION['profil']) || $_SESSION['profil'] == 'client'){
          echo '<br><h1 style="margin-left: 300px;"><strong>Dernières Acquisitions</strong></h1><br>';
          include "carousel.php";
        }elseif(isset($_POST['montrerajoutlivre'])){
          include 'ajouterunlivre.php';
        }elseif(isset($_POST['montrerajoutmembre'])){
          include 'ajouterunmembre.php';
        }elseif(isset($_POST['btn-src'])){
          include 'rechercheparauteur.php';
        }
        ?>
      </div>  
      <div class="col-md-4">
        <?php
        if(!isset($_SESSION['profil'])){
        include 'authentification.php';
      }elseif(isset($_SESSION['profil'])){
          echo '<form method="POST">';
          echo '<br><h3 style="text-align: center;"><strong>Bienvenue </strong>',' ', $compte->nom ,' ', $compte->prenom ,'</h3>  ', '<h4 style="text-align: center;">' ,'<br> ', $compte->mel ,'<br> ', $compte->adresse, '<br> ', $compte->ville, ' ', $compte->codepostal ,'</h4>';
          echo '<br><input type="submit" name="btn-deco" value="Déconnexion" class="btn btn-outline-primary btn-md"></input>';
          echo '</form>';
      }
                 
      ?>
      </div>  
    </div>
</body>
</html>