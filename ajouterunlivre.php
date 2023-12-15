<!DOCTYPE html>
<html lang="en">
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

</form>

<?php    
    if (isset($_REQUEST["nom"])) {
    require_once('connexion.php');
    $titre=$_REQUEST['titre'];
    $isbn13=$_REQUEST['isbn13'];
    $anneeparution=$_REQUEST['anneeparution'];
    $resume=$_REQUEST['resume'];
    $dateajout=$_REQUEST['dateajout'];
    $image=$_REQUEST['image'];

    $stmt = $connexion->prepare("INSERT INTO livre(titre, isbn13, anneeparution, resume, dateajout, image) VALUES (':titre', ':isbn13', ':anneeparution', ':resume', ':dateajout', ':image'");
    $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindValue(':isbn13', $isbn13, PDO::PARAM_INT);
    $stmt->bindValue(':anneeparution', $anneeparution, PDO::PARAM_INT);
    $stmt->execute();
    }
    
?>
</body>
</html>