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
    <style>
        #covers {
         margin-left: 1000px;
         margin-top: 10px;
         margin-bottom: 10px;
         width: 350px;
         height: 500px;
         border-radius: 15px;
        }
        #titre{
          text-align: left;
          margin-left: 15px;
          margin-bottom: 100px;
          margin-top: -400px;
        }

        #auteur{
          text-align: left;
          margin-left: 15px;
          margin-bottom: 100px;
          margin-top: -200px;
        }

        #isbn13{
          text-align: left;
          margin-left: 15px;
          margin-bottom: 150px;
          margin-top: -70px;
        }
        h2{
            margin-left: 175px;
            margin-top: -100px;
            color: red;
        }
        #resume {
            text-align: center;
            margin-left: 15px;
            margin-right: 1000px;
            margin-bottom: 25px;
        }

        form[name="btn-panier"]{
            margin-left: 150px;
        }
    </style>
</head>
<body>
    <?php
        include 'entete.html';
    ?>
    <?php
// Connexion à la base de données MySQL 
require_once('connexion.php');

// Envoi de la requête vers MySQL
if(isset($_GET["nolivre"])) {

$select = $connexion->prepare("SELECT * FROM livre
 INNER JOIN auteur ON livre.noauteur = auteur.noauteur
 WHERE livre.nolivre LIKE :livre   
 ");
 $select->bindValue(":livre", $_GET['nolivre'], PDO::PARAM_STR);
 $select->setFetchMode(PDO::FETCH_OBJ);
 $select->execute();
  
 while($enregistrement = $select->fetch()){
     echo '<img id="covers" src="covers/', $enregistrement->photo, '"/>';
     echo '<h3 id="titre">Titre : ', $enregistrement->titre ," (", $enregistrement->anneeparution ,")", '</h3><br>';
     echo '<h3 id="auteur">Auteur : ', $enregistrement->nom ,'</h3><br>';
     echo '<h3 id="isbn13">ISBN-13 : ', $enregistrement->isbn13 ,'</h3><br>';
     echo '<h2>Résumé du livre : </h2>', '<p id="resume">', $enregistrement->detail ,'</p>';
 } 
} else {
 echo "Erreur la variable 'livre' n'est pas définie";
}
?>
    <form method="POST" name="btn-panier">
        <input type="button" class="btn btn-outline-primary btn-lg" value="Ajouter au panier"></input>
  </form>
</body>
</html>