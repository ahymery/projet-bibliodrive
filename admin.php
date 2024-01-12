<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliodrive | ADMIN </title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="alert alert-warning text-center" id="alert">
        <strong>Information !</strong> La Bibliothèque de Moulinsart est fermée au public jusqu'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service BiblioDrive !
    </div>
    <div class="jumbotron text-center" style="margin-bottom:0; border-radius:0;">
        <h1>MENU ADMINISTRATEUR</h1>
            </div>
            <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="nav-item" style="list-style: none; display: flex;">
                                    <li class="nav-item">
                                      <form method="POST" action="accueil.php"> 
                                        <input type="submit" name="montrerajoutmembre" class="btn btn-primary btn-lg">
                                            <i class="fas fa-user"></i> Créer un membre
                                        </input>
                                    </form>
                                    <li class="nav-item">
                                    <form method="POST" action="accueil.php"> 
                                        <input type="submit" name="montrerajoutlivre" class="btn btn-primary btn-lg">
                                            <i class="fas fa-book"></i> Ajouter un livre
                                        </input>
                                    </form>
                                    <li class="nav-item">
                                        <a href="accueil.php" class="btn btn-primary btn-lg" role="button">
                                            <i class="fas fa-arrow-right"></i> Retour a l'accueil   
                                        </a>
                                    </a>
                                </li>
                            </li>   
                        </ul>
                    </form>
                </div>  
            </nav>
        </div>
    </div>
</div>
</body>
</html>