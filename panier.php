<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioDrive | Panier</title>
</head>
<body>
    <?php

    $stmt = $connexion->prepare("SELECT * FROM livre WHERE nolivre = :nolivre");
    $stmt->bindValue(':nolivre', $nolivre, PDO::PARAM_STR);
    $stmt->execute();
    $livre = $stmt->fetch();

      if(isset($_POST['btn-ajoutpanier'])){
        require_once('connexion.php');
        $mel = $_REQUEST['mel'];
        $nolivre = $_REQUEST['nolivre'];
        $dateemprunt = date('Y-m-d');

        $stmt = $connexion->prepare("INSERT INTO emprunter(mel, nolivre, datemprunt) VALUES(:mel, :nolivre, :dateemprunt)")
        $stmt->bindValue(':mel', $mel)
        

      }

    ?>
</body>
</html>