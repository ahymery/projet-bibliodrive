<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliodrive | ADMIN </title> 
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- MESSAGE D'INFORMATION -->
    <div class="alert alert-warning text-center" id="alert">
        <strong>Information !</strong> La Bibliothèque de Moulinsart est fermée au public jusqu'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service BiblioDrive !
</div>
        <!-- ENTETE AVEC BOUTONS SE DIRIGEANTS VERS LES PAGES ajoutermembre.php et ajouterunlivre.php -->
            <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="nav-item" style="list-style: none; display: flex;">
                                    <li class="nav-item">
                                      <form method="POST" action="ajouterunmembre.php"> 
                                      <button type="submit" name="ajoutmembre" class="btn btn-primary btn-lg">
                                            <i class="fas fa-user"></i> Créer un membre
                                        </button>                                    </form>
                                    <li class="nav-item">
                                    <form method="POST"  action="ajouterunlivre.php"> 
                                        <button type="submit" name="ajoutlivre" class="btn btn-primary btn-lg">
                                            <i class="fas fa-book"></i> Ajouter un livre
                                        </button>
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