<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioDrive</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
</div>
<?php
  // Connexion à la base de données MySQL 
    require_once('connexion.php');

    // Envoi de la requête vers MySQL
    if ($auteur = $_GET["recherche"]) {
      
      $select = $connexion->prepare("SELECT * FROM livre
                                     INNER JOIN auteur ON livre.noauteur = auteur.noauteur
                                     WHERE auteur.nom LIKE :auteur
                                    ");
      $select->bindValue(":auteur", '%'.$auteur.'%');
      $select->setFetchMode(PDO::FETCH_OBJ);
      $select->execute();
      while($enregistrement = $select->fetch()){
        echo '<form method="GET">';
        echo '<br><a href="http://localhost/projet-bibliodrive/detail.php?nolivre='.$enregistrement->nolivre.'" style="margin-left: 250px;">', $enregistrement->titre ," (", $enregistrement->anneeparution ,")", '</a><br>';
        echo '</form>';
      }
    } 
    if($enregistrement <> $select->fetch()){
      echo 'Aucun résultats.';
    }
?>
  </body>
</html>