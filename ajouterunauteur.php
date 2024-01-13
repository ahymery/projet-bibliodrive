<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="style.css">
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

</style>
</head>
<body>
<?php
    if (isset($_POST["add"])) {
    require_once('connexion.php');
    $nomauteur=$_REQUEST['nom'];  
    $prenomauteur=$_REQUEST['prenom'];
        $stmt = $connexion->prepare("INSERT INTO auteur(nom, prenom)
        VALUES (:nomauteur, :prenomauteur)");
        $stmt->bindValue(':nomauteur', $nomauteur, PDO::PARAM_STR);
        $stmt->bindValue(':prenomauteur', $prenomauteur, PDO::PARAM_STR);
        $stmt->execute();
    }
?>

<body>
    
    <!-- CONTENU DE LA PAGE-->
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <form method="post">
          <br><h1 style= "margin-left: 550px;"><strong>AJOUTER UN AUTEUR</strong></h1><br>
                <label for="nomauteur" style= "margin-left: 550px;">Nom :</label><br>
                <input type="text" name="nomauteur" style= "margin-left: 550px;"><br>
                <label for="prenomauteur" style= "margin-left: 550px;">Prénom :</label><br>
                <input type="text" name="prenomauteur" style= "margin-left: 550px;"><br>
                <button type="submit" class="btn btn-outline-primary btn-sm" name="add">
                  <i class="fas fa-plus"></i> Ajouter un auteur
                </button>
          </form>
      </div>
    </div>
  </div>
</body>
</html>