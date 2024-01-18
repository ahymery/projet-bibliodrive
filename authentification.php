<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioDrive</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
</head>
<body>
      <form method="post">
        <br><h5><strong>CONNEXION</strong></h5>
        <h6>Adresse Mail</h6>
        <input type="email" name="mel" placeholder="Mail">
        <h6>Mot de Passe</h6>
        <input type="password" name="motdepasse" placeholder="Mot de Passe">
        <br><input type="submit" name="btn-connexion" class="btn btn-primary btn-sm" value=" &#128275 Connexion"></input>
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
      
      if($_REQUEST['mel'] <> $stmt || $_REQUEST['motdepasse'] <> $stmt){
        echo 'Mel ou mot de passe incorrect';
      }
    }
    ?>
</body>
</html>
