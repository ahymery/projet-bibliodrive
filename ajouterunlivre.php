<!DOCTYPE html>
<html lang="fr">
<head>
  <title>BiblioDrive</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
    <?php include ('entete.html');?>
<form method="post">
    <br><h1 style= "margin-left: 550px;"><strong>AJOUTER UN LIVRE</strong></h1><br>
    <label for="auteur" style="margin-left: 550px;">Auteur:</label><br>
    <input type="text" style="margin-left: 550px;"><br>
    <label for="titre" style= "margin-left: 550px;">Titre :</label><br>
    <input type="text" name="titre" style= "margin-left: 550px;"><br>
    <label for="isbn13" style= "margin-left: 550px;">ISBN13 :</label><br>
    <input type="text" name="isbn13" style= "margin-left: 550px;"><br>
    <label for="anneeparution" style= "margin-left: 550px;">Année de parution :</label><br>
    <input type="text" name="anneeparution" style= "margin-left: 550px;"><br>
    <label for="resume" style= "margin-left: 550px;">Résumé :</label><br>
    <textarea name="resume" placeholder="Résumé du livre" style= "margin-left: 550px;"></textarea><br>
    <label for="dateajout" style= "margin-left: 550px;">Date d'ajout :</label><br>
    <input type="text" name="dateajout"  style= "margin-left: 550px;"><br>
    <label for="image" style= "margin-left: 550px;">Image :</label><br>
    <input type="text" name="image" placeholder="Insérez le nom du fichier" style= "margin-left: 550px;">
    <button type="submit" class="btn btn-outline-primary btn-sm" name="add">
                <i class="fas fa-plus"></i> Ajouter un livre
              </button>
</form>
</div>  
<?php    
    if (isset($_REQUEST["titre"])) {
    require_once('connexion.php');
    $titre=$_REQUEST['titre'];
    $isbn13=$_REQUEST['isbn13'];
    $anneeparution=$_REQUEST['anneeparution'];
    $resume=$_REQUEST['resume'];
    $dateajout=$_REQUEST['dateajout'];
    $image=$_REQUEST['image'];

    $stmt = $connexion->prepare("INSERT INTO livre VALUES (':titre', ':isbn13', ':anneeparution', ':resume', ':dateajout', ':image'");
    $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindValue(':isbn13', $isbn13, PDO::PARAM_STR);
    $stmt->bindValue(':anneeparution', $anneeparution, PDO::PARAM_STR);
    $stmt->bindValue(':resume', $resume, PDO::PARAM_STR);
    $stmt->bindValue(':dateajout', $dateajout, PDO::PARAM_STR);
    $stmt->bindValue(':image', $image, PDO::PARAM_STR); 
    $stmt->execute();
    }
  ?>
</body>
</html>