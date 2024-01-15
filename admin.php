<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliodrive | ADMIN </title>
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
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
                                      <form method="POST" action="ajouterunmembre.php"> 
                                        <input type="submit" name="ajoutmembre" class="btn btn-primary btn-lg" value="Ajouter un membre">
                                    </form>
                                    <li class="nav-item">
                                    <form method="POST"  action="ajouterunlivre.php"> 
                                        <input type="submit" name="ajoutlivre" class="btn btn-primary btn-lg" value="Ajouter un livre">
                                    </form>

                                    <?php 
                                     if(isset($_POST['ajoutlivre']) || isset($_POST['ajoutmembre'])){
                                         echo '<li class="nav-item">
                                         <form action="accueil.php">
                                         <input type="submit" class="btn btn-primary btn-lg" value="Accueil"></input>
                                         </form>
                                         </li>'; 
                                    }
                                    ?>
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