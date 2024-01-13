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
    if (isset($_POST["recherche"])) {

      $select = $connexion->query("SELECT * FROM livre");

      $select->setFetchMode(PDO::FETCH_OBJ);

    while($enregistrement = $select->fetch()){
       echo '<form method="GET">';
       echo '<a nom="detaillivre" href="http://localhost/projet-bibliodrive/detail.php?nolivre ='.$enregistrement->nolivre.'">', $enregistrement->titre ," (", $enregistrement->anneeparution ,")", '</a><br>';
       echo '</form>';
      } 
    }
?>
  </body>
</html>