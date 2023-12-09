<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioDrive</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <style>
  .fakeimg {
    height: 200px;ssss
    background: #aaaaaa;
  }

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
    <form action="authentification.php" method="post">
        <h6><strong>SE CONNECTER</strong></h6>
        <p>Identifiant</p>
        <input type="text" name="id" placeholder="Ton identifiant">
        <p>Mot de Passe</p>
        <input type="password" name="mdp" placeholder="Ton Mot de passe">
        <br><button type="submit" class="btn btn-outline-primary btn-sm">Connexion</button>
    </form>
</div>

</body>
</html>
