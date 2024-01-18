<!DOCTYPE html>
<html lang="fr">
<head>
  <title>BiblioDrive | Ajouter un livre</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.png">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
</head>
<?php session_start();?>
<?php
  if (isset($_REQUEST["titre"])) {
    require_once('connexion.php');
    $noauteur=$_REQUEST['noauteur'];  
    $titre=$_REQUEST['titre'];
    $isbn13=$_REQUEST['isbn13'];
    $anneeparution=$_REQUEST['anneeparution'];
    $detail=$_REQUEST['detail'];
    $dateajout=date("Y-m-d");
    $photo=$_REQUEST['photo'];

    // Vérifie d'abord si l'auteur existe dans la base de données
    $stmt = $connexion->prepare("SELECT * FROM auteur WHERE noauteur = :noauteur");
    $stmt->bindValue(':noauteur', $noauteur, PDO::PARAM_STR);
    $stmt->execute();
    $auteur = $stmt->fetch();

    if ($auteur) { // Requête pour ajouter les informations du livre dans la base de donnée SQL

        $stmt = $connexion->prepare("INSERT INTO livre(noauteur, titre, isbn13, anneeparution, detail, dateajout, photo)
        VALUES (:noauteur, :titre, :isbn13, :anneeparution, :detail, :dateajout, :photo)");

        $stmt->bindValue(':noauteur', $noauteur, PDO::PARAM_STR);
        $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindValue(':isbn13', $isbn13, PDO::PARAM_STR);
        $stmt->bindValue(':anneeparution', $anneeparution, PDO::PARAM_STR);
        $stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
        $stmt->bindValue(':dateajout', $dateajout, PDO::PARAM_STR);
        $stmt->bindValue(':photo', $photo, PDO::PARAM_STR); 
        $stmt->execute();
    }

}
?>

<body>
  <!-- ENTETE -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4 col-md-12">
        <?php include 'admin.php'; ?>
      </div>  
    </div>
</div> 
  <!-- Formulaire permettant d'ajouter un livre -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <form method="post">
          <br><h1 style= "margin-left: 550px;"><strong>AJOUTER UN LIVRE</strong></h1><br>
            <label for="noauteur" style= "margin-left: 550px;">Auteur :</label><br>
          <?php            
            require_once('connexion.php');
            echo "<select name='noauteur' id='auteurs' required style= 'margin-left:550px'>";
            echo "<option value=\"\" disabled selected>Sélectionner auteur</option>";
            $req = $connexion->query("SELECT noauteur, nom FROM auteur");
            $req->setFetchMode(PDO::FETCH_OBJ);

            while($noauteur = $req->fetch()){
            echo "<option value=\"{$noauteur->noauteur}\">{$noauteur->nom}</option>";
            }

            echo "</select>";
              ?><br>
                <label for="titre" style= "margin-left: 550px;">Titre :</label><br>
                <input type="text" name="titre" style= "margin-left: 550px;"><br>
                <label for="isbn13" style= "margin-left: 550px;">ISBN13 :</label><br>
                <input type="text" name="isbn13" style= "margin-left: 550px;"><br>
                <label for="anneeparution" style= "margin-left: 550px;">Année de parution :</label><br>
                <input type="text" name="anneeparution" style= "margin-left: 550px;"><br>
                <label for="detail" style= "margin-left: 550px;">Résumé :</label><br>
                <textarea name="detail" placeholder="Résumé du livre" style= "margin-left: 550px;"></textarea><br>
                <label for="photo" style= "margin-left: 550px;">Image :</label><br>
                <input type="text" name="photo" placeholder="Insérez le nom du fichier" style= "margin-left: 550px;"><br>
                <button type="submit" class="btn btn-primary btn-lg" name="add">
                  <i class="fas fa-plus"></i> Ajouter un livre
                </button>
              </form>
              <br>
      </div>
      <div class="col-md-4">
  <?php
  include 'deconnexion.php';
   ?>
   </div>    
</body>
</html>