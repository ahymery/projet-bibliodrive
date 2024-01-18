<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <?php
  if(isset($_REQUEST['mel'])){
    require_once('connexion.php');
    $mel = $_REQUEST['mel'];
    $motdepasse = $_REQUEST['motdepasse'];
    
    $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE mel= :mel AND motdepasse=:motdepasse");
    $stmt->bindValue(':mel', $mel, PDO::PARAM_STR);
    $stmt->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    $_SESSION['compte'] = $stmt->fetch();
    if (!$_SESSION['compte']) {
     echo '';}
     else {
       $_SESSION['profil'] =  $_SESSION['compte']->profil;
     }
      }
    if(isset($_POST['btn-deco'])){
      session_unset();  
    }   
    ?>
    <?php
    if(!isset($_SESSION['profil'])){
        include 'authentification.php';
      }elseif(isset($_SESSION['profil'])){
          echo '<form method="POST">';
          echo '<br><h3 id="bienvenue" style="text-align: center;"><strong>Bienvenue </strong>',' ',  $_SESSION['compte']->nom ,' ', $_SESSION['compte']->prenom ,'</h3>  ', '<h4 style="text-align: center;" id="client">' ,'<br> ',  $_SESSION['compte']->mel ,'<br> ',  $_SESSION['compte']->adresse, '<br> ',  $_SESSION['compte']->ville, ' ',  $_SESSION['compte']->codepostal ,'</h4>';
          echo '<br><input type="submit" name="btn-deco" value="&#128274 Déconnexion" class="btn btn-primary btn-md"></input>';
         echo '</form>';
      }
      ?>
</body>
</html>