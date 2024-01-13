<!DOCTYPE html>
<html lang="fr">
<body>
<div id="livres" class="carousel slide" data-ride="carousel">


<!-- contenu du carroussel -->
<div class="carousel-inner">
 <?php 

// Connexion a la base de donnée
  $servername = "localhost";  
  $username = "root";
  $password = "";
  $dbname = "projet-bibliodrive";

  $conn = new mysqli($servername, $username, $password, $dbname);

// Verification de la connexion
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

    $sql = "SELECT nolivre, titre, photo FROM livre ORDER BY nolivre DESC LIMIT 5";
    $result = $conn->query($sql);
    $count = 0;
    if ($result->num_rows > 0) {
      
      while($row = $result->fetch_assoc()) {
        echo "<div class='carousel-item".($count == 0 ? " active" : "")."'><img src='covers/".$row["photo"]."' alt='".$row["titre"]."'></div>";
        $count++;
      }
    } else {
      echo "0 resultats";
    }
    $conn->close();
 ?>
</div>
  <a class="carousel-control-prev" href="#livres" data-slide="prev" style="background: black; margin-left: 15px;">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#livres" data-slide="next" style="background: black;">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</body>
</html>