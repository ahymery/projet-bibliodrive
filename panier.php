<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioDrive | Panier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style.css">
  </head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-8 col-md-12">
        <?php include "entete.html"?>
    </div>
   </div>
</div>
   <?php 
   session_start();

   if(!isset($_SESSION['panier'])){
       // Initialisation du panier
       $_SESSION['panier'] = array();
    }
   ?>

   <div class="row">
    <div class="col-md-8">
   <h1 id='panier'>PANIER</h1>  
   <?php
         echo '' 
     ?>
  </div>
  <div class="col-md-4">
    <?php include "deconnexion.php"?>
    </div>
</body>
</html>