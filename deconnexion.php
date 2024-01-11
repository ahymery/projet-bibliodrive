<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form>
        <?php
        // Création du formulaire de déconnexion
        $compte = $stmt->fetch();
        $_SESSION['profil'] = $compte->profil;
        $_REQUEST['deconnexion'] = session_unset();
        if(isset($_SESSION['profil'])){
           echo $compte->nom ,' ', $compte->prenom ,'<br>', $compte->mel ,'<br>', $compte->adresse ,' ', $compte->ville ,' ', $compte->codepostal;
           echo '<br><button type="submit" class="btn btn-outline-primary btn-sm">Déconnexion</button>';
        }
        ?>
    </form>
</body>
</html>