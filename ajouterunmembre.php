<!DOCTYPE html>
<html lang="fr">
  <head>
  <title>BiblioDrive | Créer un membre</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.png">
  <link rel="stylesheet" href="style.css">
</head>
<!-- Requête PHP permettant l'ajout du membre dans la base de donnée SQL -->
<?php session_start();?>
<?php    
      if (isset($_REQUEST["mel"])) {
        require_once('connexion.php');
        $mel=$_REQUEST["mel"];
        $motdepasse=$_REQUEST["motdepasse"];
        $nom=$_REQUEST["nom"];
        $prenom=$_REQUEST["prenom"];
        $adresse=$_REQUEST["adresse"];
        $ville=$_REQUEST["ville"];
        $codepostal=$_REQUEST["codepostal"];
        $mdp_bdd = password_hash($motdepasse, PASSWORD_ARGON2I);
        
      
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
<body>
  <!-- ENTETE -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4 col-md-12">
        <?php include 'admin.php';?>
      </div>  
    </div>
  </div> 
  <!-- Formulaire permettant d'ajouter un membre -->  
  
  <div class="row">
      <div class="col-md-8">
        <?php 
        if($_SESSION){
          echo '<form method="post">
          <br><h1 style= "padding-left: 550px;"><strong>CRÉER UN MEMBRE</strong></h1><br>
          <label for="mel" style="margin-left: 550px;">Mail :</label><br>
          <input type="email" name="mel" style="margin-left: 550px;" placeholder="Mail"><br>
          <label for="motdepasse" style= "margin-left: 550px;">Mot de passe :</label><br>
          <input type="password" name="motdepasse" style= "margin-left: 550px;" placeholder="Mot de passe"><br>
          <label for="nom" style= "margin-left: 550px;">Nom :</label><br>
          <input type="text" name="nom" style= "margin-left: 550px;" placeholder="Nom"><br>
          <label for="prenom" style= "margin-left: 550px;">Prénom :</label><br>
          <input type="text" name="prenom" style= "margin-left: 550px;" placeholder="Prénom"><br>
          <label for="adresse" style= "margin-left: 550px;">Adresse :</label><br>
          <input type="text" name="adresse" placeholder="Adresse" style= "margin-left: 550px;"></input><br>
          <label for="ville" style= "margin-left: 550px;">Ville :</label><br>
          <input type="text" name="ville"  style= "margin-left: 550px;" placeholder="Ville"><br>
          <label for="codepostal" style= "margin-left: 550px;">Code postal :</label><br>
          <input type="text" name="codepostal" placeholder="Code postal" style= "margin-left: 550px;"><br>
          <input type="submit" class="btn btn-primary btn-md" name="addmembre" value="Créer un membre"></input>
          </form>
          <br>';
        } else {
          echo '<h1 id="alerte">Tu fais quoi la ?</h1>';
        }
        ?>  
        </div>
        <div class="col-md-4">
    <?php
         if($_SESSION){
          include 'deconnexion.php';
        }
      ?>
  </div>
</body>
</html>
