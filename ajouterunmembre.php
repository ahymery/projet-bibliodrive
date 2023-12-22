<!DOCTYPE html>
<html lang="en">
<head>
  <title>BiblioDrive</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style.css">
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

  h1, h6 {
    text-align: center;
  }
</style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-4 col-md-12">
        <?php include("entete.html");?>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-8">    
          <form method="post">
              <br><h1 style= "margin-left: 550px;"><strong>CRÉER UN MEMBRE</strong></h1><br>  
              <label for="email" style= "margin-left: 750px;">Email :</label><br>
              <input type="email" name="mel" placeholder="Mail" style= "margin-left: 750px;"><br>
              <label for="password" style= "margin-left: 750px;">Mot de passe :</label><br>
              <input type="password" name="motdepasse" placeholder="Mot de passe" style= "margin-left: 750px;"><br>
              <label for="nom" style= "margin-left: 750px;">Nom :</label><br>
              <input type="text" name="nom" placeholder="Nom" style= "margin-left: 750px;"><br>
              <label for="prénom" style= "margin-left: 750px;">Prénom :</label><br>
              <input type="text" name="prenom" placeholder="Prénom" style= "margin-left: 750px;"><br>
              <label for="adresse" style= "margin-left: 750px;">Adresse :</label><br>
              <input type="text" name="adresse" placeholder="Adresse postale" style= "margin-left: 750px;"><br>
              <label for="ville" style= "margin-left: 750px;">Ville :</label><br>
              <input type="text" name="ville" placeholder="Ville" style= "margin-left: 750px;"><br>
              <label for="codepostal" style= "margin-left: 750px;">Code Postal :</label><br>
              <input type="text" name="codepostal" placeholder="Code Postal" style= "margin-left: 750px;"><br>
              <button type="submit" class="btn btn-outline-primary btn-sm" name="add" style= "margin-left: 750px;">
                <i class="fas fa-plus"></i> Ajouter un membre
              </button>
          </form>
      </div>   
    </div>

<?php    
    if (isset($_REQUEST["nom"])) {
    require_once('connexion.php');
    $nom=$_REQUEST["nom"];
    $prenom=$_REQUEST["prenom"];
    $adresse=$_REQUEST["adresse"];
    $mel=$_REQUEST["mel"];
    $motdepasse=$_REQUEST["motdepasse"];
    $ville=$_REQUEST["ville"];
    $codepostal=$_REQUEST["codepostal"];
    $stmt = $connexion->prepare("INSERT INTO utilisateur(nom, prenom, adresse, mel, motdepasse, ville, codepostal) VALUES(:nom, :prenom, :adresse, :mel, :motdepasse, :ville, :codepostal)");
    $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);
    $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
    $stmt->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
    $stmt->bindValue(':ville', $ville, PDO::PARAM_STR);
    $stmt->bindValue('codepostal', $codepostal, PDO::PARAM_STR);
    $stmt->execute();
    }
    
?>
</body>
</html>
