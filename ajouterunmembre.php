<?php

require_once('connexion.php');
$stmt = $connexion->prepare("INSERT INTO utilisateur (mel, motdepasse, nom, prenom, adresse, ville, codepostal) VALUES (:mel, :mdp, :nom, :prenom, :adresse, :ville, :codepostal)");

// Requetes POST pour saisie //

$nom = $_POST('nom');

$prenom = $_POST('prenom');
ss
$mel = $_POST('mel');

$mot_de_passe = $_POST('mdp');

$codepostal = $_POST('codepostal')

$ville = $_POST('ville')

$adresse = $_POST('adresse')

$stmt->bindValue(':nom', $nom, PDO::PARAM_STR);

$stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);

$stmt->bindValue(':mdp', $mot_de_passe, PDO::PARAM_STR);

$stmt->bindValue(':mel', $mel, PDO::PARAM_STR);

$stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);

$stmt->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);

$stmt->bindValue(':ville', $ville, PDO::PARAM_STR); 

$stmt->execute();

$nb_ligne_affectees = $stmt->rowCount();

echo $nb_ligne_affectees." ligne() insérée(s).<BR>";

 

$dernier_numero = $connexion->lastInsertId();


echo "Dernier numéro utilisateur généré : ".$dernier_numero."<BR>";

 

// insertion d'une autre ligne avec des valeurs différentes

$nom = 'Martin';

$prenom = 'Robert';

$mel = 'robmartin@gmail.fr';

$mot_de_passe = 'introuvable';

$stmt->bindValue(':nom', $nom, PDO::PARAM_STR);

$stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);

$stmt->bindValue(':mel', $mel, PDO::PARAM_STR);

$stmt->bindValue(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);

$stmt->execute();

$nb_ligne_affectees = $stmt->rowCount();

echo $nb_ligne_affectees." ligne() insérée(s).<BR>";

 

$dernier_numero = $connexion->lastInsertId(); // Optionnel, Nota Bene : sur récup. sur l'objet PDO, connexion

echo "Dernier numéro utilisateur généré : ".$dernier_numero."<BR>";

 

?>