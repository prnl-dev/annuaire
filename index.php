<?php
session_start();
try
{
	$db = new PDO('mysql:host=localhost;dbname=annuaire;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$contacts = $db->prepare("SELECT name, firstname, tel FROM contacts ORDER BY name");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" type="text/css" href="styles.css">
    <title>Annuaire</title>
</head>

<body>
    <h1>Bienvenue dans l'annuaire</h1>
    <h3>Ajouter un nouveau contact :</h3>
    <form method="POST" action="post.php">
        <label for="name">Nom : </label>
        <input type="text" name="name">
        <label for="firstname">Prénom : </label>
        <input type="text" name="firstname">
        <label for="tel">Téléphone : </label>
        <input type="tel" name="tel"><br>
        <input type="submit" value="Envoyer">
    </form>

    <div id="liste_contacts">
        <h3>Liste des contacts :</h3>
        <ul>
        <?php 
        $contacts->execute();
        while ($contact = $contacts->fetch()) {
            echo "<li>Nom : ".$contact['name']."<br>Prénom : ".$contact['firstname']."<br>Téléphone : ".$contact['tel']."</li>";
        }
        $contacts->closeCursor();
        ?>
        </ul>
    </div>
</body>