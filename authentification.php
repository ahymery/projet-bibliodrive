<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioDrive</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <style>

  img {
    height:50px;
  }
  .jumbotron{
    background-color: rgb(62, 131, 249)
   }
   .alert{
        margin-bottom: 0;

   }

    .carousel-inner img {   
         width: 100%;
         height: 100%;
    }

    input[type="search"] {
        padding: 12px 15px;
        border-radius: 15px;
        border-color: #046aaa;
    }   
  </style>
</head>
<body>
      <form method="post" action="accueil.php">
        <br><h5><strong>SE CONNECTER</strong></h5>
        <p>Adresse Mail</p>
        <input type="email" name="mel" placeholder="Ton mail">
        <p>Mot de Passe</p>
        <input type="password" name="motdepasse" placeholder="Ton Mot de passe">
        <br><button type="submit" class="btn btn-outline-primary btn-sm">Connexion</button>
    </form>
    <?php

    // RECHERCHE DU MEL ET DU MOT DE PASSE DANS LA BASE SQL 
    
    if(isset($_REQUEST['mel'])){
      require_once('connexion.php');
      $mel = $_REQUEST['mel'];
      $motdepasse = $_REQUEST['motdepasse'];
      
      $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE mel=:mel AND motdepasse=:motdepasse");
      $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
      $stmt->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
   
      if(isset($_SESSION['profil'])){
        $_SESSION['profil'] = $compte->profil;
        echo 'Bienvenue ', $compte->nom, ' ', $compte->prenom;}    
    }

    ?>
</body>
</html>
