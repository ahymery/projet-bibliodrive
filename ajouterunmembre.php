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
  <!-- Include de l'entête sur la page -->
    <?php include ('admin.html');?>

  <!-- Formulaire permettant d'ajouter un membre -->
<form method="post">
    <br><h1 style= "margin-left: 550px;"><strong>AJOUTER UN MEMBRE</strong></h1><br>
    <label for="mel" style="margin-left: 550px;">Mail :</label><br>
    <input type="email" name="mel" style="margin-left: 550px;" placeholder="Mail"><br>
    <label for="motdepasse" style= "margin-left: 550px;">Mot de passe :</label><br>
    <input type="password" name="motdepasse" style= "margin-left: 550px;" placeholder="Mot de passe"><br>
    <label for="nom" style= "margin-left: 550px;">Nom :</label><br>
    <input type="text" name="nom" style= "margin-left: 550px;" placeholder="Nom"><br>
    <label for="prenom" style= "margin-left: 550px;">Prénom :</label><br>
    <input type="text" name="prenom" style= "margin-left: 550px;" placeholder="Prénom"><br>
    <label for="adresse" style= "margin-left: 550px;">Adresse Postale :</label><br>
    <input type="text" name="adresse" placeholder="Adresse" style= "margin-left: 550px;"></input><br>
    <label for="ville" style= "margin-left: 550px;">Ville :</label><br>
    <input type="text" name="ville"  style= "margin-left: 550px;" placeholder="Ville"><br>
    <label for="codepostal" style= "margin-left: 550px;">Code postal :</label><br>
    <input type="text" name="codepostal" placeholder="Code postal" style= "margin-left: 550px;">
    <button type="submit" class="btn btn-outline-primary btn-sm" name="add">
                <i class="fas fa-plus"></i> Ajouter un membre
              </button>
</form>

<br>
<br>
<br>
</div>  

<!-- Requête PHP permettant l'ajout du membre dans la base de donnée SQL -->

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
    
    $stmt = $connexion->prepare("INSERT INTO utilisateur(nom, prenom, adresse, mel, motdepasse, ville, codepostal, profil) VALUES(:nom, :prenom, :adresse, :mel, :motdepasse, :ville, :codepostal, 'client')");
    $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);
    $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
    $stmt->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
    $stmt->bindValue(':ville', $ville, PDO::PARAM_STR);
    $stmt->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);
    $stmt->execute();
    }
?>
</body>
</html>
